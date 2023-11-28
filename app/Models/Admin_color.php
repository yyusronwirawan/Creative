<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_color extends Model
{
    public $timestamps = true;
    protected $table = 'admin_color';
    protected $fillable = ['header', 'sidebar'];
}
