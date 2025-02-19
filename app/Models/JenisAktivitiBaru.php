<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAktivitiBaru extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_JenisAktivitiBaru';
    protected $primaryKey = 'idAktiviti';
    public $timestamps = false;
}
