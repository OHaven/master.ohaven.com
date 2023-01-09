<?php
namespace Laravel\Fortify\Contracts;

interface CreatesNewHotel
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return mixed
     */
    public function create(array $input);
}
