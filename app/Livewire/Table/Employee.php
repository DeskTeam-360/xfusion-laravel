<?php

namespace App\Livewire\Table;

use App\Livewire\Table\Master;
use App\Models\WpGfEntry;

class Employee extends Master
{
    public function trash($id)
    {
        $wf = WpGfEntry::find($id);
        $wf->status = 'trash';
        $wf->save();
        $this->toastAlert('success','Successfully deleted data');
    }
}
