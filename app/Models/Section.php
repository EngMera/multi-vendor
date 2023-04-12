<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = [
        'name',
        'status'
    ];
    public static function sections()
    {
        $getSections = Section::where('status',1)->with('categories')->get();
        return $getSections;
    }
    public function categories()
    {
        return $this->hasMany(Category::class,'section_id')->where(['parent_id'=>0, 'status'=>1])->with('subcategories');
    }
}
