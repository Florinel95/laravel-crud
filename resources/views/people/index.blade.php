<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>People</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    
    <h2 class="display-6">Adauga persoana</h2>
    
    <form action="/people" method="POST" class="row">
    @csrf
    <div class="col-auto">
        <input type="number" name="age" placeholder="Age" class="form-control">
    </div>
    <div class="col-auto">
        <input type="text" name="job" placeholder="Job" class="form-control">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-success">Salvează</button>
    </div>
</form>

<hr>

<h2 class="display-6">Lista persoane</h2>

<table class="table table-dark table-striped">
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
        <form action="/people/update/{{ $person->id }}" method="POST" class="d-inline">
            @csrf
            <input type="number" name="age" value="{{ $person->age }}" class="form-control">
        </td>

        <td>
            <input type="text" name="job" value="{{ $person->job }}" class="form-control">
        </td>

        <td>
            <button type="submit" class="btn btn-warning">Update</button>       
        </form>

        {{-- DELETE --}}
        <form action="/people/{{ $person->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html
