<?php

namespace Package\Publication\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

//Models
use Package\Publication\Models\Tags;

class TagsController extends BaseController
{

    /**
     * Index function
     * To fetch all categoeries pass to the view
     *
     * @return array
     */
    public function index(Request $request)
    {
        $tags = Tags::all();
        return view('view::tags.all')->with(['tags' => $tags]);
    }
    
    /**
     * Create function
     * To load the view only for create categoeries
     *
     * @return void view
     */
    public function create(Request $request)
    {
        return view('view::tags.create');
    }
    
    /**
     * Create function
     * To load the view only for create categoeries
     *
     * @return void view
     */
    public function edit(Request $request)
    {
        $singleTag = Tags::find($request->id);
        return view('view::tags.edit')->with(['singleTag' => $singleTag]);
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
            "name" => "required",
            "description" => "required"
        ]);

        $tags = new Tags(array(
            'reseller_id' => '0',
            'name' => $request->name,
            'description' => $request->description,
            'updated_by' => '0'
        ));
        
        if ($tags->save()) {
            return redirect('/tags');
        } else {
            return view('view::tags.404');
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

        $singleTag = Tags::find($request->id);
        $tag = array(
            'reseller_id' => '0',
            'name' => $request->name?:$singleTag->name,
            'description' => $request->description?:$singleTag->name,
            'updated_by' => '0'
        );
        
        if ($singleTag->update($tag)) {
            return redirect('/tags');
        } else {
            return view('view::tags.404');
        }
    }

    public function delete(Request $request)
    {
        $tag = Tags::find($request->id);
        if ($tag->delete()) {
            return redirect('/tags');
        } else {
            return view('view::tags.404');
        }
    }
}
