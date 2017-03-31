<?php
    global $wpdb;
    $table_name = $wpdb->prefix . "candidates";
    $result = $wpdb->get_results (" SELECT * FROM ".$table_name." ");
    
?>
	<div class="row center-xs">
		<div class="col-sm-12">
			<div class="box">
				
				<table class="candidates-table">
					<tr><th>Name</th><th>Surname</th><th>Email</th><th>Status</th></tr>
				    
				    <?php foreach ( $result as $print ): ?>
				    	<tr>
				    		<th><?=$print->name; ?></th>
				    		<th><?=$print->surname; ?></th>
				    		<th><?=$print->email; ?></th>
				    		<th><?=$print->status; ?></th>
				    	</tr>
					<?php endforeach; ?>
				</table>

			</div>
		</div>
	</div>

	<div ng-app="myApp" ng-controller="customersCtrl"> 

	<table>
	  <tr ng-repeat="x in names">
	    <td>{{ x.name }}</td>
	    <td>{{ x.surname }}</td>
	  </tr>
	</table>

	</div>
