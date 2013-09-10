SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `crud_tanbook` DEFAULT CHARACTER SET utf8 ;
USE `crud_tanbook` ;

-- -----------------------------------------------------
-- Table `crud_tanbook`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crud_tanbook`.`usuario` (
  `codigo` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome_completo` VARCHAR(45) NULL DEFAULT NULL ,
  `login` VARCHAR(25) NULL DEFAULT NULL ,
  `senha` VARCHAR(25) NULL DEFAULT NULL ,
  `email` VARCHAR(30) NULL DEFAULT NULL ,
  `data_nascimento` DATE NULL DEFAULT NULL ,
  `apelido` VARCHAR(45) NULL DEFAULT NULL ,
  `url_facebook` VARCHAR(55) NULL DEFAULT NULL ,
  `avatar` MEDIUMBLOB NULL DEFAULT NULL ,
  `sexo` VARCHAR(20) NULL ,
  `chave_validacao` VARCHAR(45) NULL ,
  PRIMARY KEY (`codigo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crud_tanbook`.`tipousuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crud_tanbook`.`tipousuario` (
  `nivelacesso` INT(11) NULL DEFAULT NULL ,
  `usuario_codigo` INT(11) NOT NULL ,
  PRIMARY KEY (`usuario_codigo`) ,
  INDEX `fk_tipousuario_usuario_idx` (`usuario_codigo` ASC) ,
  CONSTRAINT `fk_tipousuario_usuario`
    FOREIGN KEY (`usuario_codigo` )
    REFERENCES `crud_tanbook`.`usuario` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crud_tanbook`.`grupoUsuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crud_tanbook`.`grupoUsuario` (
  `idGrupo` INT NOT NULL AUTO_INCREMENT ,
  `nomeEscola` VARCHAR(75) NOT NULL ,
  `nicknameGrupo` VARCHAR(45) NOT NULL ,
  `licenca` INT NOT NULL ,
  `dataInclusaoLicenca` DATE NOT NULL ,
  `validadeLinceca` DATE NOT NULL ,
  `status` VARCHAR(15) NOT NULL ,
  `usuario_codigo` INT(11) NOT NULL ,
  PRIMARY KEY (`idGrupo`) ,
  INDEX `fk_grupoUsuario_usuario1_idx` (`usuario_codigo` ASC) ,
  CONSTRAINT `fk_grupoUsuario_usuario1`
    FOREIGN KEY (`usuario_codigo` )
    REFERENCES `crud_tanbook`.`usuario` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
