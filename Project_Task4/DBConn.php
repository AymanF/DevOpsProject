<?php
	$ErrorMsgs = array();
	$DBConnect = new mysqli("localhost","root","", "efrei");
	if  (!$DBConnect)
		$ErrorMsgs[] = "The database server is not available.";
	else
		return 1;

?>
