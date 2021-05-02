<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Aunthenticatable;

class AdminModel extends Aunthenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table='admin_models';
    protected $fillable=[
        'name','email','password',
    ];
}
