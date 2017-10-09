@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-6  col-md-offset-3">
		<div class="panel panel-default">
		   <div class="panel-heading">
              <span>Articles by Vlada </span>&nbsp; 
              <span>
              	<a href="/articles/{{ $article->id }}/edit" >Edit</a>
              </span>

              <span class="pull-right">{{ $article->updated_at->diffForHumans() }}</span>
			</div>
			<div class="panel-body">
				{{ $article->content }}
				

			</div>
		</div>
	</div>
</div>
@endsection
