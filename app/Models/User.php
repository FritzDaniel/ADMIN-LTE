<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profilePicture',
        'namaPerusahaan',
        'country',
        'alamat',
        'city',
        'provinsi',
        'kodepos',
        'informasiTambahan',
        'userRole'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function EWallet()
    {
        return $this->hasOne(Wallet::class,'user_id','id');
    }

    public function Membership()
    {
        return $this->hasOne(Memberships::class,'user_id','id');
    }

    public function isAdmin(){
        $check = User::where([
            ['userRole','=','Superadmin'],
            ['id','=',$this->id]
        ])->first();
        return $check != null;
    }

    public function isSupplier(){
        $check = User::where([
            ['userRole','=','Supplier'],
            ['id','=',$this->id]
        ])->first();
        return $check != null;
    }
}
