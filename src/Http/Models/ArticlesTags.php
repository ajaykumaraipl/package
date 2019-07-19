<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ArticlesTags extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'articles_tags';
    protected $primaryKey = 'id';
    protected $fillable = ['articles_id', 'tags_id', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;

    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'article_tag');
    }
}
