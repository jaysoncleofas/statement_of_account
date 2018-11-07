<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    protected $guarded = ['id'];

    public function statement()
    {
        return $this->belongsTo(Statement::class);
    }
}
