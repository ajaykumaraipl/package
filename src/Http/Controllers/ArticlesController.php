<?php

namespace Package\Publication\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

//Models
use Package\Publication\ArticlesCategories;
use Package\Publication\ArticlesTags;
use Package\Publication\Categories;
use Package\Publication\Articles;
use Package\Publication\Tags;

class ArticlesController extends BaseController
{
    /**
     * Index function
     * To fetch all articles with connected categoeries and tag id and pass to the view
     *
     * @return array
     */
    public function index(Request $request)
    {
        $article = Articles::all();
        return view('view::articles.all')->with(['allNews' => $article]);
    }

    public function create(Request $request)
    {
        $categories = Categories::all();
        $tags = Tags::all();
        return view('view::articles.create', [ "categories" => $categories, "tags" => $tags]);
    }
    
    public function edit(Request $request)
    {
        $singleArticle = Articles::find($request->id);
        $categories = Categories::all();
        $tags = Tags::all();
        return view('view::articles.edit', [ "singleArticle" => $singleArticle, "categories" => $categories, "tags" => $tags]);
    }

    public function store(Request $request)
    {
        // validate the data
        $request->validate([
            "title" => "required",
            "content" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "status" => "required",
            "publish_date" => "required",
        ]);

        $data = $request->imgdata;
        $newName = rand().".".$request->image->getClientOriginalExtension();
        $this->createImage($data, $newName);

        $article = array(
            'reseller_id' => '0',
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newName,
            'status' => $request->status,
            'publish_date' => $request->publish_date,
            'updated_by' => '0'
        );
        $article = Articles::create($article);
        $articleId = $article->id;
        
        $categories = new ArticlesCategories(array(
            'articles_id' => $articleId,
            'categories_id' => $request->categories_id,
            'updated_by' => '0'
        ));
        $categories->save();

        $tags = new ArticlesTags(array(
            'articles_id' => $articleId,
            'tags_id' => $request->tags,
            'updated_by' => '0'
        ));
        $tags->save();
        
        return redirect('/news');
    }

    public function update(Request $request)
    {
        $newName = '';
        // validate the data
        $request->validate([
            "title" => "required",
            "content" => "required",
            "publish_date" => "required",
            "status" => "required",
        ]);
        $singleArticle = Articles::find($request->id);
        $articlesCategories = array_column(array_column($singleArticle->categories->toArray(), "pivot"), "categories_id");
        $articlesTags = array_column(array_column($singleArticle->tags->toArray(), "pivot"), "tags_id");
        
        
        if (!empty($request->image)) {
            $request->validate([
                "image" => "required|image|mimes:jpeg,png,jpg,gif",
            ]);
            
            $this->deleteImages($singleArticle->image);

            $data = $request->imgdata;
            $newName = rand().".".$request->image->getClientOriginalExtension();
            $this->createImage($data, $newName);
        }
                
        $article = array(
            'reseller_id' => '0',
            'title' => $request->title?:$singleArticle->title,
            'content' => $request->content?:$request->content,
            'image' => $newName?:$singleArticle->image,
            'status' => $request->status?:$request->status,
            'publish_date' => $request->publish_date?:$singleArticle->publish_date,
            'updated_by' => '0'
        );
        $singleArticle->update($article);

        // Save tags
        if ($request->tags != $articlesTags) {
            ArticlesTags::where('articles_id', $request->id)->delete(); // Delete all tags
            foreach ($request->tags as $tag) {
                $articleTag = array(
                    'articles_id' => $request->id,
                    'tags_id' => $tag,
                    'updated_by' => '0'
                );
                ArticlesTags::create($articleTag);
            }
        }
        
        // Save tags
        if ($request->categories_id != $articlesCategories) {
            ArticlesCategories::where('articles_id', $request->id)->delete(); // Delete all categories
            foreach ($request->categories_id as $categories) {
                $articleCategories = array(
                    'articles_id' => $request->id,
                    'categories_id' => $categories,
                    'updated_by' => '0'
                );
                ArticlesCategories::create($articleCategories);
            }
        }

        return redirect('/news');
    }

    public function duplicate(Request $request)
    {
        $article = Articles::find($request->id);
        $articlesTags = array_column(array_column($article->tags->toArray(), "pivot"), "tags_id");
        $articlesCategories = array_column(array_column($article->categories->toArray(), "pivot"), "categories_id");

        $dimention = explode('.', $article->image);
        $newName = rand().".".$dimention[1];
        $this->copyImage($article->image, $newName);

        // Save duplicate
            $duplicateArticle = array(
                'reseller_id' => '0',
                'title' => $article->title,
                'content' => $article->content,
                'image' => $newName,
                'status' => '0',
                'publish_date' => $article->publish_date,
                'updated_by' => '0'
            );
            $duplicateArticle = Articles::create($duplicateArticle);
            $duplicateArticleId = $duplicateArticle->id;
            
            // Save tags
            foreach ($articlesTags as $tag) {
                $articleTag = array(
                    'articles_id' => $duplicateArticleId,
                    'tags_id' => $tag,
                    'updated_by' => '0'
                );
                ArticlesTags::create($articleTag);
            }

        // Save tags
            foreach ($articlesCategories as $categories) {
                $articleCategories = array(
                    'articles_id' => $duplicateArticleId,
                    'categories_id' => $categories,
                    'updated_by' => '0'
                );
                ArticlesCategories::create($articleCategories);
            }

        return redirect('/news');
    }
    
    public function publish(Request $request)
    {
        $article = Articles::find($request->id);
        $article->update(['status'=> '1']);
        return redirect('/news');
    }

    public function unpublish(Request $request)
    {
        $article = Articles::find($request->id);
        $article->update(['status'=> '2']);
        return redirect('/news');
    }

    public function delete(Request $request)
    {
        $articles = Articles::find($request->id);
        $this->deleteImages($articles->image);
        if ($articles->delete()) {
            return redirect('/news');
        } else {
            return view('view::articles.404');
        }

    }
    
    /**
     * createImage fucntion
     * To create folders and upload images in those folders
     *
     * @param [type] $imgBlob
     * @param [type] $articleImg
     * @return void
     */
    public function createImage($imgBlob, $articleImg)
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
     * createImage fucntion
     * To create folders and upload images in those folders
     *
     * @param [type] $imgBlob
     * @param [type] $articleImg
     * @return void
     */
    public function copyImage($from, $to)
    {
        $imageFoldersPath = array(
            'uploads/packages/publications/images/thumbnail/small/',
            'uploads/packages/publications/images/thumbnail/medium/',
            'uploads/packages/publications/images/thumbnail/large/',
            'uploads/packages/publications/images/cover/'
        );

        foreach ($imageFoldersPath as $path) {
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            Image::make($path.$from)->save($path.$to);
        }
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
            if (File::exists($path)) {
                File::delete($path.$imageName);
            }
        }
        return true;
    }
}
