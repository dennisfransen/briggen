<?php

use App\Models\Corporation;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Corporation::truncate();

        $briggen = factory(Corporation::class)->create([
            "title" => "Briggen Restaurang",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non mollis tortor." .
                " Cras velit nulla, eleifend ut varius quis, hendrerit eget leo. Sed in accumsan enim, ultricies " .
                "mollis tellus. Nulla.",
            "presentation_image_url" => "https://i.imgur.com/nuCQILz.jpg",
            "star_value" => 3.0,
        ]);

        $oden = factory(Corporation::class)->create([
            "title" => "Oden Bistro",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non mollis tortor." .
                " Cras velit nulla, eleifend ut varius quis, hendrerit eget leo. Sed in accumsan enim, ultricies " .
                "mollis tellus. Nulla.",
            "presentation_image_url" => "https://i.imgur.com/FxUqTp1.jpg",
            "star_value" => 4.0,
        ]);

        $this->createProduct($briggen, "Hamburgare");
        $this->createProduct($briggen, "Pasta & Köttfärssås");
        $this->createProduct($briggen, "Jansons Frestelse");

        $this->createProduct($oden, "Elefantöra");
    }

    private function createProduct(Corporation $corporation, $title)
    {
        factory(Product::class)->create([
            "corporation_id" => $corporation->id,
            "title" => $title,
        ]);
    }
}
