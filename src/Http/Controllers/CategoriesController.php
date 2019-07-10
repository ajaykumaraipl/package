<?php

namespace Admin\Frontend\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Admin\Frontend\Models\Categories;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends BaseController
{
    public function index()
    {
        $allCategories = Categories::getAllCategories();
        return view('view::categories.all', ['allCategories' => $allCategories]);
    }

    public function create()
    {
        return view('view::categories.create');
    }

    public function save(Request $request)
    {
        $request = Request::all();

        // validate the data
        $validator = Validator::make($request, [
            "name" => "required",
            "description" => "required"
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $categories = new Categories(array(
            'name' => $request['name'],
            'description' => $request['description']
        ));
        $result = Categories::storCategory($categories);
        if ($result) {
            return redirect('/categories');
        } else {
            return view('view::categories.404');
        }
    }

    public function edit($id)
    {
        $singleCategory = Categories::getSingleCategory($id);
        return view('view::categories.edit', ['singleCategory' => $singleCategory]);
    }

    public function update(Request $request, $id)
    {
        $request = Request::all();
        
        // validate the data
        $validator = Validator::make($request, [
            "name" => "required",
            "description" => "required"
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $singleCategory = Categories::getSingleCategory($id);
        $singleCategory = array(
            'name' => $request['name'] ?: $singleCategory['name'],
            'description' => $request['description'] ?: $singleCategory['name']
        );
        $result = Categories::updateCategory($singleCategory, $id);
        if ($result) {
            return redirect('/categories');
        } else {
            return view('view::categories.404');
        }
    }


    public function delete($id)
    {
        $result = Categories::deleteCategory($id);
        if ($result) {
            return redirect()->back();
        } else {
            return view('view::categories.404');
        }
    }

}
