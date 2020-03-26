<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $fillable = ['type_id', 'name', 'description','amount','requirements'];

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
