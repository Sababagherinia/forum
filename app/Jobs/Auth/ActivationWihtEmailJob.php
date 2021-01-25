<?php

namespace App\Jobs\Auth;

use App\Mail\Auth\Activation;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ActivationWihtEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $user;
    public $code;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user  )
    {
        $this->user = $user;
        $this->code = $user->getEmailRegisterCode();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new Activation($this->user, $this->code));
    }
}
