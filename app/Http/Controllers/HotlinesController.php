<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotlinesController extends Controller
{
    public function index() {
        $hotlines = [
            [
                'title' => 'HOPELINE',
                'audience' => 'Everyone',
                'description' => 'HOPELINE provides 24/7, free, compassionate, and confidential support by phone.',
                'status' => 'Open',
                'availability' => '24/7',
                'phone' => '(02) 8804-4673',
                'link' => 'https://facebook.com/HOPELINE'
            ],
            [
                'title' => 'In Touch: Crisis Line',
                'audience' => 'Volunteers',
                'description' => 'In Touch: Crisis Line ay nakatuon sa pagbibigay ng 24/7, libre, mahabagin at kumpidensyal na suporta',
                'status' => 'Open',
                'availability' => 'Mon-Fri 8am-6pm',
                'phone' => '+63 2 8893 7603',
                'link' => 'https://in-touch.org'
            ],
            [
                'title' => 'NCMH Crisis Hotline',
                'audience' => 'Counselors',
                'description' => 'HOPELINE provides 24/7, free, compassionate and confidential support by phone. ',
                'status' => 'Open',
                'availability' => 'Mon-Fri 8am-6pm',
                'phone' => '1553',
                'link' => 'https://ncmh.gov.ph'
            ],
            [
                'title' => 'Tawag Paglaum - Centro Bisaya',
                'audience' => 'Volunteers',
                'description' => 'In Touch: Crisis Line ay nakatuon sa pagbibigay ng 24/7, libre, mahabagin at kumpidensyal na suporta',
                'status' => 'Open',
                'availability' => 'Mon-Fri 8am-6pm',
                'phone' => '+63 2 8893 7603',
                'link' => 'https://www.facebook.com/p/Tawag-Paglaum-Centro-Bisaya-100068862624004/'
            ],
            // Add more hotlines as needed
        ];
    
        return view('student.hotlines', ['hotlines' => $hotlines]);
    } 
}
