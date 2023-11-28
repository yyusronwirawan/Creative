<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product_variant extends Model
{
    public $timestamps = true;
    protected $table = 'product_variant';
    protected $fillable = ['product_id','size', 'color', 'stock'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
