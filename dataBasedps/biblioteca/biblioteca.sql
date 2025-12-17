-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`autor` (
  `id_autor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` VARCHAR(45) NOT NULL,
  `idade_autor` INT(3) NOT NULL,
  `nacionalidade` VARCHAR(45) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `email_autor` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id_autor`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `biblioteca`.`editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`editora` (
  `id_editora` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_editora` VARCHAR(50) NOT NULL,
  `data_criação` DATE NOT NULL,
  `tel_suporte` VARCHAR(20) NOT NULL,
  `especializacao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_editora`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `biblioteca`.`cadastro_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`cadastro_obra` (
  `id_obra` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_obra` VARCHAR(100) NOT NULL,
  `genero` VARCHAR(50) NOT NULL,
  `faixa_etaria` INT(3) NOT NULL,
  `idioma` VARCHAR(50) NOT NULL,
  `paginas` INT(10) NOT NULL,
  `autor_id` INT(11) NOT NULL,
  `editora_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_obra`, `autor_id`, `editora_id`),
  INDEX `fk_cadastro_obra_autor_idx` (`autor_id` ASC),
  INDEX `fk_cadastro_obra_editora1_idx` (`editora_id` ASC),
  CONSTRAINT `fk_cadastro_obra_autor`
    FOREIGN KEY (`autor_id`)
    REFERENCES `biblioteca`.`autor` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastro_obra_editora1`
    FOREIGN KEY (`editora_id`)
    REFERENCES `biblioteca`.`editora` (`id_editora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `biblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` VARCHAR(100) NOT NULL,
  `idade_usuario` INT(3) NOT NULL,
  `email_usuario` VARCHAR(120) NOT NULL,
  `tel_usuario` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `biblioteca`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`emprestimo` (
  `id_emprestimo` INT(11) NOT NULL AUTO_INCREMENT,
  `data_pegada` DATE NOT NULL,
  `data_validade` DATE NOT NULL,
  `status_emprestimo` VARCHAR(45) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  `cadastro_obra_id_obra` INT(11) NOT NULL,
  PRIMARY KEY (`id_emprestimo`, `usuario_id`, `cadastro_obra_id_obra`),
  INDEX `fk_emprestimo_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_emprestimo_cadastro_obra1_idx` (`cadastro_obra_id_obra` ASC),
  CONSTRAINT `fk_emprestimo_cadastro_obra1`
    FOREIGN KEY (`cadastro_obra_id_obra`)
    REFERENCES `biblioteca`.`cadastro_obra` (`id_obra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
