<?php

namespace Admin\Frontend\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Admin\Frontend\Models\Tags;
use Illuminate\Support\Facades\Validator;

class TagsController extends BaseController
{
    public function index()
    {
        $tags = Tags::getAllTags();
        return view('view::tags.all', ['tags' => $tags]);
    }

    public function create()
    {
        return view('view::tags.create');
    }

    public function edit($id)
    {
        $singleTag = Tags::getSingleTag($id);
        return view('view::tags.edit', ['singleTag' => $singleTag]);
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

        $tags = new Tags(array(
            'name' => $request['name'],
            'description' => $request['description']
        ));
        $result = Tags::storTag($tags);
        if ($result) {
            return redirect('/tags');
        } else {
            return view('view::tags.404');
        }
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

        $singleTag = Tags::getSingleTag($id);
        $singleTag = array(
            'name' => $request['name'] ?: $singleTag['name'],
            'description' => $request['description'] ?: $singleTag['description']
        );
        $result = Tags::updateTag($singleTag, $id);
        if ($result) {
            return redirect('/tags');
        } else {
            return view('view::tags.404');
        }
    }

    public function delete($id)
    {
        $Tag = Tags::deleteTag($id);
        if ($Tag) {
            return redirect()->back();
        } else {
            return view('view::tags.404');
        }
    }
}
