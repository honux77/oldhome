<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="assets/ico/favicon.ico">

	<title>Honux Academy</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<?php include 'db.php'; ?>

<!-- start body page -->
	<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="#">Honux.net</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="#">Home</a></li>
		<li><a href="http://honux77.wordpress.com">Blog</a></li>
		<li><a href="lecture.php">Lecture</a></li>
		</ul>
	</div><!--/.nav-collapse -->
	</div>
	</nav>

	<!-- jumpotron -->
	<div class="jumbotron">
	<div class="container">
	<h1>Hello, code. </h1>
<?
if ($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT msg FROM welcome where page='index'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<p>" .$row["msg"]. "</p>\n";
	}
} else {
	echo "Honux Home: DBMS Error";
}
?>
</div>
	</div>

	<!-- courses' info -->
	<div class="container">
	<div class="row">
	<!-- course template form
	<div class="col-md-4"> 
	<h2>데이터베이스 베이직</h2>
	<p>짱짱 재미있는 데이터베이스 베이직</p>
	<a class="btn btn-default" href="#" role="button">
	바로가기»</a>
	</div>
	-->
<?
$sql = "SELECT title,detail,type, udate,link FROM main order by udate desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<h3>" .$row["udate"]." ".$row["title"] ."</h3>\n";
		echo "<p>" .$row["detail"]. "</p>\n";
		echo '<a class="btn btn-sm btn-info" href="'.$row["link"];
		echo '" role="button">';
		echo $row['type']."</a>\n";
		echo "<p><hr>\n";
	}
} else {
	echo "Honux Home: DBMS Error";
}
?>
</div> 
	</div>

<?
$conn->close();
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
