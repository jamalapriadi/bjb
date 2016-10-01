angular.module('frontController',[])

.controller('kunjungan',function($scope,$timeout,Front){
	$scope.kcp={};
	$scope.cabang={};

    function getCabang(){
    	Front.getCabang()
    		.success(function(data){
    			$scope.cabang=data;
    		})
    }

    getCabang();
})