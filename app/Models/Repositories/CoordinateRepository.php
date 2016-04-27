<?php
/**
 * User: sasik
 * Date: 4/27/16
 * Time: 10:13 AM
 */

namespace App\Models\Repositories;


use App\Models\Coordinate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CoordinateRepository
{

    /**
     * @param array $attributes
     * @return Coordinate
     */
    public function create(array $attributes = [])
    {
        return Coordinate::create($attributes);
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return Collection
     */
    public function getCoordinatesForPeriod(Carbon $startDate, Carbon $endDate)
    {
        $coordinates = Coordinate::where([
                ['date', '>=', $startDate->toDateTimeString()] ,
                ['date', '<=', $endDate->toDateTimeString()]
            ])
            ->orderBy('date')
            ->get();

        return $coordinates;
    }




}