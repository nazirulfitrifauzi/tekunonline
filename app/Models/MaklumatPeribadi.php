<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPeribadi extends Model
{
    protected $table = 'maklumat_peribadi';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
