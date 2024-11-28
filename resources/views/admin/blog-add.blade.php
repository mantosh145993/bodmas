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
                                    <h2>Publish Blog</h2> <br>
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
                                            <h2>Add Blogs</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <form id="blog-form" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Post Category *</label>
                                                        <select class="form-select" id="" name="category_id" require>
                                                            <option value="">Select Post Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="feature_image">Feature Image</label>
                                                        <input type="file" name="feature_image" id="feature_image" class="form-control" accept="image/*">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="feature_description" class="form-label fw-bold">Feature Description</label>
                                                        <textarea
                                                            name="feature_description"
                                                            id="feature_description"
                                                            class="form-control"
                                                            rows="2"
                                                            placeholder="Enter feature description"
                                                            style="height: 50px;"></textarea>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control" required>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="title">Meta Title</label>
                                                        <input type="text" name="meta_title" id="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="title">Meta Description</label>
                                                        <input type="text" name="meta_description" id="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="title">Meta Keywords</label>
                                                        <input type="text" name="meta_keywords" id="" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tags">Tags</label>
                                                        <div class="row">
                                                            <!-- Input Field for Tags -->
                                                            <div class="col-md-8">
                                                                <input type="text" name="tags" id="tags" class="form-control">
                                                            </div>

                                                            <!-- Add Button -->
                                                            <div class="col-md-4">
                                                                <button type="button" id="add-tag-btn" class="btn btn-primary btn-lg">Add Tags</button>
                                                            </div>
                                                        </div>

                                                        <!-- Display Added Tags -->
                                                        <div id="tags-list" class="mt-3">
                                                            <!-- Tags will be displayed here -->
                                                        </div>

                                                        <!-- Hidden input to store tags for form submission -->
                                                        <input type="hidden" name="tagsField" id="tagsField">
                                                    </div>

                                                    <!-- Author Column -->

                                                    <div class="form-group">
                                                        <label for="title" class="form-label fw-bold">Author</label>
                                                        <input type="text" name="author" id="title" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                                    </div>
                                                    <!-- About Author Column -->
                                                    <div class="form-group">
                                                        <label for="author_description" class="form-label fw-bold">About Author</label>
                                                        <textarea
                                                            name="author_description"
                                                            id="description"
                                                            class="form-control"
                                                            rows="5"
                                                            readonly
                                                            style="height: 50px;">{{ Auth::user()->description }}</textarea>
                                                    </div>
                                                    <textarea name="content" id="editor"></textarea>
                                                    <div id="word-count">Word count: 0</div>
                                                    <button type="submit" class="btn btn-success mt-2"> Publish Blog</button>
                                                    <a href="{{ route('admin.blog') }}" class="btn btn-danger ml-2 mt-2 btn-sm" id="cancelButton">Cancel</a>
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

<style>
    .ck-editor__editable_inline {
        height: 450px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#blog-form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.store-blog') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Post created successfully.');
                    window.location.href = "{{route('admin.blog')}}";
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += value[0] + '\n';
                    });
                    alert('Error:\n' + errorMessages);
                }
            });
        });

        // Cancel Autosave 

        const cancelButton = document.getElementById('cancelButton');
        cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            autoSaveDraft();
            setTimeout(() => {
                window.location.href = this.href;
            }, 1000); // 1-second delay to allow the autosave to complete
        });
    });

    let autoSaveInterval;
    let isSaved = false;

    function autoSaveDraft() {
        const formData = new FormData(document.querySelector('#blog-form'));
        const data = Object.fromEntries(formData);
        // Send an AJAX request to auto-save
        fetch("{{ route('admin.autosave') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Draft saved successfully:", data.post_id);

                    // Create a message element
                    const message = document.createElement('div');
                    message.textContent = "Draft saved successfully!";
                    message.style.position = 'fixed';
                    message.style.bottom = '20px';
                    message.style.right = '20px';
                    message.style.backgroundColor = '#28a745'; // Green background
                    message.style.color = '#fff'; // White text
                    message.style.padding = '10px 20px';
                    message.style.borderRadius = '5px';
                    message.style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
                    message.style.zIndex = '1000';
                    message.style.fontSize = '14px';
                    document.body.appendChild(message);

                    // Remove the message after 2 seconds
                    setTimeout(() => {
                        document.body.removeChild(message);
                    }, 2000);
                }
            })
            .catch(error => {
                console.error("Error auto-saving draft:", error);
            });
    }
    setInterval(autoSaveDraft, 30000);
    // Ensure auto-save on page close or refresh
    window.addEventListener("beforeunload", function(e) {
        if (!isSaved) {
            autoSaveDraft();
        }
    });

    // Add tag list 
    let tags = []; // Array to store tags entered by the user
    $('#add-tag-btn').on('click', function() {
        const inputField = $('#tags');
        const inputValue = inputField.val().trim(); // Get and trim the input value

        // Ensure the input value is not empty and is not already added
        if (inputValue !== '' && !tags.includes(inputValue)) {
            // Add the tag to the tags array
            tags.push(inputValue);

            // Clear the input field
            inputField.val('');

            // Update the tag list UI
            updateTagList();
        }
    });

    // Update the tags list in the UI
    function updateTagList() {
        $('#tags-list').empty(); // Clear the existing list

        // Create and append each tag to the list
        tags.forEach((tag, index) => {
            const tagElement = $('<span class="tag"></span>').text(tag);
            const removeButton = $('<button class="remove-tag btn btn-danger btn-sm ml-2">x</button>')
                .on('click', function() {
                    removeTag(index); // Remove tag when the button is clicked
                });

            tagElement.append(removeButton);
            $('#tags-list').append(tagElement);
        });

        // Update the hidden input with the comma-separated tags for form submission
        $('#tagsField').val(tags.join(','));
    }

    // Remove a tag from the tags array
    function removeTag(index) {
        tags.splice(index, 1); // Remove the tag at the given index
        updateTagList(); // Update the displayed list of tags
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Initialize CKEditor
        CKEDITOR.replace('editor');

        // Add word count display logic
        const wordCountElement = document.getElementById('word-count');

        // Function to calculate word count
        function calculateWordCount(text) {
            return text.trim().split(/\s+/).filter(word => word.length > 0).length;
        }

        // Listen for changes in CKEditor content
        CKEDITOR.instances.editor.on('change', function() {
            // Get content from CKEditor
            const content = CKEDITOR.instances.editor.getData();

            // Calculate word count
            const wordCount = calculateWordCount(content);

            // Update word count display
            wordCountElement.textContent = `Word count: ${wordCount}`;
        });
    });
</script>

<style>
    .mb-3 {
        margin-bottom: 1rem;
        /* Adjust spacing as needed */
    }

    .form-label {
        font-weight: bold;
        /* Makes the label stand out */
        color: #333;
        /* Darker text for better readability */
    }

    .form-select {
        width: 100%;
        /* Full width for better usability */
        padding: 0.5rem;
        /* Adds padding for a more comfortable click area */
        border: 1px solid #ccc;
        /* Light border */
        border-radius: 0.25rem;
        /* Slightly rounded corners */
        transition: border-color 0.2s;
        /* Smooth border transition */
    }

    .form-select:focus {
        border-color: #007bff;
        /* Change border color on focus */
        outline: none;
        /* Removes default outline */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        /* Adds a soft shadow */
    }

    .option {
        color: #555;
        /* Slightly lighter color for options */
    }

    #tags-list {
        margin-top: 10px;
    }

    .tag {
        display: inline-block;
        background-color: #e0e0e0;
        padding: 5px 10px;
        border-radius: 15px;
        margin-right: 10px;
        margin-bottom: 5px;
    }

    .remove-tag {
        background-color: red;
        color: white;
        border: none;
        padding: 0 5px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 50%;
    }

    .remove-tag:hover {
        background-color: darkred;
    }
</style>