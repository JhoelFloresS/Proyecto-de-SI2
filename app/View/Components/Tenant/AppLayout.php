<?php

namespace App\View\Components\Tenant;

use Illuminate\View\Component;

class AppLayout extends Component
{   


    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'laravel')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('tenant.layouts.app');
    }
}
