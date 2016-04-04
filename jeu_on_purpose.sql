-- MySQL Script generated by MySQL Workbench
-- 01/28/15 22:42:09
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema jeu_on_purpose
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jeu_on_purpose
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jeu_on_purpose` ;
USE `jeu_on_purpose` ;

-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Joueur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Joueur` (
  `id_Joueur` INT NOT NULL AUTO_INCREMENT,
  `login_joueur` VARCHAR(45) NOT NULL,
  `MDP_joueur` VARCHAR(45) NOT NULL,
  `defi_joueur` TINYINT(1) NOT NULL,
  `nom_Joueur` VARCHAR(45) NOT NULL,
  `prenom_Joueur` VARCHAR(45) NOT NULL,
  `nickname` VARCHAR(45) NOT NULL,
  `etat_joueur` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_Joueur`),
  UNIQUE INDEX `id_Joueur_UNIQUE` (`id_Joueur` ASC),
  UNIQUE INDEX `nickname_UNIQUE` (`nickname` ASC),
  UNIQUE INDEX `login_joueur_UNIQUE` (`login_joueur` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Question` (
  `id_Question` INT NOT NULL AUTO_INCREMENT,
  `niv_dif_Question` ENUM('facile','moyen','difficile') NOT NULL,
  `mode_Question` ENUM('image','musique') NOT NULL,
  `borne_inf_Question` INT NOT NULL,
  `borne_max_Question` INT NOT NULL,
  `descrip_Question` VARCHAR(100) NOT NULL,
  `val_exact_Question` INT NOT NULL,
  `Contenu` VARCHAR(45) NOT NULL,
  `mode_Chargement` ENUM('avant','apres','toujours') NOT NULL,
  PRIMARY KEY (`id_Question`),
  UNIQUE INDEX `id_Question_UNIQUE` (`id_Question` ASC),
  UNIQUE INDEX `Contenu_UNIQUE` (`Contenu` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Questionnaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Questionnaire` (
  `id_Questionnaire` INT NOT NULL AUTO_INCREMENT,
  `niv_dif_Questionnaire` ENUM('facile','moyen','difficile') NOT NULL,
  `defi_Questionnaire` TINYINT(1) NOT NULL DEFAULT 0,
  `etat_Questionnaire` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_Questionnaire`),
  UNIQUE INDEX `id_Questionnaire_UNIQUE` (`id_Questionnaire` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Joueur_joue_Questionnaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Joueur_joue_Questionnaire` (
  `JjQ_id_Joueur` INT NOT NULL,
  `JjQ_id_Questionnaire` INT NOT NULL,
  `JjQ_date` DATETIME NOT NULL,
  `id_JjQ` INT NOT NULL AUTO_INCREMENT,
  `score1` INT NULL,
  `score2` INT NULL,
  `score3` INT NULL,
  `score4` INT NULL,
  `score5` INT NULL,
  `score_moy` INT NULL,
  INDEX `fk_Joueur_has_Questionnaire_Questionnaire1_idx` (`JjQ_id_Questionnaire` ASC),
  UNIQUE INDEX `JhQ_date_UNIQUE` (`JjQ_date` ASC),
  PRIMARY KEY (`id_JjQ`),
  UNIQUE INDEX `id_JjQ_UNIQUE` (`id_JjQ` ASC),
  CONSTRAINT `fk_Joueur_has_Questionnaire_Joueur`
    FOREIGN KEY (`JjQ_id_Joueur`)
    REFERENCES `jeu_on_purpose`.`Joueur` (`id_Joueur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Joueur_has_Questionnaire_Questionnaire1`
    FOREIGN KEY (`JjQ_id_Questionnaire`)
    REFERENCES `jeu_on_purpose`.`Questionnaire` (`id_Questionnaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Questionnaire_has_Question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Questionnaire_has_Question` (
  `QRhQ_id_Questionnaire` INT NOT NULL,
  `QRhQ_id_Question` INT NOT NULL,
  PRIMARY KEY (`QRhQ_id_Questionnaire`, `QRhQ_id_Question`),
  INDEX `fk_Questionnaire_has_Question_Question1_idx` (`QRhQ_id_Question` ASC),
  INDEX `fk_Questionnaire_has_Question_Questionnaire1_idx` (`QRhQ_id_Questionnaire` ASC),
  CONSTRAINT `fk_Questionnaire_has_Question_Questionnaire1`
    FOREIGN KEY (`QRhQ_id_Questionnaire`)
    REFERENCES `jeu_on_purpose`.`Questionnaire` (`id_Questionnaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Questionnaire_has_Question_Question1`
    FOREIGN KEY (`QRhQ_id_Question`)
    REFERENCES `jeu_on_purpose`.`Question` (`id_Question`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Reponse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Reponse` (
  `id_Reponse` INT NOT NULL AUTO_INCREMENT,
  `lambda2` INT NULL,
  `lambda3` INT NULL,
  `borne_inf_I1` INT NULL,
  `borne_max_I1` INT NULL,
  `borne_inf_I2` INT NULL,
  `borne_max_I2` INT NULL,
  `borne_inf_I3` INT NULL,
  `borne_max_I3` INT NULL,
  PRIMARY KEY (`id_Reponse`),
  UNIQUE INDEX `id_Reponse_UNIQUE` (`id_Reponse` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`Resultat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`Resultat` (
  `id_Resultat` INT NOT NULL,
  `score1` INT NULL,
  `score2` INT NULL,
  `score3` INT NULL,
  `score4` INT NULL,
  `score5` INT NULL,
  `score_moy` INT NULL,
  UNIQUE INDEX `id_Resultat_UNIQUE` (`id_Resultat` ASC),
  PRIMARY KEY (`id_Resultat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeu_on_purpose`.`JjQ_has_reponse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jeu_on_purpose`.`JjQ_has_reponse` (
  `JjQ_has_reponse_id_JjQ` INT NOT NULL,
  `JjQ_has_reponse_id_Reponse` INT NOT NULL,
  PRIMARY KEY (`JjQ_has_reponse_id_JjQ`, `JjQ_has_reponse_id_Reponse`),
  INDEX `fk_JjQ_has_reponse_Reponse1_idx` (`JjQ_has_reponse_id_Reponse` ASC),
  CONSTRAINT `fk_JjQ_has_reponse_Joueur_joue_Questionnaire1`
    FOREIGN KEY (`JjQ_has_reponse_id_JjQ`)
    REFERENCES `jeu_on_purpose`.`Joueur_joue_Questionnaire` (`id_JjQ`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JjQ_has_reponse_Reponse1`
    FOREIGN KEY (`JjQ_has_reponse_id_Reponse`)
    REFERENCES `jeu_on_purpose`.`Reponse` (`id_Reponse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `jeu_on_purpose`.`Question`
-- -----------------------------------------------------
START TRANSACTION;
USE `jeu_on_purpose`;
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (1, 'facile', 'image', 2, 16, 'Combien de yeux y a t-il sur la photo?', 12, '../source/f1.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (2, 'facile', 'image', 1, 12, 'Combien y t-il de mots écrits en vert ? ', 6, '../source/f2.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (3, 'facile', 'image', 10, 30, 'Combien de pétales a cette fleur ? ', 21, '../source/f3.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (4, 'facile', 'image', 1, 10, 'Combien de fois le mot \"vert\" apparaît-il?', 4, '../source/f4.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (5, 'facile', 'image', 2, 16, 'Combien d\'abeilles y avait t-il sur cette image?', 16, '../source/f5.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (6, 'facile', 'image', 10, 28, 'Combien de planètes sont apparues sur cette image? ', 19, '../source/f6.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (7, 'facile', 'image', 0, 10, 'Combien de fois le chiffre \"2\" est-il apparu ? ', 4, '../source/f7.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (8, 'facile', 'image', 2, 20, 'Parmi cette série d\'activités, combien de sports de balle distinguez vous? ', 11, '../source/f8.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (9, 'facile', 'image', 20, 100, 'Quel est le prix à payer pour 15 carottes?', 60, '../source/f9.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (10, 'facile', 'image', 2, 10, 'Parmi ces créatures, combien  peuvent-elles voler ?', 6, '../source/f10.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (11, 'facile', 'musique', 6, 15, 'Après combien de secondes la chanson a t-elle commencé? ', 12, '../source/f11.wav', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (12, 'moyen', 'image', 2, 16, 'Combien avez vous distingué d\'équipements au niveau ACCESS?', 8, '../source/m1.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (13, 'moyen', 'image', 15, 40, 'Combien de rectangles en total dans cette image?', 35, '../source/m2.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (14, 'moyen', 'image', 1, 14, 'Combien de chapeaux voit-on sur l\'image? ', 12, '../source/m3.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (15, 'moyen', 'image', 1, 45, 'Quel est la somme de la ligne au centre?', 38, '../source/m4.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (16, 'moyen', 'image', 30, 70, 'Quel était l\'âge de Napoléon quand il mort?', 51, '../source/m5.jpg', 'toujours');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (17, 'moyen', 'image', 15, 30, 'Parmi cette liste, combien y a t-il de marques européennes?', 25, '../source/m6.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (18, 'moyen', 'image', 40, 100, 'Quelle est la somme de ces chiffres?', 75, '../source/m7.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (19, 'moyen', 'image', 15, 30, 'Combien de frises historiques distinguez vous ? ', 23, '../source/m8.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (20, 'moyen', 'image', 15, 40, 'Quel est le nombre de personnages dont le nom a figuré en couleur verte? ', 22, '../source/m9.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (21, 'moyen', 'image', 14, 26, 'Combien de couleurs (et de nuances) voit-on sur cette image ?', 24, '../source/m10.jpeg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (22, 'moyen', 'musique', 10, 25, 'Quelle est la durée de cette chanson? (', 20, '../source/m11.wav', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (23, 'moyen', 'musique', 8, 17, 'Quelle est la durée du prélude ?', 15, '../source/m12.wav', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (24, 'difficile', 'image', 20, 35, 'Combien de personnages distinguez vous sur cette image? ', 29, '../source/d1.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (25, 'difficile', 'image', 100, 250, 'En 2014, combien de pays sont reconnus par l’Organisation des nations Unies (ONU) ?', 197, '../source/d2.jpg', 'toujours');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (26, 'difficile', 'image', 10, 24, 'Combien d\'abonnés voit-on dans ce schéma?', 17, '../source/d3.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (27, 'difficile', 'image', 20, 60, 'Combien d\'atom O (oxygène) dans ce schéma ?', 49, '../source/d4.png', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (28, 'difficile', 'image', 600, 1200, 'Le loire est le plus long fleuve de France. A combien estimez vous sa longueur? ', 1013, '../source/d5.jpg', 'toujours');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (29, 'difficile', 'image', 15, 30, 'Parmi ces images, combien illustrent-elles des sports d\'équipe?', 23, '../source/d6.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (30, 'difficile', 'image', 60, 120, 'Combien de personnages voit-on ? ', 109, '../source/d7.jpg', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (31, 'difficile', 'image', 60, 120, 'Combien de logos dans le logo zoo?', 95, '../source/d8.png', 'avant');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (32, 'difficile', 'image', 50, 80, 'Combien de loos de marques asiatiques distingue t-on?', 70, '../source/d9.jpg', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (33, 'difficile', 'image', 0, 25, 'Parmi ces 30 drapeaux, combien sont ceux de pays européens?', 15, '../source/d10.png', 'toujours');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (34, 'difficile', 'musique', 18, 32, 'Quelle est la durée de cette chanson?', 29, '../source/d11.wav', 'apres');
INSERT INTO `jeu_on_purpose`.`Question` (`id_Question`, `niv_dif_Question`, `mode_Question`, `borne_inf_Question`, `borne_max_Question`, `descrip_Question`, `val_exact_Question`, `Contenu`, `mode_Chargement`) VALUES (35, 'difficile', 'musique', 30, 50, 'Quelle est la durée de cette chanson?', 43, '../source/d12.wav', 'apres');

COMMIT;

