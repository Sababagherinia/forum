<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [


        'App\Events\Auth\ActivationWithEmail' => [
            'App\Listeners\Auth\ActivationSendMailNotification',
        ],

        'App\Events\Auth\ActivationWithSMS' => [
            'App\Listeners\Auth\ActivationSendSMSNotification',
        ],

        'App\Events\Auth\ResetPasswordWithEmail' => [
            'App\Listeners\Auth\ResetPasswordSendMailNotification',
        ],

        'App\Events\Auth\ResetPasswordWithSMS' => [
            'App\Listeners\Auth\ResetPasswordSendSMSNotification',
        ],

        'App\Events\Notification\FCMSendToAll' => [
            'App\Listeners\Notification\FCMSendToAllNotification',
        ],


        'App\Events\Order\DelayWithSMS' => [
            'App\Listeners\Order\DelayWithSMSNotification',
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
