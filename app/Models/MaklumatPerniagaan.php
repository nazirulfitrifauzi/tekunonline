<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPerniagaan extends Model
{
    protected $table = 'maklumat_perniagaan';

    protected $guarded = [];

    public function applnStatus()
    {
        return $this->belongsTo(ApplnStatus::class, 'appln_id', 'id');
    }
}
