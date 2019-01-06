<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105151256 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, startime DATETIME DEFAULT NULL, endtime DATETIME DEFAULT NULL, place VARCHAR(255) DEFAULT NULL, picture1 VARCHAR(255) DEFAULT NULL, picture2 VARCHAR(255) NOT NULL, picture3 VARCHAR(255) DEFAULT NULL, picture4 VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_3BAE0AA7E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_school_level (event_id INT NOT NULL, school_level_id INT NOT NULL, INDEX IDX_A90370FA71F7E88B (event_id), INDEX IDX_A90370FAA1F77FE3 (school_level_id), PRIMARY KEY(event_id, school_level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_school (event_id INT NOT NULL, school_id INT NOT NULL, INDEX IDX_CB07ADE971F7E88B (event_id), INDEX IDX_CB07ADE9C32A47EE (school_id), PRIMARY KEY(event_id, school_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_school_class (event_id INT NOT NULL, school_class_id INT NOT NULL, INDEX IDX_DEA2A57671F7E88B (event_id), INDEX IDX_DEA2A57614463F54 (school_class_id), PRIMARY KEY(event_id, school_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7E7A1254A FOREIGN KEY (contact_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event_school_level ADD CONSTRAINT FK_A90370FA71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_school_level ADD CONSTRAINT FK_A90370FAA1F77FE3 FOREIGN KEY (school_level_id) REFERENCES school_level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_school ADD CONSTRAINT FK_CB07ADE971F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_school ADD CONSTRAINT FK_CB07ADE9C32A47EE FOREIGN KEY (school_id) REFERENCES school (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_school_class ADD CONSTRAINT FK_DEA2A57671F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_school_class ADD CONSTRAINT FK_DEA2A57614463F54 FOREIGN KEY (school_class_id) REFERENCES school_class (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_school_level DROP FOREIGN KEY FK_A90370FA71F7E88B');
        $this->addSql('ALTER TABLE event_school DROP FOREIGN KEY FK_CB07ADE971F7E88B');
        $this->addSql('ALTER TABLE event_school_class DROP FOREIGN KEY FK_DEA2A57671F7E88B');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_school_level');
        $this->addSql('DROP TABLE event_school');
        $this->addSql('DROP TABLE event_school_class');
    }
}
