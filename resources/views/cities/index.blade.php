@extends('layouts.app')
@inject('model', 'App\Models\City')
@section('content')
    @section('page_title')
        {{__('messages.Cities')}}
    @endsection
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('messages.List Of Cities')}}</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                <a href="{{url(route('city.create'))}}" class="btn bg-primary"><i class="fa fa-plus"></i> {{__('messages.New City')}}</a>
                </div>
                @include('flash::message')
                @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-info">
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{__('messages.Name')}}</th>
                                    <th class="text-center">{{__('messages.Governorate_Name')}}</th>
                                    <th class="text-center">{{__('messages.Edit')}}</th>
                                    <th class="text-center">{{__('messages.Delete')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                 <tr id="removable{{$record->id}}">
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$record->name}}</td>
                                    <td class="text-center">{{$record->governorate->name}}</td>
                                    <td class="text-center">
                                        <a href="{{url(route('city.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit btn-xs"></i>
                                            {{__('messages.Edit')}}</a>
                                    </td>
                                    <td class="text-center">
                                        {!! Form::model($model,[
                                                'action'=>['CityController@destroy',$record->id],
                                                'method'=>'delete'
                                            ]) !!}
                                            <button id="{{$record->id}}" data-token="{{ csrf_token() }}"
                                                data-route="{{URL::route('city.destroy',$record->id)}}"
                                                type="button" class="destroy btn btn-danger"><i
                                                class="fa fa-trash-o"></i> {{__('messages.Delete')}}</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$records->appends(request()->query())->links()}}
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        {{__('messages.NoData')}}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
