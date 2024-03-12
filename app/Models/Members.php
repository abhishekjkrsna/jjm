<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        't_id',
        'u_id',
        'role',
        'remark',
        'added_by'
    ];
}
