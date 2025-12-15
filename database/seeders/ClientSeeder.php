<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Sanitize image filename by replacing colons with underscores
     */
    private function sanitizeImage($filename)
    {
        if (empty($filename)) {
            return $filename;
        }
        return str_replace(':', '_', $filename);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['id' => 5, 'name' => 'Jade Collection', 'orders' => 10, 'image' => '2019-09-2915:14:51imageJADE-COLLECTIONS.png', 'created_at' => '2019-01-17 02:57:52', 'updated_at' => '2019-01-17 02:57:52'],
            ['id' => 7, 'name' => 'Open Capital Advisors', 'orders' => 10, 'image' => '2019-09-2915:15:29imageOPEN-CAPITAL-ADVISORS.png', 'created_at' => '2019-01-17 12:34:37', 'updated_at' => '2019-01-17 12:34:37'],
            ['id' => 8, 'name' => 'Bollore Transport & Logistics Kenya LTD', 'orders' => 10, 'image' => '2019-09-2915:15:48imageBOLOROLE-LOGISTICS.png', 'created_at' => '2019-01-17 12:35:23', 'updated_at' => '2019-01-17 12:35:23'],
            ['id' => 9, 'name' => 'First Cargo Logistics', 'orders' => 10, 'image' => '2019-09-2915:16:01imageFIRST-LOGISTICS.png', 'created_at' => '2019-01-17 12:36:27', 'updated_at' => '2019-01-17 12:36:27'],
            ['id' => 10, 'name' => 'IDLO-International Development Law', 'orders' => 10, 'image' => '2019-09-2915:16:18imageIDLO.png', 'created_at' => '2019-01-17 12:36:54', 'updated_at' => '2019-01-17 12:36:54'],
            ['id' => 12, 'name' => 'Selex Es Technologies', 'orders' => 10, 'image' => '2019-09-2915:16:35imageSELEX-ES.png', 'created_at' => '2019-01-17 12:37:55', 'updated_at' => '2019-01-17 12:37:55'],
            ['id' => 14, 'name' => 'PJ Kakad', 'orders' => 10, 'image' => '2019-09-2915:16:59imageP-KAKAD-ADVOCATES.png', 'created_at' => '2019-01-17 12:42:17', 'updated_at' => '2019-01-17 12:42:17'],
            ['id' => 16, 'name' => 'Westside Towers', 'orders' => 10, 'image' => '2019-09-2915:17:19imageWESTSIDE-APARTMENTS.png', 'created_at' => '2019-02-14 12:05:20', 'updated_at' => '2019-02-14 12:05:20'],
            ['id' => 17, 'name' => 'Credit Bank Limited', 'orders' => 3, 'image' => '2019-09-2915:59:00imageCredit-Bank-Logo.png', 'created_at' => '2019-09-29 12:59:00', 'updated_at' => '2019-09-29 12:59:00'],
            ['id' => 18, 'name' => 'leonardo', 'orders' => 10, 'image' => '2021-04-2108:08:21image1.png', 'created_at' => '2021-04-21 05:08:21', 'updated_at' => '2021-04-21 05:08:21'],
            ['id' => 19, 'name' => 'Sub Way', 'orders' => 6, 'image' => '2022-01-2214:44:26imagephoto_2022-01-22_12-14-19(2).jpg', 'created_at' => '2021-04-21 05:08:48', 'updated_at' => '2021-04-21 05:08:48'],
            ['id' => 20, 'name' => 'NegusMed LTD', 'orders' => 10, 'image' => '2021-04-2108:09:36image5.png', 'created_at' => '2021-04-21 05:09:36', 'updated_at' => '2021-04-21 05:09:36'],
            ['id' => 22, 'name' => 'Africa Ceramics', 'orders' => 10, 'image' => '2021-04-2108:11:20image9.png', 'created_at' => '2021-04-21 05:11:20', 'updated_at' => '2021-04-21 05:11:20'],
            ['id' => 23, 'name' => 'SBA  Group', 'orders' => 8, 'image' => '2021-04-2206:56:10image10.png', 'created_at' => '2021-04-22 03:56:10', 'updated_at' => '2021-04-22 03:56:10'],
            ['id' => 24, 'name' => 'PayTech ', 'orders' => 10, 'image' => '2021-04-2206:57:34image19.png', 'created_at' => '2021-04-22 03:57:35', 'updated_at' => '2021-04-22 03:57:35'],
            ['id' => 26, 'name' => 'Shofco ', 'orders' => 10, 'image' => '2021-04-2206:59:39image13.png', 'created_at' => '2021-04-22 03:59:39', 'updated_at' => '2021-04-22 03:59:39'],
            ['id' => 27, 'name' => 'Bectel ', 'orders' => 10, 'image' => '2021-04-2207:00:33image20.png', 'created_at' => '2021-04-22 04:00:33', 'updated_at' => '2021-04-22 04:00:33'],
            ['id' => 28, 'name' => 'Global Star ', 'orders' => 10, 'image' => '2021-04-2207:01:14image21.png', 'created_at' => '2021-04-22 04:01:14', 'updated_at' => '2021-04-22 04:01:14'],
            ['id' => 29, 'name' => 'Abno Software International ', 'orders' => 10, 'image' => '2021-04-2207:04:06image11.png', 'created_at' => '2021-04-22 04:04:06', 'updated_at' => '2021-04-22 04:04:06'],
            ['id' => 30, 'name' => 'Valar', 'orders' => 7, 'image' => '2022-01-2214:45:47imagephoto_2022-01-22_12-13-08(2).jpg', 'created_at' => '2021-04-22 04:04:38', 'updated_at' => '2021-04-22 04:04:38'],
            ['id' => 31, 'name' => 'Engineering ', 'orders' => 10, 'image' => '2021-04-2207:06:49image15.png', 'created_at' => '2021-04-22 04:06:49', 'updated_at' => '2021-04-22 04:06:49'],
            ['id' => 33, 'name' => 'World Animal Protection ', 'orders' => 10, 'image' => '2021-04-2207:10:10image23.png', 'created_at' => '2021-04-22 04:10:10', 'updated_at' => '2021-04-22 04:10:10'],
            ['id' => 35, 'name' => 'Centric ', 'orders' => 10, 'image' => '2021-04-2207:10:48image22.png', 'created_at' => '2021-04-22 04:10:48', 'updated_at' => '2021-04-22 04:10:48'],
            ['id' => 38, 'name' => 'Finton Logistics ', 'orders' => 10, 'image' => '2021-04-2207:14:09image25.png', 'created_at' => '2021-04-22 04:14:09', 'updated_at' => '2021-04-22 04:14:09'],
            ['id' => 39, 'name' => 'Shelter Afrique ', 'orders' => 10, 'image' => '2021-04-2207:15:20image28.png', 'created_at' => '2021-04-22 04:15:20', 'updated_at' => '2021-04-22 04:15:20'],
            ['id' => 40, 'name' => 'Fact ', 'orders' => 10, 'image' => '2021-04-2207:16:08image26.png', 'created_at' => '2021-04-22 04:16:08', 'updated_at' => '2021-04-22 04:16:08'],
            ['id' => 42, 'name' => 'GT Bank', 'orders' => 1, 'image' => '2022-01-2214:38:43imagephoto_2022-01-22_12-13-00.jpg', 'created_at' => '2022-01-21 07:07:50', 'updated_at' => '2022-01-21 07:07:50'],
            ['id' => 43, 'name' => 'STIHL East Africa Ltd', 'orders' => 2, 'image' => '2022-01-2214:40:04imagephoto_2022-01-22_12-13-09.jpg', 'created_at' => '2022-01-21 07:13:04', 'updated_at' => '2022-01-21 07:13:04'],
            ['id' => 44, 'name' => 'IGAD', 'orders' => 3, 'image' => '2022-01-2214:41:18imagephoto_2022-01-22_12-34-38.jpg', 'created_at' => '2022-01-21 07:17:59', 'updated_at' => '2022-01-21 07:17:59'],
            ['id' => 45, 'name' => 'National Olympic committee', 'orders' => 4, 'image' => '2022-01-2214:42:49imagephoto_2022-01-22_12-24-34.jpg', 'created_at' => '2022-01-21 07:20:12', 'updated_at' => '2022-01-21 07:20:12'],
            ['id' => 46, 'name' => 'Yves Rocher', 'orders' => 5, 'image' => '2022-01-2214:43:47imagephoto_2022-01-22_12-13-10(2).jpg', 'created_at' => '2022-01-21 07:22:20', 'updated_at' => '2022-01-21 07:22:20'],
            ['id' => 47, 'name' => 'Intra health', 'orders' => 10, 'image' => '2022-01-2215:06:03imagephoto_2022-01-22_12-09-31.jpg', 'created_at' => '2022-01-22 12:04:22', 'updated_at' => '2022-01-22 12:04:22'],
            ['id' => 49, 'name' => 'Shofco', 'orders' => 10, 'image' => '2022-01-2215:08:33imagephoto_2022-01-22_12-13-05.jpg', 'created_at' => '2022-01-22 12:08:33', 'updated_at' => '2022-01-22 12:08:33'],
            ['id' => 50, 'name' => 'Negus Med', 'orders' => 10, 'image' => '2022-01-2215:09:44imagephoto_2022-01-22_12-13-06.jpg', 'created_at' => '2022-01-22 12:09:44', 'updated_at' => '2022-01-22 12:09:44'],
            ['id' => 51, 'name' => 'Resolution Insurance', 'orders' => 9, 'image' => '2022-01-2215:10:33imagephoto_2022-01-22_12-13-06(2).jpg', 'created_at' => '2022-01-22 12:10:33', 'updated_at' => '2022-01-22 12:10:33'],
            ['id' => 52, 'name' => 'MicroSave Consulting', 'orders' => 9, 'image' => '2022-01-2215:11:27imagephoto_2022-01-22_12-13-09(2).jpg', 'created_at' => '2022-01-22 12:11:27', 'updated_at' => '2022-01-22 12:11:27'],
            ['id' => 53, 'name' => 'Medecins Sans Frontiers', 'orders' => 9, 'image' => '2022-01-2215:12:20imagephoto_2022-01-22_12-13-10.jpg', 'created_at' => '2022-01-22 12:12:20', 'updated_at' => '2022-01-22 12:12:20'],
            ['id' => 54, 'name' => 'Kiptinness & Odhiambo Associates', 'orders' => 10, 'image' => '2022-01-2215:13:33imagephoto_2022-01-22_12-13-11.jpg', 'created_at' => '2022-01-22 12:13:33', 'updated_at' => '2022-01-22 12:13:33'],
            ['id' => 55, 'name' => 'Heva Enterprises', 'orders' => 10, 'image' => '2022-01-2215:15:04imagephoto_2022-01-22_12-14-19.jpg', 'created_at' => '2022-01-22 12:15:04', 'updated_at' => '2022-01-22 12:15:04'],
        ];

        foreach ($clients as $client) {
            // Sanitize image filename
            $client['image'] = $this->sanitizeImage($client['image']);
            
            DB::table('clients')->updateOrInsert(
                ['id' => $client['id']],
                $client
            );
        }

        $this->command->info('Clients seeded successfully!');
    }
}
