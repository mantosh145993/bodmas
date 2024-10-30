@extends('front_layouts.master')

@section('content')
<div class="container page-content-container">

    <div class="slider-banners">
        @if($banner)
            <div class="slider-item">
                    <img src="{{ asset('images/banner/'.$banner->image) }}" alt="{{ $banner->title }}" style="width:100%">
                <div class="slider-caption">
                </div>
            </div>
        @else
            <p></p>
        @endif
    </div>
    {!! $page->content !!}
</div>
@stop



<style>
    .page-content-container {
        /* padding-top: 150px; */
        /* Adds padding for spacing */
        padding-bottom: 50px;
        /* Adds padding for spacing */
    }

    .page-content-container img {
        max-width: 100%;
        max-height: 500px;
        /* Set a maximum height for images */
        width: auto;
        /* Allow width to adjust proportionally */
        height: auto;
        /* Keep aspect ratio */
        display: block;
        /* Remove inline spacing around images */
        margin: 20px auto;
        /* Center-align images with space around */
    }

    .page-content-container p,
    .page-content-container div {
        text-align: justify;
        /* Justify text for cleaner alignment */
    }

    @media screen and (max-width: 600px) {
        .page-content-container {
            text-align: -webkit-center;
        }
    }
    
    @media screen and (max-width: 600px) {
        .page-content-container {
            text-align: -webkit-center;
        }

        .page-content-container p,
        .page-content-container div {
            text-align: justify;
        }

    }
</style>