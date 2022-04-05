<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizLog extends Model
{
    use HasFactory;
    protected $table = 'users_test_log';
    protected $fillable = ['user_id', 'answers'];
}
