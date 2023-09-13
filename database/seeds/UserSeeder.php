<?php
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 5)->create();
    /*    User::create([
            'name' => 'Rafael Fijos',
            'email' => 'rafaelfijos@supergestao.com.br',
            'password' => '987654321',
        ]);
    */
    }
}
