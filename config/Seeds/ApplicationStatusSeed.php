<?php
use Migrations\AbstractSeed;

/**
 * ApplicationStatus seed.
 */
class ApplicationStatusSeed extends AbstractSeed
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
                'status' => 'Pending',
            ],
            [
                'id' => '2',
                'status' => 'Opened',
            ],
            [
                'id' => '3',
                'status' => 'Closed',
            ],
        ];

        $table = $this->table('application_status');
        $table->insert($data)->save();
    }
}
