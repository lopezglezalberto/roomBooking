<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\BaseRepository;

/**
 * Class BookingRepository
 * @package App\Repositories
 * @version October 20, 2023, 1:08 pm UTC
*/

class BookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'arrival_date',
        'departure_date',
        'rooms_id',
        'full_name',
        'email',
        'phone',
        'note'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }
}
