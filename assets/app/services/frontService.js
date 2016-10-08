angular.module('frontService',[])

.service('Front',function($http){
	return{
		getKcp:function(){
			return $http.get('../api/kcp');
		},

		getCabang:function(){
			return $http.get('../api/cabang');	
		}
	}
})