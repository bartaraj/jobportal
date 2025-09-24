<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JobListing;
use App\Models\CompanyType;

class Company extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'email',
        'description',
        'company_type_id'
    ];

    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }
    public function companyType()
{
    return $this->belongsTo(CompanyType::class);
}

}
