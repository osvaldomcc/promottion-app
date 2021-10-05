<script type="text/javascript">
        $(document).ready(function(){
            
            
            $('#everything').click(function(){
                

                 if($('#delete').attr('class')=='btn btn-rounded btn-danger')
                {
                    $('#delete').attr('class','btn btn-rounded btn-success');
                }else{
                    $('#delete').attr('class','btn btn-rounded btn-danger');
                }
               

                var lista=$('.selected');
                var all=$(this);
                if(all.attr('checked')=='checked')
                {

                    $(lista).each(function(index,value){

                        value.checked=false;

                    });

                    all.attr('checked',false);

                }else{

                    $(lista).each(function(index,value){

                        value.checked=true;

                    });

                    all.attr('checked',true);
                }


            });

            $('#delete').click(function(e){
                var list=$('.selected:checked');
                var longitud=list.length;
                var listadodeid=Array();
                var link=$(this).attr('href');
                var separar = link.split(0);

                $(list).each(function(index,value){
                    listadodeid.push(value.id);
                });
                if(longitud==0)
                {
                    e.preventDefault();
                    swal({
                     title: "Seleccione algún elemento",
                     type: "error",
                     confirmButtonColor: '#AEDEF4',
                     confirmButtonText: 'OK !',
                     showLoaderOnConfirm: true,
                     closeOnCancel: false
                 

                 });
                }else if(longitud==1)
                {
                    e.preventDefault();
                    var ver=listadodeid;
                        swal({
                                     title: "¿Desea eliminar el elemento?",
                                     type: "warning",
                                     showCancelButton: true,
                                     confirmButtonColor: '#F63F1C',
                                     confirmButtonText: 'Sí, estoy seguro!',
                                     showLoaderOnConfirm: true,
                                     cancelButtonText: "No, cancelar!",
                                     closeOnConfirm: false,
                                     closeOnCancel: false,
                                 },

                                 function(isConfirm){
                                     if (isConfirm){
                                                window.location.assign(separar[0]+ver+separar[1]);
                                                     setTimeout(function(){
                                                     }, 2000);

                                         swal({
                                                     title: "Eliminando!",
                                                     text: "El elemento está siendo eliminado!",
                                                     type: "success",
                                                     closeOnConfirm: false,
                                                     showLoaderOnConfirm: true
                                                 })
                                                 ;
                                     } else {
                                         swal("Cancelado", "El elemento no fue eliminado :)", "error");
                                     }
                                 });
        
                        
                    
                }else{
                        e.preventDefault();
                    var ver=listadodeid;
                        swal({
                                     title: "¿Desea eliminar los siguientes "+ver.length+" elementos?",
                                     type: "warning",
                                     showCancelButton: true,
                                     confirmButtonColor: '#F63F1C',
                                     confirmButtonText: 'Sí, estoy seguro!',
                                     showLoaderOnConfirm: true,
                                     cancelButtonText: "No, cancelar!",
                                     closeOnConfirm: false,
                                     closeOnCancel: false,
                                 },

                                 function(isConfirm){
                                     if (isConfirm){
                                                window.location.assign(separar[0]+ver+separar[1]);
                                                     setTimeout(function(){
                                                     }, 2000);

                                         swal({
                                                     title: "Eliminando!",
                                                     text: "Los elementos están siendo eliminados!",
                                                     type: "success",
                                                     closeOnConfirm: false,
                                                     showLoaderOnConfirm: true
                                                 })
                                                 ;
                                     } else {
                                         swal("Cancelado", "Los elementos no fueron eliminados :)", "error");
                                     }
                                 });
                    }
                    listadodeid=Array();

            });
        });
    </script>