@extends('layouts.app')
@section('title', 'Погода')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Погода
                </div>
                
                <div class="panel-body">
                    <h2>
                        Погода в Брянске
                        <img src="https://yastatic.net/weather/i/icons/blueye/color/svg/{{ $data->fact->icon }}.svg"
                             alt=""
                             width="32px"
                             height="32px"
                        />
                        {{ $data->fact->temp }}<span class="small">°C</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
@stop
