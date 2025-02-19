<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    protected $guarded = [];
    protected $table = 'tbl_negeri';
    protected $primaryKey = 'idnegeri';
    public $timestamps = false;
}
