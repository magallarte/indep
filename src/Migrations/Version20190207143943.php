<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190207143943 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D8698A76F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_page (document_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_B3BE3AB3C33F7837 (document_id), INDEX IDX_B3BE3AB3C4663E4 (page_id), PRIMARY KEY(document_id, page_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE document_page ADD CONSTRAINT FK_B3BE3AB3C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_page ADD CONSTRAINT FK_B3BE3AB3C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school_class ADD document_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school_class ADD CONSTRAINT FK_33B1AF85C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('CREATE INDEX IDX_33B1AF85C33F7837 ON school_class (document_id)');
        $this->addSql('ALTER TABLE school ADD document_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABBC33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('CREATE INDEX IDX_F99EDABBC33F7837 ON school (document_id)');
        $this->addSql('ALTER TABLE school_level ADD document_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school_level ADD CONSTRAINT FK_44107A09C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('CREATE INDEX IDX_44107A09C33F7837 ON school_level (document_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE school_class DROP FOREIGN KEY FK_33B1AF85C33F7837');
        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABBC33F7837');
        $this->addSql('ALTER TABLE school_level DROP FOREIGN KEY FK_44107A09C33F7837');
        $this->addSql('ALTER TABLE document_page DROP FOREIGN KEY FK_B3BE3AB3C33F7837');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_page');
        $this->addSql('DROP INDEX IDX_F99EDABBC33F7837 ON school');
        $this->addSql('ALTER TABLE school DROP document_id');
        $this->addSql('DROP INDEX IDX_33B1AF85C33F7837 ON school_class');
        $this->addSql('ALTER TABLE school_class DROP document_id');
        $this->addSql('DROP INDEX IDX_44107A09C33F7837 ON school_level');
        $this->addSql('ALTER TABLE school_level DROP document_id');
    }
}
