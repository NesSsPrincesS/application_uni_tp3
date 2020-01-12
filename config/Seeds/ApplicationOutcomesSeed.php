<?php
use Migrations\AbstractSeed;

/**
 * ApplicationOutcomes seed.
 */
class ApplicationOutcomesSeed extends AbstractSeed
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
                'outcome' => 'Rejected',
            ],
            [
                'id' => '2',
                'outcome' => 'Accepted',
            ],
            [
                'id' => '4',
                'outcome' => '',
            ],
        ];

        $table = $this->table('application_outcomes');
        $table->insert($data)->save();
    }
}
