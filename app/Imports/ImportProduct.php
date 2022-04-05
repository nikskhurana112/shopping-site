<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportProduct implements ToCollection
{
    public function __construct()
    {
         # code...
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // [
        //     [

        //     ],
        //     [
                
        //     ]
        // ]
          foreach ($collection as $index => $item) {

              if($index != 0) {

                Product::create([
                    "Title" => $item[1] ,
                    "Description" => $item[2] ,
                    "Price" => $item[3] ,
                    "ImagePath" => $item[4] ,
                ]);

              }
          }
    }
}