<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\WpGfFormMeta;
use Livewire\Component;
//use MikeMcLin\WpPassword\WpPassword;
use MikeMcLin\WpPassword\Facades\WpPassword;

class Testing extends Component
{
    public function mount()
    {
//        $a=['contributor'=>true];
//        dd('a:1:{s:10:"subscriber";b:1;}', serialize($a));
//        dd(WpPassword::make('testing'));
    }
    public function render()
    {
        return view('livewire.testing');
    }
}
