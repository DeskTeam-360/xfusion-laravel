<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCompany extends Component
{

    public $user;
    public $companyId;

    public $userEmployee;


    public function mount()
    {
        $this->user = Auth::user();
        $company = $this->user->meta->where('meta_key', '=', 'company')->first();
        $this->companyId = $company['meta_value'];
    }

    public function getData()
    {
        $this->userEmployee = User::whereHas('meta',function ($q){
            $q->where('meta_key',config('app.wp_prefix', 'wp_') . 'capabilities')
                ->where('meta_value','like','%subscriber%');
        })->whereHas('meta',function ($q){
            $q->where('meta_key','company')
                ->where('meta_value',$this->companyId);
        })->count();
    }

    public function render()
    {
        return view('livewire.dashboard-company');
    }
}
