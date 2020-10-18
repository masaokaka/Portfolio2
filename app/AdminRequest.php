<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'time','interview','admin_id'];
    
    public static $rules = array(
        'date' => 'required|date',
        'time' => 'required|integer',
        'interview' => 'required|string',
    );
}
