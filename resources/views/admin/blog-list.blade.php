@include('admin.layouts.head');

<body class="inner_page tables_page">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
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
                           <h2>Published Blog</h2>
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
                                 <h2>Blogs</h2>
                              </div>
                           </div>
                           <div class="table_section padding_infor_info">
                              <div class="table-responsive-sm">
                                 <table id="pagesTable" class="table table-striped">
                                    <a href="{{ route('admin.add-blog') }}" class="btn green_bg" style="color:#fff">Add New Post</a> <br><br>
                                    <thead>
                                       <tr>
                                          <th>ID</th>
                                          <th>Title</th>
                                          <th>Slug</th>
                                          <th>Feature Image</th>
                                          <th>Author</th>
                                          <th>Status</th>
                                          <th>Views</th>
                                          <th>Active</th>
                                          <th>Action</th>
                                          <!-- <th>Active</th> -->
                                          <!-- <th>Actions</th> -->
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($data as $post)
                                       <tr>
                                          <td>{{ $post->id }}</td>
                                          <td>{{ $post->title }}</td>
                                          <td>{{ $post->slug }}</td>
                                          <!-- <td>{{ $post->excerpt }}</td>
                                          <td>{{ $post->meta_title }}</td>
                                          <td>{{ $post->meta_descriptions}}</td>
                                          <td>{{ $post->meta_keywords}}</td> -->
                                          <td>
                                             <img src="{{ asset('images/feature/' . $post->feature_image) }}" alt="{{ $post->title }}" style="max-width: 200px; max-height: 150px;">
                                          </td>
                                          <td>{{ $post->author }}</td>
                                          <td>
                                             <button class="toggle-status" data-id="{{ $post->id }}" data-active="{{ $post->is_active }}">
                                                </button>
                                                {{ $post->is_active ? 'Published' : 'Draft' }}
                                          </td>
                                          <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                                                <span style="display: inline-block; background: #0D5EF4; color: white; padding: 5px 10px; border-radius: 5px; font-weight: bold;">
                                                   👁️ {{ $post->views }}
                                                </span>
                                                <br>
                                                <span style="font-size: 14px; color: #555;">
                                                   🕒 {{ \Carbon\Carbon::parse($post->updated_at)->format('d M, Y | h:i A') }}
                                                </span>
                                             </td>


                                          <td>
                                             <input type="checkbox" class="toggle-active" data-id="{{ $post->id }}" {{ $post->is_active ? 'checked' : '' }}>
                                          </td>
                                          <td>
                                      
                                             <a href="{{ route('admin.view-blog', $post->id) }}" class="btn btn-success btn-sm">View</a>
                                             <a href="{{ route('admin.edit-blog', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                             <form action="{{ route('admin.destroy-blog', $post->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $post->id }}">Delete</button>
                                             </form>
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
               <!-- footer -->
               @include('admin.layouts.footer');
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
      <!-- model popup -->
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  Modal body..
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end model popup -->
   </div>

</body>

</html>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
   $(document).ready(function() {
      $('.delete-btn').on('click', function() {
         var postId = $(this).data('id'); // Get the post ID from data attribute

         // Use SweetAlert to confirm deletion
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: "{{ route('admin.destroy-blog', '') }}/" + postId, // Append post ID to the route
                  type: 'DELETE',
                  data: {
                     _token: '{{ csrf_token() }}', // Send the CSRF token
                  },
                  success: function(response) {
                     if (response.success) {
                        Swal.fire(
                           'Deleted!',
                           'Post deleted successfully.',
                           'success'
                        );
                     } else {
                        Swal.fire(
                           'Error!',
                           'Failed to delete post.',
                           'error'
                        );
                     }
                  },
                  error: function(xhr) {
                     Swal.fire(
                        'Error!',
                        'Error deleting post: ' + xhr.responseJSON.message,
                        'error'
                     );
                  }
               });
            }
         });
      });

      $('.toggle-active').change(function() {
         var postId = $(this).data('id');
         var isActive = $(this).is(':checked') ? 1 : 0;

         $.ajax({
            url: 'posts/' + postId + '/update-status', // Adjust the URL to your route
            method: 'POST',
            data: {
               is_active: isActive,
               _token: '{{ csrf_token() }}' // Include CSRF token
            },
            success: function(response) {
               var statusText = isActive ? 'Published' : 'Not Published';
               // $('.toggle-status[data-id="' + postId + '"]').text(statusText).data('active', isActive);
               alert('Status updated successfully!');
               location.reload();
            },
            error: function(xhr) {
               // Handle error (optional)
               alert('Error updating status. Please try again.');
            }
         });
      });
      
      $('#pagesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10
            });
   });
</script>
<style>
   .toggle-status {
      padding: 5px 5px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      /* transition: background-color 0.3s; */
   }

   .toggle-status.published {
      background-color: #28a745;
      /* Green for Published */
   }

   .toggle-status.not-published {
      background-color: #dc3545;
      /* Red for Not Published */
   }

   .toggle-status:hover {
      opacity: 0.8;
   }
</style>