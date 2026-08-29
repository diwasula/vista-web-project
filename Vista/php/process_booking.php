<?php
require_once "db_connection.php";

if (isset($_POST['submit'])) {

    if (
        empty($_POST['firstName'])   ||
        empty($_POST['lastName'])    ||
        empty($_POST['email'])       ||
        empty($_POST['phone'])       ||
        empty($_POST['room_type'])   ||
        empty($_POST['date_in'])     ||
        empty($_POST['date_out'])
    ) {
        echo "<script>alert('Please enter all the fields')</script>";

    } else {

        $firstName  = $_POST['firstName'];
        $lastName   = $_POST['lastName'];
        $email      = $_POST['email'];
        $phone      = $_POST['phone'];
        $room_type  = $_POST['room_type'];
        $date_in    = $_POST['date_in'];
        $date_out   = $_POST['date_out'];
        $adults     = isset($_POST['Adults'])   ? (int)$_POST['Adults']   : 1;
        $children   = isset($_POST['Children']) ? (int)$_POST['Children'] : 0;

        $sql_user = "INSERT INTO users (first_name, last_name, email, phone)
                     VALUES ('$firstName', '$lastName', '$email', '$phone')
                     ON DUPLICATE KEY UPDATE
                         first_name = '$firstName',
                         last_name  = '$lastName',
                         email      = '$email'";

        $conn->query($sql_user);

        $sql_booking = "INSERT INTO bookings
                            (first_name, last_name, email, phone, room_type, check_in, check_out, adults, children)
                        VALUES
                            ('$firstName', '$lastName', '$email', '$phone', '$room_type', '$date_in', '$date_out', '$adults', '$children')";

        if ($conn->query($sql_booking) === TRUE) {
            echo "<script>alert('Reservation Confirmed!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        } else {
            echo "Error: " . $sql_booking . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
