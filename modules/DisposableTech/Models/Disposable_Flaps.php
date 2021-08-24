<?php

namespace Modules\DisposableTech\Models;

use App\Contracts\Model;

class Disposable_Flaps extends Model
{
  public $table = 'disposable_flaps';

  protected $fillable = [
    'icao',
    'f0_name',
    'f0_speed',
    'f1_name',
    'f1_speed',
    'f2_name',
    'f2_speed',
    'f3_name',
    'f3_speed',
    'f4_name',
    'f4_speed',
    'f5_name',
    'f5_speed',
    'f6_name',
    'f6_speed',
    'f7_name',
    'f7_speed',
    'f8_name',
    'f8_speed',
    'f9_name',
    'f9_speed',
    'f10_name',
    'f10_speed',
    'gear_extend',
    'gear_retract',
    'gear_maxtire',
    'active',
  ];

  // Validation rules
  public static $rules = [
    'icao'         => 'required|max:5',
    'f0_name'      => 'nullable',
    'f0_speed'     => 'nullable|numeric',
    'f1_name'      => 'nullable',
    'f1_speed'     => 'nullable|numeric',
    'f2_name'      => 'nullable',
    'f2_speed'     => 'nullable|numeric',
    'f3_name'      => 'nullable',
    'f3_speed'     => 'nullable|numeric',
    'f4_name'      => 'nullable',
    'f4_speed'     => 'nullable|numeric',
    'f5_name'      => 'nullable',
    'f5_speed'     => 'nullable|numeric',
    'f6_name'      => 'nullable',
    'f6_speed'     => 'nullable|numeric',
    'f7_name'      => 'nullable',
    'f7_speed'     => 'nullable|numeric',
    'f8_name'      => 'nullable',
    'f8_speed'     => 'nullable|numeric',
    'f9_name'      => 'nullable',
    'f9_speed'     => 'nullable|numeric',
    'f10_name'     => 'nullable',
    'f10_speed'    => 'nullable|numeric',
    'gear_extend'  => 'nullable|numeric',
    'gear_retract' => 'nullable|numeric',
    'gear_maxtire' => 'nullable|numeric',
    'active'    => 'nullable',
  ];

  // Return a json string of flap names and speeds
  // {"UP":null,"CONF 1":"230","CONF 1+F":"215","CONF 2":"200","CONF 3":"185","FULL":"177"}
  public function flapspeeds()
  {
    $flapspeeds = collect();

    if(filled($this->f0_name)) { $flapspeeds->put($this->f0_name, $this->f0_speed); }
    if(filled($this->f1_name)) { $flapspeeds->put($this->f1_name, $this->f1_speed); }
    if(filled($this->f2_name)) { $flapspeeds->put($this->f2_name, $this->f2_speed); }
    if(filled($this->f3_name)) { $flapspeeds->put($this->f3_name, $this->f3_speed); }
    if(filled($this->f4_name)) { $flapspeeds->put($this->f4_name, $this->f4_speed); }
    if(filled($this->f5_name)) { $flapspeeds->put($this->f5_name, $this->f5_speed); }
    if(filled($this->f6_name)) { $flapspeeds->put($this->f6_name, $this->f6_speed); }
    if(filled($this->f7_name)) { $flapspeeds->put($this->f7_name, $this->f7_speed); }
    if(filled($this->f8_name)) { $flapspeeds->put($this->f8_name, $this->f8_speed); }
    if(filled($this->f9_name)) { $flapspeeds->put($this->f9_name, $this->f9_speed); }
    if(filled($this->f10_name)) { $flapspeeds->put($this->f10_name, $this->f10_speed); }

    return $flapspeeds;
  }
}
