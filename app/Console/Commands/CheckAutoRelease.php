<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
class CheckAutoRelease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:CheckAutoRelease';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs to check auto-release timer on service orders. It will close the order, pay the seller unless the order is disputed.';

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
        $orders = Order::where('status',0)->where('escrow',1)->where('escrow_release','<=',Carbon::now())->get();
        foreach($orders as $order) {
            // update order to complete, pay the seller
            $order->status = 1;
            $user = User::whereId($order->seller_id)->first();
            if($user != null) {
                $user->earned_gp = floatval($user->earned_gp) + floatval($order->price);
                $user->save();
            }
            $order->escrow = 0;
            $order->save();
        }
        return 0;
    }
}
