<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201206042358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Creando la tabla de Usuarios';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'bigint', ['autoincrement' => true]);
        $table->addColumn('username', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('email', 'string');
        $table->addColumn('first_name', 'string');
        $table->addColumn('last_name', 'string');
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime');
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['username', 'email']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('users');
    }
}
