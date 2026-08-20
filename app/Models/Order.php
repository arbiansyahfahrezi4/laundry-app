<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Service;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'weight',
        'laundry_date',
        'total_price',
        'notes',
        'status',
    ];

    /**
     * Casting tipe data.
     */
    protected $casts = [
        'laundry_date' => 'date',
    ];

    /**
     * Pesanan milik user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pesanan menggunakan layanan.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}