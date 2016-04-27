<?php
/**
 * User: sasik
 * Date: 4/27/16
 * Time: 10:06 AM
 */

namespace App\Models;


use Carbon\Carbon;

class Coordinate extends BaseModel
{

    const DATE_FORMAT_FOR_API = 'd.m.Y H:i:s';

    public $timestamps = false;

    public static $rules = [
        'date'      => 'required|date',
        'longitude' => 'required',
        'latitude'  => 'required',
        'direction' => 'required',
        'precision' => 'required',
    ];

    protected $table = 'coordinates';

    protected $casts = [
        'longitude' => 'float',
        'latitude'  => 'float',
        'direction' => 'float',
        'precision' => 'int',
    ];

    protected $fillable = [
        'date',
        'longitude',
        'latitude',
        'direction',
        'precision',
    ];

    /**
     * @return array
     */
    public function toArray()
    {
        $res = parent::toArray();
        $date = $res['date'];
        $date = Carbon::createFromFormat($this->getDateFormat(), $date);
        $res['date'] = $date->format(self::DATE_FORMAT_FOR_API);
        return $res;

    }
}