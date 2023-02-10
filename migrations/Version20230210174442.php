<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230210174442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE recipes
        (id INT AUTO_INCREMENT NOT NULL,
        title VARCHAR(255) NOT NULL,
        description LONGTEXT NOT NULL,
        nbr_people INT NOT NULL,
        preparation_time INT NOT NULL,
        rest_time INT NOT NULL,
        cooking_time INT NOT NULL,
        total_recipe_time INT NOT NULL,
        stages_of_recipe LONGTEXT NOT NULL,
        created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
        updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
        PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE recipes');
    }
}
