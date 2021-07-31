<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Lecturer;
use App\Models\LecturerInfo;

class ResumeManagementController extends Controller
{
    public function listResume()
    {
        $lect = $this->getLecturerInfo();

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
            'resumefile' => 'required|max:2048'
        ]);
 
        if ($request->hasFile('resumefile')) {
            $file = $request->file('resumefile');
            $name = $file->getClientOriginalName();
            $filePath = 'intern-resumes/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }
 
        return back()->withSuccess('File uploaded successfully');
    }
 
    public function destroyResume()
    {
        Storage::disk('s3')->delete($file_path);
    }
 
    public function downloadResume($filename) 
    {
        $filename = base64_decode($filename);
        return Storage::disk('s3')->response('intern-resumes/'. $filename);
    }
}
