<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SessionController extends Controller
{
    public function jamFlix(){
        session()->get('jam');
        session()->forget('jam');
        Session::put('jam','jamFlix');
        
        return redirect()->route('user.dashboard');
    }
    public function knowledgeHub(){
        session()->get('jam');
        session()->forget('jam');
        Session::put('jam','knowledgeHub');
        return redirect()->route('user.dashboard');
    }
}
