<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $params =
        [
            [
                'name' => 'そうしのまくら',
                'email' => 'test2@test.com',
                'password' => 'bbbbb222'
            ],
            [
                'name' => 'たきじい',
                'email' => 'test3@test.com',
                'password' => 'ccccc333'
            ],
            [
                'name' => 'あくたの龍ちゃん',
                'email' => 'test4@test.com',
                'password' => 'ddddd444'
            ]
        ];

        $now = now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}