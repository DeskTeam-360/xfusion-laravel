<?php

namespace App\Livewire\Form;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


class Company extends Component
{

    use WithFileUploads;

    public $action;
    public $dataId;
    public $data;
    public $usersOption;

    #[Validate('required')]
    public $user_id;
    #[Validate('required|max:255')]
    public $title;
    #[Validate('image:4096')]
    public $logo_url;
    #[Validate('image:4096')]
    public $qrcode_url;

    public function mount()
    {
        $this->usersOption = [];
        foreach (\App\Models\User::get() as $item) {
            $this->usersOption[] = ['value' => $item->ID, 'title' => $item->user_email];
        }
        if ($this->dataId) {
            $data = \App\Models\Company::find($this->dataId);
            $this->user_id = $data->user_id;
            $this->title = $data->title;
//            $this->data = [
//                'user_id' => $data->user_id,
//                'title' => $data->title,
//                'logo_url' => $data->logoUrl,
//                'qrcode_url' => $data->qrcodeUrl
//            ];
        }
    }

    public function create()
    {


        $this->validate();
        $this->resetErrorBag();
        $logoUrl = $this->logo_url->store(path: 'public/photos');
        $qrcodeUrl = $this->qrcode_url->store(path: 'public/qrcode');
        \App\Models\Company::create([
            'user_id' => $this->user_id,
            'title' => $this->title,
            'logo_url' => $logoUrl,
            'qrcode_url' => $qrcodeUrl
        ]);
        $this->redirect(route('company.index'));
    }

    public function update()
    {
//        dd($this->title, $this->user_id);
//        $this->validate();
//        $this->resetErrorBag();
        if ($this->logo_url!=null) {
            $logoUrl = $this->logo_url->store(path: 'public/photos');
            \App\Models\Company::find($this->dataId)->update([
                'logo_url' => $logoUrl,
            ]);
        }
        if ($this->qrcode_url!=null) {
            $qrcodeUrl = $this->qrcode_url->store(path: 'public/qrcode');
            \App\Models\Company::find($this->dataId)->update([
                'qrcode_url' => $qrcodeUrl
            ]);
        }
        \App\Models\Company::find($this->dataId)->update([
            'user_id' => $this->user_id,
            'title' => $this->title,
        ]);
        $this->redirect(route('company.index'));
    }

    public function render()
    {
        return view('livewire.form.company');
    }
}
