<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Providers\RouteServiceProvider;
use App\Models\Student;
use App\Models\StudentInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:lecturer');
        $this->middleware('guest:sadmin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'stuID' => ['required', 'string', 'max:55', 'unique:students'],
            'name' => ['required', 'string', 'max:255'],
            'icNo' => ['required', 'string', 'max:55', 'unique:students'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'programme' => ['required', 'string', 'max:255'],
            'mentor' => ['required', 'string', 'max:255'],
            'session' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'max:25'],
            'address' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showLecturerRegisterForm()
    {
        $faculties = Faculty::all();
        return view('auth.registerLecturer', ['url' => 'lecturer'], compact('faculties'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return Student::create([
        Student::create([
            'stuID' => $data['stuID'],
            'name' => $data['name'],
            'icNo' => $data['icNo'],
            'email' => $data['email'],
            'programme' => $data['programme'],
            'mentor' => $data['mentor'],
            'session' => $data['session'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->intended('login');
        
    }

    protected function createLecturer(Request $request)
    {
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'lecturerID' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:lecturers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $this->validator($request->all())->validate();
        $data = new Lecturer([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data->save();

        $info = new LecturerInfo([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'lect_id' => $data->id,
            'lecturerID' => $request->lecturerID,
            'telephone' => $request->telephone,
            'faculty_id' => $request->faculty_id,
            'position' => $request->position,
        ]);
        $info->save();

        return redirect()->intended('login/lecturer');
    }
}
