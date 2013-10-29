SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `crudtanbook` DEFAULT CHARACTER SET utf8 ;
USE `crudtanbook` ;

-- -----------------------------------------------------
-- Table `crudtanbook`.`grupodeusuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`grupodeusuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `apelido` VARCHAR(45) NOT NULL ,
  `quantidadeDeLicensa` INT(11) NOT NULL ,
  `validadeDaLicensa` DATE NOT NULL ,
  `dataDeCadastro` DATE NOT NULL ,
  `chaveDaLicensa` VARCHAR(45) NOT NULL ,
  `status` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`background`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`background` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `grupo_id` INT(11) NOT NULL ,
  `descricao` VARCHAR(50) NOT NULL ,
  `path` VARCHAR(45) NOT NULL ,
  `status` TINYINT(4) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_idx` (`grupo_id` ASC) ,
  CONSTRAINT `id`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `crudtanbook`.`grupodeusuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`historia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`historia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `resenha` MEDIUMTEXT NOT NULL ,
  `autor` VARCHAR(75) NOT NULL ,
  `dataCriacao` DATE NOT NULL ,
  `dataPublicacao` DATE NOT NULL ,
  `grupoDeUsuario_id` INT(11) NOT NULL ,
  `status` VARCHAR(15) NOT NULL ,
  `compartilhada` VARCHAR(15) NOT NULL ,
  `fotoCapa` MEDIUMBLOB NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Historia_GrupoDeUsuario1_idx` (`grupoDeUsuario_id` ASC) ,
  CONSTRAINT `fk_Historia_GrupoDeUsuario1`
    FOREIGN KEY (`grupoDeUsuario_id` )
    REFERENCES `crudtanbook`.`grupodeusuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`tangram`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`tangram` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `posicaoX` INT(11) NOT NULL ,
  `posicaoY` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`capitulo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`capitulo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `historia_id` INT(11) NOT NULL ,
  `tangram_id` INT(11) NOT NULL ,
  `texto` TEXT NOT NULL ,
  `ordem` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `id_idx` (`historia_id` ASC) ,
  INDEX `id_idx1` (`tangram_id` ASC) ,
  CONSTRAINT `idhistoria`
    FOREIGN KEY (`historia_id` )
    REFERENCES `crudtanbook`.`historia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idtangram`
    FOREIGN KEY (`tangram_id` )
    REFERENCES `crudtanbook`.`tangram` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`tipodeusuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`tipodeusuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(75) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `sexo` VARCHAR(10) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `dataDeNascimento` DATE NOT NULL ,
  `urlFacebook` VARCHAR(45) NOT NULL ,
  `apelido` VARCHAR(20) NOT NULL ,
  `avatar` VARCHAR(45) NOT NULL ,
  `dataDeCadastro` DATE NOT NULL ,
  `tipoDeUsuario_id` INT(11) NOT NULL ,
  `grupoDeUsuario_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Usuario_TipoDeUsuario_idx` (`tipoDeUsuario_id` ASC) ,
  INDEX `fk_Usuario_GrupoDeUsuario1_idx` (`grupoDeUsuario_id` ASC) ,
  CONSTRAINT `fk_Usuario_GrupoDeUsuario1`
    FOREIGN KEY (`grupoDeUsuario_id` )
    REFERENCES `crudtanbook`.`grupodeusuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_TipoDeUsuario`
    FOREIGN KEY (`tipoDeUsuario_id` )
    REFERENCES `crudtanbook`.`tipodeusuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`logdeacesso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`logdeacesso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT(11) NOT NULL ,
  `dataAcesso` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_LogDeAcesso_Usuario1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_LogDeAcesso_Usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `crudtanbook`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crudtanbook`.`pergunta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`pergunta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(150) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crudtanbook`.`opcaodapergunta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`opcaodapergunta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `decricao` VARCHAR(150) NULL ,
  `pergunta_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_opcaodapergunta_pergunta1_idx` (`pergunta_id` ASC) ,
  CONSTRAINT `fk_opcaodapergunta_pergunta1`
    FOREIGN KEY (`pergunta_id` )
    REFERENCES `crudtanbook`.`pergunta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crudtanbook`.`resposta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `crudtanbook`.`resposta` (
  `opcaodapergunta_id` INT NOT NULL ,
  `historia_id` INT(11) NOT NULL ,
  `usuario_id` INT(11) NOT NULL ,
  INDEX `fk_resposta_opcaodapergunta1_idx` (`opcaodapergunta_id` ASC) ,
  INDEX `fk_resposta_historia1_idx` (`historia_id` ASC) ,
  INDEX `fk_resposta_usuario1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_resposta_opcaodapergunta1`
    FOREIGN KEY (`opcaodapergunta_id` )
    REFERENCES `crudtanbook`.`opcaodapergunta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resposta_historia1`
    FOREIGN KEY (`historia_id` )
    REFERENCES `crudtanbook`.`historia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resposta_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `crudtanbook`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
