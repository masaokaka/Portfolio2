<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','admin_id','date', 'time','interview',];
    
    public static $rules = array(
        'user_id' => 'required|integer',
        'admin_id' => 'required|integer',
        'date' => 'required|date',
        'time' => 'required|integer',
        'interview' => 'required|string',
    );
}
