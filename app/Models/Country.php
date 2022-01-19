<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'CountryName',
    ];

    public function city()
    {
        return $this->hasMany(City::class, 'countryid');
    }
}
