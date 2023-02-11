<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230211181303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE recipes ADD difficulty_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B5FCFA9DAE
        FOREIGN KEY (difficulty_id) REFERENCES difficulties (id)');
        $this->addSql('CREATE INDEX IDX_A369E2B5FCFA9DAE ON recipes (difficulty_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B5FCFA9DAE');
        $this->addSql('DROP INDEX IDX_A369E2B5FCFA9DAE ON recipes');
        $this->addSql('ALTER TABLE recipes DROP difficulty_id');
    }
}
