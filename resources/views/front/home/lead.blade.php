<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bodmas Education Services Pvt Ltd </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #FFF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: rgba(32, 31, 31, 0.1);
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h3,
        h4 {
            text-align: center;
            margin-bottom: 10px;
        }

        fieldset {
            border: none;
            margin: 10px 0;
            padding: 0;
        }

        input,
        select,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        input,
        select,
        textarea {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
        }

        button {
            background: #FFF;
            color: #0D5EF4;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #ffcc00;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    
<div class="container">
  <form id="leadForm" method="POST" action="javascript:void(0);">
        @csrf <!-- Laravel CSRF Token -->
        <h1 style="color: #000; text-align:center"><strong>Query Form Bodmas</strong></h1>
        <h4 style="color: #000;">Contact us today, and get a reply within 24 hours!</h4>
        <fieldset>
            <input placeholder="Full Name *" type="text" id="name" name="name" required autofocus>
        </fieldset>

        <fieldset>
            <input placeholder="Email Address *" type="email" id="email" name="email" required>
        </fieldset>

        <fieldset>
            <input placeholder="WhatsApp/Phone Number *" type="tel" id="number" name="number" required pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </fieldset>

        <fieldset>
            <input placeholder="Enter Course *" type="text" id="subject" name="subject" required>
        </fieldset>

        <fieldset>
            <select name="type" id="type" required>
                <option value="" disabled selected>Select Type of Query *</option>
                <option value="technical">Technical Support</option>
                <option value="admission">Admission Support</option>
                <option value="form_filling">Form Filling Support</option>
            </select>
        </fieldset>

        <fieldset>
            <textarea placeholder="Type your message here..." id="message" name="message" required></textarea>
        </fieldset>

        <fieldset>
            <button type="submit">Send now</button>
        </fieldset>
    </form>
    <!-- Progress Bar -->
    <div id="progressContainer" style="display: none; text-align: center; margin-top: 10px;">
        <div id="progressBar" style="width: 0%; height: 10px; background: #0D5EF4;"></div>
        <p id="progressText" style="color: #000; font-size: 14px; margin-top: 5px;">Sending...</p>
    </div>
</div>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#leadForm').on('submit', function(e) {
        e.preventDefault();

        // Show Progress Bar & Reset
        $('#progressContainer').show();
        $('#progressBar').css('width', '0%');
        $('#progressText').text('Sending...');

        let formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            number: $('#number').val(),
            subject: $('#subject').val(),
            type: $('#type').val(),
            message: $('#message').val(),
            _token: $('input[name="_token"]').val()
        };

        let progress = 0;
        let interval = setInterval(function() {
            progress += 20; // Simulate Progress
            $('#progressBar').css('width', progress + '%');
            if (progress >= 90) clearInterval(interval); // Stop at 90% until success
        }, 500);

        $.ajax({
            url: "{{ route('enquiry.contact') }}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                clearInterval(interval);
                $('#progressBar').css('width', '100%');
                $('#progressText').text('✅ Enquiry Submitted Successfully!');
                
                setTimeout(() => {
                    $('#progressContainer').fadeOut();
                    $('#leadForm')[0].reset();
                }, 1000);
            },
            error: function(xhr) {
                clearInterval(interval);
                $('#progressBar').css('width', '100%').css('background', 'red');
                $('#progressText').text('❌ Error in Submission');
                
                setTimeout(() => {
                    $('#progressContainer').fadeOut();
                }, 2000);

                let errors = JSON.parse(xhr.responseText);
                let errorMsg = "⚠️ Error: ";
                if (errors.errors) {
                    $.each(errors.errors, function(key, value) {
                        errorMsg += "\n" + value[0];
                    });
                } else {
                    errorMsg += xhr.responseText;
                }
                alert(errorMsg);
            }
        });
    });
});


</script>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
    }

    body {
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
        font-weight: 300;
        font-size: 12px;
        line-height: 30px;
        color: #777;
        /* background-color: #232323; */
        background-image: url("{{ asset('assets/img/contact.jpg') }}");
        background-size: cover;
    }

    .container {
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
        position: relative;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact input[type="tel"],
    #contact input[type="url"],
    #contact textarea,
    #contact button[type="submit"] {
        font: 400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
    }

    #contact {
        background: fade(#F9F9F9, 85);
        padding: 25px;
        margin: 80px 0;
    }

    #contact h3 {
        color: #000;
        display: block;
        font-size: 30px;
        font-weight: 400;
    }

    #contact h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
    }

    fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact input[type="tel"],
    #contact input[type="url"],
    #contact textarea {
        width: 100%;
        border: 1px solid #CCC;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
    }

    #contact input[type="text"]:hover,
    #contact input[type="email"]:hover,
    #contact input[type="tel"]:hover,
    #contact input[type="url"]:hover,
    #contact textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #AAA;
    }

    #contact textarea {
        height: 100px;
        max-width: 100%;
        resize: none;
    }

    #contact button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #000;
        color: #FFF;
        margin: 0 0 5px;
        padding: 25px 10px;
        font-size: 15px;
        text-transform: uppercase;
    }

    #contact button[type="submit"]:hover {
        background: #09C;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }

    #contact button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    #contact input:focus,
    #contact textarea:focus {
        outline: 0;
        border: 1px solid #999;
    }

    ::-webkit-input-placeholder {
        color: #888;
    }

    :-moz-placeholder {
        color: #888;
    }

    ::-moz-placeholder {
        color: #888;
    }

    :-ms-input-placeholder {
        color: #888;
    }

    label.error {
        color: darkred;
        padding-left: 10px;
        font-weight: bold;
    }

    input.error {
        border-color: darkred !important;
    }
</style>