<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            [
                
                'email'=>'imediasun@gmail.com',
                'password'=>bcrypt('sunimedia'),
                'mobile'=>'+38(096)544-11-20',
                'add_phone'=>'+38(096)544-11-20',
                'information'=>'information description',
                'status'=>1,
                'activated'=> TRUE,
                'name' => 'Лопушанский Андрей'

            ],
            [
                'email'=>'imediasun8@gmail.com',
                'password'=>bcrypt('sunimedia'),
                'mobile'=>'+38(096)544-11-20',
                'add_phone'=>'+38(096)544-11-20',
                'information'=>'information description',
                'status'=>2,
                'activated'=> TRUE,
                'name' => 'Демидов Сергей'

            ]

        ]);
        DB::table('role_user')->insert([

            [

            'user_id' => 1,
            'role_id' => 1

        ],
            [

                'user_id' => 2,
                'role_id' => 2

            ]/*, [

            'user_id' => 3,
            'role_id' => 3

        ]*/


        ]);
        DB::table('customers_statuses')->insert([

            [
                
                'name' => 'Фізична особа'

            ],
            [

                'name' => 'Юридична особа'

            ]
            

        ]);
        

        DB::table('customers')->insert([

        [
        'id_user'=>2,
        'name'=>'Южная Пальмира',
        'edrpou'=>4568756,
        'bank'=>'Приватбанк',
        'mfo'=>324568,
        'account'=>24562345644568990,
        'city'=>'Одесса',
        'street'=>'Рішельевська',
        'house'=>45,
         'code'=>465,
        'ofice'=>345,
        'index'=>348766,

        ]
           

        ]);
        DB::table('likes')->insert([

            [

                'id_good' => 1,
                'id_user'=>1

            ]
    ]);
        DB::table('logos')->insert([

            [

                'logo' => 'adidas.png'

            ],
            [

                'logo' => 'budweiser.png'

            ],
            [

                'logo' => 'burger-king.png'

            ],
            [

                'logo' => 'chipotle.png'

            ],
            [

            'logo' => 'dunkin-donuts.png'

        ],[

                'logo' => 'ford.png'

            ],
            [

                'logo' => 'klondike.png'

            ],
            [

                'logo' => 'nike.png'

            ],
            [

                'logo' => 'nissan.png'

            ],
            [

                'logo' => 'samsung.png'

            ]
        ]);
    }
}
