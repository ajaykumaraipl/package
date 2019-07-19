<?php

namespace Package\Publication\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ArticlesCategories extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'articles_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['articles_id', 'categories_id', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;

    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'articles_categories');
    }
}