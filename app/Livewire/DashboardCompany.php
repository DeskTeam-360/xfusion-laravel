<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCompany extends Component
{

public $user;
public $companyId;
//        dd($companyId);
public function mount()
{
    $this->user = Auth::user();
    $company = $this->user->meta->where('meta_key', '=', 'company')->first();
    $this->companyId= $company['meta_value'];
}

    public function render()
    {
        return view('livewire.dashboard-company');
    }
}
