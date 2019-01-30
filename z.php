<?php

    if(isset($_POST['name'])){

        $servername = "localhost";
        $username = "parth";
        $password = "parth";
        $dbname = "books2";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $name = $_POST['name'];
        // $original = $_POST['original'];
        $original = 500;
        $selling = 500;
        // $selling = $_POST['selling'];
        $description = $_POST['description'];
        $author = $_POST['author'];
        $branch = $_POST['branch'];
        $semester = $_POST['semester'];


        $sql = "INSERT INTO items (Name, `Original Price`, `Selling Price`, `Description`, `Author`, `Branch`, `Semester`)
        VALUES ('$name', $original, $selling, '$description', '$author', '$branch', '$semester')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="z.php" method="post">
        <input type="text" name="name" autofocus placeholder="Name"><br>
        <!-- <input type="text" name="original" placeholder="Original"><br> -->
        <!-- <input type="text" name="selling" placeholder="Selling"><br> -->
        <input type="text" name="description" placeholder="Description"><br>
        <input type="text" name="author" placeholder="Author"><br>
        <input type="text" name="branch" placeholder="Branch"><br>
        <input type="text" name="semester" placeholder="Semester"><br>
        <input type="submit">
    </form>

</body>
</html>