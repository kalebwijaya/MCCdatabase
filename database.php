<?php
	header("Access-Control-Allow-Origin: *");
	$server = "sql12.freemysqlhosting.net";
	$name = "sql12214609";
	$username = "sql12214609";
	$password = "tpkdEAGJeb";

	$connection = mysqli_connect($server,$username,$password,$name);

	if ($_REQUEST) {
		$search_query = $_REQUEST['q'];
		$query_result = $connection->query("SELECT * FROM `books table` WHERE title LIKE '%$search_query%' ");
	}else{
		$query_result = $connection->query("SELECT * FROM `books table`");
	}

	$books = [];
	$counter = 0;
	$book = new stdClass();

	while($data = $query_result->fetch_assoc()){
		$books[] = $data;
		$counter = $counter +1;
	}

	$book->counts = $counter;
	$book->books = $books;

	header('Content-Type: application/json');
	print json_encode($book);
?>
