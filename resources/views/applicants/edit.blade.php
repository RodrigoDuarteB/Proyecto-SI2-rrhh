


@extends('layouts.app', ['page' => __('Requisitos Inscripción'), 'pageSlug' => 'requisitos'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Editar Requisitos</h4>
            <p class="card-category">Puede cambiar los datos en el siguiente formulario.</p>
          </div>
          <div class="card-body">
            @if (session('Mensaje'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('Mensaje') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="table-responsive">   
                <form action="{{ url('/requisitos/'.$requisito->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH')}}
                    <label class="col-sm-2 col-form-label" for="nombre">{{'Nombre: '}}</label>
                    <input type="text" name="nombre" id="nombre" value="{{$requisito->nombre}}" >
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"  class="btn btn-primary">{{ __('Actualizar') }}</button>
                    </div>                    
                </form>                
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection