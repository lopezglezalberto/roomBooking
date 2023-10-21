<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Booking
 * @package App\Models
 * @version October 20, 2023, 1:08 pm UTC
 *
 * @property \App\Models\Rooms $rooms
 * @property string|\Carbon\Carbon $arrival_date
 * @property string|\Carbon\Carbon $departure_date
 * @property integer $rooms_id
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property string $note
 * @property boolean $reserved
 * @property float $amount
 */
class Booking extends Model
{

    public $table = 'bookings';

    public $timestamps = false;

    public $fillable = [
        'arrival_date',
        'departure_date',
        'rooms_id',
        'full_name',
        'email',
        'phone',
        'note',
        'reserved',
        'amount' => 'float',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'arrival_date' => 'datetime',
        'departure_date' => 'datetime',
        'rooms_id' => 'integer',
        'full_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'note' => 'string',
        'reserved' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'arrival_date' => 'required',
        'departure_date' => 'required',
        'rooms_id' => 'required|integer',
        'full_name' => 'required|string|max:200',
        'email' => 'required|string|max:100',
        'phone' => 'required|string|max:100',
        'note' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rooms()
    {
        return $this->belongsTo(\App\Models\Rooms::class, 'rooms_id');
    }
}
