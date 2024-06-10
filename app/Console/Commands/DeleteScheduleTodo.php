<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Todo;

class DeleteScheduleTodo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteScheduleTodo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete_scheduleの日程で削除する為のhandle';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = now();
        Todo::whereNotNull('delete_schedule')
            ->where('delete_schedule', '<=', $now)
            ->update(['deleted_at' => $now])
            ->delete();
    }
}
