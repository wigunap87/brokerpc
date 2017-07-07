app.controller('AddfieldController', ['$scope', function($scope) {
	$scope.pilihan = [{id: 'choice1'}, {id: 'choice2'}];
	
	$scope.addNewChoice = function() {
		var newItemNo = $scope.pilihan.length+1;
		$scope.pilihan.push({'id': 'choise'+newItemNo});
	};
	
	$scope.removeChoice = function() {
		var lastItem = $scope.pilihan.length-1;
		$scope.pilihan.splice(lastItem);
	};
	
	$scope.chosell = [{id: 'chosell1'}, {id: 'chosell2'}];
	
	$scope.addNewSell = function() {
		var newItemNoSell = $scope.chosell.length+1;
		$scope.chosell.push({'id': 'choise'+newItemNoSell});
	};
	
	$scope.removeSell = function() {
		var lastItemSell = $scope.chosell.length-1;
		$scope.chosell.splice(lastItemSell);
	};
}]);