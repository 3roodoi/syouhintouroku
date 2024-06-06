<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Todo;

class PublicationDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PublicationDeadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '作成後１分経過した製品を削除';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    // $todo = Todo::first()->delete();
    // 1 分前の時刻を取得
    $oneMinuteAgo = now()->subMinute();

    // 1 分前に作成されたレコードを削除
    Todo::where('created_at', '<', $oneMinuteAgo)->delete();
    }
}
