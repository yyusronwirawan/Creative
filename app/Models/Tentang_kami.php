<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tentang_kami extends Model
{
    use SoftDeletes;
    use HasSlug;
    public $timestamps = true;
    protected $table = 'tentang_kami';
    protected $fillable = ['title', 'image', 'status', 'link', 'description'];
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
