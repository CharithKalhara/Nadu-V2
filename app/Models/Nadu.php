<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nadu extends Model
{
    protected $table = 'nadu';

    protected $fillable = [
        'year',
        'thiraka_no',
        'samithiya',
        'recieved_date',
        'nadu_no',
    ];
}