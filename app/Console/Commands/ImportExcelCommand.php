<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Imports\PostImport;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;


class ImportExcelCommand extends Command
{

    protected $signature = 'import:excel';

    protected $description = 'Get data from Excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new PostImport(), public_path('excel/Posts.xlsx'));
    }
}
