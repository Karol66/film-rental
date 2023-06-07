<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Transactions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $price1 = rand(8, 20);
            $price2 = rand(8, 20);
            $price3 = rand(8, 20);

            Transactions::create([
                'price' => $price1,
                'quantity' => 5,
                'id_user' => 3,
                'id_adresses' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            Transactions::create([
                'price' => $price2,
                'quantity' => 5,
                'id_user' => 4,
                'id_adresses' => 2,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            Transactions::create([
                'price' => $price3,
                'quantity' => 5,
                'id_user' => 5,
                'id_adresses' => 3,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
