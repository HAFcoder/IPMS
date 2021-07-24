<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileManagement;

class FileManagementController extends Controller
{
 
    public function index()
    {

        $files = Storage::disk('s3')->files('intern-diploma-form/');
 
        $data = [];
        foreach($files as $file) {
            $data[] = [
                'filename' => basename($file),
                'downloadUrl' => url('/internfile/download/'.base64_encode(basename($file)))
            ];
        }
 
        return view('files.upload', ['files' => $data]);
    }
 
    public function store(Request $request)
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
 
    public function destroy()
    {

        Storage::disk('s3')->delete('intern/FAQ - Nexent Chatbot.docx');
        return back()->withSuccess('File was deleted successfully');
    }
 
    public function download($filename) 
    {
        $filename = base64_decode($filename);
        return Storage::disk('s3')->response('intern-diploma-form/'. $filename);
    }

}