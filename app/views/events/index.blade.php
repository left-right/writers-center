@extends('events.template')

@section('page')

	{{ $last_month = '' }}
	@foreach ($events as $event)
		@if ($event->month != $last_month)
			<h2>{{ $event->month }}</h2>
			<?php $last_month = $event->month ?>
		@endif
		<div class="event">
			<div class="date">{{ $event->start->format('l, F j') }}</div>
			<div class="description">
				<a href="/events/{{ $event->start->format('Y/m') }}/{{ $event->slug }}">{{ $event->title }}</a>
				{{ $event->description }}
				<div class="meta">
					<div class="time">{{ $event->start->format('g:i a') }}</div>
					<div class="location">HVWC</div>
					<div class="price">{{ EventController::formatPrice($event->price) }}</div>
					<div class="button">
						<a href="/events/{{ $event->start->format('Y/m') }}/{{ $event->slug }}">RSVP</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach

@endsection