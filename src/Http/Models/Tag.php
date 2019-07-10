<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name','description'];
    
    public static function getAllTags()
    {
        $tags = new Tags;
        return $tags->get();
    }
    
    public static function getSingleTag($id)
    {
        $tags = new Tags;
        return $tags->find($id);
    }
    
    public static function deleteTag($id)
    {
        $tags = new Tags;
        if ($tags->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function storTag($request)
    {
        if ($request->save()) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function updateTag($request, $id)
    {
        $tags = new Tags;
        if ($tags->where('id', $id)->update($request)) {
            return true;
        } else {
            return false;
        }
    }
}
