@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Novo Aluno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Nenhum aluno encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection
