@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('general.users', 1)]))

@section('content')
<!-- Default box -->
<div class="box box-success">
    {!! Form::model($user, [
        'method' => 'PATCH',
        'files' => true,
        'url' => ['auth/users', $user->id],
        'role' => 'form'
    ]) !!}

     <div class="box-body">
            {{ Form::textGroup('name', trans('general.name'), 'id-card-o') }}

            {{ Form::emailGroup('email', trans('general.email'), 'envelope') }}

            {{ Form::passwordGroup('password', trans('auth.password.current'), 'key') }}

            {{ Form::passwordGroup('password_confirmation', trans('auth.password.current_confirm'), 'key') }}

            {{ Form::fileGroup('picture',  trans_choice('general.pictures', 1)) }}

            {{ Form::checkboxGroup('companies', trans_choice('general.companies', 2), $companies, 'name') }}

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            {{ Form::saveButtons('auth/users') }}
        </div>

        {!! Form::close() !!}

</div>
@endsection


@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
@endsection


