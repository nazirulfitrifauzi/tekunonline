<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SektorPerkeso extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_sektorPekeso';
    protected $primaryKey = 'id_sektor';
    public $timestamps = false;
}
