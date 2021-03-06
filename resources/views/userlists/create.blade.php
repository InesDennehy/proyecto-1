@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/wrappers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endsection

@section('content')
	<div class="wrapper">
		<div id="formContent">
			<form method='POST' action='/{{$user->username}}/myLists'>
				@csrf
				<input type="text" class="text-input" name="list_name" placeholder="list name" value="{{ old('list_name')}}">
				@if($errors->has('list_name'))
					<div class="error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('list_name') }}</strong>
					</div>
					<br>
				@endif
				<!-- Rounded switch -->
				<label>Make list public</label>
				<label class="switch">
					<input name="public" type="checkbox">
					<span class="slider round"></span>
				</label>
				<br>
				<input type="submit" class="submit-input" value="Create list">
			</form>
		</div>
	</div>
	@include('errors')
@endsection
