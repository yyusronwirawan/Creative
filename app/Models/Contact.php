<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{    
    public $timestamps = true;
    protected $table = 'contact';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'message'];
}
