<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "admin1";
        $administrator->email = "admin1@admin.id";
        $administrator->password = \Hash::make("12345678");
        $administrator->username = "username";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
