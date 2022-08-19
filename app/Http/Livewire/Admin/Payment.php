<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment as ModelsPayment;
use App\Models\Student;
use App\Models\StudentFee;
use Livewire\Component;

class Payment extends Component
{
    public $amount, $student_id, $remark, $remain_amount;
    public $edit_amount, $edit_student_id, $edit_remark, $edit_remain_amount, $edit_id;
    public $selectStudentFee = null;
    public $fees;
    public $students;
    public function render()
    {
        $this->students = Student::all();
        $payments = ModelsPayment::orderBy('id', 'desc')->get();
        return view('livewire.admin.payment', compact('payments'))->layout('layout.app');
    }

    public function updatedSelectStudentFee($student_id)
    {
        $this->fees = StudentFee::where('student_id', $student_id)->get();
        $total_fees = 0;
        foreach ($this->fees as $fee) {
            $total_fees += $fee->amount;
        }
        $this->remain_amount = $total_fees;
    }


    public function store()
    {
        $payment = new ModelsPayment();
        $this->validate([
            'amount' => 'required',
            'selectStudentFee' => 'required',
            'remark' => 'required',
            'remain_amount' => 'required',
        ]);
        // $fees = StudentFee::where('student_id', $this->selectStudentFee)->get();
        // $total_fee = 0;
        // foreach ($fees as $fee) {
        //     $total_fee += $fee->amount;
        // }
        // $fees->amount = $total_fee - $this->amount;
        // $fees->save();

        $payment->student_id = $this->selectStudentFee;
        $payment->amount = $this->amount;
        $payment->remain_amount = $this->remain_amount - $this->amount;
        $payment->remark = $this->remark;
        $result = $payment->save();
        if ($result) {
            session()->flash('success', 'Payment add Successfully');


            $this->amount = "";
            $this->selectStudentFee = "";
            $this->remark = "";
            $this->remain_amount = "";
        }
    }
    public function edit($id)
    {
        $payment = ModelsPayment::findOrFail($id);
        $this->edit_id = $payment->id;
        $this->edit_amount = $payment->amount;
        $this->selectStudentFee = $payment->student_id;
        $this->edit_remark = $payment->remark;
        $this->edit_remain_amount = $payment->remain_amount;
    }
    public function delete($id)
    {
        $result = ModelsPayment::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Payment Delete Successfully');
        }
    }

    public function update($id)
    {
        $payment = ModelsPayment::findOrFail($id);
        $this->validate([
            'edit_amount' => 'required',
            'selectStudentFee' => 'required',
            'edit_remark' => 'required',
            'edit_remain_amount' => 'required',
        ]);
        // $fees = StudentFee::where('student_id', $this->selectStudentFee)->get();
        // $total_fee = 0;
        // foreach ($fees as $fee) {
        //     $total_fee += $fee->amount;
        // }
        // $fees->amount = $total_fee - $this->amount;
        // $fees->save();

        $payment->student_id = $this->selectStudentFee;
        $payment->amount = $this->edit_amount;
        $payment->remain_amount = $this->edit_remain_amount - $this->edit_amount;
        $payment->remark = $this->edit_remark;
        $result = $payment->save();
        if ($result) {
            session()->flash('success', 'Payment Update Successfully');

            $this->edit_amount = "";
            $this->selectStudentFee = "";
            $this->edit_remark = "";
            $this->edit_remain_amount = "";
        }
    }
}
