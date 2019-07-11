<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    // Define the table name
    protected $table = 'articles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['slug', 'title', 'content', 'image', 'status', 'category_id', 'featured', 'date'];
    protected $casts = [
        'featured'  => 'boolean',
        'date'      => 'date',
    ];
    
    /**
     * getAllArticles function
     * To fetch all the articles from the database
     *
     * @return void
     */
    public static function getAllArticles()
    {
        $articles = new Articles;
        return $articles->leftjoin('categories as ct', 'articles.category_id', '=', 'ct.id')->leftjoin('article_tag as tag', 'articles.id', '=', 'tag.article_id')->get(
            [
                'articles.*',
                'ct.name as category_name',
                'tag.tag_id as tag'
            ]
        );
    }
    
    /**
     * getSingleArticles function
     * To fetch single article from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function getSingleArticles($id)
    {
        $articles = new Articles;
        return $articles->select(['articles.*','ct.name as category_name','tag.tag_id as tag'])->leftjoin('categories as ct', 'articles.category_id', '=', 'ct.id')->leftjoin('article_tag as tag', 'articles.id', '=', 'tag.article_id')->find($id);
    }
    
    /**
     * deleteArticles function
     * To delete single article from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function deleteArticles($id)
    {
        $articles = new Articles;
        if ($articles->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * storArticle function
     * To save article to articles table
     *
     * @param [type] $data
     * @return void
     */
    public static function storArticle($data)
    {
        $articles = new Articles;
        $lastInsertedId = $articles->insertGetId($data);
        if ($lastInsertedId > 0) {
            return $lastInsertedId;
        } else {
            return 0;
        }
    }
    
    /**
     * updateArticle function
     * To update article to articles table
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public static function updateArticle($request, $id)
    {
        $articles = new Articles;
        if ($articles->where('id', $id)->update($request)) {
            return true;
        } else {
            return false;
        }
    }
}
