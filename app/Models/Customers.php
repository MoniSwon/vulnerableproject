<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'email', 'password', 'phone', 'gender', 'status', 'birthdate'];
    protected $guarded = [];
}
