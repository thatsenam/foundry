<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmbedLinkController extends Controller
{
    public function embed_community($community = 2){
       $domain = $currentDomain = $_SERVER['SERVER_NAME'];
       $link = `<iframe src="$domain/#/dashboard/$community?type=embed" style="width: 100%;height: 100vh;"></iframe>`;

       dd($link);
    }
}
