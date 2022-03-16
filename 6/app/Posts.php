<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'body' => ['required', 'string', 'max:255'],
    );

        public function histories()
    {
      return $this->hasMany('App\History');
    }
}