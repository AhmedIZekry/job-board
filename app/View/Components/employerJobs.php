<?php

namespace App\View\Components;

use App\Models\Opportunity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class employerJobs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Opportunity $job)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.employer-jobs');
    }
}
