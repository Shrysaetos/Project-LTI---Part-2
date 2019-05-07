<?php

use Illuminate\Database\Seeder;

class BiddingsSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $this->command->line("");
    $this->command->line("##################################################################################");
    $this->command->line("Creating Bids");
    $this->command->line("##################################################################################");

    $faker = Faker\Factory::create('pt_PT');

    $averageBidsPerAuction = 12;
    $auctions = DB::table('auctions')->get();

    for ($i = 0; $i < sizeof($auctions); $i++) {
      if ($i % 5 != 0) {
        $this->buildBidsForOneAuction($faker, $auctions[$i], $averageBidsPerAuction);
      }
    }
  }

  private function getRandomUser() {
    static $users;
    $users = $users != null ? $users : DB::table('users')->pluck('id');
    return $users->random();
  }

  private function buildBidsForOneAuction(Faker\Generator $faker, $auction, $averageBidsPerAuction) {
    $totalBids = intval($averageBidsPerAuction * 0.7 + rand(0, $averageBidsPerAuction * 0.6));
    for ($i = 0; $i < $totalBids; $i++) {
      $lastBid = DB::table('auctions')->where('id', $auction->id)->orderBy('id', 'desc')->pluck('last_bid_price')->first();
      $lastBid = $lastBid == 0.00 ? $auction->min_price : $lastBid;

      $this->buildOneBid($faker, $auction, $this->getRandomUser(), $lastBid + rand(1.00, 9.99));
    }
  }

  private function buildOneBid(Faker\Generator $faker, $auction, $user_id, $bid_price) {
    $lastBidDateTime = DB::table('biddings')->where('auction_id', $auction->id)->orderBy('created_at', 'desc')->pluck('created_at')->first();

    //$teste = $this->command->ask('created_at: ' . $lastBidDateTime, 'OK');

    $created = is_null($lastBidDateTime) ? $auction->start : $lastBidDateTime;

    $bid = [
      'auction_id' => $auction->id,
      'user_id' => $user_id,
      'bid_price' => $bid_price,
      'created_at' => $faker->dateTimeBetween($created, $auction->end),
    ];
    DB::table('biddings')->insert($bid);

    DB::table('auctions')->where('id', $auction->id)->update(['last_bid_price' => $bid_price, 'last_bid_user_id' => $user_id]);
  }
}
