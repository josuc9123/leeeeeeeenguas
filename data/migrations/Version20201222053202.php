<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222053202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Alumnos <-> Grupos';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('alumnos_grupos');
        $table->addColumn('no_de_control', 'string');
        $table->addColumn('clave', 'string');
        $table->addForeignKeyConstraint('alumnos', ['no_de_control'], ['no_de_control']);
        $table->addForeignKeyConstraint('grupos', ['clave'], ['clave']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('alumnos_grupos');
    }
}
