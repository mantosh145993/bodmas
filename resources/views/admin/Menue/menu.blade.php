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
                        <h2>Menu Builder</h2>
                        <!-- Button to trigger modal for adding new menu -->
                        <button class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addMenuModal">Add Menu</button>

                        <!-- <div id="menu-builder">
                            <ul id="sortable">
                                @foreach ($menus as $menu)
                                <li id="item-{{ $menu->id }}" data-id="{{ $menu->id }}">
                                    {{ $menu->title }}
                                    <button class="delete-menu btn btn-danger btn-sm" data-id="{{ $menu->id }}">Delete</button>
                                    <ul>
                                        @foreach ($menu->children as $child)
                                        <li id="item-{{ $child->id }}" data-id="{{ $child->id }}">
                                            {{ $child->title }}
                                            <button class="delete-menu btn btn-danger btn-sm" data-id="{{ $child->id }}">Delete</button>
                                            <ul>
                                                @foreach ($child->children as $grandchild)
                                                <li id="item-{{ $grandchild->id }}" data-id="{{ $grandchild->id }}">
                                                    {{ $grandchild->title }}
                                                    <button class="delete-menu btn btn-danger btn-sm" data-id="{{ $grandchild->id }}">Delete</button>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>

                        </div> -->
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
                    <h5 class="modal-title" id="addMenuModalLabel">Add New Menu</h5>
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
                            <input type="number" class="form-control" id="menu-order" name="order" placeholder="Enter Menu Order" required>
                        </div>
                        <div class="form-group">
                            <label for="menuParentId">Parent Menu ID (optional)</label>
                            <input type="number" id="menuParentId" name="parent_id" class="form-control" placeholder="Parent Menu ID">
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

    // Handle the form submission for editing a menu item
    $('#edit-menu-form').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "{{ route('menu.update') }}", // Update route
            method: 'POST',
            data: formData + '&_token={{ csrf_token() }}',
            success: function(menu) {
                // Update the menu item title in the list
                $(`#item-${menu.id}`).find('span').text(menu.title);

                // Hide the modal
                $('#editMenuModal').modal('hide');

                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Menu Updated',
                    text: 'The menu item was updated successfully!',
                    timer: 2000,
                    showConfirmButton: false
                });
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
                        alert('Menu order updated successfully!');
                    },
                    error: function() {
                        alert('Failed to update menu order.');
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
</style>