<div class="card-body" style="min-height: 0px">
  <div class="row">
    <div class="col-sm-8">
      <p>
        <a href="{{ route('frontend.pireps.show', [$pirep->id]) }}">
          {{ $pirep->airline->code }}{{ $pirep->ident }}</a>
        -
        {{ $pirep->dpt_airport->name }}
        (<a href="{{route('frontend.airports.show', [
                          'id' => $pirep->dpt_airport->icao
                          ])}}">{{$pirep->dpt_airport->icao}}</a>)
        <span class="description">to</span>
        {{ $pirep->arr_airport->name }}
        (<a href="{{route('frontend.airports.show', [
                          'id' => $pirep->arr_airport->icao
                          ])}}">{{$pirep->arr_airport->icao}}</a>)
      </p>
      <p>
        {{$pirep->created_at}} - 
      </p>
    </div>
    <div class="col-sm-2">
      <div class="col-sm-2 text-center">
          @if($pirep->state === PirepState::PENDING)
            <div class="badge badge-warning">
          @elseif($pirep->state === PirepState::ACCEPTED)
              <div class="badge badge-success">
          @elseif($pirep->state === PirepState::REJECTED)
              <div class="badge badge-danger">
          @else
             <div class="badge badge-info">
          @endif
            {{ PirepState::label($pirep->state) }}</div>
      </div>    
    </div>
  </div>
</div>
