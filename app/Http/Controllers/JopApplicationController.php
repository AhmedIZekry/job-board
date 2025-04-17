<?php

namespace App\Http\Controllers;

use App\FileUpload;
use App\Http\Requests\JobApplicationRequest;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JopApplicationController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobApplicationRequest $request,OpportunityApplication $application)
    {
        if ($request->hasFile('cv_file')) {
            $filePath = $this->upload($request->cv_file,'CVs');
        }

        OpportunityApplication::create([
            'user_id'=>Auth::id(),
            'opportunity_id'=> $request->opportunity_id,
            'expected_salary' => $request->input('expected_salary'),
            'cv' => $filePath,
        ]);
        return redirect()->back();
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
    public function destroy($id)
    {
        $application = OpportunityApplication::where('opportunity_id',$id)->first();
        if ($application) {
            $application->delete();
            $this->deleteFile($application->cv);
            return redirect()->back()->with('success','Your request has been successfully withdrawn');
        }else{
            return redirect()->back()->with('error','There is no application with this id');
        }
    }
}
