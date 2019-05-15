@extends('layouts.app')
@section('content')
<div class="content">
    @include('flash::message')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatable-responsives">
                <tr>
                    <th colspan="2" style="text-align: center; font-size: 30px;"> Cierre Caja</th>
                </tr>
                @foreach ($cobros as $cobro)
                    <tr>
                        <td>Cobro</th>
                        <td>{{ $cobro->tipo_cobro }}</td>
                    </tr>
                    <tr>
                        <td>Cantidad</th>
                        <td>{{ $cobro->cantidad }}</td>

                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ $cobro->valor_cobro }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
