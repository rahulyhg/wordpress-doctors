var app = angular.module('myApp', []);
app.controller('candidatesCtrl', function($scope, $http) {
	
	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $http.get("/wp-content/plugins/candidates/controllers/candidates-controller.php")
    .then(function (response) {
    	$scope.candidates = response.data;
    });

    $scope.sortType = 'name'; // set the default sort type

    $scope.updateStatus = function (x) {
    	console.log(x.id)
    	$http({
    		url: '/wp-content/plugins/candidates/controllers/status-controller.php',
    		method: "POST",
    		data: { 'id' : x.id }
    	})
	    .then(function (response) {
	    	console.log(response)
	    },
	    function(response) { // optional
	    	console.log(response)
	    });
    }

});