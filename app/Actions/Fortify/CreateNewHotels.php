<?php

namespace App\Actions\Fortify;

use App\Models\Hotels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewHotels;
use Laravel\Jetstream\Jetstream;

class CreatesNewHotel implements CreatesNewHotels
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered hotel.
     *
     * @param  array  $input
     * @return \App\Models\Hotels
     */
    public function create(array $data)
    {
        Validator::make($data, [
            'hotelname' => ['required', 'string', 'max:255', 'unique:hname'],
            'location' => ['required', 'string', 'max:255'],
        ])->validate();


            return Hotels::create([
                'hotelname' => $data['name'],
            'location' => $data['loc'],
            'rating' => "5",
            'stat' => '0',
            ]);

    }
}
