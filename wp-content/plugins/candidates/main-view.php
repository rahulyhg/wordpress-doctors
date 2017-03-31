<?php
    global $wpdb;
    $table_name = $wpdb->prefix . "candidates";
    $result = $wpdb->get_results (" SELECT * FROM ".$table_name." ");
    
?>
	<div class="row center-xs">
		<div class="col-sm-12">
			<div class="box">
				
				<div ng-app="myApp" ng-controller="candidatesCtrl"> 

					<table class="candidates-table">
						<tr>
						    <th ng-click="sortType = 'name'">Name</th>
							<th ng-click="sortType = 'surname'">Surname</th>
							<th ng-click="sortType = 'email'">Email</th>
							<th ng-click="sortType = 'registration_date'">Registration Date</th>
							<th ng-click="sortType = 'status'">Status</th>
						</tr>
					 	<tr ng-repeat="x in candidates | orderBy:sortType ">
							<td>{{ x.name }}</td>
							<td>{{ x.surname }}</td>
							<td>{{ x.email }}</td>
							<td>{{ x.registration_date }}</td>
							<td>
								<span ng-click="updateStatus(x)" class="status-btn pending" ng-click="x.status = 1" ng-if='x.status==0'>Pending</span>
								<span class="status-btn approved" ng-click="x.status = 0" ng-if='x.status==1'>Approved</span>
							</td>
						</tr>
					</table>

				</div>

			</div>
		</div>
	</div>
