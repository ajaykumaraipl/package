<?php

namespace Admin\Frontend\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Admin\Frontend\Models\Categories;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends BaseController
{
    /**
     * Index function
     * To fetch all categoeries pass to the view
     *
     * @return array
     */
    public function index()
    {
        $allCategories = Categories::getAllCategories();
        return view('view::categories.all', ['allCategories' => $allCategories]);
    }

    /**
     * Create function
     * To load the view only for create categoeries
     *
     * @return void view
     */
    public function create()
    {
        return view('view::categories.create');
    }

    /**
     * Save function
     * To save categoeries
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Edit function
     * To load the view only for edit categoeries
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $singleCategory = Categories::getSingleCategory($id);
        return view('view::categories.edit', ['singleCategory' => $singleCategory]);
    }

    /**
     * Update function
     * To update the categoeries
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
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


    /**
     * Delete function
     * To delete the categoeries
     *
     * @param [type] $id
     * @return void
     */
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
