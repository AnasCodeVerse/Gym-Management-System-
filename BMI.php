<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "gym_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bmi = $_POST['bmi'];

    // Check if the entry already exists
    $query = "SELECT * FROM bmi WHERE height = ? AND weight = ? AND age = ? AND gender = ? AND bmi = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ddids", $height, $weight, $age, $gender, $bmi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color: red;'>Duplicate entry found. Data already exists in the database.</p>";
    } else {
        // Insert data into database
        $sql_query = "INSERT INTO bmi (height, weight, age, gender, bmi) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_query);
        $stmt->bind_param("ddids", $height, $weight, $age, $gender, $bmi);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>BMI data inserted successfully.</p>";
        } else {
            echo "<p style='color: red;'>ERROR: Could not execute query: $sql_query. " . $conn->error . "</p>";
        }
    }

    // Close statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            width: 100%;
        }
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background for the navbar */
            padding: 10px 20px;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav img {
            width: 100px; /* Adjust logo size as needed */
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
            background-color: black;
            opacity: 2s;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        .btn:hover {
            color: orange;
            width: 60px;
        }
        .hero-1 {
            height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/breadcrumb-bg.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .hero-1 h1 {
            font-size: 4em;
        }
        .container {
            padding: 0;
            margin: 0;
            border: 0;
        }
        .content {
            margin:0;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .bottom-right {
            position: absolute;
            text-align: center;
        }
        .bottom-right h4 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .bottom-right h1 {
            font-size: 3em;
            line-height: 1.2;
        }
        span{
            color: orange;
        }
        .size_text{
            font-size: 80px;
        }
        #align-boxes{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: auto;
            background-color: black;
            padding: 25px;
        }
        #align-boxes div{
            color: white;
            text-align: center;
            margin: 5px;
        }
        .logo-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .logo-btn img {
            width: 100px;
        }

        .logo-btn:hover {
            color: orange;
        }
        .container {
            margin: 0;
            padding: 0;
            border: 0;
            position: relative;
            width: 100%;
            height: auto;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .overlay-text {
            position: absolute;
            bottom: 0;
            left: 0;
            width: auto;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        ------
        body, html {
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .hero-section {
            height: 100vh;
            width: 100%;
            background-image: url('images/Background-1.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .center-content {
            color: white;
            text-align: center;
        }

        .center-content h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .center-content p {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            color: darkorange;
            background-color: white;
        }
        <---------------->
         * {
             padding: 0;
             margin: 0;
             box-sizing: border-box;
         }

        body, html {
            height: 100%;
            width: 100%;
            background-color: #1a1a1a;
            font-family: Arial, sans-serif;
            color: white;
        }

        .pricing-section {
            text-align: center;
            padding: 50px 20px;
        }

        .pricing-section h2 {
            color: orange;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .pricing-section h1 {
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .pricing-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .pricing-card {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, background-color 0.3s;
            width: 250px;
        }

        .pricing-card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .pricing-card h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: orange;
        }

        .pricing-card p {
            font-size: 1em;
            margin-bottom: 20px;
        }

        .pricing-card ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .pricing-card ul li {
            margin-bottom: 10px;
        }

        .enroll-button {
            background-color: #333;
            border: 2px solid orange;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
        }

        .enroll-button:hover {
            background-color: orange;
            color: black;
        }

        .pricing-card.highlight {
            background-color: white;
            color: black;
            transform: scale(1.1);
        }

        .pricing-card.highlight h2 {
            color: orange;
        }

        .pricing-card.highlight .enroll-button {
            background-color: orange;
            color: black;
            border: 2px solid black;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-top {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #444;
        }

        .footer-top .contact-item {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .footer-top .contact-item i {
            font-size: 20px;
            margin-right: 10px;
            color: #ff6600;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            text-align: left;
        }

        .footer-logo img {
            width: 50px;
            margin-bottom: 10px;
        }

        .footer-logo p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-links,
        .footer-support,
        .footer-tips {
            max-width: 200px;
        }

        .footer-links h4,
        .footer-support h4,
        .footer-tips h4 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .footer-links ul,
        .footer-support ul,
        .footer-tips ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li,
        .footer-support ul li,
        .footer-tips ul li {
            margin-bottom: 8px;
        }

        .footer-links ul li a,
        .footer-support ul li a,
        .footer-tips ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links ul li a:hover,
        .footer-support ul li a:hover,
        .footer-tips ul li a:hover {
            text-decoration: underline;
        }

        .footer-tips ul li span {
            display: block;
            font-size: 12px;
            color: #888;
            margin-top: 2px;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            margin: 0 5px;
            font-size: 16px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #ff6600;
        }
        .calculator {
            background-color: black;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .calculator div {
            margin-bottom: 10px;
        }
        .calculator input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }
        .calculator button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="hero-1">
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

    <div class="bottom-right">
        <h1 class="size_text" style="font-weight: 900;">BMI CALCULATOR</h1>
        <h4>Home > Pages ><span> BMI Calculator </span><h4>
    </div>
</div>

<div class="container">
    <div id="aboutus" class="content">
        <div style="background-color: black; padding-top: 20px; padding-top:40px; padding-bottom:55px;">
            <div id="align-boxes">
                <div>
                    <div class="container">
                        <div style="text-align: left; padding-bottom:28px;" >
                            <p><h4><span>CHECK YOUR BODY</span></h4></p>
                            <p><h1>BMI CALCULATOR CHART</h1></p>
                        </div>
                        <div class="image-container">
                            <img src="images/BMI%20Table.png" alt="Logo">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="container">
                        <div style="text-align: left; padding-bottom:28px;">
                            <p><h4><span>CHECK YOUR BODY</span></h4></p>
                            <p><h1>CALCULATE YOUR BMI</h1></p>
                        </div>
                        <div>


                            <div class="calculator"; style="background-color: #111;">


                                <form id="bmiform" action="BMI.php" method="POST">
                                    <div>
                                        <label for="height"><h5>Height / cm</h5></label>
                                        <input type="number" id="height" name="height" required>
                                    </div>
                                    <div>
                                        <label for="weight"><h5>Weight / kg</h5></label>
                                        <input type="number" id="weight" name="weight" required>
                                    </div>
                                    <div>
                                        <label for="age"><h5>Age</h5></label>
                                        <input type="number" id="age" name="age" required>
                                    </div>
                                    <div>
                                        <label for="gender"><h5>Gender</h5></label>
                                        <select id="gender" name="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="undefined">Undefined</option>
                                            <option value="Non-binary">Non-binary</option>
                                        </select>
                                    </div>
                                    <!-- Hidden input field to store BMI -->
                                    <input type="hidden" id="bmi" name="bmi">
                                    <button type="submit" class="cta-button" onclick="calculateBMI()">Calculate</button>
                                </form>




                                <div id="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
    <div class="footer-top">
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/ADDRESS-Logo.png" alt="Logo" style="width: 100px"></a>
            </p>
            <i class="fas fa-map-marker-alt"></i>
            <span>Cliffton Town, Rawalpipndi</span>
        </div>
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/NUMBER-Logo.png" alt="Logo"></a>
            </p>
            <i class="fas fa-phone-alt"></i>
            <span>125-711-811 | 125-668-886</span>
        </div>
        <div class="contact-item">
            <p><a href="#" class="logo-btn"><img src="images/MAIL-LOGO.png" alt="Logo"></a>
            </p>
            <i class="fas fa-envelope"></i>
            <span>getfit@gmail.com</span>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-logo">
            <img src="images/logo.png" alt="Gym Logo" style="width: 170px">
            <p>Join us to achieve your dream physique. With hardwork and<br>dedication everything is achieveable.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"; style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-twitter"  style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-youtube"  style="color: grey;"></i></a>
                <a href="#"><i class="fab fa-instagram" style="color: grey;"></i></a>
                <a href="#"><i class="fas fa-envelope" style="color: grey;"></i></a>
            </div>
        </div>

        <div class="footer-links">
            <h4>Useful links</h4>
            <ul style="color: grey";>
                <li><a href="About.html"  style="color: grey;">About</a></li>
                <li><a href="Regi.php" style="color: grey;">Blog</a></li>
                <li><a href="Regi.php" style="color: grey;">Classes</a></li>
                <li><a href="Regi.php" style="color: grey;">Contact</a></li>
            </ul>
        </div>
        <div class="footer-support">
            <h4>Support</h4>
            <ul style="color:grey";>
                <li><a href="login.php"  style="color: grey;;">Login</a></li>
                <li><a href="Regi.php"  style="color: grey;">My account</a></li>
                <li><a href="Regi.php"  style="color: grey;";>Subscribe</a></li>
                <li><a href="Regi.php"  style="color: grey;";>Contact</a></li>
            </ul>
        </div>
        <div class="footer-tips">
            <h4>Tips & Guides</h4>
            <ul>
                <li><a href="#">Physical fitness may help prevent depression, anxiety</a> <span>3 min read | 20 Comment</span></li>
                <li><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a> <span>3 min read | 20 Comment</span></li>
            </ul>
        </div>
    </div>
</footer>
<div class="footer">
    <p>&copy; 2024 Gym Management System. All rights reserved.</p>
</div>

<script>
    function calculateBMI() {
        var height = document.getElementById('height').value;
        var weight = document.getElementById('weight').value;

        // Perform BMI calculation
        var bmi = weight / ((height / 100) * (height / 100));

        // Update the value of the hidden input field
        document.getElementById('bmi').value = bmi;

        // Display the result
        var resultDiv = document.getElementById('result');
        resultDiv.innerHTML = "<h2>Your BMI: " + bmi.toFixed(2) + "</h2>";

        // Prevent form submission
        return false;
    }
</script>



    </body>
</html>



