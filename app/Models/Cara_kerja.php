<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Cara_kerja extends Model
{
    use SoftDeletes;
    use HasSlug;
    public $timestamps = true;
    protected $table = 'cara_kerja';
    protected $fillable = ['title', 'image', 'status', 'slug', 'link', 'description', 'sort'];
    protected $attributes = [
        'status' => 1,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
            //->doNotGenerateSlugsOnUpdate();
    }
}
