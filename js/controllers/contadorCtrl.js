app.controller("impressoraCtrl", function($scope, $http){
	$scope.contador;
	$scope.oldContador;

	var cont = {
		cont: 0,
		imp: 0
	};

	var imp = 0;
	var alert = false;
	$scope.adicionarContador = function($contador, $imp, unid){
		cont.cont = $scope.contador;
		cont.imp = $imp;

		$scope.oldContador = $contador;
		if($contador >= $scope.contador){
			alert = true;
		}else{
			alert = false;
			adicionar(cont, unid);
		}
	}

	adicionar = function(cont, unid){
		$http.post('controleView.php',cont).success(function(data){
			console.log(data);
		});
		$scope.contador = "";
		location.reload();
		location.href="index.php?unid="+unid;
	}

	$scope.mostraAlert = function(){
		return alert;
	}
});