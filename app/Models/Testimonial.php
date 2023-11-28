<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Testimonial extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'testimonial';
    protected $fillable = ['name', 'testimonial', 'status'];
    protected $attributes = [
        'status' => 1,
    ];

}
