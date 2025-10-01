@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Novo Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Nenhum curso encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $courses->links() }}
</div>
@endsection
