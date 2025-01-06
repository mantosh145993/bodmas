@extends('front_layouts.master')
@section('content')
   <!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="assets/img/bg/breadcumb_shape_1_2.png" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="assets/img/bg/breadcumb_shape_1_3.png" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Bodmas Gallery</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
Project Area  
==============================-->
    <!--==============================
Gallery Area  
==============================-->
    <!-- <div class="space">
        <div class="container">
            <div class="row gy-4 masonary-active">
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_1.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_1.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Digital Marketing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_2.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_2.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Web Development</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_3.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_3.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Product Marketing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_4.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_4.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Data Analysis</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_5.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_5.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Brand Growth All</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_6.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_6.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Content Writing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_7.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_7.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">UI/UX Design</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_8.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_8.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">JavaScript</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_9.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_9.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Wordpress Programing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_1.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_1.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Digital Marketing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_2.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_2.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Web Development</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_3.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_3.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Product Marketing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_4.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_4.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Data Analysis</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_5.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_5.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Brand Growth All</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-auto filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="assets/img/gallery/gallery_1_6.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_1_6.jpg" class="gallery-btn popup-image"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">IT Solution</span>
                            <h2 class="gallery-title">Big Data Science</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="space">
    <div class="container">
        <div class="row gy-4 masonary-active">
            @foreach($events as $event)
                <div class="col-md-6 col-xxl-4 filter-item">
                    <div class="gallery-card">
                        <div class="gallery-img position-relative">
                            <img src="{{ asset('images/events/' . $event->image_url) }}" alt="{{ $event->title }}" class="img-fluid">
                            <button class="gallery-btn preview-btn" data-bs-toggle="modal" data-bs-target="#imageModal" 
                                data-image="{{ asset('images/events/' . $event->image_url) }}" 
                                data-title="{{ $event->title }}" 
                                data-tag="{{ $event->tag }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="gallery-content">
                            <span class="gallery-tag">{{ $event->tag }}</span>
                            <h2 class="gallery-title">{{ $event->title }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Preview Image" class="img-fluid mb-3">
                    <h6 id="modalTitle" class="mt-2"></h6>
                    <p id="modalTag" class="text-muted"></p>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

    <!--==============================
	Footer Area
==============================-->
@stop


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalTag = document.getElementById('modalTag');
        
        document.querySelectorAll('.preview-btn').forEach(button => {
            button.addEventListener('click', () => {
                const image = button.getAttribute('data-image');
                const title = button.getAttribute('data-title');
                const tag = button.getAttribute('data-tag');
                
                modalImage.src = image;
                modalTitle.textContent = title;
                modalTag.textContent = tag;
            });
        });
    });
</script>
