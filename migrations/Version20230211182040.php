<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230211182040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE recipes_allergies
        (recipes_id INT NOT NULL,
        allergies_id INT NOT NULL,
        INDEX IDX_57D8575FDF2B1FA (recipes_id),
        INDEX IDX_57D85757104939B (allergies_id),
        PRIMARY KEY(recipes_id, allergies_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipes_allergies ADD CONSTRAINT FK_57D8575FDF2B1FA
        FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_allergies ADD CONSTRAINT FK_57D85757104939B
        FOREIGN KEY (allergies_id) REFERENCES allergies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE recipes_allergies DROP FOREIGN KEY FK_57D8575FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_allergies DROP FOREIGN KEY FK_57D85757104939B');
        $this->addSql('DROP TABLE recipes_allergies');
    }
}
