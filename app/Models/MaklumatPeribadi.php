<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPeribadi extends Model
{
    protected $table = 'maklumat_peribadi';

    protected $guarded = [];

    public function applnStatus()
    {
        return $this->belongsTo(ApplnStatus::class, 'appln_id', 'id');
    }
}
