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
        'date', 'time','interview','admin_id'
}
