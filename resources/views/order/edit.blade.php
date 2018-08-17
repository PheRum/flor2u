@extends('layouts.app')
@section('title', 'Заказ #' . $data->id . ' :: редактирование')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Редактирование</div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">
                            {!! Form::model($data, [
                                'class'  => 'form-bordered',
                                'route'  => ['order.update', $data->id],
                                'method' => 'PUT',
                            ]) !!}
                            
                            <div class="form-group{{ $errors->has('client_email') ? ' has-error' : '' }}">
                                {!! Form::label('client_email', 'Email:') !!}
                                {!! Form::email('client_email', old('client_email'), [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Email клиента',
                                ]) !!}
                                @if ($errors->has('client_email'))
                                    <span class="help-block">{{ $errors->first('client_email') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('partner_id') ? ' has-error' : '' }}">
                                {!! Form::label('partner_id', 'Партнер:') !!}
                                {!! Form::select('partner_id', $data->partner->getPartnersFields(), old('partner_id'), [
                                    'class' => 'form-control',
                                ]) !!}
                                @if ($errors->has('partner_id'))
                                    <span class="help-block">{{ $errors->first('partner_id') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {!! Form::label('status', 'Статус:') !!}
                                {!! Form::select('status', $data->getStatus(), old('status'), [
                                    'class' => 'form-control',
                                ]) !!}
                                @if ($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group form-actions">
                                {!! Form::submit('Обновить', ['class' => 'btn btn-primary']) !!}
                            </div>
                            
                            {!! Form::close() !!}
                        </div>
                        
                        <div class="col-md-5">
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
        </div>
    </div>
@stop
