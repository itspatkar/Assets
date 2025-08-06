<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;

    protected $table = "testusers";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];
}
