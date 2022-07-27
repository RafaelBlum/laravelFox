<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(6);
        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.update');
    }


    public function store(Request $request)
    {
        try{
            $category = new Category();
            $category->title = $request->title;
            $category->description = $request->description;
            $category->save();

            toast('Categoria criada com sucesso!!','success')
                ->autoClose(5000)
                ->position('bottom-end')->timerProgressBar();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getLine() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }
    }


    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('category.update', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        try{
            $category->title = $request->title;
            $category->description = $request->description;

            $category->save();

            toast('Categoria atualizada com sucesso!!','success')
                    ->autoClose(5000)
                    ->position('bottom-end')->timerProgressBar();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getLine() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function destroy(Category $category)
    {
        try{
            $category->delete();
            toast('Categoria deletada!','error')
                ->autoClose(5000)
                ->position('bottom-end')->timerProgressBar();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            flash('Ocorreu um erro, linha ' . $e->getLine() . " :: " . $e->getMessage())->error();
            return redirect()->back();
        }
    }
}
