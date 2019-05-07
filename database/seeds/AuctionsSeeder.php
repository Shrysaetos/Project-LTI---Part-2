<?php

use Illuminate\Database\Seeder;

class AuctionsSeeder extends Seeder {
  private $itemsPath = 'public/items';

  private $contadorGlobal = 0;
  private $totaItems = 12;
  private $faker = null;

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $this->command->line("");
    $this->command->line("##################################################################################");
    $this->command->line("Creating Auctions");
    $this->command->line("##################################################################################");

    Storage::deleteDirectory($this->itemsPath);
    Storage::makeDirectory($this->itemsPath);

    $this->faker = Faker\Factory::create('pt_PT');

    $this->addAuction($this->faker, 'tools.jpg', 'Tools', 18.3);
    $this->addAuction($this->faker, 'bike.jpeg', 'Bike', 295.5);
    $this->addAuction($this->faker, 'canon.jpeg', 'Canon', 455.0);
    $this->addAuction($this->faker, 'chair.jpg', 'Chair', 82.0);
    $this->addAuction($this->faker, 'guitar_elvis.jpeg', 'Elvis Guitar', 893.0);
    $this->addAuction($this->faker, 'house.jpg', 'House', 210600.0);
    $this->addAuction($this->faker, 'ipad.jpg', 'Ipad', 485.0);
    $this->addAuction($this->faker, 'iphone.jpg', 'Iphone', 345.0);
    $this->addAuction($this->faker, 'macbook.jpg', 'Macbook', 1835.0);
    $this->addAuction($this->faker, 'smartwatch.jpeg', 'Smartwatch', 90.0);
    $this->addAuction($this->faker, 'typewriter.jpg', 'Typewriter', 125.0);
    $this->addAuction($this->faker, 'volkswagen.jpeg', 'Volkswagen', 7800.0);
  }

  private function copyProfilePhoto($filename) {
    $targetDir = storage_path('app/' . $this->itemsPath);

    $newFileName = str_random(16) . ".jpg";

    File::copy(database_path('seeds/items_photos') . "/$filename", $targetDir . '/' . $newFileName);
    return $newFileName;
  }

  private $auctionCounter = 1;
  private function addAuction(Faker\Generator $faker, $filename, $title, $price, $softDelete = false) {
    $newFileName = $this->copyProfilePhoto($filename);
    $createdAt = Carbon\Carbon::now()->subDays(600);

    if ($this->contadorGlobal < 8) {
      $startBase = Carbon\Carbon::now()->subDays(5);
    } else {
      $startBase = Carbon\Carbon::now()->subDays(1);
    }

    $start = $startBase->copy()->addMinutes(rand(0, 1440));
    $hasTerminated = $this->auctionCounter % 4 == 0;
    $this->auctionCounter++;
    $end = $startBase->copy()->addMinutes(rand(1440, 10080));

    $auction = [
      'title' => $title,
      'description' => $faker->realText(200),
      'photo_url' => $newFileName,
      'min_price' => $price,
      'start' => $start,
      'end' => $hasTerminated ? $end : null,
      'last_bid_price' => 0.00,
      'owner_id' => $this->getRandomUser(),
      'created_at' => $createdAt,
      'updated_at' => $faker->dateTimeBetween($createdAt),
      'deleted_at' => $softDelete ? $this->faker->dateTimeBetween($createdAt) : null,
    ];
    $this->contadorGlobal++;
    DB::table('auctions')->insert($auction);
    $this->command->info("Created Auction {$this->contadorGlobal}/{$this->totaItems}: " . $auction['title']);
  }

  private function getRandomUser() {
    static $users;
    $users = $users != null ? $users : DB::table('users')->pluck('id');
    return $users->random();
  }
}
