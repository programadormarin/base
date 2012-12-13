SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';



CREATE SCHEMA IF NOT EXISTS `baseproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `baseproject` ;



-- -----------------------------------------------------

-- Table `baseproject`.`pessoa`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `baseproject`.`pessoa` (

  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,

  `creation_time` DATETIME NOT NULL DEFAULT NOW() ,

  `active` TINYINT(1) NOT NULL DEFAULT 0 ,

  PRIMARY KEY (`id`) )

ENGINE = InnoDB

DEFAULT CHARACTER SET = utf8

COLLATE = utf8_general_ci;





-- -----------------------------------------------------

-- Table `baseproject`.`user`

-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `baseproject`.`user` (

  `pessoa_id` INT UNSIGNED NOT NULL ,

  `login` VARCHAR(50) NOT NULL ,

  `pass` VARCHAR(45) NOT NULL ,

  `creation_time` DATETIME NOT NULL DEFAULT NOW() ,

  INDEX `fk_user_pessoa_idx` (`pessoa_id` ASC) ,

  PRIMARY KEY (`pessoa_id`) ,

  CONSTRAINT `fk_user_pessoa`

    FOREIGN KEY (`pessoa_id` )

    REFERENCES `baseproject`.`pessoa` (`id` )

    ON DELETE RESTRICT

    ON UPDATE RESTRICT)

ENGINE = InnoDB

DEFAULT CHARACTER SET = utf8

COLLATE = utf8_general_ci

COMMENT = '	';







SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

