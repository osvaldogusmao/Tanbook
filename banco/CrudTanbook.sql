CREATE DATABASE  IF NOT EXISTS `crudtanbook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crudtanbook`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: crudtanbook
-- ------------------------------------------------------
-- Server version	5.5.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `background`
--

DROP TABLE IF EXISTS `background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `background` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `path` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`grupo_id`),
  CONSTRAINT `id` FOREIGN KEY (`grupo_id`) REFERENCES `grupodeusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `background`
--

LOCK TABLES `background` WRITE;
/*!40000 ALTER TABLE `background` DISABLE KEYS */;
/*!40000 ALTER TABLE `background` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capitulo`
--

DROP TABLE IF EXISTS `capitulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capitulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `historia_id` int(11) NOT NULL,
  `tangram_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`historia_id`),
  KEY `id_idx1` (`tangram_id`),
  CONSTRAINT `idhistoria` FOREIGN KEY (`historia_id`) REFERENCES `historia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idtangram` FOREIGN KEY (`tangram_id`) REFERENCES `tangram` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capitulo`
--

LOCK TABLES `capitulo` WRITE;
/*!40000 ALTER TABLE `capitulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `capitulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupodeusuario`
--

DROP TABLE IF EXISTS `grupodeusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupodeusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `quantidadeDeLicensa` int(11) NOT NULL,
  `validadeDaLicensa` date NOT NULL,
  `dataDeCadastro` date NOT NULL,
  `chaveDaLicensa` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupodeusuario`
--

LOCK TABLES `grupodeusuario` WRITE;
/*!40000 ALTER TABLE `grupodeusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupodeusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historia`
--

DROP TABLE IF EXISTS `historia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `resenha` mediumtext NOT NULL,
  `autor` varchar(75) NOT NULL,
  `dataCriacao` date NOT NULL,
  `dataPublicacao` date NOT NULL,
  `grupoDeUsuario_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `compartilhada` varchar(15) NOT NULL,
  `fotoCapa` mediumblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Historia_GrupoDeUsuario1_idx` (`grupoDeUsuario_id`),
  CONSTRAINT `fk_Historia_GrupoDeUsuario1` FOREIGN KEY (`grupoDeUsuario_id`) REFERENCES `grupodeusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historia`
--

LOCK TABLES `historia` WRITE;
/*!40000 ALTER TABLE `historia` DISABLE KEYS */;
/*!40000 ALTER TABLE `historia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logdeacesso`
--

DROP TABLE IF EXISTS `logdeacesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logdeacesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `dataAcesso` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_LogDeAcesso_Usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_LogDeAcesso_Usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logdeacesso`
--

LOCK TABLES `logdeacesso` WRITE;
/*!40000 ALTER TABLE `logdeacesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `logdeacesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tangram`
--

DROP TABLE IF EXISTS `tangram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tangram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posicaoX` int(11) NOT NULL,
  `posicaoY` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tangram`
--

LOCK TABLES `tangram` WRITE;
/*!40000 ALTER TABLE `tangram` DISABLE KEYS */;
/*!40000 ALTER TABLE `tangram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodeusuario`
--

DROP TABLE IF EXISTS `tipodeusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodeusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodeusuario`
--

LOCK TABLES `tipodeusuario` WRITE;
/*!40000 ALTER TABLE `tipodeusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipodeusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `urlFacebook` varchar(45) NOT NULL,
  `apelido` varchar(20) NOT NULL,
  `avatar` varchar(45) NOT NULL,
  `dataDeCadastro` date NOT NULL,
  `tipoDeUsuario_id` int(11) NOT NULL,
  `grupoDeUsuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Usuario_TipoDeUsuario_idx` (`tipoDeUsuario_id`),
  KEY `fk_Usuario_GrupoDeUsuario1_idx` (`grupoDeUsuario_id`),
  CONSTRAINT `fk_Usuario_GrupoDeUsuario1` FOREIGN KEY (`grupoDeUsuario_id`) REFERENCES `grupodeusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_TipoDeUsuario` FOREIGN KEY (`tipoDeUsuario_id`) REFERENCES `tipodeusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-18 11:37:50
