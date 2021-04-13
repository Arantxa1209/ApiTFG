<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Location extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'location_test';

    protected $fillable = [
        'user_id',
        'slide_1',
        'slide_2',
        'slide_3',
        'slide_4',
        'slide_5',
        'slide_6',
        'slide_7',
        'slide_8',
        'slide_9',
        'slide_10',
        'success',
        'fails',
        'points'
    ];
}
