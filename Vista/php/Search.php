
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Search Results </title>
   <link rel="stylesheet" href="style.css"> </head>

<body>
   <div class="top">
      <h4 id="left">Vista</h4>
      <a href="index.html" class="mybutton">Home</a>
      <a href="PersonalDetails.html" class="mybutton">Booking</a>
      <a href="Search.html" class="mybutton">Search Reservation</a> 
   </div>

   <h1>Search Results</h1> 
   <hr>

   <div class="tableCont">
      <?php
        require_once "db_connection.php";

        if (isset($_POST['submit'])){
            if (empty($_POST['phone'])){
                echo "<script>alert('Please enter your phone number');</script>";
            }
            else{
                if ($conn->connect_error){
                die("Connection failed" . $conn->connect_error);
                }
                else{
                    $phone = $_POST['phone'];

                    $sql = "SELECT * FROM bookings WHERE phone = '$phone'";
                    $result = $conn->query($sql);

                    if($result->num_rows >0){
                        echo '<div class="tableCont">';
                        echo '<table class="tableRes">';
                        echo '<tr>
                        <th>Room Type</th>
                        <th>Check in Date</th>
                         </tr>';

                        while ($row = $result->fetch_assoc()){
                             echo '<tr>';
                             echo '<td>' . $row["room_type"] . '</td>';
                             echo '<td>' . $row["check_in"] . '</td>';
                             echo '</tr>';
                }

                    echo '</table>';
                    echo '</div>';

                    }
                    else{
                        echo "<script>alert('There is no room related to this phone number')</script>";
                    }
                }
            $conn->close();

            }
        }

      ?>
   </div>

</body>
</html>
