<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JobListing;
class JobType extends Model
{
    //
        use HasFactory;
 protected $fillable = [
        'name',
    ];

    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }
}
