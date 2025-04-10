<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderedMail;


class SendOrderedMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $product;
    public $user;
    public $admin1;
    public $admin2;

    public function __construct($product, $user, $admin1, $admin2)
    {
        $this->product = $product;
        $this->user = $user;
        $this->admin1 = $admin1;
        $this->admin2 = $admin2;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->admin1->email)
        ->send(new OrderedMail($this->product, $this->user, $this->admin1));
        
        Mail::to($this->admin2->email)
        ->send(new OrderedMail($this->product, $this->user, $this->admin2));
    }
}
