<?php

use Illuminate\Support\Facades\DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProductSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'products';
        $this->offset_rows = 1;
        $this->mapping = [
            5 => 'name',
            8 => 'slug',            
            14 => 'thumb1x',
            16 => 'thumb2x',
            17 => 'priceDisplay',
        ];
        $this->filename = public_path().'/products.csv';
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();

        foreach(DB::select('select * from '.$this->table) as $product)
        {
            DB::update('update '.$this->table.' set price = '.preg_replace('/\b(AUD)\b/i', '', str_replace(',', '', $product->priceDisplay)).' where id = ?', [$product->id]);
            DB::update('update '.$this->table.' set thumb1x = '.preg_replace('/\b(http:)\b/i', 'https:', $product->thumb1x).' where id = ?', [$product->id]);
            DB::update('update '.$this->table.' set thumb2x = '.preg_replace('/\b(http:)\b/i', 'https:', $product->thumb2x).' where id = ?', [$product->id]);
        }
    }
}
