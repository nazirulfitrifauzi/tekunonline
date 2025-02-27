<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplnStatus extends Model
{
    protected $table = 'appln_status';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function maklumatPeribadi()
    {
        return $this->hasOne(MaklumatPeribadi::class, 'appln_id', 'id');
    }

    public function maklumatPerniagaan()
    {
        return $this->hasOne(MaklumatPerniagaan::class, 'appln_id', 'id');
    }

    public function maklumatPinjaman()
    {
        return $this->hasOne(MaklumatPinjaman::class, 'appln_id', 'id');
    }

}
