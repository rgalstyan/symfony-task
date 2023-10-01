<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230930180620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO admin (username, roles, password) VALUES ('admin', '[ROLE_ADMIN]', '$2y$13$/beRPIRGwR8lL3uiLd/RYOqAtiUXM4LGMcQY4TmS9NvTY5QlkiT3G')");
    }

    public function down(Schema $schema): void
    {

    }
}
