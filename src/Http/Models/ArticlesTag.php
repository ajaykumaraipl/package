<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlesTag extends Model
{
    // Define the table name
    protected $table = 'article_tag';
    protected $fillable = ['article_id','tag_id'];
    
    /**
     * articlesTag function
     * To save link between article and tag to table
     *
     * @param [type] $request
     * @return void
     */
    public static function articlesTag($request)
    {
        $articlesTag = new ArticlesTag($request);
        if ($articlesTag->save($request)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * articlesTag function
     * To update link between article and tag to table
     *
     * @param [type] $request
     * @return void
     */
    public static function udateArticlesTag($request, $id)
    {
        $articlesTag = new ArticlesTag($request);
        if ($articlesTag->where('article_id', $id)->update($request)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * articlesTag function
     * To delete link between article and tag to table
     *
     * @param [type] $request
     * @return void
     */
    public static function deleteArticlesTag($id)
    {
        $articlesTag = new ArticlesTag;
        if ($articlesTag->where('article_id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
}