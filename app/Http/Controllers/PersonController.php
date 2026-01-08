<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // READ
    public function index()
    {
        $people = Person::all();

        // return view('people.index', compact('people'));
        return view('people.index', [
            'people' => $people,
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        Person::create([
            'age' => $request->age,
            'job' => $request->job,
        ]);

        return redirect('/people');
    }

    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();

        return redirect('/people');
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        $person->update([
            'age' => $request->age,
            'job' => $request->job,
        ]);

        return redirect('/people');
    }
}
