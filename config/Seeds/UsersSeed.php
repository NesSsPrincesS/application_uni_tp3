<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Jane',
                'gender' => 'F',
                'date_of_birth' => '2014-06-18 12:16:00',
                'created' => '2020-05-21 15:20:00',
                'phone_num' => '127',
                'password' => '$2y$10$aDWyxcXyMemqCALVmC5SSu9dMvcTB/RSGbtmIKa/6rxo.yCCU5enO',
                'email' => '',
            ],
            [
                'id' => '2',
                'name' => 'Admin',
                'gender' => 'F',
                'date_of_birth' => '2014-02-18 12:44:00',
                'created' => NULL,
                'phone_num' => '0',
                'password' => '$2y$10$f67tDRgTsPh1foBufLye7.4oBci6D4LmYsOhHg88DKqSQSAIC1uHe',
                'email' => 'admin@admin.com',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
