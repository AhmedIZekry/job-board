<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Application|Factory
    {
        Gate::authorize("viewAny", Opportunity::class);
        $filters = $request->only(['search','minSalary','minSalary','category', 'experience']);

        return view('opportunity.index',['jobs'=>Opportunity::with(['employer'])->filter($filters)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Opportunity $job): View|Application|Factory
    {
        $job->load('employer.opportunities');
        $job->loadavg('opportunity_applications','expected_salary');
        return view('opportunity.show',['job'=>$job]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
