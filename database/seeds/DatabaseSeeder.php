<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('tbl_admin_table');
    }

}

class tbl_admin_table extends Seeder {
    public function run () {
        DB::table('tbl_admin')->insert([
            array('admin_email'=>'admin3@gmail.com', 'admin_password'=>'123456' , 'admin_name'=>'Admin3', 'admin_phone'=>'01234644', 'admin_status'=>'1')
        ]);
    }
}
