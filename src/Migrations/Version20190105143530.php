<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105143530 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_58562B47A76ED395 ON board (user_id)');
        $this->addSql('ALTER TABLE user ADD membership_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491FB354CD FOREIGN KEY (membership_id) REFERENCES membership (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6491FB354CD ON user (membership_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47A76ED395');
        $this->addSql('DROP INDEX IDX_58562B47A76ED395 ON board');
        $this->addSql('ALTER TABLE board DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491FB354CD');
        $this->addSql('DROP INDEX UNIQ_8D93D6491FB354CD ON user');
        $this->addSql('ALTER TABLE user DROP membership_id');
    }
}
