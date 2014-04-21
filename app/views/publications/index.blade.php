@extends('template')

@section('content')

<div class="container">
	<div class="row content">
		<div class="col-md-3">
			<div class="well">
				<form role="form">
					<div class="form-group">
						<label for="types">Types</label>
						@foreach ($types as $type)
						<div class="checkbox">
							<label>
								<input type="checkbox" value="{{ $type->id }}">
								{{ $type->title }}
							</label>
						</div>
						@endforeach
					</div>
				</form>
			</div>
		</div>

		<div class="col-md-9">
			<div class="page-header">
				<h1>{{ $title }}</h1>
			</div>
			<ul>
			@foreach ($publications as $publication)
				<li><a href="/publications/{{ $publication->slug }}">{{ $publication->title }}</a></li>
			@endforeach
			</ul>
		</div>

	</div>
</div>

@endsection