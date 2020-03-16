<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description'];

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
