<?php

namespace App\Http\Livewire\Admin\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.transactions.index',[
            'transactions'=> Transaction::paginate(20),
        ]);
    }
}
