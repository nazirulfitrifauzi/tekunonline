<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class application_pdf extends Model
{
    protected $table = 'application_pdf';

    protected $guarded = [];

    // Define inverse relationship with ApplnStatus
    public function applnStatus()
    {
        return $this->belongsTo(ApplnStatus::class, 'appln_id');
    }
}
