app.controller('LoginController', ['$scope', '$http', function($scope, $http) {
	$scope.myLogin = function() {
		var stringdata = 'emailaddress=' + $scope._email + '&passwd=' + $scope._passwd;
		
		$http({
			method: 'POST',
			url: 'main/adminlogin',
			data: stringdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.success(function(data) {
			console.log(data);
			if(data.trim() === 'success') {
				window.location.href = 'dashboard';
			} else {
				$scope.errorMsg = 'Username and password do not match.';
			}
		});
		console.log($scope._email);
	}
}]);