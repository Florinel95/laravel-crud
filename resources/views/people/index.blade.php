<h2>Adaugă persoană</h2>

<form action="/people" method="POST">
    @csrf
    <input type="number" name="age" placeholder="Age">
    <input type="text" name="job" placeholder="Job">
    <button type="submit">Salvează</button>
</form>

<hr>

<h2>Lista persoane</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Age</th>
        <th>Job</th>
        <th>Action</th>
    </tr>

    @foreach ($people as $person )
        <tr>
            <td> {{ $person->id}}</td>          
        
        {{-- UPDATE --}}
        <td>
        <form action="/people/update/{{ $person->id }}" method="POST" style="display:inline;">
            @csrf
            <input type="number" name="age" value="{{ $person->age }}">
        </td>

        <td>
            <input type="text" name="job" value="{{ $person->job }}">
        </td>

        <td>
            <button type="submit">Update</button>       
        </form>

        {{-- DELETE --}}
        <form action="/people/{{ $person->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
                <button type="submit">Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
</table>

