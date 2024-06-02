<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240601201549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book_to_book_format ADD book_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book_to_book_format ADD format_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book_to_book_format DROP book');
        $this->addSql('ALTER TABLE book_to_book_format DROP format');
        $this->addSql('ALTER TABLE book_to_book_format ADD CONSTRAINT FK_D02DE22216A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_to_book_format ADD CONSTRAINT FK_D02DE222D629F605 FOREIGN KEY (format_id) REFERENCES book_format (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D02DE22216A2B381 ON book_to_book_format (book_id)');
        $this->addSql('CREATE INDEX IDX_D02DE222D629F605 ON book_to_book_format (format_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book_to_book_format DROP CONSTRAINT FK_D02DE22216A2B381');
        $this->addSql('ALTER TABLE book_to_book_format DROP CONSTRAINT FK_D02DE222D629F605');
        $this->addSql('DROP INDEX IDX_D02DE22216A2B381');
        $this->addSql('DROP INDEX IDX_D02DE222D629F605');
        $this->addSql('ALTER TABLE book_to_book_format ADD book VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE book_to_book_format ADD format VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE book_to_book_format DROP book_id');
        $this->addSql('ALTER TABLE book_to_book_format DROP format_id');
    }
}
