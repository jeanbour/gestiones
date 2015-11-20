'use strict';

var Gestiones = angular.module('Gestiones', []);

Gestiones.controller('SearchCtrl', function ($scope, $http) {

	$scope.search = function () {

		$http.get('results', {
			params: {nombre: $scope.searchInput }
		}).success(function (data) {
			$scope.users = data;
		});

	}
});