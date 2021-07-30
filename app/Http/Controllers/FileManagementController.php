<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileManagement;
use App\Models\Lecturer;
use App\Models\LecturerInfo;

class FileManagementController extends Controller
{
 
    public function listInternFile()
    {
        $lect = $this->getLecturerInfo();

        $files = Storage::disk('s3')->files('intern-forms/');
 
        $data = [];
        foreach($files as $file) {
            $data[] = [
                'filename' => basename($file),
                'downloadUrl' => url('/internfile/download/'.base64_encode(basename($file)))
            ];
        }
 
        return view('files.index', ['files' => $data, 'lect' => $lect]);
    }
 
    public function storeInternFile(Request $request)
    {
        $this->validate($request, [
            'internfile' => 'required|max:2048'
        ]);
 
        if ($request->hasFile('internfile')) {
            $file = $request->file('internfile');
            $name = $file->getClientOriginalName();
            $filePath = 'intern/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }
 
        return back()->withSuccess('File uploaded successfully');
    }
 
    public function destroyInternFile()
    {
        //DIPLOMA REPORT AND LOGBOOK EVALUATION FORM(CC101).pdf
        $file_url = 'intern-forms/testform.pdf';
        $file_path = parse_url($file_url);
        Storage::disk('s3')->delete($file_path);
    }
 
    public function downloadInternFile($filename) 
    {
        $filename = base64_decode($filename);
        return Storage::disk('s3')->response('intern-forms/'. $filename);
    }

}