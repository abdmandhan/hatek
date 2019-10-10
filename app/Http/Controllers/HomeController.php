<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\UserValidation;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Vinkla\Instagram\Instagram;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(){
        return Datatables::of(User::all())->make(true);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $instagram = new Instagram('1332035143.1677ed0.c477d2ac40cc406b8e9b487541bac34a');
        
        $insta = $instagram->media();
        
        
        return view('home')->with('users',User::all())->with('instagrams',$insta);
    }

    public function verify(){
        $isVerified = Auth::user()->isVerified;
        $data = UserValidation::where('name',Auth::user()->name)->where('nim',Auth::user()->nim)->first();
        
        if($isVerified){
            return redirect('account')->with('success','Account anda sudah verify');
        }else{
            if($data != null){
                if($data->isUsed) return redirect('account')->with('error','Nama dan NIM sudah digunakan');

                $tahun = "20".substr(Auth::user()->nim,4,2);
                Auth::user()->setVerify();
                Auth::user()->setAngkatan($tahun-1963);
                $data->setUsed();

                return redirect('account')->with('success','Berhasil verify account');
            }else{
                return redirect('account')->with('error','Gagal verify, pastikan Nama dan NIM sesuai');
            }
        }
    }

    public function friends(){
        $isVerified = Auth::user()->isVerified;        
        if($isVerified){
            $friends = User::where('isVerified',1)->paginate(2);
            return view('friends')->with('friends',$friends);
        }else{
            return redirect('home')->with('error','Silahkan melakukan verifikasi akun');
        }
    }

    public function nim($nim){
        $isVerified = Auth::user()->isVerified;        
        if($isVerified){
            $user = User::where('nim',$nim)->first();
            if($user != null) return view('friends-nim')->with('user',$user);
            else return redirect()->back()->with("error","NIM tidak ada.");
        }else{
            return redirect('home')->with('error','Silahkan melakukan verifikasi akun');
        }
    }

    public function accountUpdate(Request $request){

        if(Auth::user()->isVerified){
            $request->validate([
                'telp' => ['required', 'string', 'max:20'],
                'status' => ['required', 'string', 'max:10','in:Mahasiswa,Alumni'],
                'gender' => ['required', 'string', 'max:10','in:Male,Female'],
                'instagram' => ['required', 'string', 'max:20','regex:/^\S*$/u'],
                'job' => ['required', 'string', 'max:100'],
                'company' => ['required', 'string', 'max:100'],
                'kajian' => ['required', 'string', 'max:20','in:Hardware,Jaringan,Multimedia'],
                'title' => ['required', 'string', 'max:190'], 
            ]);

            $userUpdate = User::find(Auth::user()->id);

            $userUpdate->telp = $request->input('telp');
            $userUpdate->status = $request->input('status');
            $userUpdate->gender = $request->input('gender');
            $userUpdate->instagram = $request->input('instagram');
            $userUpdate->job = $request->input('job');
            $userUpdate->company = $request->input('company');
            $userUpdate->kajian = $request->input('kajian');
            $userUpdate->title = $request->input('title');
            $userUpdate->photo = strtolower($request->input('gender').'.png');

            $userUpdate->save();

            return redirect('account/edit')->with('success','Berhasil Update');
        }else{
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'nim' => ['required', 'string', 'max:9','min:9'],
                'telp' => ['required', 'string', 'max:20'],
                'status' => ['required', 'string', 'max:10','in:Mahasiswa,Alumni'],
                'gender' => ['required', 'string', 'max:10','in:Male,Female'],
                'instagram' => ['required', 'string', 'max:20','regex:/^\S*$/u'],
                'job' => ['required', 'string', 'max:100'],
                'company' => ['required', 'string', 'max:100'],
                'kajian' => ['required', 'string', 'max:20','in:Hardware,Jaringan,Multimedia'],
                'title' => ['required', 'string', 'max:190'],     
            ]);

            $userUpdate = User::find(Auth::user()->id);

            $userUpdate->name = $request->input('name');
            $userUpdate->nim = $request->input('nim');
            $userUpdate->telp = $request->input('telp');
            $userUpdate->status = $request->input('status');
            $userUpdate->gender = $request->input('gender');
            $userUpdate->instagram = $request->input('instagram');
            $userUpdate->job = $request->input('job');
            $userUpdate->company = $request->input('company');
            $userUpdate->kajian = $request->input('kajian');
            $userUpdate->title = $request->input('title');
            $userUpdate->photo = strtolower($request->input('gender').'.png');

            $userUpdate->save();
            
            return redirect('account/edit')->with('success','Berhasil Update');
        }
    }

    public function accountPassword(Request $request){
        if (!(Hash::check($request->get('oldPassword'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }
             
            if(strcmp($request->get('oldPassword'), $request->get('password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
            if(!(strcmp($request->get('password'), $request->get('password_confirmation'))) == 0){
                //New password and confirm password are not same
                return redirect()->back()->with("error","New Password should be same as your Retype password. Please retype new password.");
            }
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],   
            ]);

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->save();
             
            return redirect()->back()->with("success","Password changed successfully !");
             
            
    }
}
