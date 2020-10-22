<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'time', 'job','obog','gender','age','interview','user_id'
    ];

    public static $rules = array(
        'date' => 'required|date',
        'time' => 'required|integer',
        'job' => 'required|string',
        'obog' => 'required|integer',
        'gender' => 'required|string',
        'age' => 'required|string',
        'interview' => 'required|string',
    );

}