<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; // Log 클래스 import 추가

class UpdateCrawledData extends Command
{
    protected $signature = 'update-crawled-data';

    protected $description = 'Update crawled data using test.js';

    public function handle()
    {
        // // 디버깅을 위해 로그 출력
        // Log::info('UpdateCrawledData command executed.');

        // test.js 실행
        exec('node js/test.js');

        // // 성공적으로 실행되었음을 다시 로그로 출력
        // Log::info('UpdateCrawledData command completed.');
    }
}
