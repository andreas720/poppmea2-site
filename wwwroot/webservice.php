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
    // Call the carpark webservice to get the spaces available for $_GET['carpark']
      $data = array(
     'http'=>array(
         'ignore_errors'=> true
     )
   );

   $context = stream_context_create($data);

  
   $json = file_get_contents('http://suzannelittle.pythonanywhere.com/carpark/'.$_GET['carpark'],false, $context);

 // Process the JSON and check for errors
   $jsonArray = json_decode($json,true);

   if(isset($jsonArray["error_num"])){

     // Get the values for $error_num and $error_msg
     $error_num = $jsonArray['error_num'];
     $error_msg = $jsonArray['error_msg'];

     echo "<!-- CA377 Error handling -->";
     echo "<p>Error: " . $error_num . " " . $error_msg;
   } else {
     // Get the values for $carpark, $timestamp and $spaces
     $timestamp = $jsonArray['timestamp'];
     $carpark = $jsonArray['carpark_name'];
     $spaces = $jsonArray['spaces_available'];

     function is_decimal($spaces)
{
    return is_numeric( $spaces ) && floor( $spaces ) != $spaces;
}

     if ($spaces < 0){
       echo "Error 1: A minus figure is causing an error as it's impossible to have a minus number of carpark spaces.";
     } else if (isset($jsonArray["muppet"])){
       echo "Error 2: A muppet is causing an error.";
     } else if (is_decimal($spaces) == true){
       echo "Error 3: The number of spaces is a decimal number and cannot be accepted.";
     }
     else {
     echo "<!-- CA377 Reading JSON -->";
     echo " <table>";
     echo "   <th>Carpark</th><th>Time</th><th>Spaces</th>";
     echo "   <tr><td>" . $carpark . "</td><td>" . $timestamp . "</td><td>" . $spaces . "</td></tr>";
     echo "</table>"; }

     }
   ?>

 </body>
</html>
