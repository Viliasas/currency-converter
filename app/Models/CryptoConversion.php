<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Crypto Conversion model.
 *
 * @property int|null $id
 * @property float|null $amount
 * @property string|null $currency
 * @property string|null $crypto
 * @property float|null $exchange_rate
 * @property float|null $conversion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class CryptoConversion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crypto_conversions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'amount',
        'currency',
        'crypto',
        'exchange_rate',
        'conversion',
    ];
}
