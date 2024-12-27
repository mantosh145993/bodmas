<div class="container-fluid">
    <div class="footer">
        <p>Copyright © 2014 Designed by Bodmas Education Services. All rights reserved.<br><br>
            Distributed By: <a href="https://bodmaseducation.com/" target="_blank" >Bodmas</a>
        </p>
    </div>
</div>

<script>
 new FroalaEditor('#editor', {
    imageUploadURL: "{{ route('admin.upload-blog', ['_token' => csrf_token()]) }}", // Laravel route for image upload
    toolbarButtons: [
        'bold', 'italic', 'underline', 'strikeThrough', 
        'formatOL', 'formatUL', // Ordered and unordered lists
        'paragraphFormat', // Add heading tags
        'insertLink', // Add hyperlink with text
        'textColor', 'backgroundColor', // Text and background color
        'insertTable', 'insertImage', // Tables and images
        'undo', 'redo' // Undo and redo actions
    ],
    imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'], // Allowed image types
    imageMaxSize: 5 * 1024 * 1024, // 5MB Max file size
    paragraphFormat: { // Define paragraph formats (headings and normal text)
        N: 'Normal',
        H1: 'Heading 1',
        H2: 'Heading 2',
        H3: 'Heading 3',
        H4: 'Heading 4',
        H5: 'Heading 5',
        H6: 'Heading 6'
    },
    linkInsertButtons: ['linkBack'], // Enables the option to add text on hyperlinks
    colorsBackground: [ // Customize background colors
        '#FFFFFF', '#FF0000', '#00FF00', '#0000FF', '#FFFF00'
    ],
    colorsText: [ // Customize text colors
        '#000000', '#FF0000', '#00FF00', '#0000FF', '#FFFFFF'
    ]
});
</script>

   <!-- jQuery -->
   <script src="{{asset('admin/js/jquery.min.js')}}"></script>
   <script src="{{asset('admin/js/popper.min.js')}}"></script>
   <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
   <!-- wow animation -->
   <script src="{{asset('admin/js/animate.js')}}"></script>
   <!-- select country -->
   <script src="{{asset('admin/js/bootstrap-select.js')}}"></script>
   <!-- owl carousel -->
   <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
   <!-- chart js -->
   <script src="{{asset('admin/js/Chart.min.js')}}"></script>
   <script src="{{asset('admin/js/Chart.bundle.min.js')}}"></script>
   <script src="{{asset('admin/js/utils.js')}}"></script>
   <script src="{{asset('admin/js/analyser.js')}}"></script>
   <!-- nice scrollbar -->
   <script src="{{asset('admin/js/perfect-scrollbar.min.js')}}"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="{{asset('admin/js/custom.js')}}"></script>
   <script src="{{asset('admin/js/chart_custom_style1.js')}}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>