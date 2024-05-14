<?php

namespace App\Livewire\Form;

use App\Models\LimitLinkWithTime;
use Livewire\Component;

class LimitLink extends Component
{
    public $url;
    public $redirect_url;

    public function getRules()
    {
        return [
            'url'=>'required|max:255'
        ];
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        LimitLinkWithTime::create([
            'url'=>$this->url,
            'redirect_url'=>$this->redirect_url
        ]);
        $this->redirect(route('limit-link.index'));
    }
    public function render()
    {
        return view('livewire.form.limit-link');
    }
}
