<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPpns extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    function pangkat()
    {
        return $this->hasOne(MasterPangkat::class, 'id', 'pangkat_id');
    }

    function instansi()
    {
        return $this->hasOne(MasterInstansi::class, 'id', 'instansi_id');
    }

    function wilayah()
    {
        return $this->hasOne(MasterWilayah::class, 'id', 'wilayah_id');
    }

    function jabatan()
    {
        return $this->hasOne(MasterJabatan::class, 'id', 'jabatan_id');
    }
}
