<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use SoftDeletes;
    use HasSlug;
    public $timestamps = true;
    protected $table = 'category';
    protected $fillable = ['name', 'image', 'status', 'slug', 'description'];
    protected $attributes = [
        'status' => 1,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
            //->doNotGenerateSlugsOnUpdate();
    }

    public function sub_categories()
    {
        return $this->hasMany('App\Models\Sub_category')->where('status',1);
    }
}
