<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('hero/hero-2.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            padding: 20px;
        }

        .registration-box {
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            background: rgba(0, 0, 0, 0.3);
            animation: growFromCorners 1s ease-out;
            gap: 20px;
        }

        @keyframes growFromCorners {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group.full-width {
            width: 100%;
        }

        .input-group input[type="submit"] {
            background: orange;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .input-group input[type="submit"]:hover {
            background: white;
            color: orange;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav img {
            width: 100px;
        }

        .nav-links ul {
            list-style: none;
            display: flex;
        }

        .nav-links ul li {
            margin: 0 10px;
        }

        .nav-links ul li a {
            text-decoration: none;
        }

        .btn {
            border-radius: 5px;
            color: white;
            background-color: rgba(0, 0, 0, 0.2);
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            transition: color 0.3s, width 0.3s;
        }

        .btn:hover {
            color: orange;
            width: auto;
        }

        #align-boxes {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            padding: 5px;
        }

        #align-boxes div {
            color: white;
            text-align: center;
            margin: 5px;
        }
    </style>
</head>
<body>
<nav>
    <a href="#"><img src="images/logo.png" alt="Logo"></a>
    <div class="nav-links">
        <ul>
            <li><a href="home.html"><button class="btn">Home</button></a></li>
            <li><a href="About.html"><button class="btn">About Us</button></a></li>
            <li><a href="services.html"><button class="btn">Services</button></a></li>
            <li><a href="BMI.php"><button class="btn">BMI</button></a></li>
            <li><a href="Team.html"><button class="btn">Our Team</button></a></li>
             <li><a href="records_test.php"><button class="btn">Records</button></a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="registration-box">
        <h2>Register</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "gym_web";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database_name);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['save'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone_no = $_POST['phone'];
            $postal_code = $_POST['postal_code'];
            $select_package = $_POST['package'];

            // Corrected SQL query
            $sql_query = "INSERT INTO register (first_name, last_name, email, password, address, phone_no, postal_code, select_package) 
                  VALUES ('$first_name', '$last_name', '$email', '$password', '$address', '$phone_no', '$postal_code', '$select_package')";

            if (mysqli_query($conn, $sql_query)) {
                echo "<p style='color: green;'>Records inserted successfully.</p>";
            } else {
                echo "<p style='color: red;'>ERROR: Could not execute query: $sql_query. " . mysqli_error($conn) . "</p>";
            }

            mysqli_close($conn);
        }
        ?>

        <form action="Regi.php" method="POST">
            <div id="align-boxes">
                <div>
                    <div class="input-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="input-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
                <div>
                    <div class="input-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="input-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="input-group">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" id="postal_code" name="postal_code" required>
                    </div>
                    <div class="input-group">
                        <label for="package">Select Package:</label>
                        <select id="package" name="package">
                            <option value="Basic">Basic</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-group full-width">
                <input type="submit" name="save" value="Register">
            </div>
        </form>
    </div>
</div>
</body>
</html>
