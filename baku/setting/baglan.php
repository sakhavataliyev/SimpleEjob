<?php
try {
	$db=new PDO("mysql:host=localhost; port=8111;dbname=ejob;charset=utf8",'root','12345678');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>
