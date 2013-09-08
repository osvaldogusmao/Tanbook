SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `crud_tanbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `crud_tanbook` ;

-- -----------------------------------------------------
-- Table `crud_tanbook`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud_tanbook`.`usuario` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `login` VARCHAR(25) NULL,
  `senha` VARCHAR(25) NULL,
  `email` VARCHAR(30) NULL,
  `datanascimento` DATE NULL,
  `nick name` VARCHAR(45) NULL,
  `facebook` VARCHAR(55) NULL,
  `avatar` MEDIUMBLOB NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud_tanbook`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud_tanbook`.`tipousuario` (
  `grupo` INT NOT NULL,
  `nivelacesso` INT NULL,
  `sexo` VARCHAR(20) NULL,
  `usuario_codigo` INT NOT NULL,
  PRIMARY KEY (`grupo`, `usuario_codigo`),
  INDEX `fk_tipousuario_usuario_idx` (`usuario_codigo` ASC),
  CONSTRAINT `fk_tipousuario_usuario`
    FOREIGN KEY (`usuario_codigo`)
    REFERENCES `crud_tanbook`.`usuario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
