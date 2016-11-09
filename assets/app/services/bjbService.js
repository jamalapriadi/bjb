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
		},

		get_by_kcp:function(id){
			return $http.get('../../api/fisik_by_kcp/'+id);
		},

		save_by_kcp:function(data){
			return $http.post('../../api/fisik_by_kcp',data);
		},

		get_by_id_fisik:function(id){
			return $http.get('../../api/get_by_id_fisik/'+id);
		},

		update_by_kcp:function(id,data){
			return $http({
                method:'PUT',
                url:'../../api/fisik_by_kcp/'+id,
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                data:$.param(data)
            });
		},

		delete_by_kcp:function(id){
			return $http.delete('../../api/delete_by_kcp/'+id);
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
		getPosisi:function(id,jenis){
			return $http.get('../../api/categoryMcoaPosisi/'+id+'/'+jenis);
		},

		save:function(data){
			return $http.post('../../api/categoryMcoa',data);
		},

		categoryMcoaPosisi:function(data){
			return $http.post('../../../api/categoryMcoaPosisinya',data);
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
		},

		deleteParameter:function(id){
			return $http.delete('../../../api/deleteParameter/'+id);
		},

		/* fisik */
		getFisikPosisi:function(id,jenis){
			return $http.get('../../api/categoryFisikMcoaPosisi/'+id+'/'+jenis);	
		},

		saveFisik:function(data){
			return $http.post('../../api/categoryFisikMcoa',data);	
		},

		getFisikById:function(id){
			return $http.get('../../api/categoryFisikDetailMcoa/'+id);
		},

		getFisikId:function(id){
			return $http.get('../../../api/categoryFisikDetailMcoa/'+id);
		},

		categoryMcoaFisik:function(data){
			return $http.post('../../../api/categoryMcoaFisiknya',data);
		},
	}
})

.service('Staff',function($http){
	return {
		get_by_kcp:function(id){
			return $http.get('../../api/staff/'+id);
		},

		getById:function(id){
			return $http.get('../../api/staffDetail/'+id);
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
			return $http.delete('../../api/staff/'+id);
		}
	}
})

.service('Report',function($http){
	return {
		staf_kcp_get(id){
			return $http.get('../../api/report_staff_kcp/'+id);
		},

		fisik_kcp_get(id){
			return $http.get('../../api/report_fisik_kcp/'+id);	
		},

		getKcpById:function(id){
			return $http.get('../../api/report_by_kcp/'+id);
		},

		delete_file_report_kcp:function(id){
			return $http.delete('../../api/delete_file_report_kcp/'+id);
		},

		report_staff_by_person:function(id){
			return $http.get('../../api/report_staff_by_person/'+id)
		},

		report_fisik_by_kcp:function(fisik,kcp){
			return $http.get('../../../api/report_fisik_by_kcp/'+fisik+'/'+kcp)
		}
	}
})