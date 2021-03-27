<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20210327120051
 * @package DoctrineMigrations
 */
final class Version20210327120051 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return 'Initializes project database';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) : void
    {
        $query = <<<QUERY
CREATE TABLE IF NOT EXISTS classrooms (
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    created DATETIME NOT NULL,
    active TINYINT NOT NULL
);
QUERY;
        $this->addSql($query);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) : void
    {
        $this->addSql("DROP TABLE classrooms;");
    }
}
