<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105134356 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, zip_code INT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, director_gender VARCHAR(15) DEFAULT NULL, director_name VARCHAR(255) DEFAULT NULL, director_email VARCHAR(255) DEFAULT NULL, director_tel VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kid ADD school_id INT NOT NULL');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887CC32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('CREATE INDEX IDX_4523887CC32A47EE ON kid (school_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kid DROP FOREIGN KEY FK_4523887CC32A47EE');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP INDEX IDX_4523887CC32A47EE ON kid');
        $this->addSql('ALTER TABLE kid DROP school_id');
    }
}
