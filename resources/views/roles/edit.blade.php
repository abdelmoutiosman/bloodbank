@extends('layouts.app')
@inject('perm', 'App\Models\Permission')
@section('content')
    @section('page_title')
        {{__('messages.Edit Role')}}
    @endsection
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('messages.Form TO Edit Role')}}</h3>
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
                        'action'=>['RoleController@update',$model->id],
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
                            <label for="permission_list">{{__('messages.Permissions')}}</label>
                            <br>
                            <input id="select-all" type="checkbox">      <label for='select-all'>{{__('messages.Select All')}}</label>
                            <br>
                            <div class="row">
                                @foreach($perm->all() as $permission)
                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                {{-- {!! Form::checkbox('permission_list[]',null,[
                                                    'class'=>'form-control',
                                                    ]) 
                                                !!} --}}
                                                <input type="checkbox" name="permission_list[]" value="{{$permission->id}}"
                                                @if($model->hasPermission($permission->name))
                                                    checked
                                                @endif
                                                >
                                                {{ $permission->display_name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-edit btn-xs"></i> {{__('messages.Edit')}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#select-all").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        });
    </script>
@endpush
