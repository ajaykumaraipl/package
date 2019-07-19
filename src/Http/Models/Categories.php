<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'name', 'description', 'image', 'parent_id', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;
    
    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'articles_categories');
    }
}