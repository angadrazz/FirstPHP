<?php
        include "config.php";

         if(isset($_POST['update'])) {
             $firstname = $_POST['firstname'];
             $user_id = $_POST['id'];
             $lastname = $_POST['lastname'];
             $email = $_POST['email'];
             $gender = $_POST['gender'];
             $password = $_POST['password'];

            $sql = "UPDATE 'users' SET 'firstname' = '$firstname', 'lastname' = '$lastname', 'email' = '$email', 'password' = '$password', 'gender' = '$gender' WHERE 'id' = '$user_id' ";

            $result = $conn->query($sql);

            if($result == TRUE) {
                echo "Record updated successfully";
            }
            else {
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
         }

         if (isset($_GET['id'])) {
             $user_id = $_GET['id'];

             $sql = "SELECT * FROM 'users' WHERE 'id'= '$user_id' ";

             $result = $conn->query($sql);

             if($result->num_rows > 0) {
                 while($result->fetch_assoc()) {
                     $first_name = $row['firstname'];
                     $lastname = $row['lastname'];
                     $email = $row['email'];
                     $password = $row['password'];
                     $gender = $row['gender'];
                     $id = $row['id'];
                 }
                 ?>
                 <h2>User Update Form</h2>
                 <form action="" method="POST">
                 <fieldset>
                    <legend>Personal Information</legend>
                    First Name: <br>
                    <input type="text" name="firstname">
                    <br>
                    Last Name: <br>
                    <input type="text" name="lastname">
                    <br>
                    Password: <br>
                    <input type="password" name="password">
                    <br>
                    Gender: <br>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                    <br><br>
                    <input type="submit" name="submit" value="submit">
                </fieldset>
                 </form>
             }
         }