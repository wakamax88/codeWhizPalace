-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: code_whiz_palace
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int unsigned DEFAULT NULL,
  `theme_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_account_role_idx` (`role_id`),
  CONSTRAINT `fk_account_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (19,'admin@cwp.com','$2y$12$THGA46740HEQFwbvz84D0OlywbLZgGt/1ceMPDr0YITaGffbieozm','2023-11-24 13:21:35','2023-11-24 13:21:35',1,NULL),(20,'laura@cwp.com','$2y$12$4JhGNdfel0It2zkU7Q3LBuG1yG6pAcCuqArHtBm7MhtQwuDXEmGe2','2023-11-24 13:22:10','2023-11-24 13:22:10',5,NULL),(22,'alexandre@cwp.com','$2y$12$uoKs2elxk1og1xfg9wJt1OzA7U1kcIZBw9TxVHcL7FL/bPRePyYLC','2023-11-24 13:46:40','2023-11-24 13:46:40',3,NULL),(23,'pierre@cwp.com','$2y$12$xWKoRzf.6IMwFwiIDBxiGezry0zCM.WSqER4FwBY2rxSSFJXfqkua','2023-11-24 13:47:35','2023-11-24 13:47:35',2,NULL),(24,'clara@cwp.com','$2y$12$zrrQ3b0CVM2TM/jC7Nq4iubqjHeTYktgof1PZ.VQK6KuaMLFSy./y','2023-11-24 13:48:08','2023-11-24 13:48:08',4,NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `thumbnail` varchar(45) DEFAULT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Web Developement','category_webdev.jpg','Le développement web est un domaine passionnant qui englobe la création et la maintenance de sites web. Il comprend des aspects tels que la conception web, le développement web coté client et côté serveur, l\'optimisation pour les moteurs de recherche et l\'experience utilisateur. Les développeurs web utilisent une variété de langages de programmation et de technologies, y compris HTML, CSS, JavaScript, Python, Ruby, PHP, et bien d\'autres, pour créer des sites web dynamiques et interactifs. Que vous soyez un blogueur, un propriétaire d\'entreprise ou un développeur en herbe, le d&veloppement web est une compétence essentielle dans le monde numérique d\'aujourd\'hui.'),(2,'Technology','category_tech.jpg','La technologie est un domaine dynamique et en constante \\u00e9volution qui fa\\u00e7onne notre monde et influence presque tous les aspects de notre vie quotidienne. Elle englobe tout, des smartphones que nous utilisons pour communiquer, aux satellites qui nous permettent d\\u2019explorer l\\u2019espace, en passant par les logiciels qui alimentent nos ordinateurs et nos entreprises. La technologie est le moteur de l\\u2019innovation et de la d\\u00e9couverte, ouvrant sans cesse de nouvelles possibilit\\u00e9s et am\\u00e9liorant notre qualit\\u00e9 de vie. Que ce soit dans les domaines de la sant\\u00e9, de l\\u2019\\u00e9ducation, de l\\u2019entreprise ou du divertissement, la technologie joue un r\\u00f4le cl\\u00e9 dans la fa\\u00e7on dont nous interagissons avec le monde qui nous entoure.'),(3,'Data Science','category_datascience.jpg','La “Data Science” est un domaine interdisciplinaire passionnant qui utilise des méthodes scientifiques, des processus, des algorithmes et des systèmes pour extraire des connaissances et des idées de nombreuses données structurées et non structurées. Elle implique l’utilisation de statistiques, de l’apprentissage automatique, et de la programmation pour transformer les données en informations précieuses, aidant ainsi les entreprises à prendre des décisions éclairées. La Data Science est au cœur de nombreuses innovations technologiques d’aujourd’hui, de la recommandation de produits aux prévisions météorologiques.'),(4,'Internet of Things','category_iot.jpg','L\'Internet of Things (IoT) est un réseau interconnecté d\'objets physiques dotés de capteurs, de logiciels et de connectivité, permettant la collecte, l\'échange et l\'analyse de données pour automatiser des processus et améliorer l\'efficacité.'),(5,'UI Design','category_uiDesign.jpg','Le design d\'interface utilisateur, ou UI Design, consiste à créer des interfaces numériques visuellement attractives et intuitives afin d\'améliorer l\'interaction et l\'expérience utilisateur avec des logiciels ou des dispositifs.'),(6,'Electronic Components','category_electronicComponents.jpg','Les composants électroniques sont des éléments fondamentaux de circuits électriques, tels que des résistances, des condensateurs et des transistors, qui permettent le contrôle, la régulation et la manipulation des signaux électriques dans divers dispositifs électroniques.'),(7,'Data Management','category_dataManagement.jpg','La gestion des données, ou Data Management en anglais, englobe les processus, les technologies et les meilleures pratiques visant à collecter, stocker, organiser, et assurer la qualité des données, afin de soutenir des analyses efficaces et des prises de décision informées.'),(8,'Development Tools','category_developmentTools.jpg','Les outils de développement sont des logiciels indispensables pour aider les développeurs dans la création, le débogage, et la maintenance des applications, couvrant des aspects tels que la programmation, la gestion de version et le déploiement. Ils simplifient le processus de développement, favorisent la collaboration, et rester informé sur leurs évolutions est essentiel pour adopter des pratiques modernes et efficaces.');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` mediumtext,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_id` int unsigned DEFAULT NULL,
  `discussion_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_profiles` (`profile_id`) /*!80000 INVISIBLE */,
  KEY `fk_comments_discussions` (`discussion_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `fk_comments_discussions` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  CONSTRAINT `fk_comments_profiles` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Create a file on your server and output phpinfo()','2023-11-13 13:47:44',24,1),(2,'Go to this URL: https://xdebug.org/download','2023-11-13 14:01:32',25,1),(3,'Voir doc sur le site','2023-11-13 14:03:57',26,2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussions` (
  `id` int unsigned NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_discussions_profiles` (`profile_id`),
  KEY `fk_discussions_categories` (`category_id`),
  CONSTRAINT `fk_discussions_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_discussions_profiles` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (1,'Comment installer xdebug avec laragon?',NULL,'2023-11-13 13:42:47',27,1),(2,'Aide laragon',NULL,'2023-11-13 14:02:43',26,1);
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `links` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `rating` int unsigned DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `category_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,'Sql Zoo','https://sqlzoo.net/wiki/SQL_Tutorial','link_sqlZoo.jpeg','SQL Zoo est une plateforme d\'apprentissage en ligne proposant des exercices interactifs permettant aux apprenants d\'acquérir et de pratiquer le langage SQL en travaillant sur des requêtes et des manipulations de bases de données réelles.',3,'2023-11-08 22:01:35',7),(2,'Sql Murder Mystery','https://mystery.knightlab.com/','link_sqlMurderMystery.png','SQL Murder Mystery est un jeu en ligne interactif qui permet aux participants d\'appliquer leurs compétences en SQL pour résoudre un mystère criminel. Dans ce jeu, les joueurs explorent une base de données fictive en utilisant des requêtes SQL pour découvrir des indices, résoudre des énigmes, et finalement élucider l\'intrigue du meurtre.',2,'2023-11-12 22:01:35',7),(3,'Css Grid Garden','https://cssgridgarden.com/','link_cssGridGarden.png','CSS Grid Garden est un jeu en ligne interactif conçu pour aider les personnes à apprendre et à pratiquer CSS Grid, une fonctionnalité de mise en page puissante de CSS. Dans ce jeu, les joueurs résolvent des énigmes en utilisant des propriétés CSS Grid pour cultiver un jardin en alignant les plantes de manière spécifique.',5,'2023-10-23 22:01:35',1),(4,'JS Robot','https://lab.reaal.me/jsrobot/','link_jsRobot.png',NULL,NULL,'2023-11-24 10:44:00',1),(5,'Oh My Git','https://ohmygit.org/','link_ohMyGit.png',NULL,4,'2023-11-24 11:04:24',8);
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `excerpt` mediumtext,
  `profile_id` int unsigned NOT NULL,
  `category_id` int unsigned NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`profile_id`,`category_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_posts_profiles` (`profile_id`),
  KEY `fk_posts_categories` (`category_id`),
  CONSTRAINT `fk_posts_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_posts_profiles` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'La Magie du CSS : Transformez vos Sites Web en oeuvres d\'Art Visuelles','<p>Le CSS, ou Cascading Style Sheets, est un langage de feuilles de style utilisé pour définir la présentation d\'une page web. Il permet de contrôler la mise en page, les couleurs, les polices, les images de fond et de nombreux autres aspects visuels d\'un site web. En combinant le HTML pour la structure et le CSS pour la mise en forme, les développeurs web peuvent créer des sites web esthétiquement attrayants et réactifs.</p><h3>Les Bases du CSS:</h3><p>Le CSS fonctionne en appliquant des règles de style aux éléments HTML. Ces règles sont spécifiées dans un fichier CSS distinct ou peuvent être incluses directement dans le code HTML.</p><h3>Sélecteurs CSS:</h3><p>Les sélecteurs CSS sont des motifs qui définissent les éléments HTML auxquels une règle CSS doit s\'appliquer. Ils peuvent cibler des éléments spécifiques en utilisant des noms de balises, des classes, des ID ou d\'autres attributs.</p><h3>Propriétés et Valeurs CSS:</h3><p>Les règles CSS sont composées de propriétés et de valeurs. Les propriétés définissent ce qui doit être modifié, comme la couleur du texte ou la taille de la police, tandis que les valeurs définissent comment cette modification doit être appliquée.</p><h3>Héritage et Priorité:</h3><p>Le CSS utilise le concept de l\'héritage, où les styles d\'un élément parent peuvent être transmis à ses enfants. Cependant, il existe également des règles de priorité qui déterminent quelles styles sont appliquées lorsque plusieurs règles entrent en conflit.</p><h3>Conclusion:</h3><p>Le CSS est un outil puissant qui permet aux développeurs web de créer des designs uniques et attrayants pour leurs sites. En comprenant les bases des sélecteurs, des propriétés et des valeurs CSS, vous pouvez personnaliser l\'apparence de vos pages web et offrir une expérience utilisateur exceptionnelle. Alors, plongez dans le monde du CSS et faites de votre site web une véritable œuvre d\'art visuelle.</p>','post_webdev_1.jpg','Une capture d\'écran de code ','Le CSS (Cascading Style Sheets) est l\'une des technologies fondamentales du développement web moderne. Il joue un rôle crucial dans la conception et la mise en forme de sites web, offrant aux développeurs un contrôle complet sur l\'apparence visuelle de leurs pages. Dans cet article, nous plongerons dans le monde du CSS, en explorant ses capacités et en fournissant des conseils pour tirer le meilleur parti de cette puissante technologie.',24,1,'2023-11-08 10:10:00'),(2,'Démystifier le PHP : Construisez des Sites Web Dynamiques et Puissants','<p>Le PHP est un langage de programmation côté serveur conçu pour créer des pages web dynamiques. Sa syntaxe est similaire à celle du C et du Perl, facilitant ainsi son apprentissage pour les développeurs issus de divers horizons.</p><h3>Variables en PHP:</h3><p>L\'une des caractéristiques fondamentales du PHP est l\'utilisation de variables pour stocker des données. Les variables en PHP commencent par le symbole du dollar suivi du nom de la variable.</p><h3>Les Structures de Contrôle:</h3><p>Le PHP offre diverses structures de contrôle, telles que les boucles et les instructions conditionnelles, permettant de créer des programmes flexibles et réactifs. Voici un exemple d\'une boucle simple en PHP :</p><h3>Fonctions en PHP:</h3><p>Les fonctions en PHP permettent d\'organiser le code en blocs réutilisables.</p><h3>Conclusion:</h3><p>En résumé, le PHP offre une puissance considérable pour le développement web côté serveur. En comprenant les variables, les structures de contrôle, les fonctions et l\'interaction avec les bases de données, les développeurs peuvent créer des sites web interactifs et dynamiques. Que vous soyez un débutant ou un développeur expérimenté, explorer le monde du PHP ouvre la porte à la création de sites web performants et fonctionnels.</p>','post_webdev_2.jpg','Un ordinateur portable sur un bureau avec une peluche en forme d\'éléphant qui a le sigle php','Le PHP, acronyme de Hypertext Preprocessor, est un langage de script côté serveur largement utilisé pour le développement web. Depuis sa création, le PHP a évolué pour devenir l\'une des technologies les plus populaires pour la création de sites web dynamiques. Dans cet article, nous explorerons le monde du PHP, en découvrant ses fonctionnalités et en comprenant comment il peut être utilisé pour créer des sites web interactifs et robustes.',24,1,'2023-11-10 15:20:00'),(3,'L\'Intelligence Artificielle : L\'évolution qui Redéfinit notre Avenir','<h3>Définir l\'Intelligence Artificielle:</h3><p>L\'IA fait référence à la capacité d\'une machine à imiter l\'intelligence humaine. Cela inclut des processus tels que l\'apprentissage, le raisonnement, la résolution de problèmes, la perception sensorielle et même la compréhension du langage naturel. Le but ultime de l\'IA est de créer des systèmes capables d\'effectuer des tâches intelligentes sans intervention humaine constante.</p><h3>Historique de l\'Intelligence Artificielle:</h3><p>L\'histoire de l\'IA remonte aux années 1950, avec des pionniers tels que Alan Turing et John McCarthy. Cependant, c\'est au cours des dernières décennies que l\'IA a connu une croissance exponentielle grâce aux progrès technologiques, à l\'augmentation de la puissance de calcul et à la disponibilité de vastes ensembles de données.</p><h3>Applications Actuelles de l\'IA:</h3><p>Aujourd\'hui, l\'IA est présente dans de nombreux aspects de notre vie quotidienne, des recommandations de produits sur les plateformes de commerce électronique à la reconnaissance vocale dans nos smartphones. Les algorithmes d\'IA alimentent également les progrès dans des domaines tels que la médecine, la finance, la logistique et bien d\'autres, améliorant l\'efficacité et la précision des processus.</p><h3>Apprentissage Machine et Réseaux Neuronaux:</h3><p>L\'apprentissage machine est une composante clé de l\'IA, permettant aux systèmes de s\'améliorer automatiquement à partir de l\'expérience. Les réseaux neuronaux, inspirés du fonctionnement du cerveau humain, sont devenus des éléments fondamentaux de nombreux modèles d\'apprentissage profond, propulsant ainsi les performances de l\'IA à des niveaux impressionnants.</p><h3>Défis et Éthique:</h3><p>Malgré ses succès, l\'IA présente des défis et soulève des questions éthiques importantes. Les préoccupations liées à la confidentialité des données, à la transparence des algorithmes et à l\'impact sur l\'emploi nécessitent une réflexion approfondie pour garantir un développement responsable de cette technologie.</p><h3>Le Futur de l\'IA:</h3><p>Le potentiel futur de l\'IA est immense. Des applications plus avancées, telles que la conduite autonome, la médecine personnalisée et la créativité assistée par l\'IA, dessinent un avenir où cette technologie continuera de transformer radicalement notre façon de vivre, de travailler et d\'interagir avec le monde qui nous entoure.</p><h3>Conclusion:</h3><p>En conclusion, l\'Intelligence Artificielle transcende les limites de la science-fiction pour devenir une réalité transformative. Alors que nous explorons les opportunités passionnantes qu\'elle offre, il est impératif de guider son développement de manière éthique et responsable, afin que l\'IA demeure une force positive dans notre quête incessante de progrès technologique.</p>','post_dataScience_3.jpg','Un robot assis sur un banc','L\'Intelligence Artificielle (IA) émerge comme l\'une des avancées technologiques les plus influentes de notre époque. De la science-fiction à la réalité, l\'IA façonne notre quotidien de manière inédite. Dans cet article, nous plongerons dans le fascinant monde de l\'IA, explorant son histoire, ses applications actuelles et son potentiel révolutionnaire pour le futur.',24,3,'2023-11-13 17:30:00'),(23,'SQL Démystifié : L\'Art de Gérer les Données avec Efficacité','<h3>Qu\'est-ce que le SQL?</h3><p>Le SQL, ou Structured Query Language, est un langage de programmation spécialement conçu pour la gestion des bases de données relationnelles. Sa syntaxe simple et puissante permet aux développeurs de définir, manipuler et interroger les données de manière efficace.</p><h3>Les Bases du SQL:</h3><p> la création d\'une table se fait avec la commande CREATE TABLE. L\'instruction SELECT est essentielle pour interroger les données dans une base de données. La clause WHERE permet de filtrer les résultats en fonction de certaines conditions. L\'instruction UPDATE permet de modifier des enregistrements existants. L\'instruction DELETE supprime des enregistrements de la base de données. </p><h3>Relations entre Tables:</h3><p>Le SQL prend en charge les relations entre les tables, permettant de lier des données entre elles. Les clés étrangères sont utilisées pour créer ces liens, assurant l\'intégrité des données.</p><h3>Conclusion:</h3><p>En conclusion, le SQL est un outil essentiel pour la gestion efficace des données dans le domaine du développement de bases de données relationnelles. Que vous soyez un débutant cherchant à comprendre les bases ou un professionnel voulant exploiter les fonctionnalités avancées, maîtriser le SQL ouvre la porte à une gestion agile et performante des informations cruciales dans le monde numérique en constante évolution.</p>','post_dataManagement_1.jpg','Le Logo de MySql','Le SQL (Structured Query Language) est la pierre angulaire des bases de données relationnelles, offrant un moyen puissant et structuré de gérer et de manipuler des données. Dans cet article, nous plongerons dans l\'univers du SQL, explorant ses bases, ses fonctionnalités avancées, et comment il facilite la gestion de l\'information dans le monde numérique d\'aujourd\'hui.',24,7,'2023-11-24 14:41:05');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts_tags` (
  `post_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `fk_posts_has_tags_tags` (`tag_id`),
  KEY `fk_posts_has_tags_posts` (`post_id`),
  CONSTRAINT `fk_posts_has_tags_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `fk_posts_has_tags_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_tags`
--

LOCK TABLES `posts_tags` WRITE;
/*!40000 ALTER TABLE `posts_tags` DISABLE KEYS */;
INSERT INTO `posts_tags` VALUES (1,1);
/*!40000 ALTER TABLE `posts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `account_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`,`account_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_profiles_accounts` (`account_id`),
  CONSTRAINT `fk_profiles_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (24,'alexandre','dupont','1991-07-14 00:00:00',22),(25,'alicia','bazin','1988-09-02 00:00:00',19),(26,'pierre','martin','1983-01-05 00:00:00',23),(27,'clara','petit','1995-02-15 00:00:00',24);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'moderator'),(3,'editor'),(4,'lambda'),(5,'guest');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `category_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`,`category_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tags_categories` (`category_id`),
  CONSTRAINT `fk_tags_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'css',1),(2,'php',1),(3,'ai',3);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `themes` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'monokai'),(2,'dracula');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned DEFAULT NULL,
  `profile_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_idx` (`post_id`),
  KEY `fk_profile_idx` (`profile_id`),
  CONSTRAINT `fk_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `fk_profile` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (14,23,27),(15,1,25),(16,23,26);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24 15:20:10
