<?php
date_default_timezone_set('Asia/Kolkata');
?>


<body>
    <div class="container">
        <div class="row justify-content-md-center mb-4">
            <div class="col-md-6">
                <!-- Start chat widget -->
                <div class="card" id="chat-widget">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Bodmas</span>
                        <!-- Close button -->
                        <button type="button" class="btn btn-sm btn-light" onclick="closeChatWidget()" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <div class="card-body messages-box">
                        <ul class="list-unstyled messages-list">
                            @php $messages=''; @endphp
                            @if($messages)
                            @foreach($messages as $row)
                            @php
                            $message = htmlspecialchars($row->message); // Escape message
                            $added_on = $row->added_on;
                            $strtotime = strtotime($added_on);
                            $time = date('h:i A', $strtotime);
                            $type = $row->type;
                            $class = $type == 'user' ? 'messages-me' : 'messages-you';
                            $imgAvatar = $type == 'user' ? 'user_avatar.png' : 'bot_avatar.png';
                            $name = $type == 'user' ? 'Me' : 'Chatbot';
                            @endphp
                            <li class="{{ $class }} clearfix">
                                <span class="message-img">
                                    <img src="{{ asset('front/chatbot/' . $imgAvatar) }}" class="avatar-sm rounded-circle">
                                </span>
                                <div class="message-body clearfix">
                                    <div class="message-header">
                                        <strong class="messages-title">{{ $name }}</strong>
                                        <small class="time-messages text-muted">
                                            <span class="fas fa-time"></span>
                                            <span class="minutes">{{ $time }}</span>
                                        </small>
                                    </div>
                                    <p class="messages-p">{{ $message }}</p>
                                </div>
                            </li>
                            @endforeach
                            @else
                            <li class="messages-me clearfix start_chat blinking-text">
                                Bodmas AI <img src="{{asset('front/chatbot/user_avatar.png')}}" alt="Bodmas-Logo">
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
                        </div>
                        <span class="input-group-append">
                            <input type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
                        </span>
                    </div>
                </div>
                <!-- End chat widget -->

                <!-- Small AI Icon for reopening the chat -->
                <div id="ai-icon" onclick="showChatWidget()" style="display: none; cursor: pointer; position: fixed; bottom: 10px; right: 20px; width: 70px; height: 70px; background-color: #007bff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                    <img src="{{ asset('front/chatbot/bot_avatar.png') }}" alt="AI Icon" style="width: 30px; height: 30px;">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getCurrentTime() {
            var now = new Date();
            var hh = now.getHours();
            var min = now.getMinutes();
            var ampm = (hh >= 12) ? 'PM' : 'AM';
            hh = hh % 12;
            hh = hh ? hh : 12;
            hh = hh < 10 ? '0' + hh : hh;
            min = min < 10 ? '0' + min : min;
            var time = hh + ":" + min + " " + ampm;
            return time;
        }

        function send_msg() {
            jQuery('.start_chat').hide();
            var txt = jQuery('#input-me').val();
            var html = '<li class="messages-me clearfix"><span class="message-img"><img src="{{asset("front/chatbot/user_avatar.png")}}" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">' + getCurrentTime() + '</span></small> </div><p class="messages-p">' + txt + '</p></div></li>';
            jQuery('.messages-list').append(html);
            jQuery('#input-me').val('');
            if (txt) {
                jQuery.ajax({
                    url: "{{ route('chat.createChat') }}",
                    type: 'post',
                    data: 'txt=' + txt + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        var html = '<li class="messages-you clearfix"><span class="message-img"><img src="{{asset("front/chatbot/bot_avatar.png")}}" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">' + getCurrentTime() + '</span></small> </div><p class="messages-p">' + result.reply + '</p></div></li>';
                        jQuery('.messages-list').append(html);
                        jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                    }
                });
            }
        }

        function closeChatWidget() {
            document.getElementById('chat-widget').style.display = 'none';
            document.getElementById('ai-icon').style.display = 'flex';
        }

        function showChatWidget() {
            document.getElementById('chat-widget').style.display = 'block';
            document.getElementById('ai-icon').style.display = 'none';
        }
    </script>
</body>

</html>
<style>
    /* Chat Widget */
#chat-widget {
    display: none; /* Hidden by default */
}
    .blinking-text {
        animation: blinker 1.5s linear infinite;
        color: #007bff;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .card-header button {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #6c757d;
        cursor: pointer;
    }

    .card-header button:hover {
        color: #000;
    }

    /* Blink animation for the start chat message */
    .blinking-text {
        animation: blinker 1.5s linear infinite;
        color: #007bff;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    /* style.css */
    .card {
        max-width: 350px;
        /* Limit the card width */
        width: 100%;
        /* Allow it to shrink */
        position: fixed;
        /* Fix to the bottom of the page */
        bottom: 20px;
        /* Space from bottom */
        right: 20px;
        /* Space from right */
        z-index: 1000;
        /* Make sure it's above other elements */
        display: flex;
        flex-direction: column;
        /* Align children vertically */
    }

    .messages-box {
        overflow-y: auto;
        /* Allow scrolling */
        max-height: 200px;
        /* Limit height for better UI */
    }

    @media (max-width: 576px) {
        .card {
            max-width: 90%;
            /* Adjust max-width for smaller screens */
        }
    }

    .input-group input {
        height: 40px;
        /* Set input height */
    }

    .input-group-append input {
        height: 40px;
        /* Set button height */
    }

    .start_chat {
        text-align: center;
        /* Center the start chat message */
        font-style: italic;
        /* Style it differently */
        color: gray;
        /* Use a softer color */
    }

    /* Add this to your style.css file */

    @keyframes blink {
        0% {
            color: red;
        }

        25% {
            color: blue;
        }

        50% {
            color: green;
        }

        75% {
            color: orange;
        }

        100% {
            color: purple;
        }
    }

    .blinking-text {
        animation: blink 1.5s infinite;
        /* Adjust the duration as needed */
        font-weight: bold;
        /* Make it stand out */
    }
</style>