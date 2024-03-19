<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\View;

class CoupangBestController extends Controller
{
    public function index()
    {
        // 외부 명령 실행
        $process = new Process(['node', 'resources/js/test.js']);
        $process->run();

        // 명령 실행 결과 반환
        if (!$process->isSuccessful()) {
            // 실패한 경우 오류를 반환할 수 있습니다.
            abort(500, 'Failed to retrieve data from Coupang.');
        }

        // 성공한 경우 명령 실행 결과를 가져옵니다.
        $crawledData = json_decode($process->getOutput());

        // 뷰에 데이터를 전달하여 템플릿을 렌더링합니다.
        return view('coupangBest', ['crawledData' => $crawledData]);
    }
}
