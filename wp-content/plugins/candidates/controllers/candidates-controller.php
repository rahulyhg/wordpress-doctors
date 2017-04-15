<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    
    if (strpos($path, 'd400800') !== false) {
        $path = $_SERVER['DOCUMENT_ROOT']."/doctors";
    }

    require_once $path . '/wp-config.php';
    require_once $path . '/wp-load.php';
    require_once $path . '/wp-includes/wp-db.php';
    require_once $path . '/wp-includes/pluggable.php';

    $table_name = $wpdb->prefix . "candidates";

    
    if( !empty($_POST) ) {

        switch ($_POST["action"]) {
            case 'updateStatus':
                $id = $_POST["id"];
                $status = $_POST["status"];
                try {
                    $wpdb->update($table_name, array( 'status'=>($status == 0) ? 1 : 0 ), array('id'=>$id));
                    echo $status;
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                break; 
            case 'deleteItem':
                $id = $_POST["id"];
                try {
                    $wpdb->update($table_name, array( 'deleted'=> 1 ), array('id'=>$id));
                    // $wpdb->delete( $table_name, array( 'id' => $id ) );
                    echo $id;
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                break;           
            default:
                echo "Something went wrong";
                break;
        }

    } else {
        $result = $wpdb->get_results (" SELECT * FROM $table_name WHERE `deleted` = 0 ");
        echo json_encode($result);
    }




?>