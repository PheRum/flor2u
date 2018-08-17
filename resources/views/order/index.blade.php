@extends('layouts.app')
@section('title', 'Список заказов')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Заказы</div>
        
                <div class="panel-body">
            
                    <ul class="nav nav-tabs">
                        <li class="{{ request()->routeIs('order.index') ? 'active' : '' }}">
                            <a href="{{ route('order.index') }}">Все</a>
                        </li>
                
                        <li class="{{ request()->routeIs('order.current') ? 'active' : '' }}">
                            <a href="{{ route('order.current') }}">Текущие</a>
                        </li>
                
                        <li class="{{ request()->routeIs('order.new') ? 'active' : '' }}">
                            <a href="{{ route('order.new') }}">Новые</a>
                        </li>
                
                        <li class="{{ request()->routeIs('order.completed') ? 'active' : '' }}">
                            <a href="{{ route('order.completed') }}">Выполненные </a>
                        </li>
                
                        <li class="{{ request()->routeIs('order.outdated') ? 'active' : '' }}">
                            <a href="{{ route('order.outdated') }}">Просроченные</a>
                        </li>
                    </ul>
            
                    @if (count($data))
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <tr>
                                    <th class="text-center" style="width: 7%;">Order ID</th>
                                    <th class="text-center">Партнер</th>
                                    <th class="text-center">Состав</th>
                                    <th class="text-center">Цена</th>
                                    <th class="text-center">Статус</th>
                                </tr>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route('order.edit', $row->id) }}" target="_blank">
                                                {{ $row->id }}
                                            </a>
                                        </td>
                                        <td><b>{{ $row->partner->name }}</b></td>
                                        <td>
                                            <ul>
                                                @foreach ($row->products as $product)
                                                    <li>
                                                        <a href="{{ route('product.show', $product->id) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="text-center">{{ number_format($row->getPrice()) }} ₽</td>
                                        <td class="text-center">{{ $row->getStatus($row->status) }}</td>
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
