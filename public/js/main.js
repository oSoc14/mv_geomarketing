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
		$routeProvider.when('/forms', {
			templateUrl: 'html/forms.html',
			controller: 'FormCtrl'
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
	$scope.storePredicate = 'liked';
	$scope.user = {name:'Michiel De Wilde'};

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
})

.controller('StoresCtrl', function($scope, $rootScope) {
	$rootScope.page = 'stores';
})

.controller('VoucherCtrl', function($scope, $rootScope, $location) {
	$rootScope.page = 'detail';
})

.controller('AccountCtrl', function($scope, $rootScope, $location) {
	$rootScope.page = 'account';
})

.controller('FormCtrl', function($scope, $rootScope, $http) {
	$rootScope.page = 'forms';

	$scope.newVoucher = function(data){
		console.log(data)
		return $http.post('/api/coupons/', data).success(function(d) {
		console.log(d)
			Alertify.log.success('posted');
		});
	};

	$scope.newStore = function(data){
		console.log(data)
		return $http.post('/api/stores/', data).success(function(d) {
		console.log(d)
			Alertify.log.success('posted');
		});
	};
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
			return $http.get('/api/stores').success(function(d) {
				all = angular.copy(d);
				all[6].liked = true;
				all[1].liked = true;
				all[3].liked = true;
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
