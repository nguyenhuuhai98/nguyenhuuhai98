<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\Weekly;
use Mail;

class WeeklyNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to all users, notify them of enrollment.';

    // protected $data = "Today is Friday, hurry up to learn to hone your knowledge.";
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
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('role_id', config('number.two'))->limit(5)->get();

        foreach ($users as $user) {
            Mail::raw("Today is Friday, hurry up to learn to hone your knowledge.", function ($mail) use ($user) {
                $mail->to($user->email)
                    ->subject('Important notification');
            });
        }
    }
}
