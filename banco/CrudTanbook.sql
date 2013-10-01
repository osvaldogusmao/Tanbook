SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `CrudTanbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `CrudTanbook` ;

-- -----------------------------------------------------
-- Table `CrudTanbook`.`TipoDeUsuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`TipoDeUsuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CrudTanbook`.`GrupoDeUsuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`GrupoDeUsuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `apelido` VARCHAR(45) NOT NULL ,
  `quantidadeDeLicensa` INT NOT NULL ,
  `validadeDaLicensa` DATE NOT NULL ,
  `dataDeCadastro` DATE NOT NULL ,
  `chaveDaLicensa` VARCHAR(45) NOT NULL ,
  `status` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CrudTanbook`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `sexo` VARCHAR(10) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `dataDeNascimento` DATE NOT NULL ,
  `urlFacebook` VARCHAR(45) NOT NULL ,
  `apelido` VARCHAR(20) NOT NULL ,
  `avatar` VARCHAR(45) NOT NULL ,
  `dataDeCadastro` DATE NOT NULL ,
  `tipoDeUsuario_id` INT NOT NULL ,
  `grupoDeUsuario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Usuario_TipoDeUsuario_idx` (`tipoDeUsuario_id` ASC) ,
  INDEX `fk_Usuario_GrupoDeUsuario1_idx` (`grupoDeUsuario_id` ASC) ,
  CONSTRAINT `fk_Usuario_TipoDeUsuario`
    FOREIGN KEY (`tipoDeUsuario_id` )
    REFERENCES `CrudTanbook`.`TipoDeUsuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_GrupoDeUsuario1`
    FOREIGN KEY (`grupoDeUsuario_id` )
    REFERENCES `CrudTanbook`.`GrupoDeUsuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CrudTanbook`.`Historia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`Historia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `resenha` MEDIUMTEXT NOT NULL ,
  `autor` VARCHAR(75) NOT NULL ,
  `dataCriacao` DATE NOT NULL ,
  `dataPublicacao` DATE NOT NULL ,
  `grupoDeUsuario_id` INT NOT NULL ,
  `status` VARCHAR(15) NOT NULL ,
  `compartilhada` VARCHAR(15) NOT NULL ,
  `fotoCapa` varchar(30) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Historia_GrupoDeUsuario1_idx` (`grupoDeUsuario_id` ASC) ,
  CONSTRAINT `fk_Historia_GrupoDeUsuario1`
    FOREIGN KEY (`grupoDeUsuario_id` )
    REFERENCES `CrudTanbook`.`GrupoDeUsuario` (`id` )
  
  ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CrudTanbook`.`LogDeAcesso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.
`LogDeAcesso` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `dataAcesso` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  
INDEX `fk_LogDeAcesso_Usuario1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_LogDeAcesso_Usuario1`
    FOREIGN KEY (`usuario_id` )
    
REFERENCES `CrudTanbook`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = 
InnoDB;

-- -----------------------------------------------------
-- Table `CrudTanbook`.`Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`Categoria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `CrudTanbook`.`HistoriaCategoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CrudTanbook`.`HistoriaCategoria` (
  `historia_id` INT NOT NULL ,
  `categoria_id` INT NOT NULL ,
  PRIMARY KEY (`historia_id`, `categoria_id`) ,
  INDEX `fk_Historia_has_Categoria_Categoria1_idx` (`categoria_id` ASC) ,
  INDEX `fk_Historia_has_Categoria_Historia1_idx` (`historia_id` ASC) ,
  CONSTRAINT `fk_Historia_has_Categoria_Historia1`
    FOREIGN KEY (`historia_id` )
    REFERENCES `CrudTanbook`.`Historia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Historia_has_Categoria_Categoria1`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `CrudTanbook`.`Categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
