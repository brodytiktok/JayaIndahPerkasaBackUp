<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the jabatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Karyawan()
    {
        return $this->belongsTo('App\Models\Karyawan');
    }
}
