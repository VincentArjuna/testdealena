<?php

namespace App\Console\Commands;

use App\Models\Product\Transaction;
use DB;
use Illuminate\Console\Command;
use Log;

class CheckMemberCancellation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check If Member Successfully Pay Auction';

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
        Log::info('Starting member:payment task!');
        DB::beginTransaction();
        $transactions = Transaction::query()
            ->where('status', 'waiting_payment')
            ->where('created_at', '<=', now()->subDays(5));
        $transaction_count = $transactions->count();
        $this->info('Transaction Count : ' . $transaction_count);
        $bar = $this->output->createProgressBar($transaction_count);
        $bar->start();
        foreach ($transactions->lazy() as $transaction) {
            $transaction->update(['status' => 'cancelled']);
            $bar->advance();
        }
        $bar->finish();
        $this->newLine();
        if ($transaction_count < 1) {
            $this->info('No Transaction were Cancelled!');
        } else {
            $this->info('The command was successful!');
        }
        DB::commit();
        Log::info('End of member:payment task!');
        return 0;
    }
}
