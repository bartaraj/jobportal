@extends('layouts.app')

@section('content')
 <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Get your job</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->

<!-- Job List Area Start -->
<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <form method="GET" action="{{ route('job_listing') }}">
                        <input type="hidden" name="keyword" value="{{ request('keyword') }}">

                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="12px">
                                        <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <!-- Job Type Filter -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Type</h4>
                            </div>
                            <div class="select-Categories pt-3 pb-3">
                                @foreach ($jobTypes as $type)
                                    <label class="container">
                                        {{ $type->name }}
                                        <input type="checkbox" name="job_types[]" value="{{ $type->id }}"
                                            {{ in_array($type->id, request('job_types', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Location Filter Example -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Location</h4>
                            </div>
                            <div class="select-job-items2">
                                <input type="text" class="form-control" name="location"
                                    value="{{ request('location') }}" placeholder="Enter location">
                            </div>
                        </div>

                        <!-- Posted Within Filter Example -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Posted Within</h4>
                            </div>
                            <label class="container">Last 24 Hours
                                <input type="radio" name="posted_within" value="1"
                                    {{ request('posted_within') == '1' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 7 Days
                                <input type="radio" name="posted_within" value="7"
                                    {{ request('posted_within') == '7' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 30 Days
                                <input type="radio" name="posted_within" value="30"
                                    {{ request('posted_within') == '30' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                        </div>
                    </div>
                </form>
                <!-- Job Category Listing End -->
            </div>

            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        <!-- Count of Job list Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">
                                    <span>{{ $jobListings->total() }} Jobs found</span>
                                </div>
                            </div>
                        </div>
                        <!-- Count of Job list End -->

                        <!-- Job Loop -->
                        @foreach($jobListings as $joblist) 
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#">
                                            @if($joblist->company->logo)
                                                <img src="{{ asset($joblist->company->logo) }}" alt="{{ $joblist->company->name }}" width="150">
                                            @else
                                                <img src="assets/img/icon/job-list2.png" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#"><h4>{{ $joblist->title }}</h4></a>
                                        <ul>
                                            <li>{{ $joblist->company->name }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $joblist->location }}</li>
                                            <li>{{ $joblist->salary_range }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="{{ route('job_details.show', $joblist->id) }}">{{ $joblist->jobType->name }}</a>
                                    <span>{{ $joblist->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach

                        <!-- Custom Pagination -->
                        <div class="pagination-area pb-115 text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-wrap d-flex justify-content-center">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-start">
                                                    {{-- Previous Button --}}
                                                    @if ($jobListings->onFirstPage())
                                                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="{{ $jobListings->previousPageUrl() }}">&laquo;</a></li>
                                                    @endif

                                                    {{-- Page Numbers --}}
                                                    @foreach ($jobListings->getUrlRange(1, $jobListings->lastPage()) as $page => $url)
                                                        @if ($page == $jobListings->currentPage())
                                                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                                        @else
                                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach

                                                    {{-- Next Button --}}
                                                    @if ($jobListings->hasMorePages())
                                                        <li class="page-item"><a class="page-link" href="{{ $jobListings->nextPageUrl() }}">&raquo;</a></li>
                                                    @else
                                                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Custom Pagination End -->
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>
@endsection
