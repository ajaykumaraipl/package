<?php

namespace Admin\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    // Define the table name
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name','description'];
    
    /**
     * getAllTags function
     * To fetch all the Tags from the database
     *
     * @return void
     */
    public static function getAllTags()
    {
        $tags = new Tags;
        return $tags->get();
    }
    
    /**
     * getSingleTag function
     * To fetch single Tags from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function getSingleTag($id)
    {
        $tags = new Tags;
        return $tags->find($id);
    }
    
    /**
     * deleteTag function
     * To delete single Tags from database according to the id
     *
     * @param [type] $id
     * @return void
     */
    public static function deleteTag($id)
    {
        $tags = new Tags;
        if ($tags->where('id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * storTag function
     * To save Tags to Tags table
     *
     * @param [type] $data
     * @return void
     */
    public static function storTag($request)
    {
        if ($request->save()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * updateTag function
     * To update Tags to Tags table
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
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
