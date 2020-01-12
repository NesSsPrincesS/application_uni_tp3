<?php
use Migrations\AbstractSeed;

/**
 * Universities seed.
 */
class UniversitiesSeed extends AbstractSeed
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
                'name' => 'UQAM',
                'adress' => '21324 rjuw',
                'web_site' => 'http://localhost/application_uni/universities/add',
            ],
        ];

        $table = $this->table('universities');
        $table->insert($data)->save();
    }
}
