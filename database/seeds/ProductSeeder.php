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
            17 => 'price',
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
    }
}
