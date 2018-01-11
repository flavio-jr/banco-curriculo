<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180111202208 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE endereco (id INT AUTO_INCREMENT NOT NULL, pais VARCHAR(60) NOT NULL, estado VARCHAR(2) NOT NULL, cidade VARCHAR(50) NOT NULL, bairro VARCHAR(60) NOT NULL, logradouro VARCHAR(100) NOT NULL, numero INT NOT NULL, referencia LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curriculo (id INT AUTO_INCREMENT NOT NULL, endereco_id INT NOT NULL, name VARCHAR(100) NOT NULL, sexo ENUM(\'M\', \'F\') NOT NULL COMMENT \'(DC2Type:SexoType)\', idade INT NOT NULL, estado_civil ENUM(\'S\', \'C\') NOT NULL COMMENT \'(DC2Type:EstadoCivilType)\', email VARCHAR(60) NOT NULL, telefone VARCHAR(12) NOT NULL, descricao LONGTEXT DEFAULT NULL, habilidades LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', experiencias LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', formacao LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_A184E4FB1BB76823 (endereco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curriculo ADD CONSTRAINT FK_A184E4FB1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE curriculo DROP FOREIGN KEY FK_A184E4FB1BB76823');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('DROP TABLE curriculo');
    }
}
