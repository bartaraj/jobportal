<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;

class CompanyType extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
