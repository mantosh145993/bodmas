@extends('front_layouts.master')
@section('content')
    <!--==============================
Error Area 
==============================-->
    <section class="">
        <div class="container">
            <div class="error-page">
                <div class="error-content">
                    <div class="error-img">
                        <img src="{{asset('assets/img/normal/error.svg')}}" alt="404 image">
                    </div>
                    <h2 class="error-title"><span class="text-theme">OooPs!</span> Page Not Found</h2>
                    <p class="error-text">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                    <a href="{{route('/')}}" class="th-btn">Back To Home </a>
                </div>
            </div>
        </div>
    </section>
@stop