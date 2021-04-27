<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Memory extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'memory_test';

    protected $fillable = [
        'user_id',
        'word_1',
        'word_2',
        'word_3',
        'word_4',
        'word_5',
        'word_6',
        'word_7',
        'word_8',
        'word_9',
        'fails',
        'points'
    ];
}
