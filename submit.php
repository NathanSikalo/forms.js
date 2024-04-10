<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    // In a real application, you would hash the password for security
    $password = $_POST["password"];

    // Perform further validation and processing if needed
    // For example, you could validate the email format or check if the username is unique

    // After validation, you can proceed to store the data in a database or perform any other necessary actions

    // Assuming you have a MySQL database, here's an example of how you could insert the data into a users table
    // Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database credentials
    $db_host = 'your_db_host';
    $db_username = 'your_db_username';
    $db_password = 'your_db_password';
    $db_name = 'your_db_name';

    // Connect to MySQL database
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
