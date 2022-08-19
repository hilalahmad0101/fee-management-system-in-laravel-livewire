<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course as ModelsCourse;
use Livewire\Component;

class Course extends Component
{
    public $course_name, $level, $content;
    public $edit_course_name, $edit_level, $edit_content, $edit_id;
    public $search;
    public function render()
    {
        if ($this->search != "") {
            $courses = ModelsCourse::orderBy('id', 'desc')->where('course_name', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.course', compact('courses'))->layout('layout.app');
        }
        $courses = ModelsCourse::orderBy('id', 'desc')->get();
        return view('livewire.admin.course', compact('courses'))->layout('layout.app');
    }
    public function resetField()
    {
        $this->course_name = "";
        $this->level = "";
        $this->content = "";
        $this->edit_course_name = "";
        $this->edit_level = "";
        $this->edit_content = "";
        $this->edit_id = "";
    }
    public function store()
    {
        $validate = $this->validate([
            'course_name' => 'required',
            'level' => 'required',
            'content' => 'required',
        ]);
        $course = ModelsCourse::create($validate);
        if ($course) {
            session()->flash('success', 'Course created successfully');
            $this->resetField();
        }
    }

    public function delete($id)
    {
        $course = ModelsCourse::findOrFail($id)->delete();
        if ($course) {
            session()->flash('success', 'Course Delete successfully');
        }
    }

    public function edit($id)
    {
        $course = ModelsCourse::findOrFail($id);
        $this->edit_course_name =  $course->course_name;
        $this->edit_level =  $course->level;
        $this->edit_content =  $course->content;
        $this->edit_id =  $course->id;
    }
    public function update($id)
    {
        $course = ModelsCourse::findOrFail($id);
        $validate = $this->validate([
            'edit_course_name' => 'required',
            'edit_level' => 'required',
            'edit_content' => 'required',
        ]);
        $course->course_name = $this->edit_course_name;
        $course->level = $this->edit_level;
        $course->content = $this->edit_content;
        $courses = $course->save();
        if ($courses) {
            session()->flash('success', 'Course Update successfully');
            $this->resetField();
        }
    }
}
