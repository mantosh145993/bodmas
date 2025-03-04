@extends('front_layouts.master')
@section('content')
<!-- Project Area  -->
<!--==============================
Event Area  
==============================-->
<section class="container position-relative">
    <div class="row">
        <div class="image-container" style="position: relative;">
            <img src="{{ asset('assets/img/no.png') }}" alt="" style="height: 350px; width: 100%; object-fit: cover;">
            <div class="text-overlay" style="
                position: absolute; 
                top: 50%; 
                left: 50%; 
                transform: translate(-50%, -50%);
                color: white; 
                font-size: 24px; 
                font-weight: bold; 
                text-align: center; 
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                View All Notifications
            </div>
        </div>
    </div>
</section>

<!-- Notice service area  -->
<section class="overflow-hidden space" id="blog-sec">
    <div class="container">
        <div class="mb-35 text-center text-md-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8">
                    <div class="title-area mb-md-0">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Bodmas Notifications</span>
                        <h2 class="sec-title blink-animation">New Latest Notification</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-dropdown mt-3">
                        <span class="sub-title"><i class="fal fa-book me-2"></i> Search Notification by state Wise</span>
                        <select id="category-select" class="form-select">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="blog-container">
            @foreach($notifications as $notification)
            <div class="col-12 col-md-4 col-xl-4">
                <div class="th-blog blog-single style2">
                    <div class="blog-img">
                        <iframe
                            src="{{ asset('notice/' . $notification->file) }}"
                            width="100%"
                            height="250px"
                            style="border: none;">
                        </iframe>
                    </div>
                    <a class="mt-2 mb-2" href="{{ asset('notice/' . $notification->file) }}" download class="btn btn-primary" style="display: inline-block; padding: 3px 5px; color: white; background-color: #0d6efd; border: none; border-radius: 5px; text-decoration: none; font-size: 1rem; text-align: center;">
                        Download as PDF
                    </a>
                    <a href="{{ asset('notice/' . $notification->file) }}" target="_blank" style="display: inline-block; padding: 3px 5px; color: white; background-color: #0d6efd; border: none; border-radius: 5px; text-decoration: none; font-size: 1rem; text-align: right;">
                        View Notification
                    </a>
                    @if($notification->created_at && $notification->created_at->isToday())
                    <span class="new-label">New</span>
                    @endif
                    <div class="blog-content" style="color: white; padding: 15px; border-radius: 8px;">
                        <h6 class="blog-content">
                            {{ $notification->title }}
                        </h6>
                    </div>
                    <p style="color:black">
                        {{ $notification->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Pagination -->
<div class="pagination-container text-center mt-4">
    {{ $notifications->links('pagination::bootstrap-4') }}
</div>

</section>
<!-- Notice service area end  -->

<div class="container row text-center" id="blog-container-data">
    <!-- Notice will be dynamically rendered here -->
</div>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category-select').change(function() {
            const categoryId = $(this).val();
            console.log('Selected Category ID:', categoryId);
            // alert(categoryId);
            $.ajax({
                url: '{{ route("get_notice_by_state") }}',
                type: 'GET',
                data: {
                    state_id: categoryId
                },
                success: function(response) {
                    console.log('Response:', response);

                    if (response.notice && response.notice.length > 0) {
                        // Hide the original container
                        let noticeHtml = '';
                        response.notice.forEach(function(notice) {
                            noticeHtml += `
                            <div class="col-md-6 col-xl-4">
                                <div class="th-blog blog-single style2">
                                    <div class="blog-img">
                                        <iframe
                                            src="/notice/${notice.file}"
                                            width="100%"
                                            height="300px"
                                            style="border: none;">
                                        </iframe>
                                        <p>
                                            <a href="/notice/${notice.file}" download class="btn btn-primary" style="margin-top: 10px;">Download as PDF</a>
                                        </p>
                                    </div>
                                    <div class="blog-content" style="background: linear-gradient(135deg, #0d6efd, #6610f2); color: white; padding: 15px; border-radius: 8px;">
                                        <h4 class="box-title" style="color: white;">
                                            ${notice.title}
                                        </h4>
                                    </div>
                                    <p style="font-size: 1rem; line-height: 1.6; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">
                                            ${notice.description}
                                        </p>
                                </div>
                            </div>
                            `;
                        });
                        $('#blog-container').hide();
                        $('.mt-4').hide();
                        $('#blog-container-data').html(noticeHtml);
                    } else {
                        Swal.fire({
                            title: 'No Notices Found!',
                            text: 'No notices are available for the selected state.',
                            icon: 'info',
                            confirmButtonText: 'OK',
                        });
                    }

                },
                error: function(xhr) {
                    console.error('Error fetching blogs:', xhr.responseText);
                }
            });
        });
    });
</script>
@stop

<style>
    /* Custom Pagination Styling */
.pagination-container .pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
}

.pagination-container .pagination a,
.pagination-container .pagination span {
    padding: 8px 15px;
    color: #0d6efd;
    background-color: white;
    border: 1px solid #0d6efd;
    border-radius: 5px;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.pagination-container .pagination a:hover,
.pagination-container .pagination span:hover {
    background-color: #0d6efd;
    color: white;
}

    .blog-content {
        background-color: #0d6efd;
        color: #ffff;

    }

    .blog-content .box-title {

        margin-bottom: 10px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .blog-content p {
        font-size: 1rem;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }


    .new-label {
        background-color: red;
        color: white;
        padding: 8px 20px;
        border-radius: 5px;
        font-size: 15px;
        margin-left: 10px;
    }
</style>