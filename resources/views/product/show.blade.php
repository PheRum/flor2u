@extends('layouts.app')
@section('title', 'Продукт #' . $data->id)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Продукт #{{ $data->id }}</div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <tr>
                                <th class="text-center" style="width: 7%;">ID</th>
                                <th class="text-center">Продукт</th>
                                <th class="text-center">Поставщик</th>
                                <th class="text-center">Цена</th>
                            </tr>
    
                            <tr>
                                <td class="text-center">{{ $data->id }}</td>
                                <td>
                                    <a href="{{ route('product.show', $data->id) }}">
                                        <b>{{ $data->name }}</b>
                                    </a>
                                </td>
                                <td><b>{{ $data->vendor->name }}</b></td>
                                <td class="text-center">{{ number_format($data->price) }} ₽</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop