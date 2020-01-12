<?php
use Migrations\AbstractSeed;

/**
 * ProgramApplications seed.
 */
class ProgramApplicationsSeed extends AbstractSeed
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
                'id' => '2',
                'user_id' => '1',
                'application_outcome_id' => '2',
                'application_status_id' => '1',
                'program_id' => '1',
                'university_id' => '1',
                'created' => '2016-10-26 20:25:00',
            ],
            [
                'id' => '7',
                'user_id' => '2',
                'application_outcome_id' => NULL,
                'application_status_id' => NULL,
                'program_id' => '1',
                'university_id' => '1',
                'created' => NULL,
            ],
        ];

        $table = $this->table('program_applications');
        $table->insert($data)->save();
    }
}
