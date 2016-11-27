angular.module('frontService',[])

.service('Front',function($http){
	return{
		getKcp:function(){
			return $http.post('../api/kcp');
		},

		getCabang:function(){
			return $http.post('../api/front_top_all');	
		},

		top_posisi:function(){
			return $http.post('../api/front_top_posisi');
		},

		top_kcp_posisi:function(data){
			return $http.post('../api/front_top_kcp_posisi',data);
		}
	}
})