@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-6  col-md-offset-3">
		<div class="panel panel-default">
		   <div class="panel-body text-center">
               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT56drkqK5UGHP1hAV9rS9x1r6NdOjNraD6e-M6Z4TzxiyhlXs2iw" style="border: 1px solid #fff; border-radius: 100%; max-width: 150px;">
               <h1>Hello {{$user->name}}</h1>
               <h5><b>Mail:</b>{{$user->email}}</h5>
               <h5><b>Date of Birth:</b> {{$user->dob->format('l g F Y')}} ({{$user->dob->age}} age old)</h5>
               <button class="btn btn-success">Follow</button>
			</div>
		</div>
	</div>
</div>
@endsection