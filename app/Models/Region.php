<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Roles
 * @package App\Models\Admin
 * @mixin \Eloquent
 */
class Region extends EloquentModel
{

    protected $timestamp = false;

    protected $table = 'region';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','level','pid'
    ];
}

