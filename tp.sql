DROP DATABASE `gestionsEmployes`;
--CREATE DATABASE
CREATE DATABASE IF NOT EXISTS `gestionsEmployes`;
use gestionsEmployes;
--CREATE TABLE
CREATE TABLE `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `matricule` int(11) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `poste` varchar(100) NOT NULL,
  `date_emb` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` tinyint(4) NOT NULL DEFAULT '1',
  `num_service` int(11) NOT NULL
)ENGINE=InnoDB;



CREATE TABLE `service`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `libelle` varchar(255) NOT NULL
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `projet` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom_projet` VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

ALTER TABLE employe
ADD FOREIGN KEY (num_service)
REFERENCES service(ID);

CREATE TABLE `affectation`(
    num_employe INT NOT NULL,
    num_projet INT NOT NULL,
    PRIMARY KEY (num_employe,num_projet),
    FOREIGN KEY (num_employe) REFERENCES employe (ID),
    FOREIGN KEY (num_projet) REFERENCES projet (ID)
)ENGINE=InnoDB;
--INSERT 
INSERT INTO `service` (`id`, `libelle`) VALUES (1,'informatique');
 --Déchargement des données de la table `employe`
INSERT INTO `employe`(`id`, `nom`, `prenom`, `matricule`, `profession`, `poste`, `date_emb`,`statut`,`num_service`)
VALUES (null,"BEN CHEIKH","saad",14714745,"DWWM","Freelancer","2019-08-30 10:00:00",1,1); 

INSERT INTO `projet` (`id`, `nom_projet`) VALUES (null,"DWWM");

INSERT INTO  `affectation` (`num_projet`, `num_employe`)VALUES(1,1);


CREATE USER 'saad@1' IDENTIFIED BY 'bsmarc';

GRANT SELECT ON `employes` TO 'saad@1'WITH GRANT OPTION;