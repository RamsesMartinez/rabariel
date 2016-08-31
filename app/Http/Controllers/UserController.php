<?php namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\Signin;
use App\Http\Requests\Signup;
use App\User;
use Session;
use Input;

class UserController extends MainController
{
    function __construct(){
        parent::__construct();

        $this->middleware('userSigned', ['except' => ['getLogout', 'getEdit']]);
    }

    public function index(){
        return view('cms.dashboard', self::$data);
    }
    
    public function getSignin(){
        self::$data['des'] = Input::get('des');
        self::$data['title'] = 'Sign In';
        return view ('form.signin', self::$data);
    }

    public function getSignup(){
        self::$data['title'] = 'Sign Up';
        return view ('form.signup', self::$data);
    }

    public function postSignin(Signin $request){
        if(User::validateUser($request['email'], $request['password'])){
            return !empty($request['des']) ? redirect($request['des']) : redirect('');
        }
        else {
            $des = 'user/signin';
            $des .= !empty($request['des']) ? '?des=' . $request['des'] : '';
            return redirect('user/signin')->withErrors('Wrong email/password combination');
        }
    }

    public function postSignup(Signup $request){
        User::saveUser($request);
        return redirect('user/signin');
    }

    public function getLogout(){
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('is_admin');
        return redirect('user/signin');
    }
    public function getEdit(){
        echo 'to do...';
    }
}
