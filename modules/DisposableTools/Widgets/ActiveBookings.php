<?php

namespace Modules\DisposableTools\Widgets;

use App\Contracts\Widget;
use App\Models\SimBrief;

class ActiveBookings extends Widget
{
  // Set Widget Auto Refresh Time (Seconds)
  public $reloadTimeout = 60;

  public function run()
  {
    $bookings = SimBrief::whereNotNull('flight_id')->whereNotNull('aircraft_id')->whereNull('pirep_id')->orderby('created_at', 'desc')->get();

    return view('DisposableTools::active_bookings',['bookings' => $bookings]);
  }
}
