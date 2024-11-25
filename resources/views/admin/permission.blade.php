@include('admin.layouts.head');

<body class="inner_page price_table">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         @include('admin.layouts.sidebar');
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            @include('admin.layouts.topbar');
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>{{ config('app.name', 'Bodmas') }} - Admin Permission </h2>

                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row column1">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Set Permission</h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="table_price full">
                                       <div class="inner_table_price">
                                          <div class="price_table_head green_bg">
                                             <h2>Grant Permission</h2>
                                          </div>
                                          <div class="price_table_inner">
                                             <div class="table-responsive">
                                                <table class="table table-bordered">
                                                   <thead>
                                                      <tr>
                                                         <th>ID</th>
                                                         <th>Name</th>
                                                         <th>Email</th>
                                                         <th>Created At</th>
                                                         <th>Updated At</th>
                                                         <th>Permission</th>
                                                         <th>Action</th>
                                                         <th>Role</th>
                                                         <th>Remove</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @foreach($data as $user)
                                                      <tr>
                                                         <td>{{ $user->id }}</td>
                                                         <td>{{ $user->name }}</td>
                                                         <td>{{ $user->email }}</td>
                                                         <td>{{ $user->created_at }}</td>
                                                         <td>{{ $user->updated_at }}</td>
                                                         <td class="permission-status">{{ $user->is_admin ? 'Allowed' : 'Not Allowed' }}</td>
                                                         <td>
                                                            <input type="checkbox" class="admin-permission" data-id="{{ $user->id }}" {{ $user->is_admin ? 'checked' : '' }}>
                                                         </td>
                                                         <td>
                                                            <select class="role-dropdown form-control custom-select" data-id="{{ $user->id }}" style="width: 150px; padding: 5px; border-radius: 5px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                                               <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                               <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                            </select>
                                                         </td>

                                                         <td>
                                                            <button class="btn btn-danger btn-remove" data-id="{{ $user->id }}">Remove</button>
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                             </div>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end row -->
                  </div>
                  <!-- footer -->
                  @include('admin.layouts.footer');
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
</body>

</html>
<script>
   $(document).ready(function() {
      $('.btn-remove').click(function() {
         var userId = $(this).data('id');
         if (userId) {
            Swal.fire({
               title: 'Are you sure?',
               text: "Do you really want to delete this admin user?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
               if (result.isConfirmed) {
                  var url = '/admin/users/' + userId + '/delete'; // Adjust the URL as necessary

                  // AJAX request to delete the user
                  $.ajax({
                     url: url,
                     type: 'DELETE',
                     data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                     },
                     success: function(response) {
                        Swal.fire({
                           title: "Success",
                           text: "User removed successfully",
                           icon: "success",
                           confirmButtonText: 'Close'
                        });
                        $('tr').find('.btn-remove[data-id="' + userId + '"]').closest('tr').remove();
                     },
                     error: function(xhr) {
                        Swal.fire({
                           title: "Error",
                           text: "An error occurred while removing the user",
                           icon: "error"
                        });
                     }
                  });
               }
            });
         }
      });
      ////////////////////////////////////////////////////////////////////////////////////////////
      $('.admin-permission').change(function() {
         var userId = $(this).data('id');
         var isChecked = $(this).is(':checked') ? '1' : '0';
         var url = '/admin/users/' + userId + '/update-permission';

         $.ajax({
            url: url,
            type: 'POST',
            data: {
               _token: '{{ csrf_token() }}', // CSRF token for security
               is_admin: isChecked
            },
            success: function(response) {
               console.log('Success response:', response); // Log the success response
               if (isChecked === '1') {
                  swal.fire("Success", "Admin permission allowed", "success");
                  $('tr').find('.admin-permission[data-id="' + userId + '"]').closest('tr').find('.permission-status').text('Allowed');
               } else {
                  swal.fire("Success", "Admin permission removed", "success");
                  $('tr').find('.admin-permission[data-id="' + userId + '"]').closest('tr').find('.permission-status').text('Not Allowed');
               }
            },
            error: function(xhr) {
               swal("Error", "An error occurred while updating permissions", "error");
            }
         });
      });

      $('.role-dropdown').change(function() {
         var userId = $(this).data('id'); // Get the user ID from the data attribute
         var newRole = $(this).val(); // Get the selected role (admin or user)
         var url = '/admin/users/' + userId + '/update-role';

         $.ajax({
            url: url,
            type: 'POST',
            data: {
               _token: '{{ csrf_token() }}', // CSRF token for security
               id: userId,
               role: newRole
            },
            success: function(response) {
               console.log('Success response:', response); // Log the success response
               if (response.success) {
                  swal.fire({
                     title: "Success",
                     text: "Role updated successfully",
                     icon: "success",
                     confirmButtonText: "OK",
                  }).then(() => {
                     // This callback runs after the user clicks "OK"
                     location.reload();
                  });
               } else {
                  swal.fire("Error", "Failed to update role", "error");
               }
            },
            error: function(xhr) {
               swal.fire("Error", "An error occurred while updating role", "error");
            }
         });
      });

   });
</script>
<style>
   /* General dropdown styles */
   .role-dropdown {
      font-family: 'Arial', sans-serif;
      font-size: 14px;
      color: #333;
      background-color: #fff;
      transition: all 0.3s ease-in-out;
      box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
   }

   /* Hover effect */
   .role-dropdown:hover {
      border-color: #007bff;
      box-shadow: 0px 2px 6px rgba(0, 123, 255, 0.2);
   }

   /* Focus effect */
   .role-dropdown:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
   }

   /* Admin option style */
   .role-dropdown option[value="admin"] {
      font-weight: bold;
      color: #007bff;
   }

   /* User option style */
   .role-dropdown option[value="user"] {
      font-weight: normal;
      color: #333;
   }
</style>