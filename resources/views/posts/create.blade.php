@extends('layouts.app')
@inject('model', 'App\Models\Post')
@section('content')
    @section('page_title')
        {{__('messages.Create Post')}}
    @endsection
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('messages.Form TO Create Post')}}</h3>
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
                        'action'=>'PostController@store',
                        'method'=>'POST',
                        'files'=>'true'
                    ]) !!}
                    <div class="form-group">
                        <label for="title">{{__('messages.Title')}}</label>
                        {!! Form::text('title',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="body">{{__('messages.Body')}}</label>
                        {!! Form::text('body',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('messages.Image')}}</label>
                        {!! Form::file('image',null,[
                            'class'=>'form-control',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label for="category_id">{{__('messages.Categories')}}</label>
                        {!! Form::select('category_id',$categories,[],[
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
