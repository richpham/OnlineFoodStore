<html>
<head>
<title> Login</title>
</head>

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #32CD32;
}

.navbar a {
  float: left;
  font-size: 18px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 18px;
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: right;
  width: 30%;
  background: #f1f1f1;
}

form.example button {
  float: right;
  width: 5%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
form {
  text-align: center;
}
.tab {position:absolute;left:150px; }
</style>
<body style="background-color:Cornsilk;">

    <a href="homepage.php">
      <img src="logo.png" alt="Logo" width="350" height="350">
    </a>

<form class="example" action="/action_page.php">
  <button type="submit">Search<i class="fa fa-search"></i></button>
  <input type="text" placeholder="Search products.." name="search">

</form>
<a href="cart.php">
<img align="right" border="0" alt="cart" src="cart-logo.png" width="50" height="50">
</a>


<div class="dropdown" style="float:right;">
  <img src="login logo.png" alt="Log" width="50" height="50" align="left">
  <button class="dropbtn">Log In/ Sign Up</button>

  <div class="dropdown-content">
  <a href="login.php">Sign In</a>
  <a href="create-account.php">Create Account</a>

  </div>
</div>
<div class="navbar" style:"float:middle;">
<a href="homepage.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Shop
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="fruits.php">Fruits</a>
      <a href="Vegetable.php">Vegetables</a>

    </div>
  </div>

  <a href="delivery.php">Delivery</a>
  <a href="about_us.php">About Us</a>
</div>
<br>
<br>
<br>
<h3 style="text-align:center" ><p>Please input username and password</span></p></h3>
<br>

<form action="/login.php" method="post">
<input type="text" name="username">

<input type="password" name="password">

<input type="submit">
</form>


<?php
$logged_in = false;
if (isset($_POST["username"]) && isset($_POST["password"])) {
if ($_POST["username"] && $_POST["password"]) {
$username = $_POST["username"];
$password = $_POST["password"];
// create connection
$conn = mysqli_connect("localhost", "root", "", "users");
// check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// register user
$sql = "SELECT password FROM customers WHERE username = '$username'";
$results = mysqli_query($conn, $sql);
if ($results) {
$row = mysqli_fetch_assoc($results);
if ($row["password"] === $password) {
$logged_in = true;
 echo "Welcome " . $_POST["username"];
 echo" Redirecting to the home page now...";
$sql = "SELECT * FROM customers";
$results = mysqli_query($conn, $sql);
header("refresh:5;url=http://localhost/homepage.php");

} else {
echo "user name or password incorrect";
}
} else {
echo mysqli_error($conn);
}
mysqli_close($conn); // close connection
} else {
echo "Nothing was submitted.";
}
}
?>

</body>
</html>
