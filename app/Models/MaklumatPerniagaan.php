<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaklumatPerniagaan extends Model
{
    protected $table = 'maklumat_perniagaan';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
