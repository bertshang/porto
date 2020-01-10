<?php

namespace Bertshang\Porto\Abstracts\Events\Jobs;

use Bertshang\Porto\Abstracts\Events\Interfaces\ShouldHandle;
use Bertshang\Porto\Abstracts\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class EventJob
 *
 * @author  Arthur Devious
 */
class EventJob extends Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $handler;

    /**
     * EventJob constructor.
     *
     * @param \Bertshang\Porto\Abstracts\Events\Interfaces\ShouldHandle $handler
     */

    public function __construct(ShouldHandle $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Handle the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->handler->handle();
    }
}
