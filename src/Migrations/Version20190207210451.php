<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190207210451 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page_file DROP FOREIGN KEY FK_B5B2ACA93CB796C');
        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABB93CB796C');
        $this->addSql('ALTER TABLE school_class DROP FOREIGN KEY FK_33B1AF8593CB796C');
        $this->addSql('ALTER TABLE school_level DROP FOREIGN KEY FK_44107A0993CB796C');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE page_file');
        $this->addSql('DROP INDEX IDX_33B1AF8593CB796C ON school_class');
        $this->addSql('ALTER TABLE school_class DROP file_id');
        $this->addSql('DROP INDEX IDX_F99EDABB93CB796C ON school');
        $this->addSql('ALTER TABLE school DROP file_id');
        $this->addSql('DROP INDEX IDX_44107A0993CB796C ON school_level');
        $this->addSql('ALTER TABLE school_level DROP file_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, content VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_8C9F3610F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE page_file (page_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_B5B2ACAC4663E4 (page_id), INDEX IDX_B5B2ACA93CB796C (file_id), PRIMARY KEY(page_id, file_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE page_file ADD CONSTRAINT FK_B5B2ACA93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_file ADD CONSTRAINT FK_B5B2ACAC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school ADD file_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_F99EDABB93CB796C ON school (file_id)');
        $this->addSql('ALTER TABLE school_class ADD file_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school_class ADD CONSTRAINT FK_33B1AF8593CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_33B1AF8593CB796C ON school_class (file_id)');
        $this->addSql('ALTER TABLE school_level ADD file_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school_level ADD CONSTRAINT FK_44107A0993CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_44107A0993CB796C ON school_level (file_id)');
    }
}
