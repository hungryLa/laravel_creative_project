<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJSONPlaceHolderCommand extends Command
{

    protected $signature = 'import:JSONPlaceHolder';

    protected $description = 'Get data from JSONPlaceHolder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');

        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item) {
            Post::firstOrCreate(
                [
                    'title' => $item->title
                ],
                [
                    'title' => $item->title,
                    'content' => $item->body,
                    'topic_id' => 2
                ]
            );
            dd('Finish');
        }
    }
}
