<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\JobType;

class JobListing extends Model
{
    //
        use HasFactory;
 protected $fillable = [
        'title',
        'description',
        'company_id',
        'location',
        'salary_range',
        'job_type_id',
        'posted_date',
        'application_deadline',
        'application_link',
        'tags',
    ];
protected $casts = [
        'tags' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }
}
