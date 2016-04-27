<?php
/**
 * User: sasik
 * Date: 4/27/16
 * Time: 10:06 AM
 */

namespace App\Models;


class Coordinate extends BaseModel
{

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
}