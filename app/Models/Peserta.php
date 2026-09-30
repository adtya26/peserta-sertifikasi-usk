<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'nik', 'nama', 'email', 'no_hp', 'alamat', 'tanggal_lahir', 'skema_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function skema(): BelongsTo
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}