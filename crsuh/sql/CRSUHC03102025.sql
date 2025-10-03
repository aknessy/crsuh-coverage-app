-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: crsuh_coverage
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `crsuh_kpi`
--

DROP TABLE IF EXISTS `crsuh_kpi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crsuh_kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_uuid` varchar(36) NOT NULL,
  `kpi_md_code` varchar(45) NOT NULL,
  `kpi_name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`kpi_uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crsuh_kpi`
--

LOCK TABLES `crsuh_kpi` WRITE;
/*!40000 ALTER TABLE `crsuh_kpi` DISABLE KEYS */;
INSERT INTO `crsuh_kpi` VALUES (1,'cd72af27-81fd-40eb-bb39-e5532027692e','CR371311-025','Enrollment','2025-09-25 15:55:31',0,NULL),(2,'d11a242f-cf30-4910-b799-7998ad56e674','CR371311-025','Empanelment','2025-09-25 15:55:31',0,NULL),(3,'e4469f34-d416-4ed7-896f-a5850949412d','CR371311-025','Accreditation','2025-09-25 15:55:31',0,NULL),(4,'b385065d-595a-4ecb-bdd1-0779c8b2ac2d','CR371311-025','Capitation Payment','2025-09-25 15:55:31',0,NULL),(5,'c356b764-2f62-4f8c-b15e-cbb30404b680','CR371311-025','Fee for Service','2025-09-25 15:55:31',0,NULL),(6,'60434544-54c9-45c5-a5ea-fbf418791e13','CR371311-025','Interventions','2025-09-25 15:55:31',0,NULL),(7,'facfd346-7f1a-49ec-9099-bf222fe14866','CR371311-025','Quality Assurance','2025-09-25 15:55:31',0,NULL),(8,'ec56fa77-c351-4bcf-b868-8ff6ad40f5b9','CR371311-025','SOC Meetings','2025-09-25 15:55:31',0,NULL),(9,'19e6af0a-3ecd-4318-9ccf-53c0280d1ca3','CR371311-025','Trainings','2025-09-25 15:55:31',0,NULL);
/*!40000 ALTER TABLE `crsuh_kpi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crsuh_mds`
--

DROP TABLE IF EXISTS `crsuh_mds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crsuh_mds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_uuid` varchar(36) NOT NULL,
  `md_name` varchar(60) NOT NULL,
  `md_code` varchar(45) NOT NULL,
  `md_state` smallint(4) DEFAULT NULL,
  `md_lga` smallint(4) DEFAULT NULL,
  `num_of_kpi` int(11) NOT NULL DEFAULT 1,
  `pwd_hash` varchar(255) NOT NULL,
  `pwd_text` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`md_uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crsuh_mds`
--

LOCK TABLES `crsuh_mds` WRITE;
/*!40000 ALTER TABLE `crsuh_mds` DISABLE KEYS */;
INSERT INTO `crsuh_mds` VALUES (1,'3e10cd97-957c-489c-af87-1d8a70e78448','CRSHIA','CR371311-025',9,NULL,1,'a50b77dc0f46018e259dc37598be45320d477242db4cfeddd3e5eff9db830c605e4479b02379fb546f07e9a770d739a883bcd58e80e77dbeb61866a0545aaae5','HG8dC10V','2025-09-25 09:25:25',0,NULL,NULL),(2,'41ee42f3-550e-4bac-89b6-bfa2782a53ea','SERVICE PROVIDERS','SE51016-025',9,NULL,1,'d7a803803a2c3d99cf0ae1031a9201ff9a5871e097115e2d337e8499b703fc82da9a8ac9fc25d8884b8234f7f953cd2c78dc4df663efb7cc7e1859f133ea4da4','dQY90ZOv','2025-09-25 09:25:25',0,NULL,NULL),(3,'67ed40be-441f-498c-b996-0cf750f169bd','SACA','SA671348-025',9,NULL,1,'bb1ab859ecd1be93b7dbc7bfb6acc6f30828ed9c3298eeb654e8b34bfa899c9eed61b50110f3659b44062162a06de3b7e51ebe1e5dc78f774d7fc39f68945a67','usWMXrzc','2025-09-25 09:25:25',0,NULL,NULL),(4,'d5eb38d3-e237-4998-bb8c-b76245327819','GENERAL HOSPITAL','GE752280-025',9,NULL,1,'9f3691db118ea6a76f357085382064960b3f6c0a4e2a0d2548bec56f31d905963cbf5c79ebdfcbbaebb0324dc789e947c3bb3fe757fdbec8b3f23052ab29bc61','o5jQc4ZE','2025-09-25 09:25:25',0,NULL,NULL),(5,'39410a7b-6238-4614-97d2-aa26081251bd','TERTIARY HOSPITALS','TE363651-025',9,NULL,1,'678fd692ef1cce6def76d20e5226ac155937ed71a4400a67bf59f3efab08992a324f121ff12935e6278829c01fd3bbe2d964ab9574c2bbc23efad634c96f1ad1','MvrHoSv3','2025-09-25 09:25:25',0,NULL,NULL),(6,'d3d9c031-6480-4b57-bc42-a8e67095f544','CRS HEALTH ANTI-QUACKERY TASKFORCE','CR724799-025',9,NULL,1,'ae66045944060e3830f6e4bdb31137c38ff9b6ea84a1d740bbb5c3771705bbd9d38269e10f7381236b554903b6c30564a745a2c36606e26827d09258ad8752bd','wsnfgNOp','2025-09-25 09:25:25',0,NULL,NULL),(7,'578121f5-a917-4ae6-91e0-1bba62f29b66','SPHCDA','SP566930-025',9,NULL,1,'d2f4ce633a4a93a6aca6b91de66bc5a0604296f896cd0997eb534f8095f3144fa6c58e4eb49e660d4afe3f13a99a20c79998252c6fa7967f498934aebe99ef4a','Cb7sLgDs','2025-09-25 09:25:25',0,NULL,NULL),(8,'29607e30-27f9-4b70-855e-082bc1a886a2','DNS','DN784729-025',9,NULL,1,'c8c17289a6c717fe40060d685207df7d6181a7683150cc96873d1dab98a06046e884231a0f27d7fc42a7bedff16c362b756ff1e7f0d7b2a61c0c541d3b15f31e','zK18IcHj','2025-09-25 09:25:25',0,NULL,NULL),(9,'8aabd08e-8f54-4864-8521-f853e6cfd056','D-MDS','D-157462-025',9,NULL,1,'e6e8430436896d3f675356d80adc8464b112d5d62e0132bf0b23cd4e18a4bdbfb842cae28a83c122087fe562bb12236ff8fe81b7d8cfe1b4edfa0169376d3c85','1YwGl7Wn','2025-09-25 09:25:25',0,NULL,NULL),(10,'0ea1def4-f681-44b9-ba0b-9f027f0b13ad','DPS','DP854860-025',9,NULL,1,'3b2ec3aa4a52670d4638169accdbcc97789df1cf2ae861de866f082ad46cdc20b0010552b0d2af0a36c8a6836ebd693b85da7216f85f81e2cd9b1d492e80c114','i6xOL8rZ','2025-09-25 09:25:25',0,NULL,NULL),(11,'3a812a26-3acc-4429-991e-0ab5ac0da0b6','D-SERVICOM','D-550959-025',9,NULL,1,'1af0aaa5c231f306ee70173ee70c265b2ba17363d25ef136a8aeb5f363da65076d8998f25e5630a92857d30456e3657375489db1156e9d41f5be65001424ca5b','pKv31Dw6','2025-09-25 09:25:25',0,NULL,NULL),(12,'77eea445-c5ee-46d9-b968-46a928e8dd72','DPH (EOC+)','DP441018-025',9,NULL,1,'bcfa748ce415ffd70961475f81bc720c45c6bb5c503ee4ff15af3770693205d0017f7d75fad267011a2a676652b263382035e144cd2b4b937b1a8eb4dbba25f8','HIVhp454','2025-09-25 09:25:25',0,NULL,NULL),(13,'e102b071-4f78-4a75-998b-e601b6f2d3bd','AMBULANCE SERVICE OPERATIONS','AM197939-025',9,NULL,1,'9ddcac3d4cd4b6e1c6d69042cb1c8a8f9e7c9125838f07b0ab08d71db3bae9d1df42e30a8dd8113f1fa34bfbdc9979ba97bfcbc2a46c1a414833fd309a0f4d9c','zrqxEOIq','2025-09-25 09:25:25',0,NULL,NULL),(14,'d78b0ce5-09c9-45af-b456-1119f0afb04a','CRSHIA','CR229330-025',9,NULL,1,'f15c59826f45dedbcb86577f6742df4441da1c0c03bf2e9f565c3c9dc45df634b9833fbe6bed41ae7290f8096cf1501646ba9e490fabae3d65752e3c3cc8c697','QkJQGaWu','2025-09-25 09:25:51',0,NULL,NULL),(15,'b32d9419-e33c-4a59-8b1e-69c0ca1278cd','SERVICE PROVIDERS','SE409783-025',9,NULL,1,'22a6006a8b4c414dc3e2253ea9ff6e7e03bf6f9a44f1ee77b2b3b4394213ec31f7eeb73d10b740c651cacd03e6e91183dea58f45639b8e20b232faa61b2080d8','6puoG7aO','2025-09-25 09:25:51',0,NULL,NULL),(16,'ec5468fd-b515-44b6-8f88-de75cf233d37','SACA','SA118124-025',9,NULL,1,'37920ae7da931eadc42978556ef1ad59981722852740288f036604eaad6be79f1706cd2b206bad64f7e0ce0011a6af0d6d1462f9fb3fc4f193db39a8322fabbd','IxJMicCi','2025-09-25 09:25:51',0,NULL,NULL),(17,'2de2ebd8-f677-4355-a636-ffd9a54cd249','GENERAL HOSPITAL','GE531430-025',9,NULL,1,'7bbb792628fbb759b4808c192fc1a73c4e07faff57bc03288e684eed609905ac60a155cfbdc02031e33cec85ee28becb487e6e210c3a7f91446aa19f037d5b0f','721aU0sA','2025-09-25 09:25:51',0,NULL,NULL),(18,'94cfa434-c8d9-4bb2-b135-c4c9eab7c6d9','TERTIARY HOSPITALS','TE451664-025',9,NULL,1,'ed35d0a79748b153c1fbb2617470c9c40b4d25ac01015f4c13cbc640c7aabbff33aeb7fe569f26d438d802a47510617217bd18d2489f2c58f2280ae76ed35071','7XpG0Jbu','2025-09-25 09:25:51',0,NULL,NULL),(19,'fe1be163-12df-45db-8ed5-af5a52232002','CRS HEALTH ANTI-QUACKERY TASKFORCE','CR589792-025',9,NULL,1,'14de36b70133bb1ce48a140582cbd066ba8c255f2d71a4fd318ba375a0024d5c89b7b362c207a3000102152c9e9b4f0188ae9a62441d8167daf287dfae1fac89','jgmXpslT','2025-09-25 09:25:51',0,NULL,NULL),(20,'e8064644-1188-4eb2-ba52-04d068a35f63','SPHCDA','SP253899-025',9,NULL,1,'a752c94b018f7e2ba9742b3e4b2b8778326a416b2fbd6dda667a3c4aeb2bdd33fe493026670a4aeb3c90b8663132616aa7300b8b7a26bd0f73bbf9cfdc75330e','32bKSXxe','2025-09-25 09:25:51',0,NULL,NULL),(21,'5db2f226-ffb1-41b6-bead-3b3f85527e58','DNS','DN417682-025',9,NULL,1,'41f774cc8bb08940395229b578bd5f4c5ec836cfa0db71ab17204ae505d0d6cee80f44bc90b415b4ae3a280af2a83c74f8f9f446714c1d153ff1f40c4a9a40fc','VNEbxIvU','2025-09-25 09:25:51',0,NULL,NULL),(22,'d9273874-1708-4afc-a959-a47a74b38f4d','D-MDS','D-763964-025',9,NULL,1,'5e53643509d3bd09e2fb1c3786378ac03f3014aebf3aa42ed5a1b6a30007283e11d3b9720eacfee9961ac38b050fbbc2c1cf6a411a3d3abf5da73ef08080d781','OgFUyW3l','2025-09-25 09:25:51',0,NULL,NULL),(23,'17767dbc-ff2e-439e-82e7-95cb4b1820d4','DPS','DP468673-025',9,NULL,1,'22d5d444dd670e38d0c525a772a6a33d7e6a390432f241264c99a3b8a52071e6ab4dcb63b26411ef79226ff9e003a41208f6e08c48becb71a95148be849acaa7','e35OHC2a','2025-09-25 09:25:51',0,NULL,NULL),(24,'85f2b78c-ff2d-4156-a5a7-17e0cdad88df','D-SERVICOM','D-999087-025',9,NULL,1,'6021d4229af9516ff930c32f706e68c43247e25ad5f2d39eadc4fe4d4de97af5e176c76a6a514fac9562e04968ee669d1c9b1582670c0196faf368fdd1f439a2','mreLGI5q','2025-09-25 09:25:51',0,NULL,NULL),(25,'b3574466-cfd1-4af9-a004-eecbe95d3f6f','DPH (EOC+)','DP620037-025',9,NULL,1,'c0ccfe8b21a25ec45f35181875872454f40e0dfd53f31d39b102be31b7b7fbf0419c3d8c78787225ff94b19833a189296c25be314ad6bc49563f614b479afddf','O1T2lZc0','2025-09-25 09:25:51',0,NULL,NULL),(26,'5f1e802a-773e-4888-89d8-742d80f2e07e','AMBULANCE SERVICE OPERATIONS','AM44950-025',9,176,1,'2999212257c17335523423a91ca547fea527829aad123b12601bc9ab65d3ef358b0b38aa7403442d374dfaa562271368ffe62b40213c3961eefc3f3521934108','x9U6zA4Y','2025-09-25 09:25:51',0,NULL,'2025-10-03 08:46:16'),(27,'1d5a84a0-d542-4915-851e-38cf2b9076b4','NURSING','NU263774-025',9,176,1,'5c21f1b1447e169ecbbc26b748a0e22b33ffad3d2a0e820c81f83680293eff913158c31bb882e4a3cebf6d1485c6cc1e2c80044d7b12580deec69725aa269314','uoQduM7f','2025-10-03 00:38:47',0,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `crsuh_mds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crsuh_patient_info`
--

DROP TABLE IF EXISTS `crsuh_patient_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crsuh_patient_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_record_uuid` char(36) NOT NULL,
  `patient_pid` varchar(45) NOT NULL,
  `patient_firstname` varchar(45) NOT NULL,
  `patient_lastname` varchar(45) NOT NULL,
  `patient_phone` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crsuh_patient_info`
--

LOCK TABLES `crsuh_patient_info` WRITE;
/*!40000 ALTER TABLE `crsuh_patient_info` DISABLE KEYS */;
INSERT INTO `crsuh_patient_info` VALUES (1,'6312e9d1-5cbe-482b-8cad-ecfb72a640b2','OPD12345','Jonas','Gutierez','7039284608','2025-10-02 08:08:31',0,NULL),(2,'6312e9d1-5cbe-482b-8cad-ecfb72a640b2','OPD1242531','Mandu','Chinonso','09031446670','2025-10-02 08:08:31',0,NULL),(4,'8051732d-e4a5-4878-93a9-2fbe66e3d3d4','OPD34255','Joshua','Umoren','09021340551','2025-10-02 10:16:00',0,NULL),(5,'8051732d-e4a5-4878-93a9-2fbe66e3d3d4','OPD15524','Monica','Thor','07032142111','2025-10-02 10:16:00',0,NULL),(6,'8051732d-e4a5-4878-93a9-2fbe66e3d3d4','OPD12345','Jonas','Irabor','07039284608','2025-10-02 10:16:00',0,NULL);
/*!40000 ALTER TABLE `crsuh_patient_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crsuh_track_record`
--

DROP TABLE IF EXISTS `crsuh_track_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crsuh_track_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `md_uuid` varchar(36) NOT NULL,
  `kpi_uuid` varchar(45) NOT NULL,
  `accreditation_type` varchar(100) DEFAULT NULL,
  `accreditation_level` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `sub_sector` varchar(45) DEFAULT NULL,
  `employer_level` varchar(45) DEFAULT NULL,
  `provider` varchar(45) DEFAULT NULL,
  `quality_assurance_lga` int(11) DEFAULT 0,
  `soc_meeting_held` enum('yes','no') DEFAULT NULL,
  `meeting_date` datetime DEFAULT NULL,
  `key_notes` text DEFAULT NULL,
  `training_done` enum('yes','no') DEFAULT NULL,
  `training_date` datetime DEFAULT NULL,
  `training_theme` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`,`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crsuh_track_record`
--

LOCK TABLES `crsuh_track_record` WRITE;
/*!40000 ALTER TABLE `crsuh_track_record` DISABLE KEYS */;
INSERT INTO `crsuh_track_record` VALUES (1,'6312e9d1-5cbe-482b-8cad-ecfb72a640b2','3e10cd97-957c-489c-af87-1d8a70e78448','cd72af27-81fd-40eb-bb39-e5532027692e',NULL,NULL,'Formal','BHCPF','State Government',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-02 08:08:31',0),(2,'8051732d-e4a5-4878-93a9-2fbe66e3d3d4','3e10cd97-957c-489c-af87-1d8a70e78448','cd72af27-81fd-40eb-bb39-e5532027692e',NULL,NULL,'Formal','BHCPF','Local Government',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-02 10:16:00',0);
/*!40000 ALTER TABLE `crsuh_track_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lga`
--

DROP TABLE IF EXISTS `lga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lga` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lastModified` datetime DEFAULT NULL,
  `version` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lga`
--

LOCK TABLES `lga` WRITE;
/*!40000 ALTER TABLE `lga` DISABLE KEYS */;
INSERT INTO `lga` VALUES (1,NULL,1,'Aba North',1),(2,NULL,1,'Aba South',1),(3,NULL,1,'Arochukwu',1),(4,NULL,1,'Bende',1),(5,NULL,1,'Ikwuano',1),(6,NULL,1,'Isiala-Ngwa North',1),(7,NULL,1,'Isiala-Ngwa South',1),(8,NULL,1,'Isuikwuato',1),(9,NULL,1,'Obi Ngwa',1),(10,NULL,1,'Ohafia',1),(11,NULL,1,'Osisioma Ngwa',1),(12,NULL,1,'Ugwunagbo',1),(13,NULL,1,'Ukwa East',1),(14,NULL,1,'Ukwa West',1),(15,NULL,1,'Umuahia North',1),(16,NULL,1,'Umuahia South',1),(17,NULL,1,'Umu-Nneochi',1),(18,NULL,1,'Demsa',2),(19,NULL,1,'Fufore',2),(20,NULL,1,'Ganye',2),(21,NULL,1,'Girei',2),(22,NULL,1,'Gombi',2),(23,NULL,1,'Guyuk',2),(24,NULL,1,'Hong',2),(25,NULL,1,'Jada',2),(26,NULL,1,'Lamurde',2),(27,NULL,1,'Madagali',2),(28,NULL,1,'Maiha',2),(29,NULL,1,'Mayo-Belwa',2),(30,NULL,1,'Michika',2),(31,NULL,1,'Mubi North',2),(32,NULL,1,'Mubi South',2),(33,NULL,1,'Numan',2),(34,NULL,1,'Shelleng',2),(35,NULL,1,'Song',2),(36,NULL,1,'Toungo',2),(37,NULL,1,'Yola North',2),(38,NULL,1,'Yola South',2),(39,NULL,1,'Abak',3),(40,NULL,1,'Eastern Obolo',3),(41,NULL,1,'Eket',3),(42,NULL,1,'Esit Eket',3),(43,NULL,1,'Essien Udim',3),(44,NULL,1,'Etim Ekpo',3),(45,NULL,1,'Etinan',3),(46,NULL,1,'Ibeno',3),(47,NULL,1,'Ibesikpo Asutan',3),(48,NULL,1,'Ibiono Ibom',3),(49,NULL,1,'Ika',3),(50,NULL,1,'Ikono',3),(51,NULL,1,'Ikot Abasi',3),(52,NULL,1,'Ikot Ekpene',3),(53,NULL,1,'Ini',3),(54,NULL,1,'Itu',3),(55,NULL,1,'Mbo',3),(56,NULL,1,'Mkpat Enin',3),(57,NULL,1,'Nsit Atai',3),(58,NULL,1,'Nsit Ibom',3),(59,NULL,1,'Nsit Ubium',3),(60,NULL,1,'Obot Akara',3),(61,NULL,1,'Okobo',3),(62,NULL,1,'Onna',3),(63,NULL,1,'Oron',3),(64,NULL,1,'Oruk Anam',3),(65,NULL,1,'Udung Uko',3),(66,NULL,1,'Ukanafun',3),(67,NULL,1,'Uruan',3),(68,NULL,1,'Urue-Offong/Oruko',3),(69,NULL,1,'Uyo',3),(70,NULL,1,'Aguata',4),(71,NULL,1,'Anambra East',4),(72,NULL,1,'Anambra West',4),(73,NULL,1,'Anaocha',4),(74,NULL,1,'Awka North',4),(75,NULL,1,'Awka South',4),(76,NULL,1,'Ayamelum',4),(77,NULL,1,'Dunukofia',4),(78,NULL,1,'Ekwusigo',4),(79,NULL,1,'Idemili North',4),(80,NULL,1,'Idemili South',4),(81,NULL,1,'Ihiala',4),(82,NULL,1,'Njikoka',4),(83,NULL,1,'Nnewi North',4),(84,NULL,1,'Nnewi South',4),(85,NULL,1,'Ogbaru',4),(86,NULL,1,'Onitsha North',4),(87,NULL,1,'Onitsha South',4),(88,NULL,1,'Orumba North',4),(89,NULL,1,'Orumba South',4),(90,NULL,1,'Oyi',4),(91,NULL,1,'Alkaleri',5),(92,NULL,1,'Bauchi',5),(93,NULL,1,'Bogoro',5),(94,NULL,1,'Damban',5),(95,NULL,1,'Darazo',5),(96,NULL,1,'Dass',5),(97,NULL,1,'Gamawa',5),(98,NULL,1,'Ganjuwa',5),(99,NULL,1,'Giade',5),(100,NULL,1,'Itas/Gadau',5),(101,NULL,1,'Jama\'are',5),(102,NULL,1,'Katagum',5),(103,NULL,1,'Kirfi',5),(104,NULL,1,'Misau',5),(105,NULL,1,'Ningi',5),(106,NULL,1,'Shira',5),(107,NULL,1,'Tafawa-Balewa',5),(108,NULL,1,'Toro',5),(109,NULL,1,'Warji',5),(110,NULL,1,'Zaki',5),(111,NULL,1,'Brass',6),(112,NULL,1,'Ekeremor',6),(113,NULL,1,'Kolokuma/Opokuma',6),(114,NULL,1,'Nembe',6),(115,NULL,1,'Ogbia',6),(116,NULL,1,'Sagbama',6),(117,NULL,1,'Southern Ijaw',6),(118,NULL,1,'Yenegoa',6),(119,NULL,1,'Ado',7),(120,NULL,1,'Agatu',7),(121,NULL,1,'Apa',7),(122,NULL,1,'Buruku',7),(123,NULL,1,'Gboko',7),(124,NULL,1,'Guma',7),(125,NULL,1,'Gwer East',7),(126,NULL,1,'Gwer West',7),(127,NULL,1,'Katsina-Ala',7),(128,NULL,1,'Konshisha',7),(129,NULL,1,'Kwande',7),(130,NULL,1,'Logo',7),(131,NULL,1,'Makurdi',7),(132,NULL,1,'Obi',7),(133,NULL,1,'Ogbadibo',7),(134,NULL,1,'Ohimini',7),(135,NULL,1,'Oju',7),(136,NULL,1,'Okpokwu',7),(137,NULL,1,'Oturkpo',7),(138,NULL,1,'Tarka',7),(139,NULL,1,'Ukum',7),(140,NULL,1,'Ushongo',7),(141,NULL,1,'Vandeikya',7),(142,NULL,1,'Abadam',8),(143,NULL,1,'Askira/Uba',8),(144,NULL,1,'Bama',8),(145,NULL,1,'Bayo',8),(146,NULL,1,'Biu',8),(147,NULL,1,'Chibok',8),(148,NULL,1,'Damboa',8),(149,NULL,1,'Dikwa',8),(150,NULL,1,'Gubio',8),(151,NULL,1,'Guzamala',8),(152,NULL,1,'Gwoza',8),(153,NULL,1,'Hawul',8),(154,NULL,1,'Jere',8),(155,NULL,1,'Kaga',8),(156,NULL,1,'Kala/Balge',8),(157,NULL,1,'Konduga',8),(158,NULL,1,'Kukawa',8),(159,NULL,1,'Kwaya Kusar',8),(160,NULL,1,'Mafa',8),(161,NULL,1,'Magumeri',8),(162,NULL,1,'Maiduguri',8),(163,NULL,1,'Marte',8),(164,NULL,1,'Mobbar',8),(165,NULL,1,'Monguno',8),(166,NULL,1,'Ngala',8),(167,NULL,1,'Nganzai',8),(168,NULL,1,'Shani',8),(169,NULL,1,'Abi',9),(170,NULL,1,'Akamkpa',9),(171,NULL,1,'Akpabuyo',9),(172,NULL,1,'Bakassi',9),(173,NULL,1,'Bekwara',9),(174,NULL,1,'Biase',9),(175,NULL,1,'Boki',9),(176,NULL,1,'Calabar Municipal',9),(177,NULL,1,'Calabar South',9),(178,NULL,1,'Etung',9),(179,NULL,1,'Ikom',9),(180,NULL,1,'Obanliku',9),(181,NULL,1,'Obubra',9),(182,NULL,1,'Obudu',9),(183,NULL,1,'Odukpani',9),(184,NULL,1,'Ogoja',9),(185,NULL,1,'Yakurr',9),(186,NULL,1,'Yala',9),(187,NULL,1,'Aniocha North',10),(188,NULL,1,'Aniocha South',10),(189,NULL,1,'Bomadi',10),(190,NULL,1,'Burutu',10),(191,NULL,1,'Ethiope East',10),(192,NULL,1,'Ethiope West',10),(193,NULL,1,'Ika North East',10),(194,NULL,1,'Ika South',10),(195,NULL,1,'Isoko North',10),(196,NULL,1,'Isoko South',10),(197,NULL,1,'Ndokwa East',10),(198,NULL,1,'Ndokwa West',10),(199,NULL,1,'Okpe',10),(200,NULL,1,'Oshimili North',10),(201,NULL,1,'Oshimili South',10),(202,NULL,1,'Patani',10),(203,NULL,1,'Sapele',10),(204,NULL,1,'Udu',10),(205,NULL,1,'Ughelli North',10),(206,NULL,1,'Ughelli South',10),(207,NULL,1,'Ukwuani',10),(208,NULL,1,'Uvwie',10),(209,NULL,1,'Warri North',10),(210,NULL,1,'Warri South',10),(211,NULL,1,'Warri South West',10),(212,NULL,1,'Abakaliki',11),(213,NULL,1,'Afikpo North',11),(214,NULL,1,'Afikpo South',11),(215,NULL,1,'Ebonyi',11),(216,NULL,1,'Ezza North',11),(217,NULL,1,'Ezza South',11),(218,NULL,1,'Ikwo',11),(219,NULL,1,'Ishielu',11),(220,NULL,1,'Ivo',11),(221,NULL,1,'Izzi',11),(222,NULL,1,'Ohaozara',11),(223,NULL,1,'Ohaukwu',11),(224,NULL,1,'Onicha',11),(225,NULL,1,'Akoko-Edo',12),(226,NULL,1,'Egor',12),(227,NULL,1,'Esan Central',12),(228,NULL,1,'Esan North East',12),(229,NULL,1,'Esan South East',12),(230,NULL,1,'Esan West',12),(231,NULL,1,'Etsako Central',12),(232,NULL,1,'Etsako East',12),(233,NULL,1,'Etsako West',12),(234,NULL,1,'Igueben',12),(235,NULL,1,'Ikpoba-Okha',12),(236,NULL,1,'Oredo',12),(237,NULL,1,'Orhionmwon',12),(238,NULL,1,'Ovia North East',12),(239,NULL,1,'Ovia South West',12),(240,NULL,1,'Owan East',12),(241,NULL,1,'Owan West',12),(242,NULL,1,'Uhunmwonde',12),(243,NULL,1,'Ado Ekiti',13),(244,NULL,1,'Aiyekire',13),(245,NULL,1,'Efon',13),(246,NULL,1,'Ekiti East',13),(247,NULL,1,'Ekiti South West',13),(248,NULL,1,'Ekiti West',13),(249,NULL,1,'Emure',13),(250,NULL,1,'Ido-Osi',13),(251,NULL,1,'Ijero',13),(252,NULL,1,'Ikere',13),(253,NULL,1,'Ikole',13),(254,NULL,1,'Ilejemeje',13),(255,NULL,1,'Irepodun/Ifelodun',13),(256,NULL,1,'Ise/Orun',13),(257,NULL,1,'Moba',13),(258,NULL,1,'Oye',13),(259,NULL,1,'Aninri',36),(260,NULL,1,'Awgu',36),(261,NULL,1,'Enugu East',36),(262,NULL,1,'Enugu North',36),(263,NULL,1,'Enugu South',36),(264,NULL,1,'Ezeagu',36),(265,NULL,1,'Igbo-Etiti',36),(266,NULL,1,'Igbo-Eze North',36),(267,NULL,1,'Igbo-Eze South',36),(268,NULL,1,'Isi-Uzo',36),(269,NULL,1,'Nkanu East',36),(270,NULL,1,'Nkanu West',36),(271,NULL,1,'Nsukka',36),(272,NULL,1,'Oji-River',36),(273,NULL,1,'Udenu',36),(274,NULL,1,'Udi',36),(275,NULL,1,'Uzo-Uwani',36),(276,NULL,1,'Abaji',37),(277,NULL,1,'Abuja Municipal Area Council',37),(278,NULL,1,'Bwari',37),(279,NULL,1,'Gwagwalada',37),(280,NULL,1,'Kuje',37),(281,NULL,1,'Kwali',37),(282,NULL,1,'Akko',14),(283,NULL,1,'Balanga',14),(284,NULL,1,'Billiri',14),(285,NULL,1,'Dukku',14),(286,NULL,1,'Funakaye',14),(287,NULL,1,'Gombe',14),(288,NULL,1,'Kaltungo',14),(289,NULL,1,'Kwami',14),(290,NULL,1,'Nafada',14),(291,NULL,1,'Shomgom',14),(292,NULL,1,'Yamaltu/Deba',14),(293,NULL,1,'Abo-Mbaise',15),(294,NULL,1,'Ahiazu-Mbaise',15),(295,NULL,1,'Ehime-Mbano',15),(296,NULL,1,'Ezinihitte',15),(297,NULL,1,'Ideato North',15),(298,NULL,1,'Ideato South',15),(299,NULL,1,'Ihitte/Uboma',15),(300,NULL,1,'Ikeduru',15),(301,NULL,1,'Isiala-Mbano',15),(302,NULL,1,'Isu',15),(303,NULL,1,'Mbaitoli',15),(304,NULL,1,'Ngor-Okpala',15),(305,NULL,1,'Njaba',15),(306,NULL,1,'Nkwerre',15),(307,NULL,1,'Nwangele',15),(308,NULL,1,'Obowo',15),(309,NULL,1,'Oguta',15),(310,NULL,1,'Ohaji/Egbema',15),(311,NULL,1,'Okigwe',15),(312,NULL,1,'Orlu',15),(313,NULL,1,'Orsu',15),(314,NULL,1,'Oru East',15),(315,NULL,1,'Oru West',15),(316,NULL,1,'Owerri-Municipal',15),(317,NULL,1,'Owerri North',15),(318,NULL,1,'Owerri West',15),(319,NULL,1,'Unuimo',15),(320,NULL,1,'Auyo',16),(321,NULL,1,'Babura',16),(322,NULL,1,'Biriniwa',16),(323,NULL,1,'Birnin Kudu',16),(324,NULL,1,'Buji',16),(325,NULL,1,'Dutse',16),(326,NULL,1,'Gagarawa',16),(327,NULL,1,'Garki',16),(328,NULL,1,'Gumel',16),(329,NULL,1,'Guri',16),(330,NULL,1,'Gwaram',16),(331,NULL,1,'Gwiwa',16),(332,NULL,1,'Hadejia',16),(333,NULL,1,'Jahun',16),(334,NULL,1,'Kafin Hausa',16),(335,NULL,1,'Kaugama',16),(336,NULL,1,'Kazaure',16),(337,NULL,1,'Kiri Kasama',16),(338,NULL,1,'Kiyawa',16),(339,NULL,1,'Maigatari',16),(340,NULL,1,'Malam Madori',16),(341,NULL,1,'Miga',16),(342,NULL,1,'Ringim',16),(343,NULL,1,'Roni',16),(344,NULL,1,'Sule Tankarkar',16),(345,NULL,1,'Taura',16),(346,NULL,1,'Yankwashi',16),(347,NULL,1,'Birnin-Gwari',17),(348,NULL,1,'Chikun',17),(349,NULL,1,'Giwa',17),(350,NULL,1,'Igabi',17),(351,NULL,1,'Ikara',17),(352,NULL,1,'Jaba',17),(353,NULL,1,'Jema\'a',17),(354,NULL,1,'Kachia',17),(355,NULL,1,'Kaduna North',17),(356,NULL,1,'Kaduna South',17),(357,NULL,1,'Kagarko',17),(358,NULL,1,'Kajuru',17),(359,NULL,1,'Kaura',17),(360,NULL,1,'Kauru',17),(361,NULL,1,'Kubau',17),(362,NULL,1,'Kudan',17),(363,NULL,1,'Lere',17),(364,NULL,1,'Makarfi',17),(365,NULL,1,'Sabon-Gari',17),(366,NULL,1,'Sanga',17),(367,NULL,1,'Soba',17),(368,NULL,1,'Zangon-Kataf',17),(369,NULL,1,'Zaria',17),(370,NULL,1,'Ajingi',18),(371,NULL,1,'Albasu',18),(372,NULL,1,'Bagwai',18),(373,NULL,1,'Bebeji',18),(374,NULL,1,'Bichi',18),(375,NULL,1,'Bunkure',18),(376,NULL,1,'Dala',18),(377,NULL,1,'Dambatta',18),(378,NULL,1,'Dawakin Kudu',18),(379,NULL,1,'Dawakin Tofa',18),(380,NULL,1,'Doguwa',18),(381,NULL,1,'Fagge',18),(382,NULL,1,'Gabasawa',18),(383,NULL,1,'Garko',18),(384,NULL,1,'Garum Mallam',18),(385,NULL,1,'Gaya',18),(386,NULL,1,'Gezawa',18),(387,NULL,1,'Gwale',18),(388,NULL,1,'Gwarzo',18),(389,NULL,1,'Kabo',18),(390,NULL,1,'Kano Municipal',18),(391,NULL,1,'Karaye',18),(392,NULL,1,'Kibiya',18),(393,NULL,1,'Kiru',18),(394,NULL,1,'Kumbotso',18),(395,NULL,1,'Kunchi',18),(396,NULL,1,'Kura',18),(397,NULL,1,'Madobi',18),(398,NULL,1,'Makoda',18),(399,NULL,1,'Minjibir',18),(400,NULL,1,'Nasarawa',18),(401,NULL,1,'Rano',18),(402,NULL,1,'Rimin Gado',18),(403,NULL,1,'Rogo',18),(404,NULL,1,'Shanono',18),(405,NULL,1,'Sumaila',18),(406,NULL,1,'Takai',18),(407,NULL,1,'Tarauni',18),(408,NULL,1,'Tofa',18),(409,NULL,1,'Tsanyawa',18),(410,NULL,1,'Tudun Wada',18),(411,NULL,1,'Ungogo',18),(412,NULL,1,'Warawa',18),(413,NULL,1,'Wudil',18),(414,NULL,1,'Bakori',19),(415,NULL,1,'Batagarawa',19),(416,NULL,1,'Batsari',19),(417,NULL,1,'Baure',19),(418,NULL,1,'Bindawa',19),(419,NULL,1,'Charanchi',19),(420,NULL,1,'Dandume',19),(421,NULL,1,'Danja',19),(422,NULL,1,'Dan Musa',19),(423,NULL,1,'Daura',19),(424,NULL,1,'Dutsi',19),(425,NULL,1,'Dutsin-Ma',19),(426,NULL,1,'Faskari',19),(427,NULL,1,'Funtua',19),(428,NULL,1,'Ingawa',19),(429,NULL,1,'Jibia',19),(430,NULL,1,'Kafur',19),(431,NULL,1,'Kaita',19),(432,NULL,1,'Kankara',19),(433,NULL,1,'Kankia',19),(434,NULL,1,'Katsina',19),(435,NULL,1,'Kurfi',19),(436,NULL,1,'Kusada',19),(437,NULL,1,'Mai\'adua',19),(438,NULL,1,'Malumfashi',19),(439,NULL,1,'Mani',19),(440,NULL,1,'Mashi',19),(441,NULL,1,'Matazu',19),(442,NULL,1,'Musawa',19),(443,NULL,1,'Rimi',19),(444,NULL,1,'Sabuwa',19),(445,NULL,1,'Safana',19),(446,NULL,1,'Sandamu',19),(447,NULL,1,'Zango',19),(448,NULL,1,'Aleiro',20),(449,NULL,1,'Arewa-Dandi',20),(450,NULL,1,'Argungu',20),(451,NULL,1,'Augie',20),(452,NULL,1,'Bagudo',20),(453,NULL,1,'Birnin Kebbi',20),(454,NULL,1,'Bunza',20),(455,NULL,1,'Dandi',20),(456,NULL,1,'Fakai',20),(457,NULL,1,'Gwandu',20),(458,NULL,1,'Jega',20),(459,NULL,1,'Kalgo',20),(460,NULL,1,'Koko/Besse',20),(461,NULL,1,'Maiyama',20),(462,NULL,1,'Ngaski',20),(463,NULL,1,'Sakaba',20),(464,NULL,1,'Shanga',20),(465,NULL,1,'Suru',20),(466,NULL,1,'Wasagu/Danko',20),(467,NULL,1,'Yauri',20),(468,NULL,1,'Zuru',20),(469,NULL,1,'Adavi',21),(470,NULL,1,'Ajaokuta',21),(471,NULL,1,'Ankpa',21),(472,NULL,1,'Bassa',21),(473,NULL,1,'Dekina',21),(474,NULL,1,'Ibaji',21),(475,NULL,1,'Idah',21),(476,NULL,1,'Igalamela-Odolu',21),(477,NULL,1,'Ijumu',21),(478,NULL,1,'Kabba/Bunu',21),(479,NULL,1,'Kogi',21),(480,NULL,1,'Lokoja',21),(481,NULL,1,'Mopa-Muro',21),(482,NULL,1,'Ofu',21),(483,NULL,1,'Ogori/Magongo',21),(484,NULL,1,'Okehi',21),(485,NULL,1,'Okene',21),(486,NULL,1,'Olamabolo',21),(487,NULL,1,'Omala',21),(488,NULL,1,'Yagba East',21),(489,NULL,1,'Yagba West',21),(490,NULL,1,'Asa',22),(491,NULL,1,'Baruten',22),(492,NULL,1,'Edu',22),(493,NULL,1,'Ekiti',22),(494,NULL,1,'Ifelodun',22),(495,NULL,1,'Ilorin East',22),(496,NULL,1,'Ilorin South',22),(497,NULL,1,'Ilorin West',22),(498,NULL,1,'Irepodun',22),(499,NULL,1,'Isin',22),(500,NULL,1,'Kaiama',22),(501,NULL,1,'Moro',22),(502,NULL,1,'Offa',22),(503,NULL,1,'Oke-Ero',22),(504,NULL,1,'Oyun',22),(505,NULL,1,'Pategi',22),(506,NULL,1,'Agege',23),(507,NULL,1,'Ajeromi-Ifelodun',23),(508,NULL,1,'Alimosho',23),(509,NULL,1,'Amuwo-Odofin',23),(510,NULL,1,'Apapa',23),(511,NULL,1,'Badagry',23),(512,NULL,1,'Epe',23),(513,NULL,1,'Eti-Osa',23),(514,NULL,1,'Ibeju/Lekki',23),(515,NULL,1,'Ifako-Ijaye',23),(516,NULL,1,'Ikeja',23),(517,NULL,1,'Ikorodu',23),(518,NULL,1,'Kosofe',23),(519,NULL,1,'Lagos Island',23),(520,NULL,1,'Lagos Mainland',23),(521,NULL,1,'Mushin',23),(522,NULL,1,'Ojo',23),(523,NULL,1,'Oshodi-Isolo',23),(524,NULL,1,'Shomolu',23),(525,NULL,1,'Surulere',23),(526,NULL,1,'Akwanga',24),(527,NULL,1,'Awe',24),(528,NULL,1,'Doma',24),(529,NULL,1,'Karu',24),(530,NULL,1,'Keana',24),(531,NULL,1,'Keffi',24),(532,NULL,1,'Kokona',24),(533,NULL,1,'Lafia',24),(534,NULL,1,'Nasarawa',24),(535,NULL,1,'Nasarawa-Eggon',24),(536,NULL,1,'Obi',24),(537,NULL,1,'Toto',24),(538,NULL,1,'Wamba',24),(539,NULL,1,'Agaie',25),(540,NULL,1,'Agwara',25),(541,NULL,1,'Bida',25),(542,NULL,1,'Borgu',25),(543,NULL,1,'Bosso',25),(544,NULL,1,'Chanchaga',25),(545,NULL,1,'Edati',25),(546,NULL,1,'Gbako',25),(547,NULL,1,'Gurara',25),(548,NULL,1,'Katcha',25),(549,NULL,1,'Kontagora',25),(550,NULL,1,'Lapai',25),(551,NULL,1,'Lavun',25),(552,NULL,1,'Magama',25),(553,NULL,1,'Mariga',25),(554,NULL,1,'Mashegu',25),(555,NULL,1,'Mokwa',25),(556,NULL,1,'Muya',25),(557,NULL,1,'Paikoro',25),(558,NULL,1,'Rafi',25),(559,NULL,1,'Rijau',25),(560,NULL,1,'Shiroro',25),(561,NULL,1,'Suleja',25),(562,NULL,1,'Tafa',25),(563,NULL,1,'Wushishi',25),(564,NULL,1,'Abeokuta North',26),(565,NULL,1,'Abeokuta South',26),(566,NULL,1,'Ado-Odo/Ota',26),(567,NULL,1,'Egbado North',26),(568,NULL,1,'Egbado South',26),(569,NULL,1,'Ewekoro',26),(570,NULL,1,'Ifo',26),(571,NULL,1,'Ijebu East',26),(572,NULL,1,'Ijebu North',26),(573,NULL,1,'Ijebu North East',26),(574,NULL,1,'Ijebu Ode',26),(575,NULL,1,'Ikenne',26),(576,NULL,1,'Imeko Afon',26),(577,NULL,1,'Ipokia',26),(578,NULL,1,'Obafemi-Owode',26),(579,NULL,1,'Odeda',26),(580,NULL,1,'Odogbolu',26),(581,NULL,1,'Ogun Waterside',26),(582,NULL,1,'Remo North',26),(583,NULL,1,'Shagamu',26),(584,NULL,1,'Akoko North East',27),(585,NULL,1,'Akoko North West',27),(586,NULL,1,'Akoko South East',27),(587,NULL,1,'Akoko South West',27),(588,NULL,1,'Akure North',27),(589,NULL,1,'Akure South',27),(590,NULL,1,'Ese-Odo',27),(591,NULL,1,'Idanre',27),(592,NULL,1,'Ifedore',27),(593,NULL,1,'Ilaje',27),(594,NULL,1,'Ile-Oluji-Okeigbo',27),(595,NULL,1,'Irele',27),(596,NULL,1,'Odigbo',27),(597,NULL,1,'Okitipupa',27),(598,NULL,1,'Ondo East',27),(599,NULL,1,'Ondo West',27),(600,NULL,1,'Ose',27),(601,NULL,1,'Owo',27),(602,NULL,1,'Aiyedade',28),(603,NULL,1,'Aiyedire',28),(604,NULL,1,'Atakunmosa East',28),(605,NULL,1,'Atakunmosa West',28),(606,NULL,1,'Boluwaduro',28),(607,NULL,1,'Boripe',28),(608,NULL,1,'Ede North',28),(609,NULL,1,'Ede South',28),(610,NULL,1,'Egbedore',28),(611,NULL,1,'Ejigbo',28),(612,NULL,1,'Ife Central',28),(613,NULL,1,'Ifedayo',28),(614,NULL,1,'Ife East',28),(615,NULL,1,'Ifelodun',28),(616,NULL,1,'Ife North',28),(617,NULL,1,'Ife South',28),(618,NULL,1,'Ila',28),(619,NULL,1,'Ilesha East',28),(620,NULL,1,'Ilesha West',28),(621,NULL,1,'Irepodun',28),(622,NULL,1,'Irewole',28),(623,NULL,1,'Isokan',28),(624,NULL,1,'Iwo',28),(625,NULL,1,'Obokun',28),(626,NULL,1,'Odo-Otin',28),(627,NULL,1,'Ola-Oluwa',28),(628,NULL,1,'Olorunda',28),(629,NULL,1,'Oriade',28),(630,NULL,1,'Orolu',28),(631,NULL,1,'Osogbo',28),(632,NULL,1,'Afijio',29),(633,NULL,1,'Akinyele',29),(634,NULL,1,'Atiba',29),(635,NULL,1,'Atisbo',29),(636,NULL,1,'Egbeda',29),(637,NULL,1,'Ibadan North',29),(638,NULL,1,'Ibadan North East',29),(639,NULL,1,'Ibadan North West',29),(640,NULL,1,'Ibadan South East',29),(641,NULL,1,'Ibadan South West',29),(642,NULL,1,'Ibarapa Central',29),(643,NULL,1,'Ibarapa East',29),(644,NULL,1,'Ibarapa North',29),(645,NULL,1,'Ido',29),(646,NULL,1,'Irepo',29),(647,NULL,1,'Iseyin',29),(648,NULL,1,'Itesiwaju',29),(649,NULL,1,'Iwajowa',29),(650,NULL,1,'Kajola',29),(651,NULL,1,'Lagelu',29),(652,NULL,1,'Ogbomosho North',29),(653,NULL,1,'Ogbomosho South',29),(654,NULL,1,'Ogo Oluwa',29),(655,NULL,1,'Olorunsogo',29),(656,NULL,1,'Oluyole',29),(657,NULL,1,'Ona-Ara',29),(658,NULL,1,'Orelope',29),(659,NULL,1,'Ori Ire',29),(660,NULL,1,'Oyo East',29),(661,NULL,1,'Oyo West',29),(662,NULL,1,'Saki East',29),(663,NULL,1,'Saki West',29),(664,NULL,1,'Surulere',29),(665,NULL,1,'Barkin Ladi',30),(666,NULL,1,'Bassa',30),(667,NULL,1,'Bokkos',30),(668,NULL,1,'Jos East',30),(669,NULL,1,'Jos North',30),(670,NULL,1,'Jos South',30),(671,NULL,1,'Kanam',30),(672,NULL,1,'Kanke',30),(673,NULL,1,'Langtang Norh',30),(674,NULL,1,'Langtang South',30),(675,NULL,1,'Mangu',30),(676,NULL,1,'Mikang',30),(677,NULL,1,'Pankshin',30),(678,NULL,1,'Qua\'an Pan',30),(679,NULL,1,'Riyom',30),(680,NULL,1,'Shendam',30),(681,NULL,1,'Wase',30),(682,NULL,1,'Abua/Odual',31),(683,NULL,1,'Ahoada East',31),(684,NULL,1,'Ahoada West',31),(685,NULL,1,'Akuku Toru',31),(686,NULL,1,'Andoni',31),(687,NULL,1,'Asari-Toru',31),(688,NULL,1,'Bonny',31),(689,NULL,1,'Degema',31),(690,NULL,1,'Eleme',31),(691,NULL,1,'Emuoha',31),(692,NULL,1,'Etche',31),(693,NULL,1,'Gokana',31),(694,NULL,1,'Ikwerre',31),(695,NULL,1,'Khana',31),(696,NULL,1,'Obio/Akpor',31),(697,NULL,1,'Ogba/Egbema/Ndoni',31),(698,NULL,1,'Ogu/Bolo',31),(699,NULL,1,'Okrika',31),(700,NULL,1,'Omumma',31),(701,NULL,1,'Opobo/Nkoro',31),(702,NULL,1,'Oyigbo',31),(703,NULL,1,'Port-Harcourt',31),(704,NULL,1,'Tai',31),(705,NULL,1,'Binji',32),(706,NULL,1,'Bodinga',32),(707,NULL,1,'Dange Shuni',32),(708,NULL,1,'Gada',32),(709,NULL,1,'Goronyo',32),(710,NULL,1,'Gudu',32),(711,NULL,1,'Gwadabawa',32),(712,NULL,1,'Illela',32),(713,NULL,1,'Isa',32),(714,NULL,1,'Kebbe',32),(715,NULL,1,'Kware',32),(716,NULL,1,'Rabah',32),(717,NULL,1,'Sabon Birni',32),(718,NULL,1,'Shagari',32),(719,NULL,1,'Silame',32),(720,NULL,1,'Sokoto North',32),(721,NULL,1,'Sokoto South',32),(722,NULL,1,'Tambuwal',32),(723,NULL,1,'Tangaza',32),(724,NULL,1,'Tureta',32),(725,NULL,1,'Wamakko',32),(726,NULL,1,'Wurno',32),(727,NULL,1,'Yabo',32),(728,NULL,1,'Ardo-Kola',33),(729,NULL,1,'Bali',33),(730,NULL,1,'Donga',33),(731,NULL,1,'Gashaka',33),(732,NULL,1,'Gassol',33),(733,NULL,1,'Ibi',33),(734,NULL,1,'Jalingo',33),(735,NULL,1,'Karim-Lamido',33),(736,NULL,1,'Kurmi',33),(737,NULL,1,'Lau',33),(738,NULL,1,'Sardauna',33),(739,NULL,1,'Takum',33),(740,NULL,1,'Ussa',33),(741,NULL,1,'Wukari',33),(742,NULL,1,'Yorro',33),(743,NULL,1,'Zing',33),(744,NULL,1,'Bade',34),(745,NULL,1,'Bursari',34),(746,NULL,1,'Damaturu',34),(747,NULL,1,'Fika',34),(748,NULL,1,'Fune',34),(749,NULL,1,'Geidam',34),(750,NULL,1,'Gujba',34),(751,NULL,1,'Gulani',34),(752,NULL,1,'Jakusko',34),(753,NULL,1,'Karasuwa',34),(754,NULL,1,'Machina',34),(755,NULL,1,'Nangere',34),(756,NULL,1,'Nguru',34),(757,NULL,1,'Potiskum',34),(758,NULL,1,'Tarmua',34),(759,NULL,1,'Yunusari',34),(760,NULL,1,'Yusufari',34),(761,NULL,1,'Anka',35),(762,NULL,1,'Bakura',35),(763,NULL,1,'Birnin Magaji',35),(764,NULL,1,'Bukkuyum',35),(765,NULL,1,'Bungudu',35),(766,NULL,1,'Gummi',35),(767,NULL,1,'Gusau',35),(768,NULL,1,'Kaura Namoda',35),(769,NULL,1,'Maradun',35),(770,NULL,1,'Maru',35),(771,NULL,1,'Shinkafi',35),(772,NULL,1,'Talata Mafara',35),(773,NULL,1,'Tsafe',35),(774,NULL,1,'Zurmi',35);
/*!40000 ALTER TABLE `lga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_record`
--

DROP TABLE IF EXISTS `patient_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_uuid` varchar(36) NOT NULL,
  `entry_code` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `sector` varchar(45) NOT NULL,
  `occupation` varchar(45) NOT NULL,
  `employer` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `date_of_filing` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_record`
--

LOCK TABLES `patient_record` WRITE;
/*!40000 ALTER TABLE `patient_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` bigint(20) NOT NULL,
  `lastModified` datetime DEFAULT NULL,
  `version` bigint(20) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,NULL,0,'AB','Abia'),(2,NULL,0,'AD','Adamawa'),(3,NULL,0,'AK','Akwa Ibom'),(4,NULL,0,'AN','Anambra'),(5,NULL,0,'BA','Bauchi'),(6,NULL,0,'BY','Bayelsa'),(7,NULL,0,'BN','Benue'),(8,NULL,0,'BO','Borno'),(9,NULL,0,'CR','Cross River'),(10,NULL,0,'DT','Delta'),(11,NULL,0,'EB','Ebonyi'),(12,NULL,0,'ED','Edo'),(13,NULL,0,'EK','Ekiti'),(14,NULL,0,'GO','Gombe'),(15,NULL,0,'IM','Imo'),(16,NULL,0,'JG','Jigawa'),(17,NULL,0,'KD','Kaduna'),(18,NULL,0,'KN','Kano'),(19,NULL,0,'KT','Katsina'),(20,NULL,0,'KB','Kebbi'),(21,NULL,0,'KG','Kogi'),(22,NULL,0,'KW','Kwara'),(23,NULL,0,'LA','Lagos'),(24,NULL,0,'NA','Nasarawa'),(25,NULL,0,'NG','Niger'),(26,NULL,0,'OG','Ogun'),(27,NULL,0,'OD','Ondo'),(28,NULL,0,'OS','Osun'),(29,NULL,0,'OY','Oyo'),(30,NULL,0,'PL','Plateau'),(31,NULL,0,'RV','Rivers'),(32,NULL,0,'SO','Sokoto'),(33,NULL,0,'TA','Taraba'),(34,NULL,0,'YO','Yobe'),(35,NULL,0,'ZA','Zamfara'),(36,NULL,0,'EN','Enugu'),(37,NULL,0,'ABJ','Abuja');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_uuid` char(36) NOT NULL DEFAULT uuid(),
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_text` varchar(60) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `usertype` varchar(45) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_uuid`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'0b533063-9f9d-11f0-a333-d41b819cbc7c','Edmund','Irabor','07039284608','aknessy@yahoo.com','superadmin','986799b7916e8af78242e1b2ceb1dcb403f6e720dda46b8ecd313b3cd3642ff1f406f90a4fc3236fab93297a48c76d16ebaeb7b480adf60538806013833964d7','123456',NULL,'','active','admin','Super Admin',0,'2025-10-02 15:35:29','2025-10-02 15:35:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-03  8:50:47
