<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newproject = new Project();
            $newproject->title = $faker->realText(20);
            $newproject->repo_name = $faker->realText(20);
            $newproject->description = $faker->realText(200);
            $newproject->slug = Str::slug($newproject->title, '-');
            //dd($faker->image('public/storage/placeholders', 640, 480, 'Posts', false));
            //$path = Storage::getConfig()['root'] . DIRECTORY_SEPARATOR . "placeholders";
            //echo $faker->image($path, 640, 480, 'Posts') . PHP_EOL;
            //dd($faker->image('storage/app/public/placeholders', 640, 480, 'Posts', false));
            //$newproject->thumb = 'placeholders/' . $faker->image('storage/app/public/placeholders', 640, 480, 'Posts', false);
            $newproject->save();
        }
    }
}
