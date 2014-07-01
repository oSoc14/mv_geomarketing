<!doctype html>
<html lang="nl" ng-app="geom">

<head>
	<meta charset="utf-8">
	<title>GeoMarketing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body ng-controller="MainCtrl" ng-class="{'qr-active':qrActive}">
	<header>
		<div class="container">
			<h1><a href="#/forms">GeoMarketing</a></h1>
			<nav>
				<ul>
					<li><a href="#/actions" ng-class="{active:page=='actions'}">Vouchers</a></li>
					<li><a href="#/stores" ng-class="{active:page=='stores'}">Stores</a></li>
					<li><a href="#/account" ng-class="{active:page=='account'}">Account</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<div class="container">
			<div ng-view></div>
		</div>
	</main>
	<div class="qr-overlay" ng-click="qrActive=false"><canvas id="qrcode"></canvas></div>
	<script src="/js/alertify.min.js"></script>
	<script src="/js/qr.min.js"></script>
	<script src="/js/angular.min.js"></script>
	<script src="/js/angular-route.min.js"></script>
	<script src="/js/angular-touch.min.js"></script>
	<script src="/js/main.js"></script>
</body>

</html>
