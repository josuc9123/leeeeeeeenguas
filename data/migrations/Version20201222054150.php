<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222054150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Alumnos <-> Calificaciones';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('alumnos_calificaciones');
        $table->addColumn('id', 'bigint', ['autoincrement' => true]);
        $table->addColumn('no_de_control', 'string');
        $table->addColumn('clave', 'string');
        $table->addColumn('parcial', 'integer');    
        $table->addColumn('calificacion', 'integer');
        $table->setPrimaryKey(['id']);
        $table->addForeignKeyConstraint('alumnos', ['no_de_control'], ['no_de_control']);
        $table->addForeignKeyConstraint('grupos', ['clave'], ['clave']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('alumnos_calificaciones');
    }
}
