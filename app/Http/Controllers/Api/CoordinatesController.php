<?php
/**
 * User: sasik
 * Date: 4/27/16
 * Time: 10:53 AM
 */

namespace App\Http\Controllers\Api;


use App\Models\Coordinate;
use App\Models\Repositories\CoordinateRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CoordinatesController extends ApiController
{

    private $dateFormat = 'd.m.Y H:i:s';

    public function store(Request $request, CoordinateRepository $coordinateRepository)
    {
        $attributes = $request->all();
        $this->validate($request, Coordinate::$rules);

        $attributes['date'] = $this->getDateIfSet($attributes['date']);
        return $coordinateRepository->create($attributes);
    }

    public function getCoordinatesForPeriod(Request $request, CoordinateRepository $coordinateRepository)
    {


        $startDate = $request->get('start');
        $endDate = $request->get('end');

        return $coordinateRepository
            ->getCoordinatesForPeriod(
                $this->getDateIfSet($startDate),
                $this->getDateIfSet($endDate)
            );
    }

    /**
     * @param $date
     * @return Carbon
     */
    private function getDateIfSet($date)
    {
        if (!$date) {
            throw new \Exception('Date should be set');
        }

        return Carbon::createFromFormat($this->dateFormat, $date);

    }
}