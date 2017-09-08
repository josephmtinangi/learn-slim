<?php

use Phinx\Seed\AbstractSeed;

class ProjectsTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];

        $this->execute('DELETE FROM projects');

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'user_id' => 1,
            ];
        }

        $projects = $this->table('projects');
        $projects->insert($data)
            ->save();
    }
}
