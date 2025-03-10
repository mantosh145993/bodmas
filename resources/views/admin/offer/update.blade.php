@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- End Sidebar -->
            <div id="content">
                <!-- Topbar -->
                @include('admin.layouts.topbar')
                <div class="midde_cont">
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Update Seasonal Offer</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('offer.update', $offer->id) }}" method="POST">
                                    @csrf

                                    <!-- Title Field -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $offer->title) }}" required>
                                    </div>

                                    <!-- Description Field -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $offer->description) }}</textarea>
                                    </div>

                                    <!-- Price Field -->
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $offer->price) }}" required>
                                    </div>

                                    <!-- Start Date Field -->
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $offer->start_date->toDateString()) }}" required>
                                    </div>

                                    <!-- End Date Field -->
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $offer->end_date->toDateString()) }}" required>
                                    </div>
                                    <!-- Join Us Field For Link -->
                                    <div class="form-group">
                                        <label for="join_us">Join Us</label>
                                        <input type="text" id="join_us" name="join_us" class="form-control" value="{{ old('join_us', $offer->join_us) }}" required>
                                        @error('join_us')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Status Field -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="active" {{ old('status', $offer->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $offer->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="expired" {{ old('status', $offer->status) == 'expired' ? 'selected' : '' }}>Expired</option>
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Update Offer</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>