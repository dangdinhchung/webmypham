<?php

namespace App\Console\Commands;

use App\Services\ShoppingCartService\PayManager;
use Illuminate\Console\Command;

class DrivePayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay:test-drive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test drive pay';

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
        $this->info("init command test");
        $transaction = [
            "tst_name"        => "Đặng Đình Chung",
            "tst_phone"       => "0349978666",
            "tst_address"     => "Thanh nguyên, Thanh liêm, Hà nam",
            "tst_email"       => "dangdinhchung98@gmail.com",
            "tst_note"        => "Giao hàng tận nơi ạ",
            "tst_user_id"     => 2,
            "tst_total_money" => "2192130"
        ];

        $result = new PayManager($transaction);
    }
}
