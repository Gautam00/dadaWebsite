<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    
	use SoftDeletes;

    protected $guarded  = [ 'id', 'deleted_at', 'created_at', 'updated_at'];

}
