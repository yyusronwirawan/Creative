<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terms extends Model
{    
    public $timestamps = true;
    protected $table = 'terms';
    protected $fillable = ['terms', 'privacy_policy'];
}
