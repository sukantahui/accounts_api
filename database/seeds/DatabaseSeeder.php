<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\PersonType;
use App\Model\LedgerType;
use App\Model\Ledger;
use App\Model\Asset;
use App\Model\Transaction;
use App\Model\voucher;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {


        //person_types table data
        PersonType::create(['person_type_name' => 'Owner']);
        PersonType::create(['person_type_name' => 'Manager']);
        PersonType::create(['person_type_name' => 'Manager Workshop']);
        PersonType::create(['person_type_name' => 'Manager Sales']);
        PersonType::create(['person_type_name' => 'Manager Accounts']);
        PersonType::create(['person_type_name' => 'Office Staff']);
        PersonType::create(['person_type_name' => 'Agent']);
        PersonType::create(['person_type_name' => 'Worker']);
        PersonType::create(['person_type_name' => 'Developer']);
        PersonType::create(['person_type_name' => 'Customer']);
        PersonType::create(['person_type_name' => 'Karigarh']);

        // user
        User::create(['person_name'=>'Arindam Biswas','mobile1'=>'9836444999','mobile2'=>'','email'=>'arindam','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>1]);
        User::create(['person_name'=>'Abishek Basak','mobile1'=>'9836444451','mobile2'=>'','email'=>'bangle396@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'person_type_id'=>7]);

        //Ledger_types
        LedgerType::create(['ledger_type_name' => 'Income','value'=>1]);
        LedgerType::create(['ledger_type_name' => 'Expenditure','value'=>-1]);

        //Ledgers
        Ledger::create(['ledger_name'=>'Received from Owner','ledger_type_id'=>1]);
        Ledger::create(['ledger_name'=>'Received LC','ledger_type_id'=>1]);
        Ledger::create(['ledger_name'=>'Refinish income','ledger_type_id'=>1]);
        Ledger::create(['ledger_name'=>'Misc. Received','ledger_type_id'=>1]);

        Ledger::create(['ledger_name'=>'Withdraw by Owner','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Electricity Bill Paid','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Municipal Tax','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Saraswati Puja Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Biswakarma Puja Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Daily Puja Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Daily Tiffin Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Muchi','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Sweeper','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Van Rent','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Car Rent','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'TA for Salesman','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Gas Equipment purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Donation Paid','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Market Expenditure for owner','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Gas Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Salary paid','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Misc. Expenditure','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Cleaning Material Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Bala Making Charge Paid','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Dice Charge paid','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Color Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Electric worker paid ','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Electric Equipment Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Costic Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Acid Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Sohaga Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Bronze Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Copper Purchase','ledger_type_id'=>2]);
        Ledger::create(['ledger_name'=>'Phone Bill Paid','ledger_type_id'=>2]);

        //Assets
        Asset::create(['assets_name'=>'Cash','opening_balance'=>0]);
        Asset::create(['assets_name'=>'Bank','opening_balance'=>0]);

        //Voucher
        Voucher::create(['voucher_name'=>'Receipt']);
        Voucher::create(['voucher_name'=>'Payment']);

    }
}
