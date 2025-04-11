<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (!empty($message)) {

	if (str_contains($message, '<script')){
		$message = 'xss detected';
	}else{

        // Append the message to the chat.txt file
        $file = fopen('chat.txt', 'a'); // Open file in append mode
        fwrite($file, "Anonymous user: " . $message . "\n"); // Write the message
        //fwrite($file, "Anonymous (" . $_SERVER['HTTP_USER_AGENT'] . ") : " . $message . "\n"); // Write the message
	fclose($file); // Close the file
	}
    }
}

// Redirect back to the chat interface
header('Location: chat.html');
exit;
?>
