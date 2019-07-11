<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Define the table name
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    
    /**
     * getAllCategories function
     * To fetch all the categories from the database
     *
     * @return void
     */
    public static function getAllCategories()
    {
        $categories = new Categories;
        return $categories->get();
    }
    
    /**
     * getSingleCategory function
     * To fetch single categories from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function getSingleCategory($id)
    {
        $categories = new Categories;
        return $categories->find($id);
    }
    
    /**
     * deleteCategory function
     * To delete single categories from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function deleteCategory($id)
    {
        $categories = new Categories;
        if ($categories->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * storCategory function
     * To save categories to categories table
     *
     * @param [type] $data
     * @return void
     */
    public static function storCategory($request)
    {
        if ($request->save()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * updateCategory function
     * To update categories to categories table
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
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