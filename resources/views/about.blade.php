@extends('layouts.app')


@section('content')
<!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>About us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- Support Company Start-->
                   @include('partials.missions')

        <!-- Support Company End-->
        <!-- How  Apply Process Start-->
        @include('partials.howitworks')
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
                @include('partials.testimonial')

        <!-- Testimonial End -->
        <!-- Online CV Area Start -->
        <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">Get Noticed by Top Employers! Upload Your CV Today!


</p>
                            <p class="pera2"> Don't miss out on your next opportunity. Create a Free Profile and let the jobs come to you.


</p>
                            <a href="#" class="border-btn2 border-btn4">Create a Free Profile

</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
    
        <!-- Blog Area Start -->
                           @include('partials.blogarea')

        <!-- Blog Area End -->


@endsection