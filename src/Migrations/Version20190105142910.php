<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105142910 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_kid (user_id INT NOT NULL, kid_id INT NOT NULL, INDEX IDX_AE35E9F7A76ED395 (user_id), INDEX IDX_AE35E9F76A973770 (kid_id), PRIMARY KEY(user_id, kid_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_kid ADD CONSTRAINT FK_AE35E9F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_kid ADD CONSTRAINT FK_AE35E9F76A973770 FOREIGN KEY (kid_id) REFERENCES kid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD surname VARCHAR(255) NOT NULL, ADD tel VARCHAR(20) DEFAULT NULL, ADD uptodate_membership_fee TINYINT(1) NOT NULL, ADD picture VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(255) DEFAULT NULL, ADD zip_code INT DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD school_list_position INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_kid');
        $this->addSql('ALTER TABLE user DROP name, DROP surname, DROP tel, DROP uptodate_membership_fee, DROP picture, DROP address, DROP zip_code, DROP city, DROP school_list_position');
    }
}
