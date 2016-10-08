function hapusData(elem)
{
    swal({
             title: "Apakah anda yakin?",
             text: "Data ini akan dihapus selamanya!",
             type: "warning",
             showCancelButton: true,
             cancelButtonText: "Batal",
             confirmButtonColor: "#f56954",
             confirmButtonText: "Hapus",
             closeOnConfirm: false,
             closeOnCancel: false,
             allowOutsideClick: true
         },
         function (isConfirm)
         {
             if(isConfirm)
             {
                 var object = $(elem);
                 var target = object.data("target");
                 
                 swal.disableButtons();

                 $.ajax({
                            url: target,
                            type: 'DELETE'
                        })
                     .done(function(){
                         swal({
                                  title: "Terhapus",
                                  text: "Data sukses dihapus.",
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#00c0ef",
                                  confirmButtonText: "Tutup",
                                  closeOnConfirm: false
                              },
                              function(){
                                  location.reload();
                              });
                 });
             }
             else
             {
                 swal(
                     'Batal',
                     'Data batal dihapus.',
                     'error'
                 );
             }
         });
};