<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name' , 'type'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
