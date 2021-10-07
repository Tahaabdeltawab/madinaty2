<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification_Job;
use Carbon\Carbon;
use App\Models\Notification;

class deleteNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d',strtotime('+2 hours',strtotime($created_at)));
        foreach(Notification::all() as $notification){

            if($dateTime >= $notification->expire_date){
                $notification->delete();
            }

        }
        
    }
}
