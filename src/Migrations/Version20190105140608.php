<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105140608 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kid ADD school_class_id INT NOT NULL, ADD school_level_id INT NOT NULL');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887C14463F54 FOREIGN KEY (school_class_id) REFERENCES school_class (id)');
        $this->addSql('ALTER TABLE kid ADD CONSTRAINT FK_4523887CA1F77FE3 FOREIGN KEY (school_level_id) REFERENCES school_level (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4523887C14463F54 ON kid (school_class_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4523887CA1F77FE3 ON kid (school_level_id)');
        $this->addSql('ALTER TABLE school_list ADD school_level_id INT NOT NULL');
        $this->addSql('ALTER TABLE school_list ADD CONSTRAINT FK_5E027F5A1F77FE3 FOREIGN KEY (school_level_id) REFERENCES school_level (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E027F5A1F77FE3 ON school_list (school_level_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kid DROP FOREIGN KEY FK_4523887C14463F54');
        $this->addSql('ALTER TABLE kid DROP FOREIGN KEY FK_4523887CA1F77FE3');
        $this->addSql('DROP INDEX UNIQ_4523887C14463F54 ON kid');
        $this->addSql('DROP INDEX UNIQ_4523887CA1F77FE3 ON kid');
        $this->addSql('ALTER TABLE kid DROP school_class_id, DROP school_level_id');
        $this->addSql('ALTER TABLE school_list DROP FOREIGN KEY FK_5E027F5A1F77FE3');
        $this->addSql('DROP INDEX UNIQ_5E027F5A1F77FE3 ON school_list');
        $this->addSql('ALTER TABLE school_list DROP school_level_id');
    }
}
