<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rooms
 * @package App\Models
 * @version October 20, 2023, 12:50 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property string $name
 * @property number $price_per_nigth
 * @property string $short_description
 * @property string $description
 */
class Rooms extends Model
{

    public $table = 'rooms';

    public $timestamps = false;

    public $fillable = [
        'name',
        'price_per_nigth',
        'short_description',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price_per_nigth' => 'float',
        'short_description' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:200',
        'price_per_nigth' => 'nullable|numeric',
        'short_description' => 'nullable|string|max:500',
        'description' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'rooms_id');
    }
}
