-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour gilla
DROP DATABASE IF EXISTS `gilla`;
CREATE DATABASE IF NOT EXISTS `gilla` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gilla`;

-- Listage de la structure de table gilla. etats
DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table gilla.etats : ~3 rows (environ)
INSERT INTO `etats` (`id`, `description`) VALUES
	(1, 'Ouvert'),
	(2, 'Pris en charge'),
	(3, 'Fermé');

-- Listage de la structure de table gilla. incidents
DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateHeureOuverture` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `priorite` int DEFAULT NULL,
  `dateHeureFermeture` datetime DEFAULT NULL,
  `batiment` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `salle` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `poste` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `materiel_id` int DEFAULT NULL,
  `declarant_id` int DEFAULT NULL,
  `etat_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incidents_materiels` (`materiel_id`),
  KEY `FK_incidents_etats` (`etat_id`),
  KEY `FK_incidents_utilisateurs` (`declarant_id`) USING BTREE,
  CONSTRAINT `FK_incidents_etats` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  CONSTRAINT `FK_incidents_materiels` FOREIGN KEY (`materiel_id`) REFERENCES `materiels` (`id`),
  CONSTRAINT `FK_incidents_utilisateurs` FOREIGN KEY (`declarant_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table gilla.incidents : ~13 rows (environ)
INSERT INTO `incidents` (`id`, `dateHeureOuverture`, `description`, `priorite`, `dateHeureFermeture`, `batiment`, `salle`, `poste`, `materiel_id`, `declarant_id`, `etat_id`) VALUES
	(1, '2024-11-28 11:23:11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', 1, NULL, 'B', NULL, NULL, 1, 2, 2),
	(2, '2024-11-28 11:23:11', 'desc2', 2, NULL, 'A', 'A313', 'P01', 5, 3, 1),
	(3, '2024-11-28 11:23:11', 'desc3', 3, '2025-04-10 10:59:18', 'B', NULL, NULL, 8, 3, 3),
	(4, '2024-11-28 11:23:11', 'desc4', 1, NULL, 'B', NULL, NULL, 8, 3, 2),
	(5, '2024-11-28 11:23:11', 'desc5', 2, NULL, 'B', NULL, NULL, 8, 2, 2),
	(6, '2024-12-12 12:53:44', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, NULL, 'C', NULL, 'P13', 5, 2, 1),
	(10, '2024-12-12 13:20:49', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2, NULL, 'A', 'A313', 'P13', 1, 2, 1),
	(12, '2024-12-16 16:19:28', 'La touch du clavir situé ntr ls touchs &quot;z&quot; t &quot;r&quot; n fonctionn plus. La lttr d ctt touch étant très utilisé dans notr langu français, il srait appréciabl qu vous régliz c problèm assz vit.', 2, NULL, 'A', 'A313', 'P04', 4, 2, 2),
	(14, '2024-12-16 17:14:31', 'Le cadenas de l&#039;armoire près de la porte menant à la salle F001 n&#039;est pas efficace : il est possible d&#039;accéder à son contenu sans le déverrouiller.', 3, '2024-12-16 18:09:34', 'A', 'A009', '', 7, 2, 3),
	(16, '2024-12-19 09:32:34', 'Pied cassé', 3, NULL, 'B', 'B002', '', 8, 2, 2),
	(17, '2024-12-19 09:41:32', '&#039; or &#039;1&#039;=&#039;1', 1, NULL, 'C', '', '', 3, 2, 2),
	(18, '2025-03-13 13:12:25', 'L&#039;écran est parasité d&#039;artefacts rose/violet et clignote régulièrement de cette couleur', 1, NULL, 'A', 'A313', 'P08', 6, 3, 2),
	(19, '2025-04-10 11:02:05', 'La prise de courant habituellement réservée au poste enseignant ne fonctionne plus.', 2, '2025-04-10 11:04:26', 'A', 'A313', 'PRO', 3, 2, 3);

-- Listage de la structure de table gilla. materiels
DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `famille` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table gilla.materiels : ~9 rows (environ)
INSERT INTO `materiels` (`id`, `famille`, `type`) VALUES
	(1, 'Bâtiment', 'Aération'),
	(2, 'Bâtiment', 'Porte'),
	(3, 'Bâtiment', 'Prise de courant'),
	(4, 'Informatique', 'Clavier'),
	(5, 'Informatique', 'Unité centrale'),
	(6, 'Informatique', 'Écran'),
	(7, 'Mobilier', 'Armoire'),
	(8, 'Mobilier', 'Chaise'),
	(9, 'Mobilier', 'Table');

-- Listage de la structure de table gilla. priseencharges
DROP TABLE IF EXISTS `priseencharges`;
CREATE TABLE IF NOT EXISTS `priseencharges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateHeureDebut` datetime DEFAULT NULL,
  `dateHeureFin` datetime DEFAULT NULL,
  `commentaire` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `agent_id` int DEFAULT NULL,
  `incident_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_priseencharges_incidents` (`incident_id`),
  KEY `FK_priseencharges_utilisateurs` (`agent_id`) USING BTREE,
  CONSTRAINT `FK_priseencharges_incidents` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`),
  CONSTRAINT `FK_priseencharges_utilisateurs` FOREIGN KEY (`agent_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table gilla.priseencharges : ~9 rows (environ)
INSERT INTO `priseencharges` (`id`, `dateHeureDebut`, `dateHeureFin`, `commentaire`, `agent_id`, `incident_id`) VALUES
	(1, '2024-11-28 11:28:56', NULL, 'PEC_I4', 2, 4),
	(2, '2024-11-28 11:28:56', NULL, 'PEC_I5', 2, 5),
	(4, '2024-12-16 18:19:57', NULL, NULL, 6, 1),
	(5, '2024-12-19 09:38:09', NULL, NULL, 6, 16),
	(6, '2025-03-17 18:22:30', NULL, 'Tentative cramée d\'injection SQL', 4, 17),
	(7, '2025-03-17 18:22:38', NULL, NULL, 4, 18),
	(8, '2025-03-24 10:39:32', NULL, NULL, 4, 12),
	(9, '2025-04-10 10:36:34', '2025-04-10 10:59:18', 'test', 4, 3),
	(10, '2025-04-10 11:02:36', '2025-04-10 11:04:26', 'Vérifier s\'il s\'agit seulement d\'un problème de la prise ou du système électrique de la salle', 6, 19);

-- Listage de la structure de table gilla. utilisateurs
DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mail` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `passw` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `passhash` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telephone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table gilla.utilisateurs : ~6 rows (environ)
INSERT INTO `utilisateurs` (`id`, `nom`, `mail`, `passw`, `passhash`, `role`, `telephone`) VALUES
	(1, 'admin', 'admin@gilla.fr', 'admin', '$2y$10$IaIE9GIj7EB/Hu6fjR/zCu0i5dvj.JqKBzWLVLJufn2O/pO38sK1u', 'admin', NULL),
	(2, 'utilisateur1', 'utilisateur1@gilla.fr', 'utilisateur', '$2y$10$m5YDFgqOBVTfqrTmV5YKA.QTdN0Zpt7YhT.6sgyPW5oz6CireVBDy', 'utilisateur', NULL),
	(3, 'utilisateur2', 'utilisateur2@gilla.fr', 'utilisateur', '$2y$10$ylQre81qSIotM5w/aDaTOeKudl4c6CpvGPkYzZ67cpg7QKNxa37tK', 'utilisateur', NULL),
	(4, 'agent1', 'agent1@gilla.fr', 'agent', '$2y$10$2orpjdU9CBR75qmo9D5c8OEgskr/aoL2u3zUexjZf/Zy8HKUK/cNy', 'agent', NULL),
	(5, 'responsable', 'responsable@gilla.fr', 'responsable', '$2y$10$RroDP1QLTbDRgR/xtYlLSujrbabb5KUD2KMudTDPDgpSFEcF23xoy', 'responsable', NULL),
	(6, 'agent2', 'agent2@gilla.fr', 'agent', '$2y$10$QtS6yQqkgO4ybD77T8S.yukGQ.wJ9IjkrTSqsH/ucioR4kELexNhS', 'agent', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
