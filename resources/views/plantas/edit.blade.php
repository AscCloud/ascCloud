@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Planta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($planta, ['route' => ['plantas.update', $planta->id], 'method' => 'patch']) !!}

                        @include('plantas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection