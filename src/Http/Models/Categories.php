<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    
    public static function getAllCategories()
    {
        $categories = new Categories;
        return $categories->get();
    }
    
    public static function getSingleCategory($id)
    {
        $categories = new Categories;
        return $categories->find($id);
    }
    
    public static function deleteCategory($id)
    {
        $categories = new Categories;
        if ($categories->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function storCategory($request)
    {
        if ($request->save()) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function updateCategory($request, $id)
    {
        $categories = new Categories;
        if ($categories->where('id', $id)->update($request)) {
            return true;
        } else {
            return false;
        }
    }
}