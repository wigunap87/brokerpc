var appdatepicker = angular.module('appDate', ['angularjs-datetime-picker']);
appdatepicker.run(function($rootScope) {
	$rootScope.gmtDate = new Date('2015-01-01 00:00:00 -00:00');
});

/*angular.module('myApp',['angularjs-datetime-picker']);
angular.module('myApp').run(function($rootScope) {
	$rootScope.gmtDate = new Date('2015-01-01 00:00:00 -00:00');
});*/