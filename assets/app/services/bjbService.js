angular.module('bjbService',[])

.service('Kanwil',function($http){
	return{
		get:function(){
			return $http.get('../api/kanwil');
		},

		getById:function(id){
			return $http.get('../api/kanwilDetail/'+id);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/kanwil/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		save:function(data){
			return $http.post('../api/kanwil',data);
		},

		delete:function(id){
			return $http.delete('../api/kanwil/'+id);
		},
	}
})

.service('Cabang',function($http){
	return{
		get:function(){
			return $http.get('../api/cabang');
		},

		getById:function(id){
			return $http.get('../api/cabangDetail/'+id);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/cabang/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		save:function(data){
			return $http.post('../api/cabang',data);
		},

		delete:function(id){
			return $http.delete('../api/cabang/'+id);
		},
	}
})

.service('Kcp',function($http){
	return{
		get:function(){
			return $http.get('../api/kcp');
		},

		getById:function(id){
			return $http.get('../api/kcpDetail/'+id);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/kcp/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		save:function(data){
			return $http.post('../api/kcp',data);
		},

		delete:function(id){
			return $http.delete('../api/kcp/'+id);
		},
	}
})

.service('Posisi',function($http){
	return{
		get:function(){
			return $http.get('../api/posisi');
		},

		getById:function(id){
			return $http.get('../api/posisiDetail/'+id);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/posisi/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		save:function(data){
			return $http.post('../api/posisi',data);
		},

		delete:function(id){
			return $http.delete('../api/posisi/'+id);
		},
	}
})

.service('Fisiks',function($http){
	return{
		get:function(){
			return $http.get('../api/fisik');
		},

		getById:function(id){
			return $http.get('../api/fisikDetail/'+id);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/fisik/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		save:function(data){
			return $http.post('../api/fisik',data);
		},

		delete:function(id){
			return $http.delete('../api/fisik/'+id);
		}
	}
})

.service('Laporan',function($http){
	return{
		daftar:function(){
			return $http.get('../api/daftar');
		},

		daftarSave:function(data){
			return $http.post('../api/daftar',data);
		},

		daftarById:function(id){
			return $http.get('../api/daftarDetail/'+id);
		},

		daftarUpdate:function(id,data){
			return $http({
                method:'PUT',
                url:'../api/daftar/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		deleteDaftar:function(id){
			return $http.delete('../api/daftar/'+id);
		},

		listKcp(){
			return $http.get('../api/laporanKcp');
		}
	}
})

.service('Mcoa',function($http){
	return{
		getPosisi:function(id){
			return $http.get('../../api/categoryMcoaPosisi/'+id);
		},

		save:function(data){
			return $http.post('../../api/categoryMcoa',data);
		},

		update:function(id,data){
			return $http({
                method:'PUT',
                url:'../../api/categoryMcoa/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		delete:function(id){
			return $http.delete('../../api/categoryMcoa/'+id);
		},

		getById:function(id){
			return $http.get('../../api/categoryDetailMcoa/'+id);
		},

		getPosisiById:function(id){
			return $http.get('../../../api/categoryDetailMcoa/'+id);
		}
	}
})