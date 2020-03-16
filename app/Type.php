<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    protected $fillable = ['service_id', 'name', 'description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
