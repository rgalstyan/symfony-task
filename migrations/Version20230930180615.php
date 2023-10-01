<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230930180615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(128) DEFAULT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product RENAME INDEX idx_d34a04ad9777d11e TO IDX_D34A04AD12469DE2');
        $this->addSql("INSERT INTO admin (id, username, roles, password) VALUES (nextval('admin_id_seq'), 'admin', '[\"ROLE_ADMIN\"]' '\$argon2id\$v=19\$m=65536,t=4,p=1\ $2y$13$/beRPIRGwR8lL3uiLd/RYOqAtiUXM4LGMcQY4TmS9NvTY5QlkiT3G')");
        //symfony run psql -c "INSERT INTO admin (id, username, roles, password) \
        //  VALUES (nextval('admin_id_seq'), 'admin', '[\"ROLE_ADMIN\"]', \
        //  '\$argon2id\$v=19\$m=65536,t=4,p=1\ $2y$13$/beRPIRGwR8lL3uiLd/RYOqAtiUXM4LGMcQY4TmS9NvTY5QlkiT3G')"
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('ALTER TABLE product RENAME INDEX idx_d34a04ad12469de2 TO IDX_D34A04AD9777D11E');
    }
}
