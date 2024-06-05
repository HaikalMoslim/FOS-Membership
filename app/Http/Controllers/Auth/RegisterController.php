<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'color_preference' => ['required', 'array', 'in:red,blue,orange,yellow,green,purple,white,black,grey,beige,brown,pink'],
            'style_preference' => ['required', 'array', 'in:casual,formal,business,sporty,vintage,bohemian'],
            'fit_preference' => ['required', 'array', 'in:slim,regular,loose'],
            'pattern_preference' => ['required', 'array', 'in:stripes,checks,floral,solid,geometric'],
            'gender' => ['required', 'string', 'in:men,women,boy,girl'],
            'clothing_type' => ['required', 'array'],
            'clothing_type.*' => ['in:top,bottom'],
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'color_preference' => implode(',', $data['color_preference']),
            'style_preference' => implode(',', $data['style_preference']),
            'fit_preference' => implode(',', $data['fit_preference']),
            'pattern_preference' => implode(',', $data['pattern_preference']),
            'gender' => $data['gender'],
            'clothing_type' => implode(',', $data['clothing_type']),
            'points' => config('reward.default-points'),
        ]);
    }    
}
