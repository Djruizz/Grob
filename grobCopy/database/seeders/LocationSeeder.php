<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::updateOrCreate([
            'name' => 'Monterrey',
            'street' => 'Libramiento Noreste #9239',
        ],
        [
            'neighborhood' => 'Parque Industrial Mitras',
            'postal_code' => '66023',
            'city' => 'García',
            'state' => 'Nuevo León',
            'phone' => '(81) 8047-2000',
            'email_1' => 'gzz1.govi@suspension-grob.com',
            'email_2' => 'tmk1.govi@suspension-grob.com',
            'lat' => 25.786916983999465,
            'lng' => -100.43367487432285,
            'map_url' => "https://maps.app.goo.gl/oZb9M9zoR22HpPZx5",
        ]
        );
    }
}
