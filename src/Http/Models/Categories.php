<?php

namespace Package\Publication\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'publication_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'name', 'description', 'image', 'parent_id', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;
    
    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'publication_articles_categories');
    }
}