<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Rifrocket\LaravelCmsV2\Models\LbsMember;

class FrontAuthController extends Controller
{

    //social media login redirect google
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //social media login callback google
    public function google_callback()
    {

        $socialMediaOAuth = Socialite::driver('google')->user();
        $user=(object)[
            'email' =>  $socialMediaOAuth->user['email'],
            'password' =>  $socialMediaOAuth->user['id'],
            'first_name' =>  $socialMediaOAuth->user['given_name'],
            'last_name' =>  $socialMediaOAuth->user['family_name'],
            'display_name' =>  $socialMediaOAuth->user['name'],
            'avatar' =>  $socialMediaOAuth->user['picture'],
        ];
        return $this->socialLogin($user,'google');
    }


    //social media login redirect facebook
    public function facebook_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //social media login callback facebook
    public function facebook_callback()
    {
        $socialMediaOAuth = Socialite::driver('facebook')->user();
        $user=(object)[
            'email' =>  $socialMediaOAuth['email'],
            'password' =>  $socialMediaOAuth['id'],
            'first_name' =>  null,
            'last_name' =>  null,
            'display_name' =>  $socialMediaOAuth['name'],
            'avatar' =>  URL('frontend/images/avatar/default-avatar.png'),
        ];
        return $this->socialLogin($user,'facebook');
    }


    //social media login redirect linkedin
    public function linkedin_redirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    //social media login callback linkedin
    public function linkedin_callback()
    {
        $socialMediaOAuth = Socialite::driver('linkedin')->user();
        // dd($socialMediaOAuth->user);
        $user=(object)[
            'email' =>  $socialMediaOAuth->user['emailAddress'],
            'password' =>  $socialMediaOAuth->user['id'],
            'first_name' =>  $socialMediaOAuth->user['firstName']['localized']['en_US'],
            'last_name' =>  $socialMediaOAuth->user['lastName']['localized']['en_US'],
            'display_name' =>  $socialMediaOAuth->user['firstName']['localized']['en_US'].' '.$socialMediaOAuth->user['lastName']['localized']['en_US'],
            'avatar' =>  $socialMediaOAuth->user['profilePicture']['displayImage~']['elements'][0]['identifiers'][0]['identifier'],
        ];
        return $this->socialLogin($user,'linkedin');
    }


    protected function socialLogin($user , $social_media_type)
    {
        $redirect = 'public.property_landing_page';
        $check = LbsMember::where('email', $user->email)->withMeta()->first();
        $metaInsert=
        [
            'social_delete' => false,
            'social_media_logged'=>$social_media_type,
            'social_media_logged_id'=>$user->password,
            $social_media_type=>$user->password,
            'social_delete_'.$social_media_type=>false,
        ];

        if ($check) {
            LbsMember::createUpdateMeta($metaInsert, $check->id);
            Auth::guard('web')->login($check);
            return redirect()->route( $redirect);
        }
        
        $insert = [
            'email' => $user->email,
            'password' => $user->password,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'display_name' => $user->display_name,
            'avatar' => $user->avatar,
            'email_verified_at' => Carbon::now(),
        ];
        try {
            $savedUser = LbsMember::lbsRegister($insert);
            LbsMember::createUpdateMeta($metaInsert, $savedUser->id);
            return  LbsMember::lbsLogin(['email' => $user->email, 'password' => $user->password], $redirect, 'web');
        } catch (\Throwable $th) {
            return redirect()->route($redirect)->with('login_error', $th->getMessage());
        }
    }

    public function logout()
    {
        return  LbsMember::lsbLogout('web', 'public.property_landing_page');
    }


    public function user_dashboard()
    {
        return view('frontend_views.user-dashboard');
    }

    public function destroy_user_social_link(Request $request)
    {
        return true;
    }
}
