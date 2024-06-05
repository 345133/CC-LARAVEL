<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carImages = [
            [
                'WhatsApp Image 2024-04-01 at 04.32.05_023995cf.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.06_9186fdf2.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.06_bc347110.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.06_ca3913c5.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.07_76f7d7e1.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.07_8aea4f5b.jpg',
                'WhatsApp Image 2024-04-01 at 04.32.07_b46f8739.jpg'
            ],
            [
                'WhatsApp Image 2024-04-01 at 05.03.34_006e9313.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.34_30e71330.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.34_fa4a971c.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.35_044ae8e8.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.35_134aaaa3.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.35_15a17d79.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.36_12ba1f24.jpg',
                'WhatsApp Image 2024-04-01 at 05.03.36_8e0034ef.jpg',
            ], [
                'WhatsApp Image 2024-04-01 at 05.05.36_7f9ad45a.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.37_1256d14c.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.37_754bdb0b.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.37_9082ac1c.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.37_f14a3579.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.38_4cc96968.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.38_9d1a993b.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.38_9f8c230a.jpg',
                'WhatsApp Image 2024-04-01 at 05.05.38_a0f28aa8.jpg',
            ], [
                'WhatsApp Image 2024-04-01 at 05.06.09_21bfa58d.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.09_748afa81.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.09_d38e127e.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.09_f9cca60e.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.10_2a07d5a8.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.10_7601007b.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.10_fd24e51d.jpg',
                'WhatsApp Image 2024-04-01 at 05.06.11_976b658c.jpg',
            ], [
                'WhatsApp Image 2024-04-01 at 05.07.17_107f2f6e.jpg',
                'WhatsApp Image 2024-04-01 at 05.07.17_3ffb7ff1.jpg',
                'WhatsApp Image 2024-04-01 at 05.07.17_e47f670a.jpg',
                'WhatsApp Image 2024-04-01 at 05.07.18_4e877924.jpg',
                'WhatsApp Image 2024-04-01 at 05.07.18_7865c2d5.jpg',
                'WhatsApp Image 2024-04-01 at 05.07.18_ad7090f2.jpg',
            ]
        ];


        foreach ($carImages as $index => $images) {
            foreach ($images as $image) {
                DB::table('car_images')->insert([
                    'image_path' => 'assets/' . 'car' . ($index + 1) . '/' . $image,
                    'car_detail_id' => $index + 1,
                ]);
            }
        }
    }
}
