<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use SEO;
use OpenGraph;
use Session;

class AuthController extends Controller
{



    public function logout()
    {

        Auth::logout();
        return redirect(route('login'));
    }

    public function loginView()
    {

        $prerequisites = parent::prerequisites();
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName']. ' - ' .  'ورود');
        SEO::setDescription($prerequisites['brandName'] . ' - ' .  'ورود');
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL').'/website_assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir');
        //---------------------------------------------- Pre needed page
        return view('Auth.login'  , compact(
            'prerequisites'
        ));
    }

    public function loginSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_field' => 'required|string|min:5|max:11|string',
            'password' => 'required|min:3|max:50',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }

        $field_col = $this->credentials($request->input('user_field'));

        $user = User::where($field_col, $request->input('user_field'))->where('blocked' , false)->first();


        if (!$user || !Hash::check($request->input('password'), $user->password)) {

            $this->errorMessage('نام کاربری و یا کلمه عبور اشتباه است');
            return redirect()->back()->withInput();
        }

        Auth::login($user);
        if(!is_null($request->redirects_to))
            return redirect()->to($request->redirects_to);
        return redirect()->back();

    }


    public function registerView()
    {


        $prerequisites = parent::prerequisites();
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName']. ' - ' .  'ثبت نام');
        SEO::setDescription($prerequisites['brandName'] . ' - ' .  'ثبت نام');
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL').'/website_assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir');

        return view('Auth.register' , compact(
            'prerequisites'
        ));
    }

    public function registerSubmit(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'username' => 'required|alpha_dash|min:6|max:255|string|unique:users,username',
            'name' => 'required|string|min:2|max:255',
            'password' => 'required|string|min:6|confirmed',


        ]);


        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }



        $user = User::create([
            "username" => $request->input('username'),
            "name" => $request->input('name'),

            "password" => Hash::make($request->input('password')),

        ]);

        Auth::login($user);

        $this->successMessage(['شما با موفقیت عضو  شدید']);

        return redirect(route('website.home'));

    }


    private function credentials($user_field)
    {
        if (is_numeric($user_field))
            return 'phone';
        elseif (filter_var($user_field, FILTER_VALIDATE_EMAIL))
            return 'email';
        else
            return 'username';
    }



}
