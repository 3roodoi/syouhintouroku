<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Todo;

class deletedOldtodo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeletedOldTodo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '一番古いデータを削除';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $todo = Todo::oldest()->first()->delete();
        echo "実行しました。";
    }
}
