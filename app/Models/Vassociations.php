<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vassociations extends Model
{
    use HasFactory;

    protected $table = 'vassociations';

    protected $fillable = [
        'p_id',
        'v_id',
        'state',
        'district',
        'added_by',
        'start_date',
        'end_date'
    ];
}
