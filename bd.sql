create database licitacao;

use licitacao;

CREATE TABLE IF NOT EXISTS licita (
  `idlicitacao` INT NOT NULL,
  `titulo` VARCHAR(150) NOT NULL,
  `municipio_ibge` VARCHAR(45) NOT NULL,
  `orgao` VARCHAR(150) NOT NULL,
  `abertura_datetime` DATETIME NOT NULL,
  `objeto` VARCHAR(1500) NOT NULL,
  `link` VARCHAR(150) NOT NULL,
  `municipio` VARCHAR(100) NOT NULL,
  `abertura` VARCHAR(45) NOT NULL,
  `id_tipo` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlicitacao`))
ENGINE = InnoDB;