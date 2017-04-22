var controllerPath = "/wp-content/plugins/candidates/controllers/candidates-controller.php";

var app = angular.module('myApp', []);
app.controller('candidatesCtrl', function($scope, $http) {

    $http.get(controllerPath)
    .then(function (response) {
    	$scope.candidates = response.data;
    });

    $scope.sortType = 'name';       // set the default sort type
    $scope.reverseValue = false;    // set the default reverse value

    $scope.getCandidates = function () {
        $http.get(controllerPath)
        .then(function (response) {
            $scope.candidates = response.data;
        });
    }

    $scope.updateStatus = function (x) {
    	$http({
    		url: controllerPath,
    		method: "POST",
            data: "id=" + x.id+"&status=" + x.status + "&action=updateStatus",
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

    $scope.deleteItem = function (x) {
        $http({
            url: controllerPath,
            method: "POST",
            data: "id=" + x.id + "&action=deleteItem",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        })
        .then(function (response) {
            console.log(response);
            $scope.getCandidates();
        },
        function(response) { // optional
            console.log(response)
        });
    }

    $scope.callDialog = function (obj, msg, functionName) {
        var action = confirm(msg);
        if (action) {
            if(functionName == "deleteItem") {
                $scope.deleteItem(obj);
            }
        } else {
            return false;
        }
    }

});