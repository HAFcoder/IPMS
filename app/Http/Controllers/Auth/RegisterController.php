<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Providers\RouteServiceProvider;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\LookupAddress;
use App\Models\Programme;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function showRegistrationForm()
    {
        $state = LookupAddress::orderBy('state', 'ASC')
                ->distinct()
                ->get(['state']);
        $programmes = Programme::orderBy('name', 'ASC')
                    ->where('status', '=', 'active')
                    ->get();
        return view('auth.register', ['url' => '/'], compact('state', 'programmes'));
    }

    public function fetchCity(Request $request)
    {
        $data['city'] = LookupAddress::orderBy('city', 'ASC')
                        ->where("state",$request->state)
                        ->distinct()
                        ->get(["city", "city"]);
        return response()->json($data);
    }

    public function showLecturerRegisterForm()
    {
        $faculties = Faculty::orderBy('faculty_name', 'ASC')->where('status', '=', 'active')->get();
        return view('auth.registerLecturer', ['url' => 'lecturer'], compact('faculties'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'programme_id' => ['required'],
            'studentID' => ['required', 'string', 'max:55'],
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'no_ic' => ['required', 'string', 'max:55', 'unique:student_info'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'telephone' => ['required', 'string', 'max:25'],
            'add1' => ['required'],
            'add2' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'postcode' => ['required', 'min:5'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $status = 'noRequest';

        $user = new Student([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $status,
        ]);
        $user->save();

        $address = $data['add1'] . ', ' . $data['add2'];

        $info = new StudentInfo([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'stud_id' => $user->id,
            'no_ic' => $data['no_ic'],
            'studentID' => $data['studentID'],
            'telephone' => $data['telephone'],
            'address' => $address,
            'programme_id' => $data['programme_id'],
            'state' =>  $data['state'],
            'city' =>  $data['city'],
            'postcode' =>  $data['postcode'],
        ]);
        $info->save();

        // Auth::login($user);
        // return redirect()->intended('login')->with(Auth::login($user));
        // return redirect()->intended('login')->with($user);
        Alert::success('Account Registered!', 'Your account successfully created');
        return $user;
    }

    //create lecturer
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
        Alert::success('Account Registered!', 'Your account successfully created');
        return redirect()->intended('login/lecturer');
    }
}
