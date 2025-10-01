@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome do Curso:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
