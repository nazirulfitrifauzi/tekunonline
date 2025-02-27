<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPinjaman extends Model
{
    protected $table = 'maklumat_pinjaman';

    protected $guarded = [];

    public function applnStatus()
    {
        return $this->belongsTo(ApplnStatus::class, 'appln_id', 'id');
    }
}
