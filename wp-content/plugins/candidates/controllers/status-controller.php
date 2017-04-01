<?php

	if($_POST) {
		$id = $_POST["id"];
		$status = $_POST["status"];
	}
	
    $path = $_SERVER['DOCUMENT_ROOT'];
    if (strpos($path, 'd400800') !== false) {
    	$path = $_SERVER['DOCUMENT_ROOT']."/doctors";
    }

	require_once $path . '/wp-config.php';
	require_once $path . '/wp-load.php';
	require_once $path . '/wp-includes/wp-db.php';
	require_once $path . '/wp-includes/pluggable.php';
	
	$table_name = $wpdb->prefix . "candidates";

	try {
		$wpdb->update($table_name, array( 'status'=>($status == 0) ? 1 : 0 ), array('id'=>$id));
		echo $status;
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
    
?>