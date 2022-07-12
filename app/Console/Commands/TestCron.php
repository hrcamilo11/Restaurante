<?php

namespace App\Console\Commands;

use App\Mail\SendMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class TestCron extends Command
{
    protected $signature = 'test:cron';

    protected $description = 'This is a cron to log message';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $Product = Product::all();

        $User = User::Role(['admin', 'empleado'])->get();


        foreach ($Product as $Products) {
            if ($Products->Stock <= 10) {
                foreach ($User as $Users) {
                    Mail::to($Users)->send(new
                    SendMailable($Products));
                    Log::info("Successfully, cron is running");
                }
            }
        }
    }
}