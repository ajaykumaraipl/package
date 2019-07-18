<?php

namespace Admin\Frontend\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

// Facades
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

// Models
use Admin\Frontend\Models\ArticlesTag;
use Admin\Frontend\Models\Categories;
use Admin\Frontend\Models\Articles;
use Admin\Frontend\Models\Tags;

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
        // validate the data
        $request->validate([
            "category_id" => "required",
            "title" => "required",
            "slug" => "required",
            "content" => "required",
            "status" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "date" => "required",
            "tags" => "required"
        ]);
            
        $data = $request->imgdata;
        $newName = rand()."_".$request->image->getClientOriginalExtension();
        $this->imageAction($data, $newName);
        
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
        // validate the data
        $request->validate([
            "category_id" => "required",
            "title" => "required",
            "slug" => "required",
            "content" => "required",
            "status" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "date" => "required",
            "tags" => "required"
        ]);

        $singleArticles = Articles::getSingleArticles($id);
        
        $this->deleteImages($singleArticles->image);

        $data = $request->imgdata;
        $newName = rand()."_".$request->image->getClientOriginalExtension();
        $this->imageAction($data, $newName);

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
        File::delete('uploads/packages/publications/images/thumbnail/small/'.$singleArticles->image);
        File::delete('uploads/packages/publications/images/thumbnail/medium/'.$singleArticles->image);
        File::delete('uploads/packages/publications/images/thumbnail/large/'.$singleArticles->image);
        File::delete('uploads/packages/publications/images//cover/'.$singleArticles->image);
        $articles = Articles::deleteArticles($id);
        $ArticlesTag = ArticlesTag::deleteArticlesTag($id);
        if ($articles || $ArticlesTag) {
            return redirect()->back();
        } else {
            return view('view::articles.404');
        }
    }

    /**
     * ImageAction fucntion
     * To create folders and upload images in those folders
     *
     * @param [type] $imgBlob
     * @param [type] $articleImg
     * @return void
     */
    public function imageAction($imgBlob, $articleImg)
    {
        $data = $imgBlob;
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $basePath = 'uploads/packages/publications/images/';
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, $mode = 0777, true, true);
        }
        file_put_contents($basePath.$articleImg, $data);

        $imageFoldersPath = array(
                    '300_160'    =>  'uploads/packages/publications/images/thumbnail/small/',
                    '460_320'   =>  'uploads/packages/publications/images/thumbnail/medium/',
                    '600_320'    =>  'uploads/packages/publications/images/thumbnail/large/',
                    '1900_350'             =>  'uploads/packages/publications/images/cover/'
        );
        foreach ($imageFoldersPath as $dimentions => $path) {
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $dimention = explode('_', $dimentions);
            Image::make($basePath.$articleImg)->resize($dimention[0], $dimention[1])->save($path.$articleImg);
        }
        return File::delete($basePath.$articleImg);
    }

    /**
     * deleteImages function
     * To delete images from all the folders
     *
     * @param [type] $imageName
     * @return void
     */
    public function deleteImages($imageName)
    {
        $imageFoldersPath = array(
            '300_160'    =>  'uploads/packages/publications/images/thumbnail/small/',
            '460_320'   =>  'uploads/packages/publications/images/thumbnail/medium/',
            '600_320'    =>  'uploads/packages/publications/images/thumbnail/large/',
            '1900_350'             =>  'uploads/packages/publications/images/cover/'
        );
        foreach ($imageFoldersPath as $path) {
            if (!File::exists($path)) {
                File::delete($path.$imageName);
            }
        }
        return true;
    }
}
