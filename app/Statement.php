<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Statement extends Model
{
    // use SoftDeletes;

    protected $guarded = ['id'];

    // protected $dates = ['deleted_at'];

    public function particulars()
    {
        return $this->hasMany(Particular::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
