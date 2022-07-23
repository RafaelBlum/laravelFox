<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(3);
        return view('user.list', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try{
            $novo = new User();
            $novo->name = $request->name;
            $novo->password = Hash::make($request->password);
            $novo->email = $request->email;

            $end = new Address();
            $end->street = $request->street;
            $end->number = $request->number;
            $end->city = $request->city;

            $novo->save();
            $novo->address()->save($end);

            notify()->success("Usuário criado com sucesso!","","bottomRight");
            return redirect()->route('user.index');
        }catch(\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getFile() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function show(User $user)
    {
        $user->load('posts');
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.update', ['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        try{
            if($request->password !=null){
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->address->street = $request->street;
            $user->address->number = $request->number;
            $user->address->city = $request->city;

            $user->save();
            $user->address()->save($user->address);

            notify()->success("Usuário atualizado com sucesso!","","bottomRight");
            return redirect()->route('user.index');
        }catch(\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getFile() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        try{
            $user->load('address');
            $user->delete();
            notify()->error("Usuário deletado com sucesso!","","topLeft");
            return redirect()->route('user.index');
        }catch(\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getFile() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function find(Request $request)
    {
        DB::connection()->enableQueryLog();
        $name = $request->name;
        $search = User::where('name', 'LIKE', '%'.$name.'%')->get();
        $sql = DB::getQueryLog();
        if(empty($search)){
            return view('user.index');
        }
        return view('user.findList', ['search'=>$search, 'sql'=> $sql[0]['query']]);
    }
}
