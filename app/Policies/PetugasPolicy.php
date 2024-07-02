<?php

namespace App\Policies;

use App\Models\Petugas;

class PetugasPolicy
{
    /**
     * Create a new policy instance.
     */
// In PetugasPolicy.php
    public function registerUsers(Petugas $petugas)
    {
    return $petugas->role === 'admin';
    }

}
