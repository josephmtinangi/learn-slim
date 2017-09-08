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
        $data = [
            ['name' => 'Joseph Mtinangi', 'email' => 'josephmtinangi@gmail.com', 'password' => md5('secret')],
        ];

        $users = $this->table('users');
        $users->insert($data)
            ->save();
    }
}
