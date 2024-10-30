@include('admin.layouts.head')

<body class="inner_page tables_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.topbar')
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid mt-5">
                        <h2>Navigation Menu</h2>
                        <!-- Button to trigger modal for adding new menu -->
                        <button class="btn btn-primary mb-3 mt-5" data-toggle="modal" data-target="#addMenuModal">Add new menu</button>
                        <ul id="sortable">
                            @include('admin.menue.menus', ['menus' => $menus]) <!-- Include the recursive menu component -->
                        </ul>
                    </div>
                </div>
                <!-- footer -->
                @include('admin.layouts.footer')
            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Add Navigation Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Menu Form -->
                    <form id="add-menu-form">
                        <div class="form-group">
                            <label for="menu-title">Menu Title</label>
                            <input type="text" class="form-control" id="menu-title" name="title" placeholder="Enter Menu Title" required>
                        </div>
                        <div class="form-group">
                            <label for="menu-order">Menu Order</label>
                            <input type="number" class="form-control" id="menu-order" name="order" placeholder="Enter Menu Order">
                        </div>
                        <div class="form-group">
                             <select name="is_active" class="form-control">
                                <option value="">-- Active Status--</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                        <!-- Parent Menu Selection Dropdown -->
                        <div class="form-group">
                            <label for="menuParentId">Parent Menu (optional)</label>
                            <div id="menuParentId" class="scrollable-dropdown">
                                <div class="dropdown-selected">-- No Parent --</div>
                                <div class="dropdown-options">
                                    <div data-value="">-- No Parent --</div>
                                    @foreach($parents as $menu)
                                    <div data-value="{{ $menu->id }}">{{ $menu->title }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="parent_id" id="parent_id" value="">

                        <div class="form-group">
                            <label for="menuParentId">Select Pages (optional)</label>
                            <select name="page_id" class="form-control">
                                <option value="">-- No Pages --</option>
                                @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- menue item link -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- menue item link end -->
<script>
    $(document).ready(function() {


        $('#add-menu-form').on('submit', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.ajax({
                url: "{{ route('menu.store') }}", // Use route helper for URL
                method: 'POST',
                data: formData + '&_token={{ csrf_token() }}', // Append CSRF token
                success: function(menu) {
                    $('#sortable').append(`
                <li id="item-${menu.id}" data-id="${menu.id}">
                    ${menu.title}
                    <button class="delete-menu btn btn-danger btn-sm" data-id="${menu.id}">Delete</button>
                    <ul></ul>
                </li>
            `);
                    $('#add-menu-form')[0].reset();
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error adding menu item: ' + xhr.responseJSON.message,
                    });
                }
            });
        });
    });


    $(function() {
        $("#sortable").sortable({
            update: function(event, ui) {
                let menuData = $(this).sortable('toArray').map((id, index) => {
                    return {
                        id: id.split('-')[1],
                        order: index,
                        parent_id: ui.item.parent().data('id') || null
                    };
                });

                $.ajax({

                    url: "{{ route('menus.update-order') }}/", // Ensure this route is defined in your web.php
                    method: 'POST',
                    data: {
                        menu: menuData,
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function() {
                        // alert('Menu order updated successfully!');
                    },
                    error: function() {
                        // alert('Failed to update menu order.');
                    }
                });
            }
        });
        $("#sortable").disableSelection();
    });

    // Delete menu functionality
    $(document).on('click', '.delete-menu', function() {
        const menuId = $(this).data('id');
        if (confirm('Are you sure you want to delete this menu item?')) {
            $.ajax({
                url: "{{ route('menus', '') }}/" + menuId, // Ensure this route is defined in your web.php
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $('#item-' + menuId).remove();
                    // alert('Menu item deleted successfully!');
                },
                error: function() {
                    alert('Failed to delete menu item.');
                }
            });
        }
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
    #menu-builder {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    #sortable {
        list-style-type: none;
        padding: 0;
    }

    #sortable li {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        background-color: #fff;
        position: relative;
        border-radius: 4px;
    }

    .delete-menu {
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .menu-actions .input-group {
        max-width: 500px;
    }

    .input-group input {
        border-radius: 0.25rem 0 0 0.25rem;
    }

    .input-group button {
        border-radius: 0 0.25rem 0.25rem 0;
    }

    /* Limit the height of the select dropdown */
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