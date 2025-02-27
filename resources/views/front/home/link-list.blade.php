@extends('front_layouts.master')
@section('content')

<!--==============================
Project Area  
==============================-->

<div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/link.jpg')}}" data-overlay="title" data-opacity="8">
    <div class="breadcumb-shape" data-bg-src="{{asset('assets/img/bg/breadcumb_shape_1_1.png')}}">
    </div>
    <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
        <img src="{{asset('assets/img/bg/breadcumb_shape_1_2.png')}}" alt="shape">
    </div>
    <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
        <img src="{{asset('assets/img/bg/breadcumb_shape_1_3.png')}}" alt="shape">
    </div>
    <div class="container">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title">Application Links</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('/')}}">Home</a></li>
                <li>Application form link</li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
Project Area End
==============================-->
<!--==============================
Servce Area  
==============================-->
<!-- <section class="space-top space-extra2-bottom">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
    </div>
</section> -->

<div class="container mt-5">
    <!-- Title -->
    <div class="mb-4">
        <h3 style="color:black">Explore application links</h3>
        <p style="color:black">Find the resources you need by filtering by state or program type.</p>
    </div>
  <!-- Filter Section -->
<div class="p-4 t">
    <form id="filterForm">
        <div class="row g-3">
            <!-- State Filter -->
            <div class="col-md-4">
                <select id="state_id" name="state_id" class="form-select border-2">
                    <option value="">All States</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Type Filter -->
            <div class="col-md-4">
                <select id="type" name="type" class="form-select shadow-sm border-2">
                    <option value="">All Types</option>
                    <option value="UG">UG</option>
                    <option value="PG">PG</option>
                    <option value="Engineering">Engineering</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100 py-3 shadow-sm">
                    <i class="bi bi-funnel-fill"></i> Apply Filters
                </button>
            </div>
        </div>
    </form>
</div>

    <!-- Loading Spinner -->
    <div id="loadingSpinner" class="d-none text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Data Display Section -->
    <div class="p-3 border rounded-3 bg-white">
        <div id="linkTable">
            @include('front.home.partial-link-list', ['links' => $links])
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('filterForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const spinner = document.getElementById('loadingSpinner');
    const linkTable = document.getElementById('linkTable');
    spinner.classList.remove('d-none'); // Display the spinner
    linkTable.classList.add('d-none'); // Hide the current table
    const formData = new FormData(this);
    const queryString = new URLSearchParams(formData).toString();
    fetch("{{ route('links.getlinks') }}?" + queryString, {
        method: "GET",
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
    .then(response => response.text())
        .then(data => {
            // Hide spinner and update table
            spinner.classList.add('d-none');
            linkTable.classList.remove('d-none');
            linkTable.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);

            // Hide spinner if an error occurs
            spinner.classList.add('d-none');
            linkTable.classList.remove('d-none');
        });
});
</script>
@stop
