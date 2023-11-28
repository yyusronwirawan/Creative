<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    public $timestamps = true;
    protected $table = 'metadata';
    protected $fillable = ['title','description','keyword','h1','page','link'];

}