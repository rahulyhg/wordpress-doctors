<?php
	
    $path = $_SERVER['DOCUMENT_ROOT'];
    if (strpos($path, 'benjamin400800.com') == true) {
		$path += $path."/doctors";
	}

	require_once $path . '/wp-config.php';
	require_once $path . '/wp-load.php';
	require_once $path . '/wp-includes/wp-db.php';
	require_once $path . '/wp-includes/pluggable.php';
	
	$table_name = $wpdb->prefix . "candidates";

	if($_POST) {
		$data = json_decode(file_get_contents("php://input"));
		try {
			$wpdb->update($table_name, array( 'status'=>($data->status == 0) ? 1 : 0 ), array('id'=>$data->id));
			echo $data->status;
		} catch (Exception $e) {
		    echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
    
?>