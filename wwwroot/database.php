<html>
 <head>
  <title>PHP Accessing Web Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="carpark.css">

  <style type="text/css">
   table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #011640;
    color: white;
}
  </style>
 </head>
 <body>
<hr>
<hr>
<hr>
 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html"><img src="images/DCU-logo-main_1.png" alt="Smaller DCU main logo"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     
    </ul>
  </div>
</nav>

   <h1>CA377 Park@DCU real-time availability web service</h1>

<?php
/* Make connection to your database on student.computing.dcu.ie here */
/* YOUR CODE GOES HERE */
	$servername = "student.computing.dcu.ie";
$username = "user2986";
$password = "pw9326";
$dbname =  "project45";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully  ";

/* Identify which query number has been called */
$queryNumber = $_GET['query'];
switch ($queryNumber) {  // What is a switch statement? - http://php.net/manual/en/control-structures.switch.php
  case "q1":
    echo "<p>Query 1</p>";
    /* First make the SQL string using the $_GET['facility'] value, then call the database to get the answer */
    /* YOUR CODE GOES HERE */

$var = $_GET['facility'];      
$sql = "SELECT Name From `CarparkData` WHERE `Nearby facilities` LIKE '%$var%'";
$result = $conn->query($sql);

    // This example output table is for query 1,
    // the other queries will have different numbers of columns and rows and different headings
    //echo "<p id='sql'>".$sql."</p>";  //where $SQL is the query you used to access your database
    echo "<table>";
    echo "   <th>Carpark</th>";
    while ($row = $result ->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"] . "</tr></td>";
      }
    echo "</table>";
    break;


  case "q2":
  echo "<p>Query 2</p>";
  $type = $_GET['spaceType'];
  $sql = "SELECT Campus, SUM(`$type`) AS 'Number of spaces' FROM CarparkData GROUP BY Campus";
  $result = $conn->query($sql);

      //echo "<p id='sql'>".$sql."</p>";  //where $SQL is the query you used to access your database
      echo "<table>";
      echo "   <th>Carpark</th><th>Number of Spaces</th>";
      while ($row = $result ->fetch_assoc()) {
          echo "<tr><td>" . $row["Campus"] . "</td><td>" . $row["Number of spaces"] . "</td></tr>";
        }
      echo "</table>";
      break;


  case "q3":
    echo "<p>Query 3</p>";
    $park = $_GET['carpark'];
    $sql = "SELECT `Car Park Name`, `col15` FROM CarparkHistory WHERE `Car Park Name` LIKE '%$park%' AND `Week of Yr`='10'";
    $result = $conn->query($sql);

       // echo "<p id='sql'>".$sql."</p>";  //where $SQL is the query you used to access your database
        echo "<table>";
        echo "   <th>Carpark</th><th>Occupation at 3 PM</th>";
        while ($row = $result ->fetch_assoc()) {
            echo "<tr><td>" . $row["Car Park Name"] . "</td><td>" . $row["col15"] . "</td></tr>";
          }
        echo "</table>";
        break;


  case "q4":
    echo "<p>Query 4</p>";
  $time = $_GET['time'];
  $sql = "SELECT `CarparkData`.`Name`,`CarparkData`.`Campus` FROM CarparkData INNER JOIN `CarparkHistory` ON `CarparkData`.`Name` = `CarparkHistory`.`Car Park Name` WHERE `CarparkData`.`Available for` LIKE '%general public%' AND `CarparkHistory`.`Week of Yr`='39' AND `CarparkHistory`.`$time`";
  $result = $conn->query($sql);

    //  echo "<p id='sql'>".$sql."</p>";  //where $SQL is the query you used to access your database
      echo "<table>";
      echo "   <th>Carpark</th><th>Campus</th>";
      while ($row = $result ->fetch_assoc()) {
          echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Campus"] . "</td></tr>";
        }
      echo "</table>";
  break;
}

 ?>

  </body>
 </html>