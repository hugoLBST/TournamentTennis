<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109174133 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `set` ADD utilisateur_gagnant_id INT DEFAULT NULL, ADD utilisateur_perdant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `set` ADD CONSTRAINT FK_E61425DC304180AE FOREIGN KEY (utilisateur_gagnant_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE `set` ADD CONSTRAINT FK_E61425DC38F42B32 FOREIGN KEY (utilisateur_perdant_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_E61425DC304180AE ON `set` (utilisateur_gagnant_id)');
        $this->addSql('CREATE INDEX IDX_E61425DC38F42B32 ON `set` (utilisateur_perdant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `set` DROP FOREIGN KEY FK_E61425DC304180AE');
        $this->addSql('ALTER TABLE `set` DROP FOREIGN KEY FK_E61425DC38F42B32');
        $this->addSql('DROP INDEX IDX_E61425DC304180AE ON `set`');
        $this->addSql('DROP INDEX IDX_E61425DC38F42B32 ON `set`');
        $this->addSql('ALTER TABLE `set` DROP utilisateur_gagnant_id, DROP utilisateur_perdant_id');
    }
}
