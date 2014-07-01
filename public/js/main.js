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
	$scope.user = {
		name:'Michiel De Wilde',
		lat: 50.82,
		long: 3.22
	};

	$scope.generateQr = function(msg){
		$scope.qrActive = true;
		qr.canvas({
			canvas: document.getElementById('qrcode'),
			value: msg,
			size: 10
		});
		return false;
	};
	$scope.getDiff = function(lat,lng){
		return getDistanceFromLatLon(lat,lng,$scope.user.lat,$scope.user.long);
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
			return $http.get('/api/coupons').success(function(d) {
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
				angular.forEach(function (post) {
					post.liked = 0;
					console.log(post);
				});
				if(all[6])
					all[6].liked = 1;
				if(all[1])
					all[1].liked = 1;
				if(all[3])
					all[3].liked = 1;
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



function getDistanceFromLatLon(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = Math.round(R * c * 1000); // Distance in m
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
