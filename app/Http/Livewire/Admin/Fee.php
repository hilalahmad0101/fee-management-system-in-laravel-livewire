<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use App\Models\Fee as ModelsFee;
use Livewire\Component;

class Fee extends Component
{
    public $course_name, $fee_type, $amount, $total_amount;
    public $edit_course_name, $edit_fee_type, $edit_amount, $edit_total_amount, $edit_id;
    public $fees = [];
    public $courses;
    public $search;
    public function render()
    {
        if ($this->search != "") {
            $this->courses = Course::orderBy('id', 'desc')->get();
            $get_fees = ModelsFee::orderBy('id', 'desc')->where('fee_type', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.fee', compact('get_fees'))->layout('layout.app');
        }
        $this->courses = Course::orderBy('id', 'desc')->get();
        $get_fees = ModelsFee::orderBy('id', 'desc')->get();
        return view('livewire.admin.fee', compact('get_fees'))->layout('layout.app');
    }

    public function addList()
    {
        $this->validate([
            'fee_type' => 'required',
            'amount' => 'required',
        ]);
        array_push($this->fees, [
            'fee_type' => $this->fee_type,
            'amount' => $this->amount,
        ]);
        $this->total_amount +=  $this->amount;
        $this->fee_type = "";
        $this->amount = "";
    }

    public function store()
    {
        $fees = new ModelsFee();
        $fee_type = [];
        $amount = [];

        foreach ($this->fees as $fee) {
            array_push($fee_type, $fee['fee_type']);
            array_push($amount, $fee['amount']);
        }

        $fees->fee_type = json_encode($fee_type);
        $fees->amount = json_encode($amount);
        $fees->course_id = $this->course_name;
        $fees->total_amount = $this->total_amount;
        $result = $fees->save();
        if ($result) {
            session()->flash('success', 'Fee add Successfully');
            $this->fess = [];
        }
    }

    public function edit($id)
    {

        $fees = ModelsFee::findOrFail($id);
        $this->edit_course_name = $fees->course_name;
        $this->edit_fee_type = $fees->fee_type;
        $this->edit_amount = $fees->amount;
        $this->edit_total_amount = $fees->total_amount;
        $this->edit_id = $fees->id;
    }

    public function update($id)
    {
        $fees = ModelsFee::findOrFail($id);
        $fee_type = [];
        $amount = [];
        $total = 0;

        foreach ($this->fees as $fee) {
            array_push($fee_type, $fee['fee_type']);
            array_push($amount, $fee['amount']);
        }

        foreach (json_decode($this->edit_amount) as $am) {
            $total += $am;
        }
        $fees->fee_type = $this->edit_fee_type;
        $fees->amount = $this->edit_amount;
        $fees->course_id = $this->edit_course_name;
        $fees->total_amount =  $total;
        $result = $fees->save();
        if ($result) {
            session()->flash('success', 'Fee add Successfully');
            $this->fess = [];
        }
    }
    public function delete($id)
    {
        $fees = ModelsFee::findOrFail($id)->delete();
        if ($fees) {
            session()->flash('success', 'Fee Delete Successfully');
        }
    }
}
