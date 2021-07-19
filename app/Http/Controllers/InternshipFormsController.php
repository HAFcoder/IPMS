<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternshipForm;

class InternshipFormsController extends Controller
{
    public function getform(){
        
        $data = InternshipForm::where('form_name','firsttest')->get();
        return view('lookform',['data'=>$data]);
    }

    public function uploadform(Request $request){
        
        $name = $request -> form_name;
        $mime = $request -> mime;
        $intern_file = $request -> intern_form;
        $content = pg_escape_bytea(file_get_contents($intern_file));

        $up = new InternshipForm;

        $up->form_name = $name;
        $up->mime = $mime;
        $up->intern_form = $content;

        $up->save();

        return 'Successfully Uploaded';
    }
}
