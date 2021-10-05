@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.language.index') }}">Listado de idiomas</a></li>
        <li><a class="active">Editar Idioma</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar Idioma</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($language,['route'=>['shoes.language.update',$language->id],'method'=>'PUT']) !!}
                                                    
                                                      <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
                                                            {!! Form::label('language','Nombre:') !!}
                                                            {!! Form::text('language',null,['class'=>'form-control','placeholder'=>'ej: es, en']) !!}
                                                            @if($errors->has('language'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('language') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                        </div>

                                                     
                                                
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.language.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
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