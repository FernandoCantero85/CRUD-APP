<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('name')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')
                         ->with('success', 'Curso criado com sucesso!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:courses,name,' . $course->id,
        ]);

        $course->update($data);

        return redirect()->route('courses.index')
                         ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Curso excluído.');
    }
}
