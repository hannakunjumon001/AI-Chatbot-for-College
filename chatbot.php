<?php
// Get user input
$userInput = $_POST['user_input'];

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'svr_college'); // Replace with your database credentials

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process user input and generate bot response
$botResponse = "I'm sorry, I didn't understand. Can you please try again?";
$x= "I'm sorry, I didn't understand. Can you please try again?";
// Query the database to check if the user input matches any predefined responses
$query = "SELECT * FROM reqres WHERE question = '$userInput'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $botResponse = $row['answer'];
}


if($x==$botResponse){

    $query2 = "SELECT * FROM unans WHERE question = '$userInput'";
$result2 = mysqli_query($conn, $query2);
if(!mysqli_num_rows($result2)>0){

$query1 = "insert into unans (question) values('$userInput')";
$result1 = mysqli_query($conn, $query1);}

}
// Save chat history to database
//$query = "INSERT INTO chat_history (user_input, bot_response) VALUES ('$userInput', '$botResponse')";
//mysqli_query($conn, $query);

// Close database connection
mysqli_close($conn);

// Return bot response
echo $botResponse;
?>
