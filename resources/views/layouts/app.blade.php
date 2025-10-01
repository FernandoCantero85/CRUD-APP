<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title', 'CRUD Laravel')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
<div class="container">
<a class="navbar-brand" href="{{ route('students.index') }}">CRUD Alunos</a>
<div class="collapse navbar-collapse">
<ul class="navbar-nav me-auto">
<li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Alunos</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Cursos</a></li>
</ul>
</div>
</div>
</nav>


<div class="container">
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


@yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>