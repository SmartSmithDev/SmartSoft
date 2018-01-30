@extends('layouts.admin')

<?php
$accountrow=0;
$branch_row=0;
 ?>

@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Company</a></li>
    <li><a href="#">Bank Accounts</a></li>
    <li><a href="#">Branches</a></li>
   
  </ul>
  <br>
  {!! Form::open(array('url' => '/companies/companies/'.$company->id,'method'=>'PUT')) !!}  
<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
<a href="{{ url('/companies/companies/') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
  <div id="company"  class="parts">
     <br>
  <br>
      {{ Form::textGroup('name', 'Company Name' , 'industry',['required'=>'required'],$company->name) }}
      {{ Form::textGroup('pan', 'PAN' , 'key',['required'=>'required'],$company->pan) }}


   
  </div>
  
@endsection
