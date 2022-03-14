<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }
}
