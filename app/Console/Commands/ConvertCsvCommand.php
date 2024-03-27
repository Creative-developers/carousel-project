<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SimpleXMLElement;

class ConvertCsvCommand extends Command
{
    protected $signature = 'convert-csv:convert {file}';
    protected $description = 'Convert a CSV file to a JSON and XML formats';


    public function handle()
    {
        $file = $this->argument('file'); //csv file
        $csvContents = array_map('str_getcsv', file($file));

        //storing json
        array_walk($csvContents, function(&$a) use ($csvContents) {
           $a = array_combine($csvContents[0], $a);
        });

        array_shift($csvContents);

        //store file in storage dir
        file_put_contents(storage_path('app/carousel.json'), json_encode($csvContents));
        
        //storing xml
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($csvContents, array ($xml, 'addChild'));
         
        //store file in storage dir
        file_put_contents(storage_path('app/carousel.xml'), $xml->asXML());

        $this->info("convert-csv: JSON and XML file saved to storage/app/");
    }
}
