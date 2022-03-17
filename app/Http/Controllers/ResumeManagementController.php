<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Resume;
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
        $resume = Resume::where('stud_id', Auth::user()->id)->first();

        $yesno= 'no';

        if(!empty($resume)){
            $yesno = 'yes';
            $skillArr = explode(',' , $resume->skills);
            $langArr = explode(',' , $resume->language);
        }

        //dump($stud);

        return view('resume.createResume',compact('stud', 'resume','yesno', 'skillArr', 'langArr'));
    }

    public function getDataResume(Request $request)
    {
        //dump($request);
        $langArr = array();
        $skillArr = array();

        $request->validate([
            'description'=>'required',
        ]);

        if($request->resumeId == 0){
            $resumedb = new Resume();
        }else{
            $resumedb = Resume::find($request->resumeId);
        }

        $size = count(collect($request)->get('language'));
        for ($x = 0; $x < $size; $x++)
        {
            if($request->language[$x] != null)
                array_push($langArr, $request->language[$x]);            
        }

        $size = count(collect($request)->get('skill'));
        for ($y = 0; $y < $size; $y++)
        {
            if($request->skill[$y] != null)
                array_push($skillArr, $request->skill[$y]);            
        }

        $langStr = implode(',' , $langArr);
        $skillStr = implode(',' , $skillArr);

        $resumedb->stud_id = $request->studentId;
        $resumedb->summary = $request->description;
        $resumedb->language = $langStr;
        $resumedb->skills = $skillStr;
 
        //     $resume = $request->session()->get('resume');
        //     $resume->fill($validatedData);
        //     $request->session()->put('resume', $resume);
        $resumedb->save();
        
        //dump($resume);

        $resume = $request;
        return view('resume.showResume',compact('resume'));
    }
}
