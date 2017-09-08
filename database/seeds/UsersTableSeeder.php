<?php


use Phinx\Seed\AbstractSeed;

class UsersTableSeeder extends AbstractSeed
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

        $this->execute('DELETE FROM users');
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => md5('secret'),
            ];
        }

        $users = $this->table('users');
        $users->insert($data)
            ->save();
    }
}
