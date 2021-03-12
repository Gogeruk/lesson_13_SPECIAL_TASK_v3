<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OauthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function oauthCallback()
    {
        $git_url_parts = [
            'client_id'    => env('OAUTH_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_REDIRECT_URI'),
            'scope'        => env('OAUTH_SCOPE'),
        ];

        $git_url = "https://github.com/login/oauth/authorize?".http_build_query($git_url_parts);

        return redirect("$git_url");
    }

    public function oauth()
    {
        $data = request()->get('code');
        dd($data);
    }
}




//
