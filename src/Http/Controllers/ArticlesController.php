<?php

namespace Admin\Frontend\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Admin\Frontend\Models\Articles;
use Admin\Frontend\Models\Categories;
use Admin\Frontend\Models\Tags;
use Admin\Frontend\Models\ArticlesTag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ArticlesController extends BaseController
{
    /**
     * Index function
     * To fetch all articles with connected categoeries and tag id and pass to the view
     *
     * @return array
     */
    public function index()
    {
        $articles = Articles::getAllArticles();
        $tags = Tags::getAllTags();
        return view('view::articles.all', ['allNews' => $articles, "tags" => $tags]);
    }

    /**
     * Create function
     * To load the view only for create article
     *
     * @return void view
     */
    public function create()
    {
        $categories = Categories::getAllCategories();
        $tags = Tags::getAllTags();
        return view('view::articles.create', [ "categories" => $categories, "tags" => $tags]);
    }
    
    /**
     * Save function
     * To save article and related categories and tags and image(actual, cover, thumbnail)
     *
     * @param Request $request
     * @return void
     */
    public function save(Request $request)
    {
        $request = Request::all();
        
        // validate the data
        $validator = Validator::make($request, [
            "category_id" => "required",
            "title" => "required",
            "slug" => "required",
            "content" => "required",
            "status" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "date" => "required",
            "tags" => "required"
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $image = Request::file('image');
        $newName = rand()."_".$image->getClientOriginalName();
        $basePath = public_path('uploads/packages/publications/images/');
        $thumbnail = public_path('uploads/packages/publications/images/thumbnail/small/');
        $cover = public_path('uploads/packages/publications/images/cover/');
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, $mode = 0777, true, true);
            File::makeDirectory($thumbnail, $mode = 0777, true, true);
            File::makeDirectory($cover, $mode = 0777, true, true);
        }
        
        $image->move($basePath, $newName);
        Image::make($basePath.$newName)->save($basePath.$newName);
        Image::make($basePath.$newName)->resize(320, 240)->save($thumbnail.$newName);
        Image::make($basePath.$newName)->resize(820, 312)->save($cover.$newName);
        File::delete($basePath.$newName);
        
        $submittedData = array(
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => $request['content'],
            'image' => $newName,
            'status' => $request['status'],
            'date' => $request['date']
        );
        $lastInsertedId = Articles::storArticle($submittedData);
        
        $tags = array(
            'article_id' => $lastInsertedId,
            'tag_id' => $request['tags']
        );
        
        $result = ArticlesTag::articlesTag($tags);
        
        if ($result) {
            return redirect('/news');
        } else {
            return view('view::articles.404');
        }
    }
    
    /**
     * Edit function
     * To load the view only for edit article
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $singleArticles = Articles::getSingleArticles($id);
        $categories = Categories::getAllCategories();
        $tags = Tags::getAllTags();
        return view('view::articles.edit', ['singleNews' => $singleArticles, "categories" => $categories, "tags" => $tags]);
    }
    
    /**
     * Update function
     * To update the article and related categories and tags and image(actual, cover, thumbnail)
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
            "category_id" => "required",
            "title" => "required",
            "slug" => "required",
            "content" => "required",
            "status" => "required",
            "image" => "required",
            "date" => "required",
            "tags" => "required"
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $singleArticles = Articles::getSingleArticles($id);
        
        $image = Request::file('image');
        $newName = $singleArticles['image'];
        $basePath = public_path('uploads/package/img');
        $thumbnail = public_path('uploads/package/img/thumbnail');
        $cover = public_path('uploads/package/img/cover');
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, $mode = 0777, true, true);
            File::makeDirectory($thumbnail, $mode = 0777, true, true);
            File::makeDirectory($cover, $mode = 0777, true, true);
        }
        
        $image->move($basePath, $newName);
        Image::make($basePath.$newName)->save($basePath.$newName);
        Image::make($basePath.$newName)->resize(320, 240)->save($thumbnail.$newName);
        Image::make($basePath.$newName)->resize(820, 312)->save($cover.$newName);
        File::delete($basePath.$newName);

        $singleArticles = array(
            'category_id' => $request['category_id'] ?: $singleArticles['category_id'],
            'title' => $request['title'] ?: $singleArticles['title'],
            'slug' => $request['slug'] ?: $singleArticles['slug'],
            'content' => $request['content'] ?: $singleArticles['content'],
            'image' => $newName ?: $singleArticles['image'],
            'status' => $request['status'] ?: $singleArticles['status'],
            'date' => $request['date'] ?: $singleArticles['date']
        );
        
        $result = Articles::updateArticle($singleArticles, $id);
        
        if ($result) {
            $tags = array(
                'article_id' => $id,
                'tag_id' => $request['tags']
            );
            
            $result = ArticlesTag::udateArticlesTag($tags, $id);
            if ($result) {
                return redirect('/news');
            }
        }
        
        return view('view::articles.404');
    }
    
    /**
     * Delete function
     * To delete the article and related categories and tags and image(actual, cover, thumbnail)
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $singleArticles = Articles::getSingleArticles($id);
        File::delete('uploads/package/img/'.$singleArticles->image);
        File::delete('uploads/package/img/thumbnail/'.$singleArticles->image);
        File::delete('uploads/package/img/cover/'.$singleArticles->image);
        $articles = Articles::deleteArticles($id);
        $ArticlesTag = ArticlesTag::deleteArticlesTag($id);
        if ($articles || $ArticlesTag) {
            return redirect()->back();
        } else {
            return view('view::articles.404');
        }
    }
}
