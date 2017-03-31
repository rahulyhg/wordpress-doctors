<?php
    var_dump($_POST);
    $path = $_SERVER['DOCUMENT_ROOT'];

	require_once $path . '/wp-config.php';
	require_once $path . '/wp-load.php';
	require_once $path . '/wp-includes/wp-db.php';
	require_once $path . '/wp-includes/pluggable.php';
	
	$table_name = $wpdb->prefix . "candidates";
    $result = $wpdb->get_results (" SELECT `name`, `surname`, `email`, `status`, `registration_date` FROM ".$table_name." ");
    
	//$wpdb->update($table_name, array('status'=>$id), array('id'=>$id));

?>