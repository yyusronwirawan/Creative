<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Social_media extends Model
{
    use SoftDeletes;
    use HasSlug;
    public $timestamps = true;
    protected $table = 'social_media';
    protected $fillable = ['name', 'image', 'link', 'slug', 'sort'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
            //->doNotGenerateSlugsOnUpdate();
    }

}
