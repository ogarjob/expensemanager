<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Expense;


class EditExpense extends ModalComponent
{
    public $expense;

    public function mount($expense)
    {
        $this->expense = Expense::find($expense);
    }

    public function render(Expense $expense)
    {
        $expenses = Expense::all();

        return view('livewire.edit-expense', compact('expenses', 'expense'));
    }

}
