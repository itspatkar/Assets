<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'age',
        'city'
    ];
}



// Models:
// php artisan make:model TableName
// app->Models->

// If we want to migrate and at same time want to create Model:
// php artisan make:model TableName --migration
