<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $full_name = htmlspecialchars($_POST['full_name']);
        $phone = htmlspecialchars($_POST['phone']);
        $school = htmlspecialchars($_POST['school']);
        
        // Prepare data to be written to the text file
        $data = "Name: $full_name\nWhatsapp: $phone\nSekolah: $school\n\n";
        
        // Specify the path to the text file
        $file = '../data.txt';
        
        // Open the file for appending
        $handle = fopen($file, 'a');
        
        if ($handle) {
            // Set session data values
            $_SESSION['phone'] = $phone;

            // Write the data to the file
            fwrite($handle, $data);
            
            // Close the file
            fclose($handle);
            
            // Success message
            header('Location: ../index.php');
            // echo "Data saved successfully!";
        } else {
            // Error message
            echo "Could not open the file for writing.";
        }
    } else {
        echo "Invalid request method.";
    }
?>