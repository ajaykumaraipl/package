<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlesTag extends Model
{
    protected $table = 'article_tag';
    protected $fillable = ['article_id','tag_id'];
    
    public static function articlesTag($request)
    {
        if ($request->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function udateArticlesTag($request, $id)
    {
        $request = new ArticlesTag;
        if ($request->where('article_id', $id)->update($request)) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteArticlesTag($id)
    {
        $request = new ArticlesTag;
        if ($request->where('article_id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
}