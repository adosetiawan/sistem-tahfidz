<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengajar extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table    =   'pengajar';
    //Set Primary Key
    public $primaryKey  =   'id';

    protected $fillable = [
        'id',	
        'user_id',	
        'nama',	
        'jenis_kelamin',	
        'tanggal_lahir',	
        'tempat_lahir',	
        'alamat_lengkap',	
        'created_at',	
        'updated_at',
    ];


}
