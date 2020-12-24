<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222053156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Alumnos';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('alumnos');
        $table->addColumn('no_de_control', 'string');
        $table->addColumn('nombre', 'string');
        $table->setPrimaryKey(['no_de_control']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('alumnos');
    }
}
