angular.module('bjbController',[])

.controller('kanpus',function($scope,$timeout){
    
})

.controller('kanwil',function($scope,$timeout,Kanwil){
	$scope.hasils=[];
	$scope.form_title="";
    $scope.newForm={};

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kanwil.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kota";
                $scope.newForm={nama:''}
                break;
            case "edit":
                $scope.form_title="Update Kota";
                Kanwil.getById(id)
                    .success(function(data){
                        $scope.newForm.nama=data.kanwil.nama_kanwil;
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                $scope.loading=true;
                $scope.newForm={nama:$scope.newForm.nama};
                Kanwil.save(this.newForm)
                    .success(function(data){
                        console.log(data);
                        console.log(this.newForm);
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                break;
            case 'edit':
                console.log(id);
                $scope.loading=true;
                Kanwil.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.detail=function(id){
        Kanwil.getById(id)
            .success(function(data){
                $scope.details=data;
            })
        $("#myModalDetail").modal('show');
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Kanwil.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('cabang',function($scope,$timeout,Cabang,Kanwil){
	$scope.hasils=[];
	$scope.kanwil=[];
    $scope.list=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Cabang.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    function getKanwil(){
        $scope.list=[];
        Kanwil.get()
            .success(function(data){
                $scope.list=data;
            })
    }

    get();

    $scope.select2Options = {
        allowClear:true
    };

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        getKanwil();

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Cabang";
                $scope.newForm={kanwil:'',nama:''}

                break;
            case "edit":
                $scope.form_title="Update Cabang";
                Cabang.getById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.cabang.nama_cabang,'kanwil':data.cabang.id_kanwil};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                $scope.loading=true;
                Cabang.save(this.newForm)
                    .success(function(data){
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                break;
            case 'edit':
                $scope.loading=true;

                Cabang.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.detail=function(id){
        Cabang.getById(id)
            .success(function(data){
                $scope.details=data;
            })

        $("#myModalDetail").modal('show');
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Cabang.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('kcp',function($scope,$timeout,Kcp,Upload,Cabang){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kcp.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();

    function getCabang(){
        $scope.list=[];
        Cabang.get()
            .success(function(data){
                $scope.list=data;
            })
    }

    $scope.select2Options = {
        allowClear:true
    };

    function awal(){
        $("#myModal").modal("hide");
        $scope.loading=false;
        $scope.newForm={};
        get();
        tampilPesan();
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        getCabang();

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah KCP";
                $scope.newForm={cabang:'',nama:'',alamat:'',telp:'',fax:'',username:'',password:''}

                break;
            case "edit":
                $scope.form_title="Update KCP";
                Kcp.getById(id)
                    .success(function(data){
                        $scope.newForm={cabang:data.id_cabang,nama:data.nama_kcp,alamat:data.alamat_kcp,telp:data.telp_kcp,fax:data.fax_kcp,username:data.username,password:data.password,foto_kcp:data.foto_kcp};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id,file){
        switch(modalstate){
            case "tambah":
                $scope.loading=true;
                /*
                Kcp.save(this.newForm)
                    .success(function(data){
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                */

                // upload on file select or drop
                file.upload = Upload.upload({
                  url: '../api/kcp',
                  data: {
                        nama: $scope.newForm.nama,
                        cabang:$scope.newForm.cabang, 
                        alamat:$scope.newForm.alamat,
                        telp:$scope.newForm.telp,
                        fax:$scope.newForm.fax,
                        username:$scope.newForm.username,
                        password:$scope.newForm.password,
                        file: file
                    },
                });

                file.upload.then(function (response) {
                    awal();
                    $timeout(function () {
                        file.result = response.pesan;
                    });
                }, function (response) {
                    awal();
                    if (response.success > 0)
                        $scope.errorMsg = response.success + ': ' + response.pesan;
                }, function (evt) {
                    // Math.min is to fix IE which reports 200% sometimes
                    file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                });
                break;
            case 'edit':
                $scope.loading=true;
                
                file.upload = Upload.upload({
                  url: '../api/updateKcp/',
                  method:'post',
                  data: {
                        kode:id,
                        nama: $scope.newForm.nama,
                        cabang:$scope.newForm.cabang, 
                        alamat:$scope.newForm.alamat,
                        telp:$scope.newForm.telp,
                        fax:$scope.newForm.fax,
                        username:$scope.newForm.username,
                        password:$scope.newForm.password,
                        file: file
                    },
                });


                file.upload.then(function (response) {
                    awal();
                    $timeout(function () {
                        file.result = response.pesan;
                    });
                }, function (response) {
                    awal();
                    if (response.success > 0)
                        $scope.errorMsg = response.success + ': ' + response.pesan;
                }, function (evt) {
                    // Math.min is to fix IE which reports 200% sometimes
                    file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                });

                /*
                Kcp.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                    */
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.detail=function(id){
        $scope.detailForm={};

        getCabang();

        Kcp.getById(id)
            .success(function(data){
                $scope.detailForm={cabang:data.id_cabang,nama:data.nama_kcp,alamat:data.alamat_kcp,telp:data.telp_kcp,fax:data.fax_kcp,username:data.username,password:data.password,foto_kcp:data.foto_kcp};
            })

        $("#myModalDetail").modal('show');
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Kcp.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };

    $scope.uploadPic = function(file) {
        file.upload = Upload.upload({
            url: 'http://api.panturaweb.com/alumni/public/api/registrasi',
            data: {
                username: $scope.username,
                email:$scope.email, 
                nama:$scope.nama,
                gender:$scope.gender,
                password:$scope.password,
                password_confirmation:$scope.password_confirmation,
                tahun:$scope.tahun,
                jurusan:$scope.jurusan,
                kelas:$scope.kelas,
                lat:$scope.lat,
                lng:$scope.lng,
                file: file
            },
        });

        file.upload.then(function (response) {
            awal();
            $timeout(function () {
                file.result = response.data;
            });
        }, function (response) {
            awal();
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }
})

.controller('posisi',function($scope,$timeout,Posisi){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Posisi.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Posisi";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Update Posisi";
                Posisi.getById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.posisi.nama_posisi};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                $scope.loading=true;
                Posisi.save(this.newForm)
                    .success(function(data){
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                break;
            case 'edit':
                $scope.loading=true;

                Posisi.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.detail=function(id){
        $scope.detail={};

        Posisi.getById(id)
            .success(function(data){
                $scope.details=data;
            })

        $("#myModalDetail").modal('show');
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Posisi.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('kategoriMcoa',function($scope,$timeout,$filter,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.jenis='Mcoa';
    $scope.posisi={};
    $scope.parameter={};
    $scope.mcoa={};

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function getPosisi(){
        Mcoa.getPosisi($scope.idposisi,$scope.jenis)
            .success(function(data){
                $scope.posisi=data.posisi;
                $scope.parameter=data.parameter;
            })
    }    

    getPosisi();

    $scope.simpan=function(){
        $scope.loading=true;
        var data={kategori:$scope.mcoa.kategori,posisi:$scope.posisi.id_posisi,jenis:'Mcoa'};
        Mcoa.save(data)
            .success(function(result){
                $scope.loading=false;
                $scope.mcoa={};
                getPosisi();
                $scope.pesan=result;
                tampilPesan();
            })
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kategori MCOA";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Rubah Kategori MCOA";
                Mcoa.getById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.nama_kategori};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case 'edit':
                $scope.loading=true;

                Mcoa.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        getPosisi();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.delete(id)
                    .success(function(data){
                        getPosisi();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('parameterMcoa',function($scope,$timeout,$filter,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.jenis='Kategori';
    $scope.posisi={};
    $scope.parameter={};
    $scope.mcoa={};

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function getPosisi(){
        Mcoa.getPosisi($scope.idposisi,$scope.jenis)
            .success(function(data){
                $scope.posisi=data.posisi;
                $scope.parameter=data.parameter;
            })
    }    

    getPosisi();

    $scope.simpan=function(){
        $scope.loading=true;
        var data={kategori:$scope.mcoa.kategori,posisi:$scope.posisi.id_posisi,jenis:'Kategori'};
        Mcoa.save(data)
            .success(function(result){
                $scope.loading=false;
                $scope.mcoa={};
                getPosisi();
                $scope.pesan=result;
                tampilPesan();
            })
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kategori MCOA";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Rubah Kategori MCOA";
                Mcoa.getById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.nama_kategori};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case 'edit':
                $scope.loading=true;

                Mcoa.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        getPosisi();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.delete(id)
                    .success(function(data){
                        getPosisi();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('positionsMcoa',function($scope,$timeout,$filter,Posisi,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.idkategori = $filter('_uriseg')(4);

    $scope.posisi={};

    function awal(){
        $scope.pilihan=[];
        $scope.check={pria:false,wanita:false};
        $scope.pertanyaan="";
        getPosisi();
    }

    function getPosisi(){
        Mcoa.getPosisiById($scope.idkategori)
            .success(function(data){
                $scope.posisi=data;
                console.log(data);
            })
    }

    awal();

    $scope.items = [];
    $scope.newitem = '';
    $scope.jumlah=0;

    $scope.tambahPilihan=function(){
        $scope.items.push($scope.items.length);
        $scope.jumlah=$scope.jumlah+1;
    }

    $scope.del = function(i){
        $scope.items.splice(i,1);
        $scope.jumlah=$scope.jumlah-1;
    }

    $scope.formData={};

    $scope.save=function(){
        if(this.posisi.jenis=='Kategori'){
            var data={
                'posisi':this.posisi.id_posisi,
                'kategori':this.posisi.id_kategori,
                'jenis':this.posisi.jenis,
                'pria':$scope.Pria,
                'wanita':$scope.Wanita,
                'pertanyaan':$scope.pilihan
            };
        }

        if(this.posisi.jenis=='Mcoa'){
            var data={
                'posisi':this.posisi.id_posisi,
                'kategori':this.posisi.id_kategori,
                'jenis':this.posisi.jenis,
                'pria':$scope.Pria,
                'wanita':$scope.Wanita,
                'pertanyaan':$scope.pertanyaan,
                'pilihan':$scope.pilihan
            };
        }

        
        Mcoa.categoryMcoaPosisi(data)
            .success(function(result){
                location.reload();
                console.log(result);
            })
        
    }

    $scope.hapusParameter=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.deleteParameter(id)
                    .success(function(data){
                        awal()
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    }
})


.controller('staff',function($scope,$timeout,Kcp){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kcp.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();
})

.controller('fisik',function($scope,$timeout,Fisiks){
	$scope.hasils=[];
    $scope.kanwil=[];
    $scope.list=[];

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
        Fisiks.get()
            .success(function(data){
                $scope.hasils=data;
            })
    }

    get();

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Daftar Fisik";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Update Daftar Fisik";
                Fisiks.getById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.nama_fisik};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                $scope.loading=true;
                Fisiks.save(this.newForm)
                    .success(function(data){
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                break;
            case 'edit':
                $scope.loading=true;

                Fisiks.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Fisiks.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('fisikKcp',function($scope,$timeout,Kcp){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kcp.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();
})

.controller('laporan',function($scope,$timeout,Laporan){
	$scope.hasils=[];
    $scope.datePicker={};

    $scope.datePicker.date = {startDate: null, endDate: null};

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Laporan.daftar()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":

                $scope.form_title="Tambah Laporan";
                $scope.nama="";
                $scope.datePicker.date = {startDate: null, endDate: null};

                break;
            case "edit":
                $scope.form_title="Update Laporan";
                $scope.nama="";
                $scope.datePicker.date = {startDate: null, endDate: null};
                Laporan.daftarById(id)
                    .success(function(data){
                        $scope.nama=data.nama;
                        $scope.datePicker.date = {startDate: data.start_date, endDate: data.end_date};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                var data={nama:$scope.nama,start:$scope.datePicker.date.startDate,end:$scope.datePicker.date.endDate};
                $scope.loading=true;
                console.log(data);
                
                Laporan.daftarSave(data)
                    .success(function(result){
                        $("#myModal").modal("hide");
                        $scope.loading=false;
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    });
                
                break;
            case 'edit':
                $scope.loading=true;

                var data={nama:$scope.nama,start:$scope.datePicker.date.startDate,end:$scope.datePicker.date.endDate};
                console.log(data);
                
                Laporan.daftarUpdate(id,data)
                    .success(function(data){
                        console.log(data);
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        get();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Laporan.deleteDaftar(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('laporanListKcp',function($scope,$timeout,Laporan){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Laporan.listKcp()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();
})

.controller('laporanListStaff',function($scope,$timeout,Kcp,Laporan){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kcp.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();
})

.controller('laporanListFisik',function($scope,$timeout,Kcp,Laporan){
	$scope.hasils=[];

	function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function get(){
    	Kcp.get()
    		.success(function(data){
    			$scope.hasils=data;
    		})
    }

    get();
})

.controller('staffKcp',function($scope,$timeout,$filter,Upload,Staff){
    $scope.idkcp = $filter('_uriseg')(3);
    $scope.hasil={};

    $scope.check={pria:false,wanita:false};

    function get(){
        Staff.get_by_kcp($scope.idkcp)
            .success(function(data){
                $scope.hasil=data;
                console.log(data);
            })
    }

    get();

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah KCP";
                $scope.newForm={nama:''}
                break;
            case "edit":
                $scope.form_title="Update KCP";
                Staff.getById(id)
                    .success(function(data){
                        $scope.newForm.posisi=data.id_posisi;
                        $scope.newForm.nama=data.nama_staff;
                        $scope.newForm.gender=data.gender;
                        if(data.gender=='Pria'){
                            $scope.check={pria:true,wanita:false};
                        }else{
                            $scope.check={pria:false,wanita:true};
                        }

                        $scope.newForm.foto=data.foto;
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id,File){
        switch(modalstate){
            case "tambah":
                file.upload = Upload.upload({
                  url: '../../api/staff',
                  data: {
                        kcp: this.hasil.kcp.id_kcp,
                        posisi:$scope.newForm.posisi, 
                        nama:$scope.newForm.nama,
                        gender:$scope.newForm.gender,
                        file: File
                    },
                });

                file.upload.then(function (response) {
                    $("#myModal").modal("hide");
                    $timeout(function () {
                        get();
                        file.result = response.pesan;
                    });
                }, function (response) {
                    if (response.success > 0)
                        get();
                        $scope.errorMsg = response.success + ': ' + response.pesan;
                }, function (evt) {
                    // Math.min is to fix IE which reports 200% sometimes
                    file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                });
                break;
            case 'edit':
                file.upload = Upload.upload({
                  url: '../../api/updateStaff',
                  data: {
                        idstaff:id,
                        kcp: this.hasil.kcp.id_kcp,
                        posisi:$scope.newForm.posisi, 
                        nama:$scope.newForm.nama,
                        gender:$scope.newForm.gender,
                        file: File
                    },
                });

                file.upload.then(function (response) {
                    $("#myModal").modal("hide");
                    $timeout(function () {
                        get();
                        file.result = response.pesan;
                    });
                }, function (response) {
                    if (response.success > 0)
                        get();
                        $scope.errorMsg = response.success + ': ' + response.pesan;
                }, function (evt) {
                    // Math.min is to fix IE which reports 200% sometimes
                    file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                });
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.detail=function(id){
        Kanwil.getById(id)
            .success(function(data){
                $scope.details=data;
            })
        $("#myModalDetail").modal('show');
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Staff.delete(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('fisikKategoriMcoa',function($scope,$timeout,$filter,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.jenis='Mcoa';
    $scope.fisik={};
    $scope.parameter={};
    $scope.mcoa={};

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function getPosisi(){
        Mcoa.getFisikPosisi($scope.idposisi,$scope.jenis)
            .success(function(data){
                $scope.fisik=data.fisik;
                $scope.parameter=data.parameter;
            })
    }    

    getPosisi();

    $scope.simpan=function(){
        $scope.loading=true;
        var data={kategori:$scope.mcoa.kategori,fisik:$scope.fisik.id_fisik,jenis:'Mcoa'};
        Mcoa.saveFisik(data)
            .success(function(result){
                $scope.loading=false;
                $scope.mcoa={};
                getPosisi();
                $scope.pesan=result;
                tampilPesan();
            })
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kategori MCOA";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Rubah Kategori MCOA";
                Mcoa.getFisikById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.nama_kategori};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case 'edit':
                $scope.loading=true;

                Mcoa.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        getPosisi();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.delete(id)
                    .success(function(data){
                        getPosisi();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('fisikParameterMcoa',function($scope,$timeout,$filter,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.jenis='Kategori';
    $scope.fisik={};
    $scope.parameter={};
    $scope.mcoa={};

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function getPosisi(){
        Mcoa.getFisikPosisi($scope.idposisi,$scope.jenis)
            .success(function(data){
                $scope.fisik=data.fisik;
                $scope.parameter=data.parameter;
            })
    }    

    getPosisi();

    $scope.simpan=function(){
        $scope.loading=true;
        var data={kategori:$scope.mcoa.kategori,fisik:$scope.fisik.id_fisik,jenis:'Kategori'};
        Mcoa.saveFisik(data)
            .success(function(result){
                $scope.loading=false;
                $scope.mcoa={};
                getPosisi();
                $scope.pesan=result;
                tampilPesan();
            })
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kategori MCOA";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Rubah Kategori MCOA";
                Mcoa.getFisikById(id)
                    .success(function(data){
                        $scope.newForm={'nama':data.nama_kategori};
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case 'edit':
                $scope.loading=true;

                Mcoa.update(id,this.newForm)
                    .success(function(data){
                        $scope.loading=false;
                        $("#myModal").modal("hide");
                        $scope.newForm={};
                        getPosisi();
                        $scope.pesan=data;
                        tampilPesan();
                    })
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.delete(id)
                    .success(function(data){
                        getPosisi();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('positionsFisikMcoa',function($scope,$timeout,$filter,Posisi,Mcoa){
    $scope.idposisi = $filter('_uriseg')(3);
    $scope.idkategori = $filter('_uriseg')(4);

    $scope.posisi={};

    function awal(){
        $scope.pilihan=[];
        $scope.check={pria:false,wanita:false};
        $scope.pertanyaan="";
        getPosisi();
    }

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }

    function getPosisi(){
        Mcoa.getFisikId($scope.idkategori)
            .success(function(data){
                $scope.posisi=data;
                console.log(data);
            })
    }

    awal();

    $scope.items = [];
    $scope.newitem = '';
    $scope.jumlah=0;

    $scope.tambahPilihan=function(){
        $scope.items.push($scope.items.length);
        $scope.jumlah=$scope.jumlah+1;
    }

    $scope.del = function(i){
        $scope.items.splice(i,1);
        $scope.jumlah=$scope.jumlah-1;
    }

    $scope.formData={};

    $scope.save=function(){
        if(this.posisi.jenis=='Kategori'){
            var data={
                'fisik':this.posisi.id_fisik,
                'kategori':this.posisi.id_kategori,
                'jenis':this.posisi.jenis,
                'pertanyaan':$scope.pilihan
            };
        }

        if(this.posisi.jenis=='Mcoa'){
            var data={
                'fisik':this.posisi.id_fisik,
                'kategori':this.posisi.id_kategori,
                'jenis':this.posisi.jenis,
                'pertanyaan':$scope.pertanyaan,
                'pilihan':$scope.pilihan
            };
        }

        
        Mcoa.categoryMcoaFisik(data)
            .success(function(result){
                location.reload();
                console.log(result);
            })
        
    }

    $scope.hapusParameter=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Mcoa.deleteParameter(id)
                    .success(function(data){
                        awal()
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    }

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Kategori MCOA";
                $scope.newForm={nama:''}

                break;
            case "edit":
                $scope.form_title="Ubah Data";
                Mcoa.cari_fisik_by_id(id)
                    .success(function(data){
                        console.log(data);
                        $scope.id_parameter=data.id_parameter;
                        $scope.nama=data.nama_parameter;
                    })
                    .error(function(data){
                        alert('Link Belum ada')
                    })
                    
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    $scope.update=function(id){
        var data={kode:id,nama:$scope.nama};

        $scope.loading=true;

        Mcoa.update_parameter_by_id(id,data)
            .success(function(result){
                console.log(result);
                $scope.loading=false;
                $("#myModal").modal("hide");
                awal();
                $("#myModal").modal("hide");
            })
            .error(function(result){
                alert('Data tidak ada');
            })
    }
})


.controller('fisikPerKcp',function($scope,$timeout,$filter,Fisiks){
    $scope.idkcp = $filter('_uriseg')(3);
    $scope.hasil={};

    $scope.check={pria:false,wanita:false};

    $scope.select2Options = {
        allowClear:true
    };

    function get(){
        Fisiks.get_by_kcp($scope.idkcp)
            .success(function(data){
                $scope.hasil=data;
            })
    }

    get();

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }  

    $scope.form=function(modalstate,id){
        $scope.modalstate=modalstate;
        $scope.id=id;

        switch(modalstate){
            case "tambah":
                $scope.form_title="Tambah Fisik KCP";
                $scope.newForm={fisik:''}
                break;
            case "edit":
                $scope.form_title="Update Fisik KCP";
                Fisiks.get_by_id_fisik(id)
                    .success(function(data){
                        $scope.newForm.fisik=data.id_fisik;
                    })
                break;
            default:
                $scope.newForm={};
                break;
        }
        $("#myModal").modal('show');
    };

    //simpan
    $scope.save=function(modalstate,id){
        switch(modalstate){
            case "tambah":
                    $scope.loading=true;
                    var data={kcp:this.hasil.kcp.id_kcp,fisik:$scope.newForm.fisik};

                    Fisiks.save_by_kcp(data)
                        .success(function(data){
                            $scope.loading=false;
                            $("#myModal").modal("hide");
                            $scope.newForm={};
                            get();
                            $scope.pesan=data;
                            tampilPesan();
                        });
                break;
            case 'edit':
                    var data={fisik:$scope.newForm.fisik};

                    Fisiks.update_by_kcp(id,data)
                        .success(function(data){
                            $scope.loading=false;
                            $("#myModal").modal("hide");
                            $scope.newForm={};
                            get();
                            $scope.pesan=data;
                            tampilPesan();
                        });
                break;

            default:
                $scope.newForm={};
                break;
        }
    };

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Fisiks.delete_by_kcp(id)
                    .success(function(data){
                        get();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                        tampilPesan();
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };
})

.controller('reportStaffKcp',function($scope,$timeout,$filter,Report){
    $scope.idkcp = $filter('_uriseg')(3);

    $scope.hasil={};

    console.log($scope.idkcp);

    function get(){
        Report.staf_kcp_get($scope.idkcp)
            .success(function(data){
                $scope.hasil=data;
            })
    }

    get();
})

.controller('reportFisikKcp',function($scope,$timeout,$filter,Report){
    $scope.idkcp = $filter('_uriseg')(3);

    $scope.hasil={};

    console.log($scope.idkcp);

    function get(){
        Report.fisik_kcp_get($scope.idkcp)
            .success(function(data){
                $scope.hasil=data;
            })
    }

    get();
})

.controller('reportKcp',function($scope,$filter,$timeout,Upload,Report){
    $scope.idkcp = $filter('_uriseg')(3);

    $scope.items = [];
    $scope.newitem = '';
    $scope.jumlah=0;
    $scope.berkas={};

    $scope.kcp=[];

    function getKcp(){
        Report.getKcpById($scope.idkcp)
            .success(function(data){
                $scope.kcp=data.kcp;
                $scope.nilai=parseInt(data.kcp.index_nilai);
                $scope.berkas=data.file;
            })
    }

    getKcp();

    $scope.tambahPilihan=function(){
        $scope.items.push($scope.items.length);
        $scope.jumlah=$scope.jumlah+1;
    }

    $scope.del = function(i){
        $scope.items.splice(i,1);
        $scope.jumlah=$scope.jumlah-1;
    }

    function tampilPesan(){
        $scope.showMessage=true; 
        $timeout(function () { $scope.showMessage = false; }, 5000); 
    }  

    $scope.simpan=function(file){
        var data={
                kcp: this.kcp.id_kcp,
                nilai:$scope.nilai, 
                file: file
            };
        
        console.log(data);
        
        file.upload = Upload.upload({
            url: '../../api/upload_report_kcp',
            data: data,
        });

        file.upload.then(function (response) {
            $timeout(function () {
                swal("Good job!", "Sukses Mengupdate Data!", "success");
                getKcp();
                tampilPesan();
                file.result = response.pesan;
            });
        }, function (response) {
            if (response.success > 0)
                getKcp();
                tampilPesan();
                $scope.errorMsg = response.success + ': ' + response.pesan;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.hapus=function(id){
        swal({   
            title: "Are you sure?",   
            text: "Do you want to delete it?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                Report.delete_file_report_kcp(id)
                    .success(function(data){
                        getKcp();
                        $scope.pesan=data;
                        swal("Deleted!", data.pesan, "success");   
                    })
            } else {     
                swal("Cancelled", "Your data is safe :)", "error");   
            } 
        });
    };

})

.controller('reportStaffByPerson',function($scope,$filter,$timeout,Report,Upload,$http){
    $scope.idstaff = $filter('_uriseg')(3);
    console.log($scope.idstaff);
    $scope.hasil={};
    $scope.parameter={};
    $scope.komentar={};
    $scope.mcoa={};
    $scope.mcoa_komentar={};

    $scope.pilihans=[{id:'N/A'},{id:'Ya'},{id:'Tidak'}];
    

    function get(){
        Report.report_staff_by_person($scope.idstaff)
            .success(function(data){
                $scope.hasil=data;
                $scope.nilai=parseInt(data.nilai);
                $scope.konten=data.summary;
            })
    }

    get();

    $scope.editorOptions = {
        language: 'ru'
        // uiColor: '#000000'
    };
    $scope.$on("ckeditor.ready", function( event ) {
        $scope.isReady = true;
    });

    $scope.items=[];
    $scope.itemsMistery=[];
    $scope.jumlah=0;
    $scope.jumlahMistery=0;

    $scope.tambahFile=function(){
        $scope.items.push($scope.items.length);
        $scope.jumlah=$scope.jumlah+1;
    }

    $scope.tambahMistery=function(){
        $scope.itemsMistery.push($scope.itemsMistery.length);
        $scope.jumlahMistery=$scope.jumlahMistery+1;
    }

    $scope.del = function(i){
        $scope.items.splice(i,1);
        $scope.jumlah=$scope.jumlah-1;
    }

    $scope.delMysteri = function(i){
        $scope.itemsMistery.splice(i,1);
        $scope.jumlahMistery=$scope.jumlahMistery-1;
    }

    $scope.simpan=function(file,fileMistery,Video){
        var data={
            'kcp':this.hasil.id_kcp,
            'staff':this.hasil.id_staff,
            'posisi':this.hasil.id_posisi,
            'nilai':$scope.nilai,
            'parameter':$scope.parameter,
            'komentar':$scope.komentar,
            'mcoa':$scope.mcoa,
            'mcoa_komentar':$scope.mcoa_komentar,
            'konten':$scope.konten,
            'file':file,
            'fileMistery':fileMistery,
            'video':Video
        }
        console.log(data);

        /*tampilkan modal */
        $("#modal-notif").modal("show");
        $(".modal-title").html("&nbsp; Please wait. . .");
        $(".modal-body").html('<i class="fa fa-spinner fa-2x fa-spin"></i>&nbsp; Pelase Wait for a few minutes');  
        
        File.upload = Upload.upload({
            url: '../../api/save_report_staff_by_person',
            data: data,
        });

        File.upload.then(function (response) {
            $(".modal-title").html('&nbsp; '+response.data.header);
            $(".modal-body").html('&nbsp; '+response.data.pesan);

            get();
            /*
            $timeout(function () {
                console.log(response);
                swal("Good job!", "Sukses Mengupdate Data!", "success");
                File.result = response.pesan;
            });
            */
        }, function (response) {
            $('.modal-title').html('&nbsp; Oppss...');
            $('.modal-body').html('Something Wrong. . .');
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            File.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

    $scope.hapusfile=function(id){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            $http.delete('../../api/delete_report_staff_by_person/'+id)
                .success(function(result){
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    get();
                })
                .error(function(result){
                    swal("Error!", "Data Gagal dihapus!", "error");
                })
            
        });
    }
})

.controller('reportFisikByKcp',function($scope,$filter,Report,Upload){
    $scope.idfisik = $filter('_uriseg')(3);
    $scope.idkcp = $filter('_uriseg')(4);
    $scope.hasil={};
    $scope.parameter={};
    $scope.komentar={};
    $scope.mcoa={};
    $scope.mcoa_komentar={};

    $scope.pilihans=[{id:'N/A'},{id:'Ya'},{id:'Tidak'}];

    function get(){
        Report.report_fisik_by_kcp($scope.idfisik,$scope.idkcp)
            .success(function(data){
                $scope.hasil=data;
                $scope.nilai=parseInt(data.nilai);
                console.log(data);
            })
    }

    get();

    $scope.simpan=function(file,fileMistery,Video){
        var data={
            'kcp':this.hasil.id_kcp,
            'fisik':this.hasil.id_fisik,
            'posisi':this.hasil.id_posisi,
            'nilai':$scope.nilai,
            'parameter':$scope.parameter,
            'komentar':$scope.komentar,
            'mcoa':$scope.mcoa,
            'mcoa_komentar':$scope.mcoa_komentar
        }
        console.log(data);

        /*tampilkan modal */
        $("#modal-notif").modal("show");
        $(".modal-title").html("&nbsp; Please wait. . .");
        $(".modal-body").html('<i class="fa fa-spinner fa-2x fa-spin"></i>&nbsp; Pelase Wait for a few minutes');  
        
        File.upload = Upload.upload({
            url: '../../../api/save_report_fisik_by_kcp',
            data: data,
        });

        File.upload.then(function (response) {
            $(".modal-title").html('&nbsp; '+response.data.header);
            $(".modal-body").html('&nbsp; '+response.data.pesan);

            get();
        }, function (response) {
            $('.modal-title').html('&nbsp; Oppss...');
            $('.modal-body').html('Something Wrong. . .');
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            File.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }
})