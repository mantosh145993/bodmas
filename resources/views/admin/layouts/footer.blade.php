<div class="container-fluid">
    <div class="footer">
        <p>Copyright © 2014 Designed by Bodmas Education Services. All rights reserved.<br><br>
            Distributed By: <a href="https://bodmaseducation.com/" target="_blank" >Bodmas</a>
        </p>
    </div>
</div>

<script>
//   ClassicEditor
//     .create(document.querySelector('#editor'), {
//         ckfinder: {
//             uploadUrl: "{{route('admin.upload-blog',['_token'=>csrf_token()])}}"
//         },
        
//     })
//     .catch(error => {
//         console.error(error);
//     });
 
ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: "{{route('admin.upload-blog',['_token'=>csrf_token()])}}"
        },
        toolbar: [
            'heading', 
            '|',
            'bold', 'italic', 'underline', 'strikethrough', 'textColor', // Text formatting and text color
            '|',
            'link', 'imageUpload', // Link and image
            '|',
            'bulletedList', 'numberedList', 'blockQuote', // Lists and blockquote
            '|',
            'insertTable', 'tableColumn', 'tableRow', 'tableDelete', // Table and rows/columns
            '|',
            'undo', 'redo' // Undo and redo actions
        ],
        table: {
            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        }
    })
    .then(editor => {
        console.log('Editor initialized:', editor);

        // Manually calculate word count
        const wordCountElement = document.getElementById('word-count');
        editor.model.document.on('change:data', () => {
            const text = editor.getData();
            const wordCount = text
                .replace(/<[^>]*>/g, '') // Remove HTML tags
                .trim()
                .split(/\s+/) // Split by whitespace
                .filter(word => word.length > 0).length;

            wordCountElement.textContent = `Word count: ${wordCount}`;
        });
    })
    .catch(error => {
        console.error('Error initializing editor:', error);
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