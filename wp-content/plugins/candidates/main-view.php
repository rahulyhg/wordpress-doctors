<div class="row center-xs">
	<div class="col-sm-12">
		<div class="box">
			
			<div ng-app="myApp" ng-controller="candidatesCtrl"> 

				<table class="candidates-table">
					<tr>
					    <th ng-click="sortType = 'name'; reverseValue=false;">Full name</th>
						<th ng-click="sortType = 'email'; reverseValue=false;">Email</th>
						<th ng-click="sortType = 'phone'; reverseValue=false;">Phone</th>
						<th ng-click="sortType = 'address'; reverseValue=false;">Address</th>
						<th ng-click="sortType = 'marital_status'; reverseValue=false;">Marital Status</th>
						<th ng-click="sortType = 'registration_date'; reverseValue=true;">Registration date</th>
						<th ng-click="sortType = 'status'; reverseValue=false;">Status</th>
						<th class="delete-heading">Delete</th>
					</tr>
				 	<tr ng-repeat="x in candidates | orderBy : sortType : reverseValue ">
						<td>{{ x.name }} {{ x.surname }}</td>
						<td>{{ x.email }}</td>
						<td>{{ x.phone }}</td>
						<td>{{ x.address }}</td>
						<td>{{ x.marital_status }}</td>
						<td>{{ x.registration_date }}</td>
						<td>
							<span ng-click="updateStatus(x)" class="status-btn pending" ng-if='x.status==0'>Pending</span>
							<span ng-click="updateStatus(x)" class="status-btn approved" ng-if='x.status==1'>Approved</span>
						</td>
						<td ng-click="callDialog(x, 'Delete this entry?', 'deleteItem')" class="delete-action">
							<i></i>
							<i></i>
						</td>
					</tr>
				</table>

			</div>

		</div>
	</div>
</div>
