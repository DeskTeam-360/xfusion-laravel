<?php

namespace App\Livewire\Form;

use Livewire\Component;

class User extends Component
{

    public $data;
    public $userMeta;
    public function create()
    {
        $this->userMeta['nickname']='';
        $this->userMeta['first_name']='';
        $this->userMeta['last_name']='';
        $this->userMeta['description']='';
        $this->userMeta['rich_editing']=true;
        $this->userMeta['syntax_highlighting']=true;
        $this->userMeta['comment_shortcuts']=false;
        $this->userMeta['admin_color']='fresh';
        $this->userMeta['use_ssl']=0;
        $this->userMeta['show_admin_bar_front']='';
        $this->userMeta['locale']='';
        $this->userMeta['wp_capabilities']=0;
        $this->userMeta['wp_user_level']=0;
        $this->userMeta['dismissed_wp_pointers']='';
    }
    public function render()
    {
        return view('livewire.form.user');
    }
}
