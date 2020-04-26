<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Invoice;
use App\InvoiceItem;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Invoice::truncate();

        InvoiceItem::truncate();

        foreach(range(1, 25) as $i){
            $discount = mt_rand(0, 100);
            $sub_total = mt_rand(500, 1000);

            $invoice = Invoice::create([
                'customer_id'=> $i,
                'title'=> $faker->sentence,
                'date'=> '2016-'.mt_rand(1, 12).'-'.mt_rand(1, 28),
                'due_date'=> '2016-'.mt_rand(1, 12).'-'.mt_rand(1, 28),
                'discount'=> $discount,
                'sub_total'=> $sub_total,
                'total'=> $sub_total - $discount

            ]);

            foreach (range(1, mt_rand(2,6)) as $j ) {
                InvoiceItem::create([
                    'invoice_id'=> $invoice->id,
                    'description'=> $faker->sentence,
                    'qty'=>mt_rand(1, 7),
                    'unit_price'=>mt_rand(100, 400)

                ]);
            }
        }
    }
}
