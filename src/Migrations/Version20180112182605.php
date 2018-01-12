<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180112182605 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE curriculo DROP FOREIGN KEY FK_A184E4FB1BB76823');
        $this->addSql('ALTER TABLE curriculo ADD CONSTRAINT FK_A184E4FB1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE curriculo DROP FOREIGN KEY FK_A184E4FB1BB76823');
        $this->addSql('ALTER TABLE curriculo ADD CONSTRAINT FK_A184E4FB1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
    }
}
