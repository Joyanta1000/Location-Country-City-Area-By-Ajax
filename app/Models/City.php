<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'countryid',
        'CityName',
        'ShortDescription',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'countryid');
    }

    public function area()
    {
        return $this->hasMany(Area::class, 'cityid');
    }

}
