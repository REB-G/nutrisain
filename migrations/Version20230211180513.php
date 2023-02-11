<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230211180513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE recipes_diets
        (recipes_id INT NOT NULL,
        diets_id INT NOT NULL,
        INDEX IDX_2FC6AAF3FDF2B1FA (recipes_id),
        INDEX IDX_2FC6AAF39B4CB3A8 (diets_id),
        PRIMARY KEY(recipes_id, diets_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipes_diets ADD CONSTRAINT FK_2FC6AAF3FDF2B1FA
        FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_diets ADD CONSTRAINT FK_2FC6AAF39B4CB3A8
        FOREIGN KEY (diets_id) REFERENCES diets (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE recipes_diets DROP FOREIGN KEY FK_2FC6AAF3FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_diets DROP FOREIGN KEY FK_2FC6AAF39B4CB3A8');
        $this->addSql('DROP TABLE recipes_diets');
    }
}
