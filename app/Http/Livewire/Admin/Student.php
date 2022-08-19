<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student as ModelsStudent;
use Livewire\Component;

class Student extends Component
{
    public $name, $email, $address, $contact;
    public $edit_name, $edit_email, $edit_address, $edit_contact, $edit_id;
    public $search;
    public function render()
    {
        if ($this->search != "") {
            $students = ModelsStudent::orderBy('id', 'desc')->where('name', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.student', compact('students'))->layout('layout.app');
        }
        $students = ModelsStudent::orderBy('id', 'desc')->get();
        return view('livewire.admin.student', compact('students'))->layout('layout.app');
    }

    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->address = "";
        $this->contact = "";
        $this->edit_id = "";
        $this->edit_name = "";
        $this->edit_email = "";
        $this->edit_address = "";
        $this->edit_contact = "";
    }

    public function store()
    {
        $validate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'contact' => 'required',
        ]);
        $student = ModelsStudent::create($validate);
        if ($student) {
            $this->resetField();
            $this->emit('addStudent');
            session()->flash('success', 'Student Successfully Added');
        }
    }

    public function delete($id)
    {
        $students = ModelsStudent::findOrFail($id)->delete();
        if ($students) {
            session()->flash('success', 'Delete Successfully');
        }
    }

    public function edit($id)
    {
        $students = ModelsStudent::findOrFail($id);
        $this->edit_id = $students->id;
        $this->edit_name = $students->name;
        $this->edit_email = $students->email;
        $this->edit_address = $students->address;
        $this->edit_contact = $students->contact;
    }

    public function update($id)
    {
        $students = ModelsStudent::findOrFail($id);
        $validate = $this->validate([
            'edit_name' => 'required',
            'edit_email' => 'required|email',
            'edit_address' => 'required',
            'edit_contact' => 'required',
        ]);
        $students->name = $this->edit_name;
        $students->email = $this->edit_email;
        $students->address = $this->edit_address;
        $students->contact = $this->edit_contact;
        $student = $students->save();
        if ($student) {
            $this->resetField();
            $this->emit('udpateStudent');
            session()->flash('success', 'Student Successfully Updated');
        }
    }
}
