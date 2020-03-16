<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $fillable = ['type_id', 'name', 'description'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
