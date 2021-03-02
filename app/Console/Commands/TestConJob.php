<?php

namespace App\Console\Commands;
use App\Product;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Console\Command;
use Goutte\Client;

class TestConJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test CronJob ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->scrape();
    }

    public function scrape()
    {
        $url = 'https://www.thegioididong.com/dtdd';

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $crawler->filter('ul.homeproduct li.item')->each(
            function (Crawler $node) {
                $name = $node->filter('h3')->text();

                $price = $node->filter('.price strong')->text();

                $wholeStar = $node->filter('.icontgdd-ystar')->count();
                $halfStar = $node->filter('.icontgdd-hstar')->count();
                $rate = $wholeStar + 0.5 * $halfStar;
                $price = preg_replace('/\D/', '', $price);

                $product = new Product;
                $product->name = $name;
                $product->price = $price;
                $product->rate = $rate;
                $product->save();
            }
        );


    }
}
