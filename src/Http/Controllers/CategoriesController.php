<?php

namespace Package\Publication\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

//Models
use Package\Publication\Models\Categories;

//facafe
use App\Facades\PrioResponseHandler;

class CategoriesController extends BaseController
{
    /**
     * Index function
     * To fetch all categoeries pass to the view
     *
     * @return array
     */
    public function index(Request $request)
    {
        $allCategories = Categories::all();
        return view('categories.list')->with(['allCategories' => $allCategories]);
    }
    
    /**
     * Create function
     * To load the view only for create categoeries
     *
     * @return void view
     */
    public function create(Request $request)
    {
        $categories = Categories::all();
        return view('categories.create')->with(['categories' => $categories]);
    }
    
    /**
     * Edit function
     * To load the view only for create categoeries
     *
     * @return void view
     */
    public function edit(Request $request)
    {
        $allCategories = Categories::all();
        $categories = Categories::find($request->id);
        return view('categories.edit')->with(['singleCategory' => $categories, 'allCategories' => $allCategories]);
    }

    /**
     * Save function
     * To save categoeries
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // validate the data
        $request->validate([
            "parent_id" => "required",
            "name" => "required",
            "description" => "required"
        ]);

        $categories = array(
            'reseller_id' => '0',
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'placeholder.png',
            'parent_id' => $request->parent_id?:0,
            'updated_by' => '0'
        );
        $category = Categories::create($categories);
        if ($category->id) {
            return PrioResponseHandler::sendSuccessResponse(['category' => $category]);
        } else {
            return PrioResponseHandler::sendErrorResponse('error');
        }
        
    }

    /**
     * Save function
     * To save categoeries
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        // validate the data
        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        $singleCategories = Categories::find($request->id);
        $categories = array(
            'reseller_id' => '0',
            'name' => $request->name?:$singleCategories->name,
            'description' => $request->description?:$singleCategories->description,
            'image' => $request->image?:$singleCategories->image,
            'parent_id' => $request->parent_id?:$singleCategories->parent_id,
            'updated_by' => '0'
        );
        
        if ($singleCategories->update($categories)) {
            return redirect('/categories');
        } else {
            return view('errors.404');
        }
    }

    public function delete(Request $request)
    {
        $category = Categories::find($request->id);
        if ($category->delete()) {
            return redirect('/categories');
        } else {
            return view('errors.404');
        }
    }

    public function categories(Request $request)
    {
        $categories = Categories::all();
        $response['categoryHtml'] = view('categories.categoryoptions', ['categories' => $categories])->render();
        $response['categoryCreateHtml'] = view('categories.create', ['categories' => $categories])->render();
        if (!empty($categories)) {
            return PrioResponseHandler::sendSuccessResponse($response);
        } else {
            return PrioResponseHandler::sendErrorResponse('error');
        }
    }
}
