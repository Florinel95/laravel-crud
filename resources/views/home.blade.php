<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<div id="response"></div>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>
<b>{{ $name }}</b>
<form action="/contact" id="contact" method="post">
    @csrf
<input type="text" name="first_name" placeholder="First Name">
<input type="email" name="email" placeholder="Email">
<input type="submit" value="apasa">
</form> 

{{-- creare formular nou sincron--}}
<form action="/adresa" id="adresa" method="post">
  @csrf
  <input type="text" name="judet" placeholder="Introduceti judetul">
  <input type="text" name="localitate"placeholder="Introduceti localitatea">
  <input type="submit" value="trimitere">
 <script>

</script> 
 <script>
document.getElementById("contact").onsubmit = function(e) {
  e.preventDefault(); // oprește refresh-ul
  const form = document.getElementById("contact");
  const formData = new FormData(form);
const data = Object.fromEntries(formData.entries());
   fetch('{{ route('contact_form') }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(res => res.json())
          .then(json => {
    // afișare răspuns în element
    document.getElementById("response").innerText = json.msj;
  })
          .catch(err => console.log(err.message));
  // alert("Formular trimis fără reload!");
};
</script> 

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- <form id="fara_refresh">
  <input name="nume">
  <button>Trimite</button>
</form>

<script>
document.getElementById("fara_refresh").onsubmit = function(e) {
  e.preventDefault(); // oprește refresh-ul
  alert("Formular trimis fără reload!");
};
</script> --}}


{{ $name }} {{ $time}}



</body>
</html>
