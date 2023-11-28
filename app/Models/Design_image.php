<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Design_image extends Model
{
	use SoftDeletes;
    public $timestamps = true;
    protected $table = 'design_image';
    protected $fillable = ['design_id','image'];

}
