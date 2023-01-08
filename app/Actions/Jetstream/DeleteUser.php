<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\Hotels;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        if($user->type=="user"){
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        }
        elseif($user->type=="hotel"){
        Hotels::where('hotelname', '=', $user->name)->delete();
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        }
    }
}
