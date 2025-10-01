<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Exibe a lista de estudantes (com paginação).
     */
    public function index()
    {
        $students = Student::with('course')->orderBy('name')->paginate(10); // paginação de 10 por página
        return view('students.index', compact('students'));
    }

    /**
     * Mostra o formulário para criar um novo estudante.
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        return view('students.create', compact('courses'));
    }

    /**
     * Salva um novo estudante no banco.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email',
            'birth_date' => 'nullable|date',
            'course_id'  => 'nullable|exists:courses,id',
        ]);

        Student::create($data);

        return redirect()->route('students.index')
                         ->with('success', 'Aluno criado com sucesso.');
    }

    /**
     * Mostra os detalhes de um estudante.
     */
    public function show(Student $student)
    {
        $student->load('course');
        return view('students.show', compact('student'));
    }

    /**
     * Mostra o formulário para editar um estudante.
     */
    public function edit(Student $student)
    {
        $courses = Course::orderBy('name')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Atualiza os dados de um estudante.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email,' . $student->id,
            'birth_date' => 'nullable|date',
            'course_id'  => 'nullable|exists:courses,id',
        ]);

        $student->update($data);

        return redirect()->route('students.index')
                         ->with('success', 'Aluno atualizado.');
    }

    /**
     * Remove um estudante do banco.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Aluno excluído.');
    }
}
