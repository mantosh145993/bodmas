@extends('front_layouts.master')
@section('content')

<!--==============================
Project Area  
==============================-->

<div class="breadcumb-wrapper " data-bg-src="{{asset('assets/img/bg/breadcumb-bg.jpg')}}" data-overlay="title" data-opacity="8">
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
            <h1 class="breadcumb-title">Paid Cut-off Packages</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('/')}}">Home</a></li>
                <li>Cutoff Packages</li>
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
<section class="space-top space-extra2-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 order-lg-2">
                <div class="th-sort-bar course-sort-bar">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <p class="woocommerce-result-count">Showing <span class="text-theme">All</span> Packages</p>
                        </div>

                        <div class="col-md-auto">
                            <div class="nav" role=tablist>
                                <a href="#" class="active" id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-solid fa-list me-2"></i>List</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                        <div class="row gy-30">
                            @foreach($packages as $package)
                            <div class="col-12">
                                <div class="course-grid">
                                    <div class="course-img">
                                        <img src="{{ asset('images/package/'.$package->images) }}" alt="img" style="width:200px">
                                        <span class="tag" onclick="showImage('{{ asset('images/package/'.$package->images) }}')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-title">{{$package->product_name}}</h3>
                                        <p>{{$package->description}}</p>
                                        <p><strong>Sale Price:</strong> ₹{{ number_format($package->sale_price, 2) }}</p>
                                        <p><strong>Regular Price:</strong> ₹<del style="color:red">{{ number_format($package->ragular_price, 2) }}</del></p>
                                        <button class="btn btn-primary course-apply-button p-1">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <!-- Search area  -->
            <div class="col-xl-3 col-lg-4 order-lg-1">
                <aside class="sidebar-area sidebar-shop">
                    <div class="widget widget_categories style2  ">
                        <h3 class="widget_title">Select Category</h3>
                        <ul>
                            <li><input id="beginnercheck" name="beginnercheck" type="checkbox" checked>
                                <label for="beginnercheck">All Category<span class="checkmark"></span></label>
                                <select name="" id="categorySelect" onchange="fetchPackagesByCategory()">
                                    @php $cate = [1,2,3,4,5,6,7]; @endphp
                                    @foreach($categories as $category)
                                    @if(!in_array($category->id,$cate))
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>
            </div>

            </aside>
        </div>
        <!-- Search area end -->
    </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Packages</h5>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Package Image" style="width:100%; max-height:500px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Image Modal End -->

</section>
@stop

<script>
    function showImage(imageUrl) {
        $('#modalImage').attr('src', imageUrl);
        $('#imageModal').modal('show');
    }

    function fetchPackagesByCategory() {
        const categoryId = document.getElementById('categorySelect').value;
        // alert(categoryId);
        $.ajax({
            url: `{{ route('package.byCategory', '') }}/${categoryId}`,
            type: 'GET',
            data: {
                category_id: categoryId
            },
            success: function(response) {
                const packageContainer = document.querySelector('.tab-content .row.gy-30');
                packageContainer.innerHTML = '';
                response.packages.forEach(package => {
                    const packageElement = `
                        <div class="col-12">
                            <div class="course-grid">
                                <div class="course-img">
                                    <img src="{{ asset('images/package/') }}/${package.images}" alt="img" style="width:200px">
                                    <span class="tag" onclick="showImage('{{ asset('images/package/') }}/${package.images}')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="course-content">
                                    <h3 class="course-title">${package.product_name}</h3>
                                    <p>${package.description}</p>
                                    <p><strong>Sale Price:</strong> ₹${package.sale_price}</p>
                                    <p><strong>Regular Price:</strong> ₹<del style="color:red">${package.ragular_price}</del></p>
                                    <button class="btn btn-primary course-apply-button p-1">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    `;
                    packageContainer.insertAdjacentHTML('beforeend', packageElement);
                });
            },
            error: function() {
                alert('Error retrieving packages for the selected category.');
            }
        });
    }
</script>