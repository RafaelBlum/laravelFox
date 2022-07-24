<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Nette\Utils\Random;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('post.update', compact('categorias'));
    }

    public function store(Request $request)
    {
        try{
            $post = new Post();
            $user = (new User())->find(User::all()->random()->id);
            $post->title = $request->title;
            $post->content = $request->description;

            if(!$request->file('arquivo') == null){
                $image = $request->file('arquivo');
                $filename = "_" . time() . '.' . $image->getClientOriginalExtension();
                $savefile = "capa_posts/" . $filename;

                if($post->cover != 'capa_posts/capa_default.jpg'){
                    File::delete(public_path('storage/' . $post->cover));
                }
                Image::make($image)->resize(781, 521)->save(public_path('storage/capa_posts/' . $filename));
                $post->cover =  $savefile;
            }else{
                $post->cover = "capa_posts/capa_default.jpg";
            }

            $user->posts()->save($post);

            $categoies = Category::find($request->cat);
            $post->categorias()->sync($categoies);

//            notify()->success("Notícia criada com sucesso!!","","bottomRight");
            toast('Notícia criada com sucesso!!','success')
                ->autoClose(5000)
                ->position('bottom-end')->timerProgressBar();
            return redirect()->route('post.show', compact('post'));
        }catch (\Exception $e){
            dd('Ocorreu um erro, linha ' .$e->getLine() . " :: " . $e->getMessage());
            flash('Ocorreu um erro, linha ' . $e->getLine() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categorias = Category::all();
        return view('post.update', compact('post', 'categorias'));
    }

    public function update(Request $request, Post $post)
    {
        try{
            $post->title = $request->title;
            $post->content = $request->description;

            if(!$request->file('arquivo') == null){
                $image = $request->file('arquivo');
                $filename = "_" . time() . '.' . $image->getClientOriginalExtension();
                $savefile = "capa_posts/" . $filename;

                if($post->cover != 'capa_posts/capa_default.jpg'){
                    File::delete(public_path('storage/' . $post->cover));
                }
                Image::make($image)->resize(781, 521)->save(public_path('storage/capa_posts/' . $filename));

                $post->cover =  $savefile;
            }

            $post->save();

            $categoies = Category::find($request->cat);
            $post->categorias()->sync($categoies);

//            notify()->success("Notícia atualizada com sucesso!","","bottomRight");
            toast('Notícia atualizada com sucesso!','success')
                ->autoClose(5000)
                ->position('bottom-end')->timerProgressBar();
            return redirect()->route('post.show', compact('post'));
        }catch (\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getFile() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function destroy(Post $post)
    {
        try{
            if($post->cover != "capa_posts/capa_default.jpg"){
                File::delete(public_path('storage/' . $post->cover));
            }
            $post->delete();
            toast('Notícia deletada!','error')
                ->autoClose(5000)
                ->position('bottom-end')->timerProgressBar();
            return redirect()->back()->with('eliminar', 'ok');
        }catch (\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getFile() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }

    }
}
