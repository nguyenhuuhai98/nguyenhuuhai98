<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Notification;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;

    protected $customers;

    public function __construct($data, $customers)
    {
        $this->data = $data;
        $this->customers = $customers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            // Mail::to('hainhgch16440@fpt.edu.vn')->send(new Notification($this->data));
        foreach ($this->customers as $customer) {
            Mail::to($customer->email)->send(new Notification($this->data));
        }
    }
}
