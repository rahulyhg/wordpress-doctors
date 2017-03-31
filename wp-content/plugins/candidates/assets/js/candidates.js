var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    // $http.get("/doctors/wp-content/plugins/candidates/controllers/candidates-controller.php")
    $http.get("/wp-content/plugins/candidates/controllers/candidates-controller.php")
    .then(function (response) {$scope.names = response.data;});
});