<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109090306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tournoi ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFFB88E14F ON tournoi (utilisateur_id)');
        $this->addSql('ALTER TABLE tour ADD tournoi_id INT NOT NULL');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F969F607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('CREATE INDEX IDX_6AD1F969F607770A ON tour (tournoi_id)');
        $this->addSql('ALTER TABLE `match` ADD tour_id INT NOT NULL');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC50515ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('CREATE INDEX IDX_7A5BC50515ED8D43 ON `match` (tour_id)');
        $this->addSql('ALTER TABLE `set` ADD un_match_id INT NOT NULL');
        $this->addSql('ALTER TABLE `set` ADD CONSTRAINT FK_E61425DCC9AB8686 FOREIGN KEY (un_match_id) REFERENCES `match` (id)');
        $this->addSql('CREATE INDEX IDX_E61425DCC9AB8686 ON `set` (un_match_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC50515ED8D43');
        $this->addSql('DROP INDEX IDX_7A5BC50515ED8D43 ON `match`');
        $this->addSql('ALTER TABLE `match` DROP tour_id');
        $this->addSql('ALTER TABLE `set` DROP FOREIGN KEY FK_E61425DCC9AB8686');
        $this->addSql('DROP INDEX IDX_E61425DCC9AB8686 ON `set`');
        $this->addSql('ALTER TABLE `set` DROP un_match_id');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F969F607770A');
        $this->addSql('DROP INDEX IDX_6AD1F969F607770A ON tour');
        $this->addSql('ALTER TABLE tour DROP tournoi_id');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFFB88E14F');
        $this->addSql('DROP INDEX IDX_18AFD9DFFB88E14F ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP utilisateur_id');
    }
}
