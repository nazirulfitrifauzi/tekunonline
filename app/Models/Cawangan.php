<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cawangan extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_cawangan';
    protected $primaryKey = 'idcawangan';
    public $timestamps = false;
}
