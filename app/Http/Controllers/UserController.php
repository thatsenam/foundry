<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function onboardingUpdate(Request $request)
    {
//        dd($request->all());
        $user = auth()->user();
        $user->on_boarding = 1;
        $user->community_style = $request->community_style;
        $user->account_type = $request->account_type;
        $user->monetize_community = ($request->monetize_community == true) ? 1 : 0;
        $user->community_banner = $request->community_banner;
        $user->company_name = $request->company_name;
        $user->company_city = $request->company_city;
        $user->company_postal_code = $request->company_postal_code;
        $user->company_address = $request->company_address;
        $user->company_country = $request->company_country;

        if ($request->hasFile('banner')) {
            $user->community_banner = $this->moveFile($request->banner);
        }
        if ($request->hasFile('avatar')) {
            $user->community_logo =  $this->moveFile($request->avatar);
        }
        $user->save();
        return $user;
    }


}
