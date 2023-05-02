<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'section_id',
        'category_name',
        'category_image',
        'category_discount',
        'description',
        'url',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
    ];
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id')->select('id','name');
    }
    public function parentcategory()
    {
        return $this->belongsTo(Category::class,'parent_id')->select('id','category_name');
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_id')->where('status',1);
    }
    public static function categoryDetails($url)
    {
        $categoryDetails = Category::select('id','category_name','url')->with('subcategories')
                                    ->where('url',$url)->first()->toArray();

        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        foreach ($categoryDetails['subcategories'] as $key => $subCat)
        {
            $catIds[] = $subCat['id'];
        }
        $resp = array('catIds'=>$catIds, 'categoryDetails'=>$categoryDetails);
        return $resp ;
    }
}
