<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Denomination extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'denomination_test';

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
        'word_10',
        'word_11',
        'word_12',
        'word_13',
        'word_14',
        'word_15',
        'word_16',
        'word_17',
        'word_18',
        'word_19',
        'word_20',
        'fails',
        'points'
    ];
}
