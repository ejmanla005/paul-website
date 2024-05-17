<?php 

        $username = $_POST ['username'];
        $password =$_POST ['password'];

        $conn = new mysqli("localhost", "root", "", "user_db");
        if ($conn->connect_error) {
        } else {
            $stmt = $conn->prepare("select * from registration where username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                if($data['password'] === $password) {
                    header("Location: index.html");
                    exit;
                }else{
                    echo "<h2>Invalid Email or Password</h2>";
                }
            }else{
                echo "<h2>Invalid Email or Password</h2>";
            }
        }

?>