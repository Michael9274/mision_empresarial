<?php

namespace App\Traits;

use App\Rental;

trait RentalList {

    protected function rentalList() {

        return $rentalLists = Rental::with('rentalsBook', 'rentalsUser')->get();

    }
}
