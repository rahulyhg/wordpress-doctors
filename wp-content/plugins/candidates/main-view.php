<div class="row center-xs">
	<div class="col-sm-12">
		<div class="box">
			
			<div ng-app="myApp" ng-controller="candidatesCtrl"> 

				<table class="candidates-table">
					<tr>
					    <th ng-click="sortType = 'name'">Full name</th>
						<th ng-click="sortType = 'email'">Email</th>
						<th ng-click="sortType = 'phone'">Phone</th>
						<th ng-click="sortType = 'address'">Address</th>
						<th ng-click="sortType = 'marital_status'">Marital Status</th>
						<th ng-click="sortType = 'registration_date'">Registration date</th>
						<th ng-click="sortType = 'status'">Status</th>
						<th class="delete-heading">Delete</th>
					</tr>
				 	<tr ng-repeat="x in candidates | orderBy:sortType ">
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
						<td ng-click="deleteItem(x)" class="delete-action">X</td>
					</tr>
				</table>

			</div>

		</div>
	</div>
</div>
