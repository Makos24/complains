<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

     public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%');
    }
}
