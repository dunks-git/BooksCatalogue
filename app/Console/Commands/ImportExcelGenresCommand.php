<?php

namespace App\Console\Commands;

use App\Imports\GenresImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelGenresCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-excel-genres';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from excel genres table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', -1);
        Excel::import(new GenresImport(), public_path('xls/genres.xlsx'));
        dd('finish');
    }
}
