<?php
use Migrations\AbstractSeed;

/**
 * Programs seed.
 */
class ProgramsSeed extends AbstractSeed
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
                'name' => 'Computer Science',
                'Description' => 'kaki',
            ],
            [
                'id' => '2',
                'name' => 'Arts',
                'Description' => 'idsa',
            ],
        ];

        $table = $this->table('programs');
        $table->insert($data)->save();
    }
}
