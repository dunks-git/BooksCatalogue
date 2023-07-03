<?php

namespace App\Console\Commands;

use App\Http\Components\ImportDataClient;
use App\Models\Genre;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-json-placeholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from json placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new ImportDataClient(verify:false, timeout:1); // or import or service
        $response = $client->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents(), false, 512, JSON_UNESCAPED_UNICODE);
        foreach ($data as $d) {
//            echo $d->title.PHP_EOL;
//            $newTitle = trim(strtok($d->title, " "),',');
            $newTitle = strtok($d->title, " ");
//            $newTitle = strtok(" ");
            $newTitle = trim(strtok( " "),',');
            //$newTitle = explode(' ', trim($d->title))[1];
            echo $newTitle . PHP_EOL;

            Genre::firstOrCreate([
                'title' => $newTitle
            ]
//                ,
//                [
//                    'title' => $newTitle
//                ]
            );
        }
        dd('finish');
    }
}
