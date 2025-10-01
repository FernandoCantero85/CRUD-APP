@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Aluno</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Data de Nascimento:</label>
            <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
        </div>

        <div class="mb-3">
            <label>Curso:</label>
            <select name="course_id" class="form-control">
                <option value="">-- Nenhum --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
