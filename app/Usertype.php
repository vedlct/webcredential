<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    public $timestamps = false;
    protected $table = 'usertype';
    protected $primaryKey = 'UserTypeId';
}
