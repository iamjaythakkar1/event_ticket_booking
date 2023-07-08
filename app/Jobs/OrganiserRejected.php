<?php

namespace App\Jobs;

use App\Mail\Admin\OrgRejectByAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrganiserRejected implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $organiser;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($organiser)
    {
        $this->organiser = $organiser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->organiser['organiser_email'])->send(new OrgRejectByAdmin(
            ['name' => $this->organiser['organiser_name']]
        ));
    }
}
