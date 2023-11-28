<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\BrandedEmail;
use Mail;

class SendEmailAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->data['label'] == 'newsletter'){
            Mail::send(new BrandedEmail($this->data));
        }else if($this->data['label'] == 'contact us'){
            Mail::send(new BrandedEmail($this->data));
        }else{
            Mail::send(new BrandedEmail($this->data));
        }
    }
}
