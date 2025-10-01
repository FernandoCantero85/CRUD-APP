@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Curso</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $course->id }}</p>
            <p><strong>Nome:</strong> {{ $course->name }}</p>
            <p><strong>Alunos Matriculados:</strong> {{ $course->students->count() }}</p>
        </div>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
