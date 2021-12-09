<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\ResumeManagement;

class ResumeManagementController extends Controller
{
    public function listResume()
    {
        // GET STUDENT MATRIX INFO

        $files = Storage::disk('s3')->files('intern-resumes/');
 
        $data = [];
        foreach($files as $file) {
            $data[] = [
                'filename' => basename($file),
                'downloadUrl' => url('/resume/download/'.base64_encode(basename($file)))
            ];
        }
 
        return view('resume.index', ['files' => $data, 'lect' => $lect]);
    }
 
    public function storeResume(Request $request)
    {
        $this->validate($request, [
            'resumefile' => 'required|mimes:application/pdf|max:8192'
        ]);

        $resume = new ResumeManagement;

        $student_id = '2017559699';
 
        if ($request->hasFile('resumefile')) {
            $file = $request->file('resumefile');
            $name =  strval($student_id) . '-resume';
            $filePath = 'intern-resumes/' . $name;

            $resume->student_id = $student_id;
            $resume->name = $name;
            $resume->filetype = $file->getMimeType();

            $resume->save();

            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }

        // if ($request->hasFile('resumefile')) {
        //     $file = $request->file('resumefile');
        //     $name = $file->getClientOriginalName();
        //     $filePath = 'intern-resumes/' . $name;
        //     Storage::disk('s3')->put($filePath, file_get_contents($file));
        // }
 
        return back()->withSuccess('File uploaded successfully');
    }
 
    public function destroyResume($filename)
    {
        $filepath = 'intern-resumes/' . $filename;
        Storage::disk('s3')->delete($filepath);
    }
 
    public function downloadResume($filename) 
    {
        $filename = base64_decode($filename);
        return Storage::disk('s3')->response('intern-resumes/'. $filename);
    }

    public function resumeview(){

        return view('resume.resumeTemplate');


    }
    
    //resume create - tak siap lagi

    public function resumeForm()
    {
        //$resume = $request->session()->get('resume');

        $stud = $this->getStudentInfo();

        //dump($stud);

        return view('resume.createResume',compact('stud'));
    }

    public function getDataResume(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        // ]);
 
        //     $resume = $request->session()->get('resume');
        //     $resume->fill($validatedData);
        //     $request->session()->put('resume', $resume);

        $resume = $request;
        
        //dump($resume);


        return view('resume.showResume',compact('resume'));
    }

}
