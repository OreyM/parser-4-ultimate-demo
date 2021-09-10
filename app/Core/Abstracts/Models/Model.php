<?php


namespace App\Core\Abstracts\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelModel;

abstract class Model extends LaravelModel
{
    use HasFactory;
}
