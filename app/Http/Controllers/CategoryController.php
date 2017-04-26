<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Mockery\Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $catigories = Category::all();
        $data['categories'] = $catigories;
        return  view('categories.index',$data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,[
                'name' => 'required|min:5',
                'desc' => 'required|min:5',
            ]
        );
        $category = new Category();
        $category->name = $request->input('name');
        $category->desc = $request->input('desc');
        $category->save();
        return redirect('/categories');
    }

    public function edit($category_id)
    {
        try{
            $category = Category::findOrFail($category_id);
        } catch (Exception $e){
            return abort(404);
        }
        $data['category'] = $category;
        return view('categories.edit',$data);
    }

    public function update(Request $request, $category_id)
    {
        $this->validate(
            $request,[
                'name' => 'required|min:5',
                'desc' => 'required|min:5',
            ]
        );
        try{
            $category = Category::findOrFail($category_id);
        } catch (Exception $e){
            return abort(404);
        }
        $category->name = $request->input('name');
        $category->desc = $request->input('desc');
        $category->save();
        return redirect('/categories/edit/' . $category_id);
    }

    public function destroy($category_id)
    {
        try{
            Category::destroy($category_id);
        } catch (Exception $e){
            return abort(404);
        }
        return redirect('/categories');
    }

}
