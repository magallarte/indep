<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105145558 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE section ADD page_id INT DEFAULT NULL, ADD position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEFC4663E4 ON section (page_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFC4663E4');
        $this->addSql('DROP INDEX IDX_2D737AEFC4663E4 ON section');
        $this->addSql('ALTER TABLE section DROP page_id, DROP position');
    }
}
