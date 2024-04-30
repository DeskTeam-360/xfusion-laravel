<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public $sidebar;
    public $navbars;
    public $notifications;

    public function __construct()
    {

        $this->navbars = [
//            [
//                'title' => 'Apps',
//                'type' => 'dropdown',
//                'app_list_two_side' => true,
//                'quick_links' => [
//                    ['title' => 'title 1', 'route' => '#',],
//                    ['title' => 'title 2', 'route' => '#',],
//                ],
//                'app_lists_left' => [
//                    ['title' => 'title 11', 'sub-title' => 'sub title 1', 'icon_links' => '', 'route' => '#',],
//                    ['title' => 'title 12', 'sub-title' => 'sub title 1', 'icon_links' => '', 'route' => '#',],
//                    ['title' => 'title 13', 'sub-title' => 'sub title 1', 'icon_links' => '', 'route' => '#',],
//                ],
//                'app_lists_right' => [
//                    ['title' => 'title 21', 'sub-title' => 'sub title 2', 'icon_links' => '', 'route' => '#',],
//                    ['title' => 'title 22', 'sub-title' => 'sub title 2', 'icon_links' => '', 'route' => '#',],
//                    ['title' => 'title 23', 'sub-title' => 'sub title 2', 'route' => '#',],
//                ]
//            ],
//            ['title' => 'Chat', 'type' => 'link', 'route' => '#', 'icon' => 'ti ti-api-app'],
        ];

        $this->sidebar = [
            [
                'title' => 'Home',
                'lists' => [
                    ['title' => 'Dashboard', 'type' => 'link', 'route' => route('dashboard'), 'icon' => '<i class="ti ti-brand-chrome  text-xl flex-shrink-0"></i> '],
                    ['title' => 'Companies', 'type' => 'link', 'route' => route('company.index'), 'icon' => '<i class="ti ti-apps  text-xl flex-shrink-0"></i> '],
                    ['title' => 'Users', 'type' => 'link', 'route' => route('user.index'), 'icon' => '<i class="ti ti-users  text-xl flex-shrink-0"></i> '],
//                    [
//                        'title' => 'Form Elements', 'type' => 'accordion',
//                        'icon' => '<i class="ti ti-brand-chrome  text-xl flex-shrink-0"></i>',
//                        'lists' => [
//                            ['title' => 'Form input1', 'route' => '#', 'icon' => '<i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>',],
//                            ['title' => 'Form input2', 'route' => '#', 'icon' => '<i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>',],
//                            ['title' => 'Form input3', 'route' => '#', 'icon' => '<i class="ti ti-circle flex-shrink-0 text-xs me-3 "></i>',],
//
//                        ]
//                    ]
                ]
            ],
        ];
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.admin');
    }
}
