<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180312104539 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE orbitale_cms_pages (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, page_content LONGTEXT DEFAULT NULL, meta_description VARCHAR(255) DEFAULT NULL, meta_title VARCHAR(255) DEFAULT NULL, meta_keywords VARCHAR(255) DEFAULT NULL, css LONGTEXT DEFAULT NULL, js LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, homepage TINYINT(1) NOT NULL, host VARCHAR(255) DEFAULT NULL, locale VARCHAR(6) DEFAULT NULL, UNIQUE INDEX UNIQ_C0E694ED989D9B62 (slug), INDEX IDX_C0E694ED12469DE2 (category_id), INDEX IDX_C0E694ED727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orbitale_cms_categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_A8EF7232989D9B62 (slug), INDEX IDX_A8EF7232727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orbitale_cms_pages ADD CONSTRAINT FK_C0E694ED12469DE2 FOREIGN KEY (category_id) REFERENCES orbitale_cms_categories (id)');
        $this->addSql('ALTER TABLE orbitale_cms_pages ADD CONSTRAINT FK_C0E694ED727ACA70 FOREIGN KEY (parent_id) REFERENCES orbitale_cms_pages (id)');
        $this->addSql('ALTER TABLE orbitale_cms_categories ADD CONSTRAINT FK_A8EF7232727ACA70 FOREIGN KEY (parent_id) REFERENCES orbitale_cms_categories (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orbitale_cms_pages DROP FOREIGN KEY FK_C0E694ED727ACA70');
        $this->addSql('ALTER TABLE orbitale_cms_pages DROP FOREIGN KEY FK_C0E694ED12469DE2');
        $this->addSql('ALTER TABLE orbitale_cms_categories DROP FOREIGN KEY FK_A8EF7232727ACA70');
        $this->addSql('DROP TABLE orbitale_cms_pages');
        $this->addSql('DROP TABLE orbitale_cms_categories');
    }
}
