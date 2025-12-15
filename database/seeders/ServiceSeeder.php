<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'id' => 1,
                'title' => 'Interior Design',
                'meta' => 'We push our design thinking boundaries through research, observation and experience to develop truly adaptable spaces.',
                'slung' => 'interior-design',
                'image' => 'iteriors.jpg',
                'content' => 'We push our design thinking boundaries through research, observation and experience to develop truly adaptable spaces.\nGreat architecture inspires change and fundamentally has the power to improve lives. For us, this is all about designing with purpose to achieve the best human experience of space.<br><br>\nOur Interiors work spans the globe. It touches communities big and small and seamlessly harmonizes with mother nature, remote and urban settings, and local cultures to effect positive outcomes.<br><br>\nCreation Office Fitouts brings experience across eleven market sectors and disciplines, from empathy-based design to sustainability. Whether you are from a small or large organization, we\'re here to help you achieve your goals and the goals of your community.',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Office Fit-Outs',
                'meta' => 'We challenge convention so that our clients receive Interior Fit-Out solutions that blend high-end aesthetics with flexible functionality.',
                'slung' => 'Office-Fit-Outs',
                'image' => 'ceilingandfloor.jpg',
                'content' => 'We challenge convention so that our clients receive Interior Fit-Out solutions that blend high-end aesthetics with flexible functionality. Throughout the office, commercial and retail sectors, the quality of our work, which is renowned for its attention to detail, has set the standard across the Eastern Africa.\n<br><br>\nPartnering with global tech giants or household names in fashion, we listen to our clients to deliver cost effective outcomes no matter how challenging, or complex, the project. With a proven track record, we have a reputation for adding value and delivering on time in the face of even the most stringent deadlines.\n<br><br>\nWe deliver where others have not – making us the preferred supplier in Uganda.',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'Construction',
                'meta' => 'We understand that each customer is unique and deserves a tailored approach, from project start to finish.',
                'slung' => 'construction',
                'image' => 'refurbish.jpg',
                'content' => '<br><br>\nOnce interior drawings are approved, we will engage our experts in the construction stages. We will construct interior walls in full accordance with the structural engineers\' notes for the premises so as not to compromise with the structural strength and stability of the existing structure.<br><br>\nWe understand that each customer is unique and deserves a tailored approach, from project start to finish. By utilizing our strong relationships with architects and professional sub-contractors, we take full responsibility of a project and work to minimize risks, reduce cost, improve efficiency, and deliver to owner standards.',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'title' => 'Refurbishments',
                'meta' => 'Over Time, The brand image evolves and it\'s easy to become desensitized to inefficiencies in your workspace...',
                'slung' => 'refurbishments',
                'image' => 'refurbish.jpg',
                'content' => '<br><br>\n\nOver Time, The brand image evolves and it\'s easy to become desensitized to inefficiencies in your workspace.An office refurbishment is a great way of refreshing your current space to fit your brand needs.<br><br>\nCreation Office Fitouts engages in refurbishment of space. We repair walls, leaking roofs, replace worn out ceilings while at the same time taking care of electrical works arising thereof. We also redecorate surrounding landscapes and even build landmarks to compliment the refurbished structures.',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'title' => 'Partitioning',
                'meta' => 'Our partitioning experts use aluminum and dry walls to partition spaces. Use of glass ensures a lot of natural lighting thus conserving energy',
                'slung' => 'partitioning',
                'image' => 'Partition.jpg',
                'content' => '<br><br>\n\nWe are aware that you may need changes to your workspace to fit in with how your business operates and to mould around a core culture that make life easier for your staff\n<br><br>\nOur partitioning experts use aluminum and dry walls to partition spaces. Use of glass ensures a lot of natural lighting thus conserving energy. The use of dry walls like Gypsum and MDF leads to conservation of environment since we do not use wood. We put a lot of emphasis on green design',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'title' => 'Ceiling & Floors Finishes',
                'meta' => 'We provide a range of ceiling and flooring solutions based on client needs and existing space structures.',
                'slung' => 'ceiling-and-floors-finishes',
                'image' => 'ceilingandfloor.jpg',
                'content' => '<br><br>\n<br>\nWe provide various ceiling and flooring solutions based on client needs and existing space structures. Ceiling finishes include but are not limited to gypsum bulkheads, acoustic ceilings, lighting fixtures, and wood detail. Our flooring expertise includes the installation of carpets, tiles, and floorboards. We also undertake the supply and fit of window solar films and blinds.',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'title' => 'Furniture Supplies',
                'meta' => 'Whether fixed or modular, we supply and fit office furniture for offices and other associated areas like the kitchen and the washrooms.',
                'slung' => 'furniture-supplies',
                'image' => 'Stationry.jpg',
                'content' => '<br><br>\n<br>Whether fixed or modular, we supply and fit office furniture for offices and other associated area like the kitchen and the washrooms. We ensure that our furniture fits the designs created to match. We choose the right materials and colours for comprehensive wholeness',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'title' => 'Custom Solutions',
                'meta' => 'We have endless solutions to your Design and construction needs, Our creative 3D artists are always ready to translate your designs.',
                'slung' => 'custom-solutions',
                'image' => 'iteriors.jpg',
                'content' => '<br><br>\n<br>We have endless solutions to your Design and construction needs, Our creative 3D artists are always ready to translate your designs.\nFrom Home Spaces , Commercial Spaces to  Warehouses, Feel free to contact Creation Office Fitouts.',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->updateOrInsert(
                ['id' => $service['id']],
                $service
            );
        }

        $this->command->info('Services seeded successfully!');
    }
}
