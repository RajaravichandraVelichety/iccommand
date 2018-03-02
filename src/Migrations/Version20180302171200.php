<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180302171200 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map_item ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE map_item ADD CONSTRAINT FK_8C33828B3DA5256D FOREIGN KEY (image_id) REFERENCES document (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_8C33828B3DA5256D ON map_item (image_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map_item DROP FOREIGN KEY FK_8C33828B3DA5256D');
        $this->addSql('DROP INDEX IDX_8C33828B3DA5256D ON map_item');
        $this->addSql('ALTER TABLE map_item DROP image_id');
    }
}
