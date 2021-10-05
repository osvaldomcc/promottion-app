@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a class="active">Perfil de Usuario</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Mi Perfil</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($user,['route'=>['editprofile',$user->id],'method'=>'PUT','files'=>true]) !!}
                                                <div class="col-md-6">
                                                
                                                   <div class="form-group">
                                                        {!! Form::label('password','Contraseña:') !!}
                                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'ej: ****************']) !!}
                                                </div>
                                                 <div class="form-group">
                                                        {!! Form::label('about','Sobre mí:') !!}
                                                        {!! Form::textarea('about',null,['class'=>'form-control','placeholder'=>'ej: Soy Ingeniero en Ciencias Informáticas...','style'=>'height:100px;']) !!}
                                                </div>

                                                </div>  


                                                 <div class="col-md-6">
                                                 
                                                 
                                                    <img src="{{ asset('images/avatars/'.$user->path) }}" width="100" height:"50" id="mineimg">
                                                  <div class="form-group hidden">
                                                        {!! Form::label('path','Foto:') !!}
                                                        {!! Form::file('path') !!}
                                                </div>
                                                </div>  
                                                <div class="col-md-12" style="margin-top: 18px;border-top: 1px solid lightgray">
                                              <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('admin') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>



                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>


                            
                    
                   


@endsection


@section('scripts')

    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>

   <script type="text/javascript">
         $(document).ready(function(){
            $('#mineimg').click(function(){
                $('#path').click();
            });
        });
   </script>


@endsection