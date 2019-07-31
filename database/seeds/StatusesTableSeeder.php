<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_id_arr = User::pluck('id')->toArray();
        $faker = app(Faker\Generator::class);

        $statuses = factory(Status::class)->times(3000)->make()->each(function($status)use($user_id_arr,$faker){
            $status->user_id = $faker->randomElement($user_id_arr);
        });

        Status::insert($statuses->toArray());
    }
}
