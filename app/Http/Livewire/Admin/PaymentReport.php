<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Illuminate\Support\Carbon;
use Livewire\Component;

class PaymentReport extends Component
{
    public $payments = [];

    public $selectedReport = null;

    public function render()
    {
        $this->payments = Payment::all();
        return view('livewire.admin.payment-report')->layout('layout.app');
    }

    public function updatedSelectedReport($val)
    {
        $this->payments = Payment::all();
    }
}
