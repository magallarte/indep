<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105135706 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school_list (id INT AUTO_INCREMENT NOT NULL, school_id INT NOT NULL, available_seats INT DEFAULT NULL, elected_seats INT DEFAULT NULL, UNIQUE INDEX UNIQ_5E027F5C32A47EE (school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school_list ADD CONSTRAINT FK_5E027F5C32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE user ADD school_list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AF812413 FOREIGN KEY (school_list_id) REFERENCES school_list (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649AF812413 ON user (school_list_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AF812413');
        $this->addSql('DROP TABLE school_list');
        $this->addSql('DROP INDEX IDX_8D93D649AF812413 ON user');
        $this->addSql('ALTER TABLE user DROP school_list_id');
    }
}
