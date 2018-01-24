<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parking at DCU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="carpark.css">
<script>
function validateForm() {
    var x = document.forms["webService"]["carpark"].value;
    if (x == "") {
        alert("Carpark name must be filled out");
        return false;
    }
}
</script>
  <style>
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html"><img src="images/DCU-logo-main_1.png" alt="Smaller DCU main logo"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
     
    </ul>
  </div>
</nav>


  <hr> 
    <hr> 

    <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/278A5630.jpg" alt="DCU picture" width="460" height="345">
      </div>

      <div class="item">
        <img src="images/CU0A4551.jpg" alt="DCU picture" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="images/DCU_logo_2col.jpg" alt="DCU picture" width="460" height="345">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>

      <hr>
      <h2>"Real-time" availability</h2>
<form name="webService" action="webservice.php" onsubmit="return validateForm()" method="get">
Carpark: <input type="text" name="carpark"><br>
<input type="submit">
</form>
<hr/>

<h2>Carpark Information at DCU</h2>
<!-- example web form for A3 query 1 -->
<form action="database.php" method="get">
  <p>Best carpark for facility:
    <select name="facility">
      <option value="helix">Helix</option>
      <option value="business">Business</option>
      <option value="main reception">Main reception</option>
      <option value="creche">Creche</option>
      <option value="1838">1838</option>
      <option value="invent">Invent</option>
      <option value="library">Library</option>
      <option value="gardens">Gardens</option>
      <option value="sports grounds">Sports grounds</option>
      <option value="met eireann">Met Eireann</option>
    </select>
  </p>
  <input name="query" value="q1" type="hidden"/>
  <input type="submit">
</form>

<!-- Form for A3 query 2 GOES HERE -->
<form action="database.php" method="get">
<p>Types of parking on each campus and amount:
	<select name="spaceType">
      <option value="Number of spaces">Total Parking</option>
      <option value="Number of disabled spaces">Disabled Parking</option>
    </select>
  </p>
  <input name="query" value="q2" type="hidden"/>
  <input type="submit">
</form>

<!-- Form for A3 query 3 GOES HERE -->
<form action="database.php" method="get">
  <p>Occupation of a Carpark in Week 10 at 3pm:
    <select name="carpark">
      <option value="multistorey">Multistorey</option>
      <option value="creche">Creche</option>
      <option value="invent">Invent</option>
      <option value="library">Library</option>
      <option value="st pats">St Pats</option>
	  <option value="dcu alpha">DCU Alpha</option>
    </select>
  </p>
  <input name="query" value="q3" type="hidden"/>
  <input type="submit">
</form>

<!-- Form for A3 query 4 GOES HERE -->

<form action="database.php" method="get">
  <p>General member of the public parking location on 26th of September 2016 at:
    <select name="time">
      <option value="col7">7am</option>
      <option value="col8">8am</option>
      <option value="col9">9am</option>
      <option value="col10">10am</option>
      <option value="col11">11am</option>
      <option value="col12">12pm</option>
      <option value="col13">1pm</option>
      <option value="col14">2pm</option>
      <option value="col15">3pm</option>
      <option value="col16">4pm</option>
      <option value="col17">5pm</option>
      <option value="col18">6pm</option>
      <option value="col19">7pm</option>
      <option value="col20">8pm</option>
      <option value="col21">9pm</option>
    </select>
  </p>
  <input name="query" value="q4" type="hidden"/>
  <input type="submit">
</form>
      <hr>
    </div>
 
  </div>
</div>

<footer class="footer">
   <div class="container text-center">
    <p>Copyright Andreas Poppmeier</p>

</footer>

</body>
</html>