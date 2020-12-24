<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222053200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Grupos';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('grupos');
        $table->addColumn('clave', 'string');
        $table->setPrimaryKey(['clave']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('grupos');
    }
}
