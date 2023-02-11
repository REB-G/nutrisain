<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230211180105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users_diets
        (users_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\',
        diets_id INT NOT NULL, INDEX IDX_C78AAFEF67B3B43D (users_id),
        INDEX IDX_C78AAFEF9B4CB3A8 (diets_id), PRIMARY KEY(users_id, diets_id))
        DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_diets ADD CONSTRAINT FK_C78AAFEF67B3B43D
        FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_diets ADD CONSTRAINT FK_C78AAFEF9B4CB3A8
        FOREIGN KEY (diets_id) REFERENCES diets (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users_diets DROP FOREIGN KEY FK_C78AAFEF67B3B43D');
        $this->addSql('ALTER TABLE users_diets DROP FOREIGN KEY FK_C78AAFEF9B4CB3A8');
        $this->addSql('DROP TABLE users_diets');
    }
}
