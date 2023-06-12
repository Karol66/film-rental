<?php

namespace Database\Seeders;

use App\Models\Item;
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

            $transaction1 = Transactions::create([
                'price' => $price1,
                'quantity' => 5,
                'id_user' => 3,
                'id_adresses' => 3,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            $transaction2 = Transactions::create([
                'price' => $price2,
                'quantity' => 5,
                'id_user' => 4,
                'id_adresses' => 4,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            $transaction3 = Transactions::create([
                'price' => $price3,
                'quantity' => 5,
                'id_user' => 5,
                'id_adresses' => 5,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            $filmIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]; // Replace with actual film IDs

            // Losowo miesza elementy tablicy filmIds
            shuffle($filmIds);

            // Wybiera pierwsze trzy losowe identyfikatory
            $randomFilmIds = array_slice($filmIds, 0, 3);

            // Tworzy items dla każdej transakcji z losowo wybranymi identyfikatorami filmów
            foreach ($randomFilmIds as $filmId) {
                Item::create([
                    'id_film' => $filmId,
                    'id_transaction' => $transaction1->id,
                ]);

                Item::create([
                    'id_film' => $filmId,
                    'id_transaction' => $transaction2->id,
                ]);

                Item::create([
                    'id_film' => $filmId,
                    'id_transaction' => $transaction3->id,
                ]);
            }
        }
    }
}
