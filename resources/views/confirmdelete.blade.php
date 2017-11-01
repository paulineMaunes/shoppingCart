<h1>{{ $name }}</h1>
<p>{{ $description }}</p>
<p><b>{{ $message }}</b></p>
<script>setTimeout(function(){ window.location.href = '{{ $redirectRoute }}' }, 5000);</script>