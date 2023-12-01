<?php

namespace App\Http\Livewire\Admin\Logs;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Show extends Component
{
    public Activity $log;


    public function mount(Activity $log)
    {
        $this->log = $log;
    }

    public function render()
    {
        return view('admin.logs.show')->layout('layouts.admin');
    }
}
