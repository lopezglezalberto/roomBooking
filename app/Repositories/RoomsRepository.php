<?php

namespace App\Repositories;

use App\Models\Rooms;
use App\Repositories\BaseRepository;

/**
 * Class RoomsRepository
 * @package App\Repositories
 * @version October 20, 2023, 12:50 pm UTC
*/

class RoomsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price_per_nigth',
        'short_description',
        'description'
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
        return Rooms::class;
    }
}
