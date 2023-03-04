<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'vendors';

    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'country',
        'state',
        'pincode',
        'mobile',
        'status',
    ];
    
}
