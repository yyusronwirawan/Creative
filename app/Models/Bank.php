<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Bank extends Model
{
    use SoftDeletes;
    use HasSlug;
    public $timestamps = true;
    protected $table = 'bank';
    protected $fillable = ['bank', 'image', 'slug', 'sort'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('bank')
            ->saveSlugsTo('slug');
            //->doNotGenerateSlugsOnUpdate();
    }

}
