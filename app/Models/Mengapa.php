<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Mengapa extends Model
{
    public $timestamps = true;
    protected $table = 'mengapa';
    protected $fillable = ['image', 'title', 'description'];

}
