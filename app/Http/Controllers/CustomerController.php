<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        return view('pages/customers/customers', [
            "title" => "Customers",
            'active' => 'customers',
            "customers" => Customer::all()
        ]);
    }
}
