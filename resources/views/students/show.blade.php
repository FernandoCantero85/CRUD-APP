@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Aluno</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $student->id }}</p>
            <p><strong>Nome:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $student->birth_date ?? '-' }}</p>
            <p><strong>Curso:</strong> {{ $student->course->name ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
