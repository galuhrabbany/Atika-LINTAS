<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Table',
        ];
        
        return view('home', $data);
    }
}
