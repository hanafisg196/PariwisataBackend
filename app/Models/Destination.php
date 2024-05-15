<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Image::class, "destination_id", "id");
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class, "trip_id", "id");
    }
}
