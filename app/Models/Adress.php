<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Adress extends Model
{
    use HasFactory;

    protected $table = 'adress';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
