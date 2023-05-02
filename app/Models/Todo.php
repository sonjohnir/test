<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'amount',
        'is_checked'

    ];
}