<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends  Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'mobile',
        'vendor_id',
        'image',
        'status',
    ];
    public function vendorPersonal()
    {
       return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function vendorBusiness()
    {
        return $this->belongsTo(VendorsBusinessDetail::class,'vendor_id');
    }
    public function vendorBank()
    {
        return $this->belongsTo(VendorsBankDetail::class,'vendor_id');
    }
}
