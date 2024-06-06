<?php

namespace App\Handlers;

use Monolog\Handler\AbstractHandler;

class ScheduleLogHandler extends AbstractHandler
{
    public function handle($record)
    {
        if ($record->level === Logger::INFO && strpos($record->message, 'Running scheduled tasks every minute') !== false) {
            $this->formatter->setTimestamp(time());
            $this->formatter->format($record);
            echo $this->formatted;
        }
    }
}