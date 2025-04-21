<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobCreateRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Opportunity;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobs = Opportunity::where('user_id',$user->id)->get();
        return view('employer.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View
    {
        return(view('employer.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request)
    {

        Opportunity::create([
            'user_id' => Auth::id(),
            'title'=> $request->title,
            'description'=>$request->description,
            'salary'=>$request->salary,
            'category'=>$request->category,
            'location'=>$request->location,
            'experience'=>$request->experience
        ]);
        return redirect()->route('employer.index')->with('success','Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Opportunity::findOrFail($id);

        return view('employer.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobUpdateRequest $request ,string $id)
    {
        $job = Opportunity::findOrFail($id);
        $job->update([
            'title'=> $request->title ?? $job->title,
            'description'=>$request->description ?? $job->description,
            'salary'=>$request->salary ?? $job->salary,
            'category'=>$request->category ?? $job->category,
            'location'=>$request->location ?? $job->location,
            'experience'=>$request->experience ?? $job->experience
        ]);
        return redirect()->route('employer.index')->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Opportunity::findOrFail($id);
        $job->delete();
        return redirect()->route('employer.index')->with('success','Job deleted successfully');
    }
}
