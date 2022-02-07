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

        $files = Storage::disk('s3')->files('intern-forms/');
 
        $data = [];
        foreach($files as $file) {
            $data[] = [
                'filename' => basename($file),
                'downloadUrl' => url('/internfile/download/'.base64_encode(basename($file)))
            ];
        }
 
        return view('files.index', ['files' => $data]);
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

    // Latest Updated Amazon s3 API

    // Directory or Folder Handler

    public function createDirectory(Request $request) {

        $this->validate($request, [
            'folder_name' => 'required'
        ]);

        Storage::disk('s3')->makeDirectory($request->folder_name);
    }

    public function deleteDirectory(Request $request) {

        $this->validate($request, [
            'folder_name' => 'required'
        ]);

        Storage::disk('s3')->deleteDirectory($request->folder_name);
    }

    // File Handler

    public function checkFileExistence($location, $filename){
        $exists = Storage::disk('s3')->exists($location.'/'.$filename);
    }

    public function getAllFile($location) {
        $files = Storage::disk('s3')->files($location.'/');
    }

    public function getFile($location, $filename) {
        $contents = Storage::disk('s3')->get($location.'/'.$filename);
    }

    public function uploadFile($location, $filename) {
        Storage::put($location.'/'.$filename, $contents);
    }

    public function deleteFile($location, $filename) {
        Storage::disk('s3')->delete($location.'/'.$filename);
    }

    public function copyFile($original_location, $original_filename, $new_location, $new_filename) {
        Storage::disk('s3')->copy($original_location.'/'.$original_filename, $new_location.'/'.$new_filename);
    }

    public function moveFile($original_location, $original_filename, $new_location, $new_filename) {
        Storage::disk('s3')->move($original_location.'/'.$original_filename, $new_location.'/'.$new_filename);
    }

    public function getFileSize($location, $filename) {
        Storage::disk('s3')->size($location.'/'.$filename);
    }







}