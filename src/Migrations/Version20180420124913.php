<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180420124913 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cycle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycle_film (cycle_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_D652848F5EC1162 (cycle_id), INDEX IDX_D652848F567F5183 (film_id), PRIMARY KEY(cycle_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cycle_film ADD CONSTRAINT FK_D652848F5EC1162 FOREIGN KEY (cycle_id) REFERENCES cycle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cycle_film ADD CONSTRAINT FK_D652848F567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cycle_film DROP FOREIGN KEY FK_D652848F5EC1162');
        $this->addSql('DROP TABLE cycle');
        $this->addSql('DROP TABLE cycle_film');
    }
}
