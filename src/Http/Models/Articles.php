<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['slug', 'title', 'content', 'image', 'status', 'category_id', 'featured', 'date'];
    protected $casts = [
        'featured'  => 'boolean',
        'date'      => 'date',
    ];
    
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
    
    public static function getSingleArticles($id)
    {
        $articles = new Articles;
        return $articles->select(['articles.*','ct.name as category_name','tag.tag_id as tag'])->leftjoin('categories as ct', 'articles.category_id', '=', 'ct.id')->leftjoin('article_tag as tag', 'articles.id', '=', 'tag.article_id')->find($id);
    }
    
    public static function deleteArticles($id)
    {
        $articles = new Articles;
        if ($articles->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
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
