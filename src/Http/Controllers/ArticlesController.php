<?php

namespace Package\Publication\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

//Models
use Package\Publication\Models\ArticlesCategories;
use Package\Publication\Models\ArticlesTags;
use Package\Publication\Models\Categories;
use Package\Publication\Models\Articles;
use Package\Publication\Models\Tags;

class ArticlesController extends BaseController
{

    private $imageFoldersPath;

    public function __construct()
    {
        \Theme::set('blue');
        $this->imageFoldersPath = array(
            '300_160'   =>  public_path('uploads/packages/publications/images/thumbnail/small/'),
            '460_320'   =>  public_path('uploads/packages/publications/images/thumbnail/medium/'),
            '600_320'   =>  public_path('uploads/packages/publications/images/thumbnail/large/'),
            '1900_350'  =>  public_path('uploads/packages/publications/images/cover/')
        );
    }

    /**
     * Index function
     * To fetch all articles with connected categoeries and tag id and pass to the view
     *
     * @return array
     */
    public function index(Request $request)
    {
        $articles = Articles::all();
        return view('articles.list')->with(['articles' => $articles]);
    }

    public function create(Request $request)
    {
        $categories = Categories::all();
        $tags = Tags::all();
        return view('articles.create', [ "categories" => $categories, "tags" => $tags]);
    }

    public function edit(Request $request)
    {
        $singleArticle = Articles::find($request->id);
        $categories = Categories::all();
        $tags = Tags::all();
        return view('articles.edit', [ "singleArticle" => $singleArticle, "categories" => $categories, "tags" => $tags]);
    }

    public function store(Request $request)
    {
        // validate the data
        $request->validate([
            "title" => "required",
            "content" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "publish_date" => "required"
        ]);
        
        $categoriesIds = explode(",", $request->categories_id);
        $tagsIds = explode(",", $request->tags);

        $data = $request->imgdata;
        $newName = rand().".".$request->image->getClientOriginalExtension();
        $this->createImage($data, $newName);

        $article = array(
            'reseller_id' => '0',
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newName,
            'status' => $request->status,
            'publish_date' => '2019-07-24',//$request->publish_date,
            'updated_by' => '0'
        );

        $article = Articles::create($article);
        $articleId = $article->id;
        
        foreach ($categoriesIds as $categories_id) {
            $categories = new ArticlesCategories(array(
                'articles_id' => $articleId,
                'categories_id' => $categories_id,
                'updated_by' => '0'
            ));
            $categories->save();
        }

        foreach ($tagsIds as $tag) {
            $tags = new ArticlesTags(array(
                'articles_id' => $articleId,
                'tags_id' => $tag,
                'updated_by' => '0'
            ));
            $tags->save();
        }
        
        return redirect('/articles');
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

        return redirect('/articles');
    }

    public function bulkAction(Request $request)
    {
        $action = $request->action;
        $articlesids = $request->chk;
        foreach ($articlesids as $articlesid) {
            $article = Articles::find($articlesid);
            if ($action == 'Delete') {
                $article->delete();
                $this->deleteImages($article->image);
            } else {
                $article->update(['status'=> '2']);
            }
        }
        return redirect('/articles');
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

        return redirect('/articles');
    }
    
    public function publish(Request $request)
    {
        $article = Articles::find($request->id);
        $article->update(['status'=> '1']);
        return redirect('/articles');
    }

    public function unpublish(Request $request)
    {
        $article = Articles::find($request->id);
        $article->update(['status'=> '2']);
        return redirect('/articles');
    }

    public function delete(Request $request)
    {
        $articles = Articles::find($request->id);
        $this->deleteImages($articles->image);
        if ($articles->delete()) {
            return redirect('/articles');
        } else {
            return view('articles.404');
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
        $basePath = public_path('uploads/packages/publications/images');
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, $mode = 0777, true, true);
        }
        file_put_contents($basePath.$articleImg, $data);

        foreach ($this->imageFoldersPath as $dimentions => $path) {
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
        foreach ($this->imageFoldersPath as $path) {
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
        foreach ($this->imageFoldersPath as $path) {
            if (File::exists($path)) {
                File::delete($path.$imageName);
            }
        }
        return true;
    }
}
