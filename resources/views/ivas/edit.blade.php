@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Iva
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($iva, ['route' => ['ivas.update', $iva->id], 'method' => 'patch']) !!}

                        @include('ivas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection