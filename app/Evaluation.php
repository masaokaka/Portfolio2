<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'nonverbal', 'initiative','communication','aspiration','comment','feedback','match_id','interview','date','admin_id','user_id',];
    
    public static $rules = array(
        'nonverbal' => 'required',
        'initiative'=> 'required',
        'communication'=> 'required',
        'aspiration'=> 'required',
        'comment'=> 'required|string|max:500',
        'feedback'=>'nullable|string|max:500',
        'match_id'=> 'required',
        'admin_id'=> 'required',
        'user_id'=> 'required',
        'date' => 'required|date',
        'interview' => 'required|string',
    );

}
