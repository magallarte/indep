<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105145232 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_link (page_id INT NOT NULL, link_id INT NOT NULL, INDEX IDX_B168852BC4663E4 (page_id), INDEX IDX_B168852BADA40271 (link_id), PRIMARY KEY(page_id, link_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_file (page_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_B5B2ACAC4663E4 (page_id), INDEX IDX_B5B2ACA93CB796C (file_id), PRIMARY KEY(page_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, subtitle VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page_link ADD CONSTRAINT FK_B168852BC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_link ADD CONSTRAINT FK_B168852BADA40271 FOREIGN KEY (link_id) REFERENCES link (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_file ADD CONSTRAINT FK_B5B2ACAC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_file ADD CONSTRAINT FK_B5B2ACA93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page_link DROP FOREIGN KEY FK_B168852BC4663E4');
        $this->addSql('ALTER TABLE page_file DROP FOREIGN KEY FK_B5B2ACAC4663E4');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_link');
        $this->addSql('DROP TABLE page_file');
        $this->addSql('DROP TABLE section');
    }
}
