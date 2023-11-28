<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Hubungi_kami extends Model
{
    public $timestamps = true;
    protected $table = 'hubungi_kami';
    protected $fillable = ['pesan_link', 'pesan_image', 'chat_link', 'chat_image'];

}
