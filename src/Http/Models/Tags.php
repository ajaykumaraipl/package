<?php

namespace Package\Publication\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    // use SoftDeletes;
    
    // Define the table name
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'name', 'description', 'updated_by'];
    // protected $softDelete = true;
    public $timestamps = true;
    
    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'article_tag');
    }
}
