<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;

class Select extends Component
{
    public $country;
    public $cities = [];
    public $city;

    public function render()
    {
        if(!empty($this->country)){
            $this->cities = City::where('province_id', $this->country)->get();
        }   

        $countries = Province::orderBy('province_name')->get();

        return view('livewire.select')->with([
            'countries' => $countries
        ]);
    }
}
