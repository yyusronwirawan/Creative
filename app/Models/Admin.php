<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
    public $timestamps = true;
    protected $table = 'admin';
    protected $fillable = ['username', 'password', 'email', 'status', 'last_login'];
    protected $attributes = [
        'status' => 1,
    ];

}