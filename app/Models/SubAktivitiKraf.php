<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubAktivitiKraf extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_jenissub_aktivitiKraf';
    protected $primaryKey = 'idSubAktiviti';
    public $timestamps = false;
}
