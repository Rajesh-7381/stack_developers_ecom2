<?php

namespace App\Models;
// namespace App\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='products';

    public function category(){
        return $this->belongsTo(Category::class,'category_id')->with('parentcategory');
    }
    public static function productsfilter(){
        // productsfilter
        $productsfilter['fabricArray']=array('cotton','polyster','wool');
        $productsfilter['SleeveArray']=array('full sleve','half sleve','short sleve','sleve less');
        $productsfilter['PatternArray']=array(' checked','plain ','printed ','self ','solid');
        $productsfilter['FitArray']=array(' regular','slim ');
        $productsfilter['OccasionArray']=array(' casual','formal ');
        return $productsfilter;
    }
}
