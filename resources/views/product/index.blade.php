@extends('layouts.app')
@section('title', 'Список продуктов')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Продукты</div>
                
                <div class="panel-body">
                    @if (count($data))
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <tr>
                                    <th class="text-center" style="width: 7%;">ID</th>
                                    <th class="text-center">Продукт</th>
                                    <th class="text-center">Поставщик</th>
                                    <th class="text-center" style="width: 20%;">Цена</th>
                                </tr>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->id }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $row->id) }}">
                                                <b>{{ $row->name }}</b>
                                            </a>
                                        </td>
                                        <td><b>{{ $row->vendor->name }}</b></td>
                                        <td class="text-center">
                                            <product-price
                                                    :id="{{ $row->id }}"
                                                    :price="{{ $row->price }}"
                                            ></product-price>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="text-center">
                            {{ $data->links() }}
                        </div>
                    @else
                        <br>
                        <p class="well text-center"><b>Информация отсутствует</b></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
