@extends('layouts.app')
@section('content')
    @section('page_title')
        {{__('messages.Edit Permission')}}
    @endsection
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('messages.Form TO Edit Permission')}}</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">                          
                {!! Form::model($model,[
                        'action'=>['PermissionController@update',$model->id],
                        'method'=>'put'
                    ]) !!}
                    <div class="form-group">
                        <label for="name">{{__('messages.Name')}}</label>
                        {!! Form::text('name',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="display_name">{{__('messages.Display Name')}}</label>
                        {!! Form::text('display_name',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('messages.Description')}}</label>
                        {!! Form::textarea('description',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="routes">{{__('messages.Routes')}}</label>
                        {!! Form::text('routes',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-edit btn-xs"></i> {{__('messages.Edit')}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

