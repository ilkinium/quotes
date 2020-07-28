<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728065851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quotes (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, type_id INT NOT NULL, body LONGTEXT NOT NULL, INDEX IDX_A1B588C5F675F31B (author_id), INDEX IDX_A1B588C5C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT FK_A1B588C5F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT FK_A1B588C5C54C8C93 FOREIGN KEY (type_id) REFERENCES quote_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE quotes');
    }
}
