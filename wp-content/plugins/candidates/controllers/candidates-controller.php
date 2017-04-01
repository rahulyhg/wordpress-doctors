<?php

    $path = $_SERVER['DOCUMENT_ROOT'];
    if (strpos($path, 'd400800') == true) {
		$path += $path."/doctors";
	}

	require_once $path . '/wp-config.php';
	require_once $path . '/wp-load.php';
	require_once $path . '/wp-includes/wp-db.php';
	require_once $path . '/wp-includes/pluggable.php';

	$table_name = $wpdb->prefix . "candidates";
    $result = $wpdb->get_results (" SELECT `id`, `name`, `surname`, `email`, `status`, `registration_date` FROM ".$table_name." ");
    
    echo json_encode($result);

?>