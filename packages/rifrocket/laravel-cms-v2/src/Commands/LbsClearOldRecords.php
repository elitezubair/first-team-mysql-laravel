<?php

namespace Rifrocket\LaravelCmsV2\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LbsClearOldRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Lbs:clear-old-records
    {--t|tables : clear the lbs_otp_validators table}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will clear unnessory data from database tables and from the application:
    such as:

    1- clear lbs_otp_validators table
    ';

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
        $options = array_keys(array_filter($this->options()));


        if ($options) {
            foreach ($options as $key => $value) {
                switch ($value) {
                    case 'tables':
                        $this->clearTables();
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }


        return 0;
    }

    protected function clearTables()
    {
        $this->info('This action will earase all data in the followin tablse:
        1-lbs_otp_validators
        ');
        if ($this->confirm('Do you wish to continue?', true)) {
            DB::table('lbs_otp_validators')->truncate();
            $this->info('The command was successful!');
        }

    }
}
