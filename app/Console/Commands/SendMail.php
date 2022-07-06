<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Product;


class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Send:Mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail';

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
        $Product = Product::all();

        $User = User::Role(['Administrador', 'Vendedor'])->get();

        foreach ($Product as $Products) {
            if ($Products->stock <= 10) {
                foreach ($User as $Users) {
                    Mail::to($Users)->send(new
                    SendMailable($Products));
                    Log::info("Successfully, cron is running");
                }
            }
        }

    }
}
