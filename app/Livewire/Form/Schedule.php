<?php

namespace App\Livewire\Form;

use App\Models\ScheduleExecution;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Schedule extends Component
{
    public $action;

    public $companyId;

    #[Validate('required|max:255')]
    public $user_id;

    #[Validate('required|max:255')]
    public $title;

    #[Validate('required')]
    public $link;
    #[Validate('required')]
    public $schedule_access_time;
    #[Validate('required')]
    public $schedule_access_date;

    #[Validate('required')]
    public $schedule_deadline_time;
    #[Validate('required')]
    public $schedule_deadline_date;

    public $usersOption;

    public function mount()
    {
        $this->usersOption = [];
        foreach (\App\Models\User::get() as $item) {
            $companies = $item->meta->where('meta_key', '=', 'company');
            foreach ($companies as $r) {
                if ($r['meta_value'] == $this->companyId) {
                    $this->usersOption[] = ['value' => $item->ID, 'title' => $item->user_email];
                }
            }


        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        ScheduleExecution::create([
            'link' => $this->link,
            'company_id' => $this->companyId,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'status' => 0,
            'schedule_access' =>null,
            'schedule_deadline' => null,
        ]);
    }

    public function render()
    {
        return view('livewire.form.schedule');
    }
}
