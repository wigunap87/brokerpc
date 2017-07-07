app.controller('AutocompleteController', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
	$http.get('http://localhost/learn/tampilan_de/order/orderlist').success(function(data) {
		$scope.list = data;
		$scope.currentPage = 1;
		$scope.entryLimit = 5;
		$scope.filteredItems = $scope.list.length;
		$scope.totalItems = $scope.list.length;
	});
	
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	
	$scope.filter = function() {
		$timeout(function() {
			$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
}]);