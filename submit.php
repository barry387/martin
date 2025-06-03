<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "register";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$firstNames = $_POST['firstNames'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$cell = $_POST['cell'];


$sql = "INSERT INTO register (firstNames , surname,email,cell) VALUES ('$firstNames ', '$surname','$email','$cell')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. <a href='form.html'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  $sql = "SELECT firstNames, surname, email,cell FROM register";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo  "<tr><td>". $row["firstNames"]. "</td><td>". $row["surname"]. "</td><td>". $row["email"]. "</td></tr>" .$row["cell"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

$conn->close();

?>
