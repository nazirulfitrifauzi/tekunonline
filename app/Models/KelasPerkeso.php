<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasPerkeso extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_kelasPekeso';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
}
