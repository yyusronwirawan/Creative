<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Design extends Model
{
    use HasSlug;
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'design';
    protected $fillable = ['name','slug','description','status','sort'];
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

    public function design_image()
    {
        return $this->hasMany('App\Models\Design_image');
    }

}
