<?php

namespace App\Http\Controllers\Admin;

use App\Traits\RentalList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalsAdminController extends Controller
{

    use RentalList;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $rentals = $this->rentalList();

        return view('admin.rentals.index', compact('rentals'));
    }
}
