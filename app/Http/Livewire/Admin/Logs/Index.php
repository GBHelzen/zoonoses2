<?php

namespace App\Http\Livewire\Admin\Logs;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Index extends Component
{
    public function render()
    {
        return view(
            'admin.logs.index',
            [
                'logs' => Activity::latest()->paginate(50)
            ]
        )->layout('layouts.admin');
    }
}
