app.directive('alertContadores', function(){
	return {
		templateUrl: 'theme/alertContadores.php',
		replace: true,
		scope: {
			title: '@'
		},
		transclude: true
	}
});