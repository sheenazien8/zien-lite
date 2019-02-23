<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
            'username' => 'sheena',
            'password' => password_hash('8chelsealampard', PASSWORD_DEFAULT),
            'email' => 'sheenazien08@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        $user = $this->table('users');
        $user->insert($data)->save();
    }
}
