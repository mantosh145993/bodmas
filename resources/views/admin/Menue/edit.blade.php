@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar');
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Menu</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <!-- table section -->
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Edit Navigation Menu</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <form id="menu-form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="id" value="{{ $menu->id }}">

                                                    <div class="form-group">
                                                        <label for="title">Menu Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{ $menu->title }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" class="form-control" name="slug" value="{{ $menu->url }} " >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pageUrl">Page Slug</label>
                                                        <input type="text" class="form-control" name="page_url" value="{{ $menu->page_url }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="menuParentId">Parent Menu (optional)</label>
                                                        <select id="menuParentId" name="parent_id" class="form-control"  onchange="selectParent(this)" data-id="{{ $menu->id }}">
                                                            <option value="">-- No Parent --</option>
                                                            @foreach($parents as $parent)
                                                            <option value="{{ $parent->id }}" {{ $parent->id == $menu->parent_id ? 'selected' : '' }}> {{ $parent->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="menuPageId">Select Pages (optional)</label>
                                                        <select name="page_id" class="form-control">
                                                            <option value="">-- No Pages --</option>
                                                            @foreach($pages as $page)
                                                            <option value="{{ $page->id }}" {{ $menu->page_id == $page->id ? 'selected' : '' }}>
                                                                {{ $page->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="status">Status</label>
                                                        <select name="is_active" class="form-control" id="status"> <!-- Added id for better accessibility -->
                                                            <option value="" disabled {{ is_null($menu->is_active) ? 'selected' : '' }}>-- Select Status --</option> <!-- Placeholder option -->
                                                            <option value="1" {{ $menu->is_active == 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ $menu->is_active == 0 ? 'selected' : '' }}>Deactivate</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="slug">Order</label>
                                                        <input type="text" class="form-control" name="order" value="{{  $menu->order }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <a href="{{ route('menus') }}" class="btn btn-danger ml-2"> Back</a>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer -->
                    @include('admin.layouts.footer');
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
</body>

</html>


<script>
    function selectParent(selectElement) {
        const selectedId = selectElement.value; // Get the selected value from the dropdown
        const menuParentId = selectElement.getAttribute('data-id'); 
        if (menuParentId == selectedId) {
            alert('Cannot choose the same menu as the parent menu, please select another option!');
            selectElement.value = "";
        }
    }
    // Handle the form submission for editing a menu item
    $('#menu-form').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "{{ route('menu.update' , $menu->id ) }}", // Update route
            method: 'POST',
            data: formData + '&_token={{ csrf_token() }}',
            success: function() {
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Menu Updated',
                    text: 'The menu item was updated successfully!',
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function() {
                    location.href = "{{ route('menu.edit', $menu->id) }}";
                }, 2000);
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error updating menu item: ' + xhr.responseJSON.message,
                });
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.querySelector('.scrollable-dropdown');
        const selected = dropdown.querySelector('.dropdown-selected');
        const options = dropdown.querySelector('.dropdown-options');
        const hiddenInput = document.getElementById('parent_id');

        selected.addEventListener('click', () => {
            options.style.display = options.style.display === 'block' ? 'none' : 'block';
        });

        options.querySelectorAll('div').forEach(option => {
            option.addEventListener('click', function() {
                selected.textContent = this.textContent;
                hiddenInput.value = this.getAttribute('data-value');
                options.style.display = 'none';
            });
        });

        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                options.style.display = 'none';
            }
        });
    });
</script>

<style>
    /* Dropdown base styling */
    .scrollable-dropdown {
        position: relative;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 5px;
        cursor: pointer;
    }

    /* Selected option styling */
    .dropdown-selected {
        padding: 8px;
        background-color: #fff;
    }

    /* Options styling */
    .dropdown-options {
        display: none;
        position: absolute;
        width: 100%;
        max-height: 150px;
        /* Set max height for scrolling */
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 4px;
        z-index: 10;
    }

    .dropdown-options div {
        padding: 8px;
        cursor: pointer;
    }

    .dropdown-options div:hover {
        background-color: #f0f0f0;
    }
</style>