<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('application_outcomes')
            ->addColumn('outcome', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('application_status')
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('program_applications')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('application_outcome_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('application_status_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('program_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('university_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'application_outcome_id',
                ]
            )
            ->addIndex(
                [
                    'application_status_id',
                ]
            )
            ->addIndex(
                [
                    'program_id',
                ]
            )
            ->addIndex(
                [
                    'university_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('programs')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('Description', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->create();

        $this->table('universities')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('adress', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('web_site', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('gender', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('date_of_birth', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('phone_num', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('program_applications')
            ->addForeignKey(
                'application_outcome_id',
                'application_outcomes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'application_status_id',
                'application_status',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'program_id',
                'programs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'university_id',
                'universities',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('program_applications')
            ->dropForeignKey(
                'application_outcome_id'
            )
            ->dropForeignKey(
                'application_status_id'
            )
            ->dropForeignKey(
                'program_id'
            )
            ->dropForeignKey(
                'university_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('application_outcomes')->drop()->save();
        $this->table('application_status')->drop()->save();
        $this->table('program_applications')->drop()->save();
        $this->table('programs')->drop()->save();
        $this->table('universities')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
