SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tt-bdr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `tt-bdr` ;

-- -----------------------------------------------------
-- Table `tt-bdr`.`atividade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tt-bdr`.`atividade` (
  `id_atividade` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(64) NOT NULL ,
  `descricao` VARCHAR(256) NULL ,
  `data_inclusao` DATETIME NOT NULL ,
  `estado` ENUM('0', '1') NOT NULL DEFAULT '0' ,
  `posicao_lista` INT NOT NULL DEFAULT '1' ,
  `excluido` INT NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id_atividade`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
