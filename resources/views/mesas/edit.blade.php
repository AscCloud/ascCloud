@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mesa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mesa, ['route' => ['mesas.update', $mesa->id], 'method' => 'patch']) !!}

                        @include('mesas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection