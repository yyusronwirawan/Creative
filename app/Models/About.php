<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{    
    public $timestamps = true;
    protected $table = 'about';
    protected $fillable = ['content', 'image'];
}
