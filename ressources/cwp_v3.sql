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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (11,'test1@test.com','$2y$12$saqQg/ibR0HYtvKcF3lf9e4pd1M6LiF50QTMPU0MLKXbpEcS3mbxG','2023-11-12 22:49:37','2023-11-12 22:49:37',1,2),(12,'test2@test.com','$2y$12$G1qC3AAIr4dZQ84.iNteUuDsC2pch0QdVdKZmYQ2i74pKgU8PZoUC','2023-11-13 00:37:40','2023-11-13 00:37:40',5,2),(13,'test3@test.com','$2y$12$hKb9/3RpghAR2xI3a2w/S.0DukQ9o/WJIlIVB455l.xm0R3bXs8cO','2023-11-13 00:38:45','2023-11-13 00:38:45',4,2),(14,'test5@test.com','$2y$12$YWE3zwxmV9nFO500ceYLQum4iq83jpd9JLghjP2NCBf/JMZjyB6L2','2023-11-17 09:28:10','2023-11-17 09:28:10',5,NULL),(15,'test6@test.com','$2y$12$/pKG8qWaNEA2LsvPTDyIcOg1CWps8IhBKdOjuBKpuMkzQtLxyhJce','2023-11-17 09:32:45','2023-11-17 09:32:45',5,NULL),(16,'test7@test.com','$2y$12$3I6SL5qRwPxncuelXRA2I.3rxDF.fANY2BkeEfO9pHkfDfe0chjBm','2023-11-17 09:33:37','2023-11-17 09:33:37',5,1),(17,'test8@test.com','$2y$12$PNdXi8bneHAmoxt8eFYuK.WwEbW7UfOGbMmJByH1MilBIGbQBpa7u','2023-11-17 09:46:29','2023-11-17 09:46:29',5,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Web Developement','category_webdev.jpg','Le d\\u00e9veloppement web est un domaine passionnant qui englobe la cr\\u00e9ation et la maintenance de sites web. Il comprend des aspects tels que la conception web, le d\\u00e9veloppement web c\\u00f4t\\u00e9 client et c\\u00f4t\\u00e9 serveur, l\\u2019optimisation pour les moteurs de recherche et l\\u2019exp\\u00e9rience utilisateur. Les d\\u00e9veloppeurs web utilisent une vari\\u00e9t\\u00e9 de langages de programmation et de technologies, y compris HTML, CSS, JavaScript, Python, Ruby, PHP, et bien d\\u2019autres, pour cr\\u00e9er des sites web dynamiques et interactifs. Que vous soyez un blogueur, un propri\\u00e9taire d\\u2019entreprise ou un d\\u00e9veloppeur en herbe, le d\\u00e9veloppement web est une comp\\u00e9tence essentielle dans le monde num\\u00e9rique d\\u2019aujourd\\u2019hui.'),(2,'Technology','category_tech.jpg','La technologie est un domaine dynamique et en constante \\u00e9volution qui fa\\u00e7onne notre monde et influence presque tous les aspects de notre vie quotidienne. Elle englobe tout, des smartphones que nous utilisons pour communiquer, aux satellites qui nous permettent d\\u2019explorer l\\u2019espace, en passant par les logiciels qui alimentent nos ordinateurs et nos entreprises. La technologie est le moteur de l\\u2019innovation et de la d\\u00e9couverte, ouvrant sans cesse de nouvelles possibilit\\u00e9s et am\\u00e9liorant notre qualit\\u00e9 de vie. Que ce soit dans les domaines de la sant\\u00e9, de l\\u2019\\u00e9ducation, de l\\u2019entreprise ou du divertissement, la technologie joue un r\\u00f4le cl\\u00e9 dans la fa\\u00e7on dont nous interagissons avec le monde qui nous entoure.'),(3,'Data Science','category_datascience.jpg','La “Data Science” est un domaine interdisciplinaire passionnant qui utilise des méthodes scientifiques, des processus, des algorithmes et des systèmes pour extraire des connaissances et des idées de nombreuses données structurées et non structurées. Elle implique l’utilisation de statistiques, de l’apprentissage automatique, et de la programmation pour transformer les données en informations précieuses, aidant ainsi les entreprises à prendre des décisions éclairées. La Data Science est au cœur de nombreuses innovations technologiques d’aujourd’hui, de la recommandation de produits aux prévisions météorologiques.');
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
INSERT INTO `comments` VALUES (1,'Create a file on your server and output phpinfo()','2023-11-13 13:47:44',23,1),(2,'Go to this URL: https://xdebug.org/download','2023-11-13 14:01:32',23,1),(3,'Voir doc sur le site','2023-11-13 14:03:57',22,2);
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
INSERT INTO `discussions` VALUES (1,'Comment installer xdebug avec laragon?',NULL,'2023-11-13 13:42:47',22,1),(2,'Aide laragon',NULL,'2023-11-13 14:02:43',23,1);
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'La Magie du CSS : Transformez vos Sites Web en oeuvres d\'Art Visuelles','<p>Le CSS, ou Cascading Style Sheets, est un langage de feuilles de style utilisé pour définir la présentation d\'une page web. Il permet de contrôler la mise en page, les couleurs, les polices, les images de fond et de nombreux autres aspects visuels d\'un site web. En combinant le HTML pour la structure et le CSS pour la mise en forme, les développeurs web peuvent créer des sites web esthétiquement attrayants et réactifs.</p><h3>Les Bases du CSS:</h3><p>Le CSS fonctionne en appliquant des règles de style aux éléments HTML. Ces règles sont spécifiées dans un fichier CSS distinct ou peuvent être incluses directement dans le code HTML.</p><h3>Sélecteurs CSS:</h3><p>Les sélecteurs CSS sont des motifs qui définissent les éléments HTML auxquels une règle CSS doit s\'appliquer. Ils peuvent cibler des éléments spécifiques en utilisant des noms de balises, des classes, des ID ou d\'autres attributs.</p><h3>Propriétés et Valeurs CSS:</h3><p>Les règles CSS sont composées de propriétés et de valeurs. Les propriétés définissent ce qui doit être modifié, comme la couleur du texte ou la taille de la police, tandis que les valeurs définissent comment cette modification doit être appliquée.</p><h3>Héritage et Priorité:</h3><p>Le CSS utilise le concept de l\'héritage, où les styles d\'un élément parent peuvent être transmis à ses enfants. Cependant, il existe également des règles de priorité qui déterminent quelles styles sont appliquées lorsque plusieurs règles entrent en conflit.</p><h3>Conclusion:</h3><p>Le CSS est un outil puissant qui permet aux développeurs web de créer des designs uniques et attrayants pour leurs sites. En comprenant les bases des sélecteurs, des propriétés et des valeurs CSS, vous pouvez personnaliser l\'apparence de vos pages web et offrir une expérience utilisateur exceptionnelle. Alors, plongez dans le monde du CSS et faites de votre site web une véritable œuvre d\'art visuelle.</p>','post_webdev_1.jpg','alt1','Le CSS (Cascading Style Sheets) est l\'une des technologies fondamentales du développement web moderne. Il joue un rôle crucial dans la conception et la mise en forme de sites web, offrant aux développeurs un contrôle complet sur l\'apparence visuelle de leurs pages. Dans cet article, nous plongerons dans le monde du CSS, en explorant ses capacités et en fournissant des conseils pour tirer le meilleur parti de cette puissante technologie.',22,1,'2023-11-08 10:10:00'),(2,'Démystifier le PHP : Construisez des Sites Web Dynamiques et Puissants','<p>Le PHP est un langage de programmation côté serveur conçu pour créer des pages web dynamiques. Sa syntaxe est similaire à celle du C et du Perl, facilitant ainsi son apprentissage pour les développeurs issus de divers horizons.</p><h3>Variables en PHP:</3><p>L\'une des caractéristiques fondamentales du PHP est l\'utilisation de variables pour stocker des données. Les variables en PHP commencent par le symbole du dollar suivi du nom de la variable.</p><h3>Les Structures de Contrôle:</3><p>Le PHP offre diverses structures de contrôle, telles que les boucles et les instructions conditionnelles, permettant de créer des programmes flexibles et réactifs. Voici un exemple d\'une boucle simple en PHP :</p><h3>Fonctions en PHP:</h3><p>Les fonctions en PHP permettent d\'organiser le code en blocs réutilisables.</p><h3>Conclusion:</h3><p>En résumé, le PHP offre une puissance considérable pour le développement web côté serveur. En comprenant les variables, les structures de contrôle, les fonctions et l\'interaction avec les bases de données, les développeurs peuvent créer des sites web interactifs et dynamiques. Que vous soyez un débutant ou un développeur expérimenté, explorer le monde du PHP ouvre la porte à la création de sites web performants et fonctionnels.</p>','post_webdev_2.jpg','alt2','Le PHP, acronyme de Hypertext Preprocessor, est un langage de script côté serveur largement utilisé pour le développement web. Depuis sa création, le PHP a évolué pour devenir l\'une des technologies les plus populaires pour la création de sites web dynamiques. Dans cet article, nous explorerons le monde du PHP, en découvrant ses fonctionnalités et en comprenant comment il peut être utilisé pour créer des sites web interactifs et robustes.',23,1,'2023-11-10 15:20:00'),(3,'L\'Intelligence Artificielle : L\'évolution qui Redéfinit notre Avenir','<h3>Définir l\'Intelligence Artificielle:</h3><p>L\'IA fait référence à la capacité d\'une machine à imiter l\'intelligence humaine. Cela inclut des processus tels que l\'apprentissage, le raisonnement, la résolution de problèmes, la perception sensorielle et même la compréhension du langage naturel. Le but ultime de l\'IA est de créer des systèmes capables d\'effectuer des tâches intelligentes sans intervention humaine constante.</p><h3>Historique de l\'Intelligence Artificielle:</h3><p>L\'histoire de l\'IA remonte aux années 1950, avec des pionniers tels que Alan Turing et John McCarthy. Cependant, c\'est au cours des dernières décennies que l\'IA a connu une croissance exponentielle grâce aux progrès technologiques, à l\'augmentation de la puissance de calcul et à la disponibilité de vastes ensembles de données.</p><h3>Applications Actuelles de l\'IA:</h3><p>Aujourd\'hui, l\'IA est présente dans de nombreux aspects de notre vie quotidienne, des recommandations de produits sur les plateformes de commerce électronique à la reconnaissance vocale dans nos smartphones. Les algorithmes d\'IA alimentent également les progrès dans des domaines tels que la médecine, la finance, la logistique et bien d\'autres, améliorant l\'efficacité et la précision des processus.</p><h3>Apprentissage Machine et Réseaux Neuronaux:</h3><p>L\'apprentissage machine est une composante clé de l\'IA, permettant aux systèmes de s\'améliorer automatiquement à partir de l\'expérience. Les réseaux neuronaux, inspirés du fonctionnement du cerveau humain, sont devenus des éléments fondamentaux de nombreux modèles d\'apprentissage profond, propulsant ainsi les performances de l\'IA à des niveaux impressionnants.</p><h3>Défis et Éthique:</h3><p>Malgré ses succès, l\'IA présente des défis et soulève des questions éthiques importantes. Les préoccupations liées à la confidentialité des données, à la transparence des algorithmes et à l\'impact sur l\'emploi nécessitent une réflexion approfondie pour garantir un développement responsable de cette technologie.</p><h3>Le Futur de l\'IA:</h3><p>Le potentiel futur de l\'IA est immense. Des applications plus avancées, telles que la conduite autonome, la médecine personnalisée et la créativité assistée par l\'IA, dessinent un avenir où cette technologie continuera de transformer radicalement notre façon de vivre, de travailler et d\'interagir avec le monde qui nous entoure.</p><h3>Conclusion:</h3><p>En conclusion, l\'Intelligence Artificielle transcende les limites de la science-fiction pour devenir une réalité transformative. Alors que nous explorons les opportunités passionnantes qu\'elle offre, il est impératif de guider son développement de manière éthique et responsable, afin que l\'IA demeure une force positive dans notre quête incessante de progrès technologique.</p>','post_dataScience_3.jpg','alt3','L\'Intelligence Artificielle (IA) émerge comme l\'une des avancées technologiques les plus influentes de notre époque. De la science-fiction à la réalité, l\'IA façonne notre quotidien de manière inédite. Dans cet article, nous plongerons dans le fascinant monde de l\'IA, explorant son histoire, ses applications actuelles et son potentiel révolutionnaire pour le futur.',22,3,'2023-11-13 17:30:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (22,'alicia','bazin','1988-09-02 00:00:00',11),(23,'John','Doe','2023-10-30 00:00:00',13);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `id` int NOT NULL,
  `post_id` int unsigned DEFAULT NULL,
  `profile_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_idx` (`post_id`),
  KEY `fk_profile_idx` (`profile_id`),
  CONSTRAINT `fk_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `fk_profile` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,1,22),(2,1,23),(3,2,22),(4,2,23),(5,3,22);
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

-- Dump completed on 2023-11-18 20:14:05
