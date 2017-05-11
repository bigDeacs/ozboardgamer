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
			18 => 'brand',  			
            31 => 'saleDisplay'
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
			$sale = preg_replace('/\b(AUD|,)\b/i', '', $product->saleDisplay);
			$price = preg_replace('/\b(AUD|,)\b/i', '', $product->priceDisplay);
			if(isset($product->brand)) {
				if($sale > 0) {
					if($sale > 20)
					{
						DB::table($this->table)
						->where('id', $product->id)
						->update([
							'price' => $price, 
							'sale' => $sale, 
							'thumb1x' => str_replace('http://', 'https://', $product->thumb1x), 
							'thumb2x' => str_replace('http://', 'https://', $product->thumb2x),
							'savings' => ((($price - $sale) / $price) * 100)
						]);  
					}
				} else {
					if($price > 20)
					{
						DB::table($this->table)
						->where('id', $product->id)
						->update([
							'price' => $price, 
							'sale' => $sale, 
							'thumb1x' => str_replace('http://', 'https://', $product->thumb1x), 
							'thumb2x' => str_replace('http://', 'https://', $product->thumb2x),
							'savings' => 0
						]);  
					}
				}
			}
        }
    }
}
