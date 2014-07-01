'use strict';


angular.module('geom', ['ngRoute', 'Voucher', 'Store'])
.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.when('/actions', {
			templateUrl: 'html/actions.html',
			controller: 'ActionsCtrl'
		});
		$routeProvider.when('/stores', {
			templateUrl: 'html/stores.html',
			controller: 'StoresCtrl'
		});
		$routeProvider.when('/account', {
			templateUrl: 'html/account.html',
			controller: 'AccountCtrl'
		});

		$routeProvider.otherwise({
			redirectTo: '/actions'
		});
	}
	])

// Main
.controller('MainCtrl', function($scope, $rootScope, $http, $location, Vouchers, Stores) {
	Vouchers.fetch().success(function(){
		$scope.vouchers = Vouchers.get();
	});
	Stores.fetch().success(function(){
		$scope.stores = Stores.get();
	});

	$scope.generateQr = function(id){
		$scope.qrActive = true;
		qr.canvas({
			canvas: document.getElementById('qrcode'),
			value: 'message',
			size: 10
		});
		return false;
	};
})

.controller('ActionsCtrl', function($scope, $rootScope) {
	$rootScope.page = 'actions';
	console.log('test')
})

.controller('StoresCtrl', function($scope, $rootScope) {
	$rootScope.page = 'stores';
	console.log('test')
})


.controller('VoucherCtrl', function($scope, $rootScope, $location) {
	$rootScope.page = 'detail';
	console.log('test')
})


.controller('AccountCtrl', function($scope, $rootScope, $location) {
	$rootScope.page = 'account';
	console.log('test')
})

/* Modules */

angular.module('Voucher', [])
.factory('Vouchers', function($http) {
	var all = [];
	return {
		fetch: function() {
			return $http.get('posts.json').success(function(d) {
				all = angular.copy(d);
			});
		},
		get: function() {
			return all;
		},
		have: function() {
			return all.length > 0;
		}
	};
});

angular.module('Store', [])
.factory('Stores', function($http) {
	var all = [];
	return {
		fetch: function() {
			return $http.get('http://localhost:8000/api/stores').success(function(d) {
				all = angular.copy(d);
				Alertify.log.success('Stores fetched');
			});
		},
		get: function() {
			return all;
		},
		have: function() {
			return all.length > 0;
		}
	};
});
