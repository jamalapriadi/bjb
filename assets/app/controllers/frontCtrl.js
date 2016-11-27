angular.module('frontController',[])

.controller('kunjungan',function($scope,$timeout,Front){
	$scope.kcp={};
	$scope.cabangs={};
	$scope.posisis={};
	$scope.topPosisi={};

    function getCabang(){
    	Front.getCabang()
    		.success(function(data){
				console.log(data);
    			$scope.cabangs=data.top_kcp;
    		})
    }

    getCabang();

	$scope.get_top_posisi=function(){
		Front.top_posisi()
			.success(function(data){
				$scope.posisis=data;
				$scope.topPosisi=data.kcp;
			})
			.error(function(data){
				alert('data tidak ada');
			})
	}

	$scope.top_kcp_posisi=function(id){
		var data={id:id};
		Front.top_kcp_posisi(data)
			.success(function(data){
				$scope.topPosisi=data;
			})
	}
})