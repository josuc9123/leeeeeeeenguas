<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222040324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('telefonos');
        $table->addColumn('id', 'bigint', ['autoincrement' => true]);
        $table->addColumn('user_id', 'bigint');
        $table->addColumn('telefono', 'string');
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime');
        $table->setPrimaryKey(['id']);
        $table->addForeignKeyConstraint('users', ['user_id'], ['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('telefonos');
    }
}
