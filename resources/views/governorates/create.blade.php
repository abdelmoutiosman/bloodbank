@extends('layouts.app')
@inject('model', 'App\Models\Governorate')
@section('content')
    @section('page_title')
        {{__('messages.Create Governorate')}}
    @endsection
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('messages.Form TO Create Governorate')}}</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @include('partials.validation_errors')                
                {!! Form::model($model,[
                        'action'=>'GovernorateController@store',
                        'method'=>'POST'
                    ]) !!}
                    <div class="form-group">
                        <label for="name">{{__('messages.Name')}}</label>
                        {!! Form::text('name',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">{{__('messages.Save')}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
