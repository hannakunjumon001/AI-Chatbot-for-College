<style>
      body {
    background-color: #eee
}

.chat-btn {
    position: absolute;
    right: 14px;
    bottom: 30px;
    cursor: pointer
}

.chat-btn .close {
    display: none
}

.chat-btn i {
    transition: all 0.9s ease
}

#check:checked~.chat-btn i {
    display: block;
    pointer-events: auto;
    transform: rotate(180deg)
}

#check:checked~.chat-btn .comment {
    display: none
}

.chat-btn i {
    font-size: 22px;
    color: #fff !important
}

.chat-btn {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    background-color: blue;
    color: #fff;
    font-size: 22px;
    border: none
}

.wrapper {
    position: absolute;
    right: 20px;
    bottom: 100px;
    width: 300px;
    background-color: #fff;
    border-radius: 5px;
    opacity: 0;
    transition: all 0.4s
}

#check:checked~.wrapper {
    opacity: 1
}

.header {
    padding: 13px;
    background-color: blue;
    border-radius: 5px 5px 0px 0px;
    margin-bottom: 10px;
    color: #fff
}

.chat-form {
    padding: 15px
}

.chat-form input,
textarea,
button {
    margin-bottom: 10px
}

.chat-form textarea {
    resize: none
}

.form-control:focus,
.btn:focus {
    box-shadow: none
}

.btn,
.btn:focus,
.btn:hover {
    background-color: blue;
    border: blue
}

#check {
    display: none !important
}
      </style>
      <style>
        /* Chatbot container */
        .chatbot-container {
            width: 400px;
            margin: auto;
            margin-top: 50px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #f8f9fa;
        }
        /* Chatbot message container */
        .chatbot-message-container {
            margin-bottom: 10px;
        }
        /* User message container */
        .user-message-container {
            text-align: right;
        }
        /* Chatbot and user messages */
        .message {
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            max-width: 70%;
        }
        /* Chatbot message */
        .chatbot-message {
            background-color: #007bff;
            color: #fff;
        }
        /* User message */
        .user-message {
            background-color: #28a745;
            color: #fff;
        }
        /* Chatbot input field */
        .chatbot-input {
            width: 100%;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
	<?php include('common/header.php') ?>
	<div class="home-div"></div>
		<div class="w-100 in-ad-ap">
			<div class="row m-auto text-center">
				<div class="col-md-4"><h3>INTRODUCING-SVR</h3></div>
				<div class="col-md-4"><h3>ADMISSION POLICY</h3></div>
				<div class="col-md-4"><h3>APPLY NOW</h3></div>
			</div>
		</div>
		<div class="paragraph">
			<p>
				SVR provides a harmonious environment and learning opportunities  to its students regardless of their gender, socioeconomic background, religious beliefs and regional differences.
			</p>
		</div>


		<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Chat Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Chat box content goes here -->
                <div class="container">
        <div class="chatbot-container">
            <div id="chatbot-messages"></div>
            <form id="chatbot-form">
                <input type="text" id="chatbot-input" class="chatbot-input" placeholder="Type your message...">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Additional buttons or actions go here -->
            </div>
        </div>
    </div>
</div>

<script>
$("#chatButton").on("click", function() {
    $('#chatModal').modal('show'); // Use jQuery to show the modal
});
</script>
<script src="jquery.js"></script>
    <!-- Include custom JS for chatbot functionality -->
    <script>
        // Chatbot form submit event handler
        $('#chatbot-form').on('submit', function(event) {
            event.preventDefault();
            var userInput = $('#chatbot-input').val();
            if (userInput !== '') {
                $('#chatbot-messages').append('<div class="chatbot-message-container">You:<div class="message chatbot-message">' + userInput + '</div></div>');
                $('#chatbot-input').val('');
                $.ajax({
                    url: "chatbot.php",
                    type: "POST",
                    data: { user_input: userInput },
                    success: function(response) {
                        //appendMessage("Chatbot", response, "bot-message");
                        getBotResponse(response);
                         
                    }
                });
                // Call a function or make an AJAX request to process user input and get bot response
                // Replace the following line with your own logic
               
            }
        });

        // Function to get bot response and append it to chatbot messages
        function getBotResponse(botResponse) {
            //var botResponse = 'This is a sample bot response.';
          
            // Replace the following line with your own logic to get bot response
            //var botResponse = 'This is a sample bot response.';
            $('#chatbot-messages').append('<div class="user-message-container">Bot:<div class="message user-message">' + botResponse + '</div></div>');
        }
    </script>
	<?php include('common/cards.php') ?>
	<?php include('common/footer.php') ?>
</body>
</html>

