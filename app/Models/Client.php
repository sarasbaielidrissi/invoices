<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];



    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $relationMethods = [];
            foreach ($relationMethods as $relationMethod) {
                if ($model->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
}
