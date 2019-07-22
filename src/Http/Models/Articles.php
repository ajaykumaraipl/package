<?php

namespace Package\Publication\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'publication_articles';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'title', 'content', 'image', 'status', 'publish_date', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;
    
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'publication_articles_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'publication_articles_categories');
    }
}
