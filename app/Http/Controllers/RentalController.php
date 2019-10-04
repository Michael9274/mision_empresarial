<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function saveRentals(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required'
        ]);

        Rental::create($data);

        return response()->json('Alquilado!!');
    }

    public function index()
    {
        $rentals = Rental::all();

        return view('admin.rentals.index', compact('rentals'));
    }
}
