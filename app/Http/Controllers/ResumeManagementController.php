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
            $expTitleArr = explode(',' , $resume->experience_title);
            $expCompanyArr = explode(',' , $resume->experience_company);
            $expStartArr = explode(',' , $resume->experience_start);
            $expEndArr = explode(',' , $resume->experience_end);
            $expDescArr = explode(',' , $resume->experience_desc);
            $eduCourseArr = explode(',' , $resume->education_course);
            $eduUniArr = explode(',' , $resume->education_uni);
            $eduStartArr = explode(',' , $resume->education_start);
            $eduEndArr = explode(',' , $resume->education_end);
            $certTitleArr = explode(',' , $resume->certificate_title);
            $certDateArr = explode(',' , $resume->certificate_date);
            $certDescArr = explode(',' , $resume->certificate_desc);
            $refNameArr = explode(',' , $resume->reference_name);
            $refCompanyArr = explode(',' , $resume->reference_company);
            $refPositionArr = explode(',' , $resume->reference_position);
            $refEmailArr = explode(',' , $resume->reference_email);
            $refPhoneArr = explode(',' , $resume->reference_phone);

            return view('resume.createResume',compact('stud','resume','yesno','skillArr','langArr',
            'expTitleArr','expCompanyArr','expStartArr','expEndArr','expDescArr','eduCourseArr','eduUniArr',
            'eduStartArr','eduEndArr','certTitleArr','certDateArr','certDescArr','refNameArr','refCompanyArr',
            'refPositionArr','refEmailArr','refPhoneArr'));
        }else{
            return view('resume.createResume',compact('stud','resume','yesno'));
        }

        //dump($stud);

        // return view('resume.createResume',compact('stud','resume','yesno','skillArr','langArr'));
    }

    public function getDataResume(Request $request)
    {
        //dump($request);
        $langArr = array();
        $skillArr = array();
        $expTitleArr = array();
        $expCompanyArr = array();
        $expStartArr = array();
        $expEndArr = array();
        $expDescArr = array();
        $eduCourseArr = array();
        $eduUniArr = array();
        $eduStartArr = array();
        $eduEndArr = array();
        $certTitleArr = array();
        $certDateArr = array();
        $certDescArr = array();
        $refNameArr = array();
        $refCompanyArr = array();
        $refPositionArr = array();
        $refEmailArr = array();
        $refPhoneArr = array();

        $request->validate([
            'description'=>'required',
        ]);

        if($request->resumeId == 0){
            $resumedb = new Resume();
        }else{
            $resumedb = Resume::find($request->resumeId);
        }

        if($request->language != null){
            $sizeLang = count(collect($request)->get('language'));
            for ($x = 0; $x < $sizeLang; $x++)
            {
                array_push($langArr, $request->language[$x]);            
            }
        }

        if(isset($request->skill)){
            $sizeSkill = count(collect($request)->get('skill'));
            for ($y = 0; $y < $sizeSkill; $y++)
            {
                array_push($skillArr, $request->skill[$y]);            
            }
        }

        if(isset($request->experience_title)){
            $sizeExp = count(collect($request)->get('experience_title'));
            for ($y = 0; $y < $sizeExp; $y++)
            {
                array_push($expTitleArr, $request->experience_title[$y]);
                array_push($expCompanyArr, $request->experience_company[$y]);
                array_push($expStartArr, $request->experience_start[$y]);       
                array_push($expEndArr, $request->experience_end[$y]);       
                array_push($expDescArr, $request->experience_desc[$y]);           
            }
        }

        if(isset($request->education_course)){
            $sizeEdu = count(collect($request)->get('education_course'));
            for ($y = 0; $y < $sizeEdu; $y++)
            {
                array_push($eduCourseArr, $request->education_course[$y]);
                array_push($eduUniArr, $request->education_uni[$y]);
                array_push($eduStartArr, $request->education_start[$y]);
                array_push($eduEndArr, $request->education_end[$y]);       
            }
        }

        if($request->certificate_title != null){
            $sizeCert = count(collect($request)->get('certificate_title'));
            for ($y = 0; $y < $sizeCert; $y++)
            {
                array_push($certTitleArr, $request->certificate_title[$y]);
                array_push($certDateArr, $request->certificate_date[$y]);
                array_push($certDescArr, $request->certificate_desc[$y]);    
            }
        }

        if($request->reference_name != null){
            $sizeRef = count(collect($request)->get('reference_name'));
            for ($y = 0; $y < $sizeRef; $y++)
            {
                array_push($refNameArr, $request->reference_name[$y]);
                array_push($refCompanyArr, $request->reference_company[$y]);
                array_push($refPositionArr, $request->reference_position[$y]);    
                array_push($refEmailArr, $request->reference_email[$y]);    
                array_push($refPhoneArr, $request->reference_phone[$y]);    
            }
        }

        $langStr = implode(',' , $langArr);
        $skillStr = implode(',' , $skillArr);
        $expTitleStr = implode(',' , $expTitleArr);
        $expCompanyStr = implode(',' , $expCompanyArr);
        $expStartStr = implode(',' , $expStartArr);
        $expEndStr = implode(',' , $expEndArr);
        $expDescStr = implode(',' , $expDescArr);
        $eduCourseStr = implode(',' , $eduCourseArr);
        $eduUniStr = implode(',' , $eduUniArr);
        $eduStartStr = implode(',' , $eduStartArr);
        $eduEndStr = implode(',' , $eduEndArr);
        $certTitleStr = implode(',' , $certTitleArr);
        $certDateStr = implode(',' , $certDateArr);
        $certDescStr = implode(',' , $certDescArr);
        $refNameStr = implode(',' , $refNameArr);
        $refCompanyStr = implode(',' , $refCompanyArr);
        $refPositionStr = implode(',' , $refPositionArr);
        $refEmailStr = implode(',' , $refEmailArr);
        $refPhoneStr = implode(',' , $refPhoneArr);

        $resumedb->stud_id = $request->studentId;
        $resumedb->summary = $request->description;
        $resumedb->language = $langStr;
        $resumedb->skills = $skillStr;
        $resumedb->experience_title = $expTitleStr;
        $resumedb->experience_company = $expCompanyStr;
        $resumedb->experience_start = $expStartStr;
        $resumedb->experience_end = $expEndStr;
        $resumedb->experience_desc = $expDescStr;
        $resumedb->education_course = $eduCourseStr;
        $resumedb->education_uni = $eduUniStr;
        $resumedb->education_start = $eduStartStr;
        $resumedb->education_end = $eduEndStr;
        $resumedb->certificate_title = $certTitleStr;
        $resumedb->certificate_date = $certDateStr;
        $resumedb->certificate_desc = $certDescStr;
        $resumedb->reference_name = $refNameStr;
        $resumedb->reference_company = $refCompanyStr;
        $resumedb->reference_position = $refPositionStr;
        $resumedb->reference_email = $refEmailStr;
        $resumedb->reference_phone = $refPhoneStr;
 
        //     $resume = $request->session()->get('resume');
        //     $resume->fill($validatedData);
        //     $request->session()->put('resume', $resume);
        $resumedb->save();
        
        //dump($resume);

        $resume = $request;
        return view('resume.showResume',compact('resume'));
    }
}
