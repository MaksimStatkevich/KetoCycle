<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInform extends Model
{
    use HasFactory;
    protected $table = 'user_inform';

    protected $fillable = [ 'age', 'height', 'weight', 'sex', 'system_of_units'];

}
