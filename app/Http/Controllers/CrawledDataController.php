<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CrawledDataController extends Controller
{
    public function fetchData()
    {
        // Artisan 명령을 사용하여 test.js 실행
        Artisan::call('update-crawled-data');

        // JSON 파일 읽기
        $jsonData = file_get_contents(public_path('coupangBestData.json'));
        $crawledData = json_decode($jsonData, true);

        return view('coupangBest', ['crawledData' => $crawledData]);
    }
}
