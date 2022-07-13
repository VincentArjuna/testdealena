<?php

namespace App\Console\Commands;

use App\Models\Product\Product;
use App\Services\NotificationService;
use App\Services\Product\TransactionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckClosedBids extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bid:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check bid and close if it meets the requirements';

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
        $service = new NotificationService;
        Log::info('Starting bid:check task!');
        DB::beginTransaction();
        $products = Product::query()
            ->where('bid_end', '<=', now())
            ->whereIsShow(1)
            ->whereNull('winner_id');
        $product_count = $products->count();
        $this->info('Product Count : ' . $product_count);
        $bar = $this->output->createProgressBar($product_count);
        $bar->start();
        foreach ($products->lazy() as $product) {
            $product = $product->append('highest_bidder');
            $update = collect();
            $update->put('is_show', 0);
            if ($product->bidders->count() > 0) {
                $member_id = $product->highest_bidder->member_id;
                $update->put('winner_id', $product->highest_bidder->member_id);

                // Create new transaction with product and member
                $transaction = (new TransactionService)->storeTransaction($product, $member_id);
                $service->auctionWin($product);
            }
            $product->update($update->toArray());

            //Create Notification
            $service->auctionClosed($product);
            $bar->advance();
        }
        $bar->finish();
        $this->newLine();
        if ($product_count < 1) {
            $this->info('No product were updated!');
        } else {
            $this->info('The command was successful!');
        }
        DB::commit();
        Log::info('End of bid:check task!');

        return 0;
    }
}
