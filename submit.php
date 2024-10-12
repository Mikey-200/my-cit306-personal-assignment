<?php
// Create a connection to the database
$conn = new mysqli("localhost", "root", "", "form_data");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and escape form data
$firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
$lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
$middleName = mysqli_real_escape_string($conn, $_POST['middle-name']);
$regNumber = mysqli_real_escape_string($conn, $_POST['reg-number']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$courseCode = mysqli_real_escape_string($conn, $_POST['course-code']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

// Prepare SQL query
$sql = "INSERT INTO registrations (first_name, last_name, middle_name, reg_number, department, course_code, email, faculty, dob, gender, phone) 
        VALUES ('$firstName', '$lastName', '$middleName', '$regNumber', '$department', '$courseCode', '$email', '$faculty', '$dob', '$gender', '$phone')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "<h1>Thank you! Your registration has been saved.</h1>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

    // Prepare the data to be written into a file for personal storage
    $data = "First Name: $firstName\n";
    $data .= "Last Name: $lastName\n";
    $data .= "Middle Name: $middleName\n";
    $data .= "Registration Number: $regNumber\n";
    $data .= "Department: $department\n";
    $data .= "Course Code: $courseCode\n";
    $data .= "Email: $email\n";
    $data .= "Faculty: $faculty\n";
    $data .= "Date of Birth: $dob\n";
    $data .= "Gender: $gender\n";
    $data .= "Phone Number: $phone\n";

    // Save data to a file (formdata.txt)
    $file = 'formdata.txt';

    // Open the file to get existing content or create if not present
    file_put_contents($file, $data, FILE_APPEND);

    // Display a success message to the user

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>