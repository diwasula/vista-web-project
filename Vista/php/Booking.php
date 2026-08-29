<?php
require_once "db_connection.php";

if(isset($_POST['submit'])){
    if (empty($_POST['phone']) || empty($_POST['room_type']) || empty($_POST['date_in']) || empty ($_POST['date_out'])){
    echo "<script>alert('Please enter all the fields')</script>";
   }

    else{
        if ($conn->connect_error){
            die("Connection failed" . $conn->connect_error);
        }
        else{
            $phone = $_POST['phone'];
            $room = $_POST['room_type']; 
            $date_in = $_POST['date_in'];
            $date_out = $_POST['date_out'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $adults = $_POST['Adults'];
            $children = $_POST['Children'];

            if ($date_out <= $date_in) {
             echo "<script>alert('Error: Check-out date must be after Check-in date.'); history.back();</script>";
             exit;
            }           
            
            $sql = "INSERT INTO bookings (first_name, last_name, email, phone, room_type, check_in, check_out, adults, children) VALUES ('$firstName', '$lastName', '$email', '$phone', '$room', '$date_in', '$date_out', '$adults', '$children')";

            if ($conn -> query($sql) === TRUE){
                echo "<script> alert ('Reservation Confirmed') </script>";
                echo "<script> window.location.href = 'index.html'; </script>";
            }
            else{
                echo "ERROR!: " . $sql . "<br>". $conn->error;
            }


            } 
         $conn->close();
    }
}
?>
