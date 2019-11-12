<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public static function select_box() {
    	$select = self::pluck('name', 'id')->all();
    	return ['' => 'Select Company'] + $select;
    }
}
