var ourLocation = window.location.href;
var controllerPath = ( ourLocation.indexOf("benjamin400800.com") == -1 ) ? "/wp-content/plugins/candidates/controllers/" : "/doctors/wp-content/plugins/candidates/controllers/";
console.log(controllerPath)

var app = angular.module('myApp', []);
app.controller('candidatesCtrl', function($scope, $http) {

    $http.get(controllerPath+"candidates-controller.php")
    .then(function (response) {
    	$scope.candidates = response.data;
    });

    $scope.sortType = 'name'; // set the default sort type

    $scope.updateStatus = function (x) {
    	$http({
    		url: controllerPath+'status-controller.php',
    		method: "POST",
    		// data: { 'id' : x.id, 'status' : x.status },
            data: "id=" + x.id+"&"+"status=" + x.status,
    		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    	})
	    .then(function (response) {
            console.log(response);
	    	(x.status == 0) ? x.status = 1 : x.status = 0;
	    },
	    function(response) { // optional
	    	console.log(response)
	    });
    }

});