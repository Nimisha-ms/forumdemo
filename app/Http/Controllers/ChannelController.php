<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channnel;

class ChannelController extends Controller
{
    public function getchannels(){
    	$channel = Channel::latest()->get();
    }
}
