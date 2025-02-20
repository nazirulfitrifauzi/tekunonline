<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPinjaman extends Model
{
    protected $table = 'maklumat_pinjaman';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
