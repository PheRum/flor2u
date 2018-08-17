@extends('layouts.app')
@section('title', 'Заказ #' . $data->id)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Заказ #{{ $data->id }}</div>
        
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Продукт</th>
                                <th class="text-center" style="width: 100px;">Кол-во</th>
                            </tr>
                            </thead>
            
                            @foreach ($data->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
            
                            <tr class="bg-success">
                                <td class="text-right font-w600 text-uppercase">
                                    <b>Итого</b>:
                                </td>
                                <td class="text-right font-w600">
                                    <b>{{ number_format($data->getPrice()) }} ₽</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop