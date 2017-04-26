<?php

    $path = $_SERVER['DOCUMENT_ROOT'];
    if (strpos($path, 'd400800') !== false) {
    	$path = $_SERVER['DOCUMENT_ROOT']."/doctors";
    }

	require_once $path . '/wp-config.php';
	require_once $path . '/wp-load.php';
	require_once $path . '/wp-includes/wp-db.php';
	require_once $path . '/wp-includes/pluggable.php';

	if (!empty($_POST)) {
		$name 			= (isset($_POST["your-name"])) ? $_POST["your-name"] : "no name";
		$token 			= (isset($_POST["user-token"])) ? $_POST["user-token"] : null;
		$surname 		= (isset($_POST["your-surname"])) ? $_POST["your-surname"] : "no surname";
		$email 			= (isset($_POST["your-email"])) ? $_POST["your-email"] : "no email";
		$phone 			= (isset($_POST["your-phone"])) ? $_POST["your-phone"] : "no phone";
		$address 		= (isset($_POST["your-address"])) ? $_POST["your-address"] : "no address";
		$maritalStatus 	= (isset($_POST["marital-status"])) ? $_POST["marital-status"] : "marital-status";
	}

	$table_name = $wpdb->prefix . "candidates";

	try {
		$wpdb->insert($table_name, array( 'name'=>$name, 'surname'=>$surname, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'marital_status'=>$maritalStatus, 'token'=>$token ));
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>