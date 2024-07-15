<?php

namespace App\Livewire\Table;

use App\Livewire\Table\Master;
use App\Models\WpGfEntry;

class Employee extends Master
{
    public function trash($id):void
    {
        $wf = WpGfEntry::find($id);
        $wf->status = 'trash';
        $wf->save();
//        $wf->update([
//            'status' => 'trash'
//        ]);
        $this->dispatch('toastAlert',[
            'icon'=>'success',
            'title' => 'Successfully deleted data',
        ]);
    }
}
