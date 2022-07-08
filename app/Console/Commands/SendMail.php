<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Product;


class SendMail extends Command
{

    protected $signature = 'Send:Mail';

    protected $description = 'Send Mail';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $Product = Product::all();

        $User = User::Role(['Administrador', 'Vendedor'])->get();
        $subject = "Un articulo necesita tu atención";

        foreach($Product as $Products){

            if ($Products->Stock<10){

                foreach($User as $Users){

                    Mail::send('email',$request->all(), function($Mensaje) use($Users){

                    $Mensaje->subject($subject);
                    $Mensaje->to($Users);
                    SendMailable($Products);

                    });

                Log::info("Successfully, cron is running");
                }
            }
        }
    }
}

                    //Mail::to($Users)->send(new
                    //SendMailable($Products));
                    //Log::info("Successfully, cron is running");
