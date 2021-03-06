@extends('docs::layouts.frontend')

@section('title', 'Charity Event')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
                    <img src="\assets\frontend\img\docs\charity\header.jpg" class="img-fluid" alt="Responsive image">
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-9">
					<p class="strong">We are on a mission to deliver virtual cargo and raise money for South Central Ambulance Charity. Our pilots have been challenged with delivery cargo from across Europe to the UK</p>
					<h4>Our Charity Routes:</h4>
					<p>Below are our chatity routes which you can fly in order to bring medical cargo to the UK. All the routes have A319,A320, or A321 aircraft and all members of the virtual airline can fly these routes. To see more details, and book your flight, visit the <a href="/flights/search?airline_id=6">flight booking page</a></p>
					<table class="table table-striped">
						<thead>
						  <tr>
							<th scope="col">Flight Number</th>
							<th scope="col">Departing</th>
							<th scope="col">Arriving</th>
							<th scope="col">Estimated Time</th>
						  </tr>
						</thead>
						<tbody>
					@foreach($flights as $flight)
					<tr>
						<th scope="row">SCH{{$flight->flight_number}}</th>
						<td>{{ optional($flight->dpt_airport)->name ?? $flight->dpt_airport_id }}
							(<a href="{{route('frontend.airports.show', [
								  'id' => $flight->dpt_airport_id
								])}}">{{$flight->dpt_airport_id}}</a>)</td>
						<td>{{ optional($flight->arr_airport)->name ?? $flight->arr_airport_id }}
							(<a href="{{route('frontend.airports.show', [
								  'id' => $flight->arr_airport_id
								])}}">{{$flight->arr_airport_id}}</a>)</td>
						<td>{{ $flight->flight_time }} Minutes</td>
					  </tr>
					@endforeach
						</tbody>
					  </table>
				</div>
				<div class="col-md-2">
					<h3>Flights completed so far</h3>
					<div class="card">
						<div class="card-body">
						  <div class="progress" style="height: 20px;">
							<div class="progress-bar" role="progressbar" style="width: {{$countOfPireps}}%;" aria-valuenow={{$countOfPireps}} aria-valuemin="0" aria-valuemax="100">{{$countOfPireps}}</div>
						  </div>
						  <p class="card-text text-center">{{$countOfPireps}} Flights Completed</p>
						</div>
					  </div>
					<div></div>
					<h3>How to Donate</h3>
					<p>If you would like to donate please hit the donate button below, where you will be taken to the Just Giving website</p>
					<div id="jg-widget-insidea-gamer-338"></div><script>(function(){var id="jg-widget-insidea-gamer-338",doc=document,pfx=(window.location.toString().indexOf("https")==0)?"https":"http";var el=doc.getElementById(id);if(el){var js=doc.createElement('script');js.src=pfx+"://widgets.justgiving.com/fundraisingpage/insidea-gamer?enc=ZT1qZy13aWRnZXQtaW5zaWRlYS1nYW1lci0zMzgmdz00MDAmYj1pbm5lcixkb25hdGUmaWI9b3duZXIsdGl0bGUsc3VtbWFyeSxwcm9ncmVzcyxyYWlzZWQsdGFyZ2V0";el.parentNode.insertBefore(js, el);}})();</script>
					<h3 class="mt-5">What is South Central Ambulance Charity?</h3>
					<p>Community First Responders are volunteers trained and deployed by your ambulance service to respond to emergencies in their communities.  They freely given their time to help others and are there within minutes with the right knowledge and equipment helping to save lives.  Backed up by South Central Ambulance Service staff these volunteers are skilled, trained individuals.  There is no NHS or government funding for CFRs and all their equipment is paid for by voluntary donations.</p>
					<div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
