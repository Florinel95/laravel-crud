<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $date = date('y-m-d h:i:s');

        return view('home', ['name' => 'Florinel', 'time' => $date]);
    }

    public function storeContact(Request $request)
    {
        DB::table('contacts')->insert([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $message = 'Multumesc, '.$request->input('first_name').'! Te vom contacta pe adresa '.$request->input('email').' in curand.';

        return response()->json(['msj' => $message]);
    }

    public function storeAdresa(Request $request)
    {
        DB::table('adrese')->insert([
            'judet' => $request->judet,
            'localitate' => $request->localitate,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Adresă salvată!');
    }
}
