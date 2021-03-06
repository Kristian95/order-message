<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static $deliveredStatus = 0;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'status'
    ];
}
