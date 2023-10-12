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
        return $this->hasOne(User::class);
    }

    function pangkat()
    {
        return $this->hasOne(MasterPangkat::class);
    }

    function instansi()
    {
        return $this->hasOne(MasterInstansi::class);
    }

    function wilayah()
    {
        return $this->hasOne(MasterWilayah::class);
    }

    function jabatan()
    {
        return $this->hasOne(MasterWilayah::class);
    }
}
