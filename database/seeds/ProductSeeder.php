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
            6 => 'category',
            8 => 'slug',            
            14 => 'thumb1x',
            16 => 'thumb2x',
            17 => 'priceDisplay',       
            31 => 'saleDisplay',
            34 => 'stock'

        ];
        $this->filename = storage_path().'/uploads/products.csv';
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
            DB::table($this->table)
            ->where('id', $product->id)
            ->update(['price' => preg_replace('/\b(AUD|,)\b/i', '', $product->priceDisplay), 'sale' => preg_replace('/\b(AUD|,)\b/i', '', $product->saleDisplay), 'thumb1x' => str_replace('http://', 'https://', $product->thumb1x), 'thumb2x' => str_replace('http://', 'https://', $product->thumb2x)]);      
        }
		$products = DB::select('select * from '.$this->table);
		DB::table($this->table)->truncate();

        foreach($products as $product)
        {
            if($product->sale > 0)
            {
                DB::table($this->table)
                ->where('id', $product->id)
				->where($product->sale, '>', 20)
                ->update(['savings' => ((($product->price - $product->sale) / $product->price) * 100)]);      
            } else {
                DB::table($this->table)
                ->where('id', $product->id)
				->where($product->price, '>', 20)
                ->update(['savings' => 0]);      
            }
        }
    }
}
