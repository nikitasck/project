<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Adress extends Model
{
    use HasFactory;

    protected $table = 'adress';

    protected $fillable = [
        'country',
        'city',
        'street',
        'house_number'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
