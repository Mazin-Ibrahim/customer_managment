<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone'];

    public function scopeWithEmail(Builder $query, $email)
    {
        if (!empty($email)) {
            $query->where('email', 'like', "%{$email}%");
        }
    }

    public function scopeWithPhone(Builder $query, $phone)
    {
        if (!empty($phone)) {
            $query->where('phone', 'like', "%{$phone}%");
        }
    }
}
