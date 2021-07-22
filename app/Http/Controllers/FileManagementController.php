<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileManagement;

class FileManagementController extends Controller
{
 
    // public function index()
    // {
    //     $files = Storage::disk('s3')->files('files');
 
    //     $data = [];
    //     foreach($files as $file) {
    //         $data[] = [
    //             'name' => basename($file),
    //             'downloadUrl' => url('/download/'.base64_encode($file)),
    //             'removeUrl' => url('/remove/'.base64_encode($file)),
    //         ];
    //     }
 
    //     return view('upload', ['files' => $data]);
    // }
 
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|max:2048'
    //     ]);
 
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $name = time() . $file->getClientOriginalName();
    //         $filePath = 'files/' . $name;
    //         Storage::disk('s3')->put($filePath, file_get_contents($file));
    //     }
 
    //     return back()->withSuccess('File uploaded successfully');
    // }
 
    // public function destroy($file)
    // {
    //     $file = base64_decode($file);
    //     Storage::disk('s3')->delete($file);
    //     return back()->withSuccess('File was deleted successfully');
    // }
 
    // public function download($file) 
    // {
    //     $file = base64_decode($file);
    //     $name = basename($file);
    //     Storage::disk('s3')->download($file, $name);
    //     return back()->withSuccess('File downloaded successfully');
    // }

    public function create()
    {
        return view('files.filelist');
    }

    public function store(Request $request)
    {
        $path = $request->file('internfile')->store('intern/', 's3');

        // Storage::disk('s3')->setVisibility($path, 'private');

        $file = FileManagement::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);

        return $file;
    }

    public function show(FileManagement $file)
    {
        return $file->url;
    }
}