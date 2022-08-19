<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Fee;
use App\Models\Student;
use App\Models\StudentFee as ModelsStudentFee;
use Livewire\Component;

class StudentFee extends Component
{
    public $fee_id, $course_id, $amount, $student_id;
    public $edit_fee_id, $edit_course_id, $edit_student_id, $edit_amount, $edit_id;
    public $courses;
    public $amounts;
    public $selectStudentFee = null;
    public $search;
    public $students;

    public function render()
    {
        if ($this->search != "") {
            $student_fees = ModelsStudentFee::orderBy('id', 'desc')->where('fee_id', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.student-fee', compact('student_fees'))->layout('layout.app');
        }
        $this->courses = Course::all();
        $this->students = Student::all();
        $student_fees = ModelsStudentFee::orderBy('id', 'desc')->get();
        return view('livewire.student-fee', compact('student_fees'))->layout('layout.app');
    }

    public function updatedSelectStudentFee($id)
    {
        $this->amounts = Fee::where('course_id', $id)->first();
        if ($this->amounts) {
            $this->amount = $this->amounts->total_amount;
            $this->edit_amount = $this->amounts->total_amount;
        } else {
            $this->amount = 'not found';
            $this->edit_amount = 'not found';
        }
    }

    public function store()
    {
        $fee = new ModelsStudentFee();
        $validate = $this->validate([
            'fee_id' => 'required',
            'selectStudentFee' => 'required',
            'amount' => 'required',
            'student_id' => 'required',
        ]);
        $fee->fee_id = $this->fee_id;
        $fee->student_id = $this->student_id;
        $fee->course_id = $this->selectStudentFee;
        $fee->amount = $this->amount;
        $result = $fee->save();
        if ($result) {
            session()->flash('success', 'Student Fee add Successfully');

            $this->fee_id = "";
            $this->course_id = "";
            $this->amount = "";
            $this->student_id = "";
        }
    }
    public function edit($id)
    {
        $fees = ModelsStudentFee::findOrFail($id);
        $this->edit_fee_id = $fees->fee_id;
        $this->edit_student_id = $fees->student_id;
        $this->edit_course_id = $fees->course_id;
        $this->edit_amount = $fees->amount;
        $this->edit_id = $fees->id;
    }

    public function delete($id)
    {
        $result = ModelsStudentFee::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Student Fee Delete Successfully');
        }
    }

    public function update($id)
    {
        $fee = ModelsStudentFee::findOrFail($id);
        $validate = $this->validate([
            'edit_fee_id' => 'required',
            'selectStudentFee' => 'required',
            'edit_amount' => 'required',
            'edit_student_id' => 'required'
        ]);
        $fee->fee_id = $this->edit_fee_id;
        $fee->student_id = $this->edit_student_id;
        $fee->course_id = $this->selectStudentFee;
        $fee->amount = $this->edit_amount;
        $result = $fee->save();
        if ($result) {
            session()->flash('success', 'Student Fee Update Successfully');
            $this->edit_fee_id = "";
            $this->edit_course_id = "";
            $this->edit_amount = "";
            $this->edit_student_id = "";
        }
    }
}
