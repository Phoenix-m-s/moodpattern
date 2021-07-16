# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-07-17 00:34:32
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "failed_jobs"
#

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1);

#
# Structure for table "oauth_access_tokens"
#

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "oauth_access_tokens"
#

INSERT INTO `oauth_access_tokens` VALUES ('03f806e461e1df278ecd48b1df7d306c399c75c3929f4a535d49d702622522016b69f2bf027c2b19',6,1,'Login','[]',0,'2021-05-19 10:19:36','2021-05-19 10:19:36','2022-05-19 10:19:36'),('4ac8ab4d0f92a7b27c007ce43c72a8d31e87389c07e7383dfc8c7b50e5db7724ac55542b4a7936e2',5,2,NULL,'[]',0,'2021-05-19 10:02:40','2021-05-19 10:02:40','2022-05-19 10:02:40'),('a1c4f997ed709c313372110faa98ccfca427c59ddc343301c7498f9255aeb14379390fd80795c9c9',6,1,'Roocket App Android','[]',0,'2021-05-19 10:29:28','2021-05-19 10:29:28','2022-05-19 10:29:28'),('b5885fd966bd48b9865ea3bda622396e1b6137b67585a02d9cfa701ac8116fa161ae3d562b8a63e6',6,1,'Roocket App Android','[]',0,'2021-05-19 10:28:25','2021-05-19 10:28:25','2022-05-19 10:28:25'),('c8c4b13cbb912aec3718087469595821d23785c4732d91427d01d93327eceeef57fe11f88353de18',6,1,'Roocket App Android','[]',0,'2021-05-19 10:29:43','2021-05-19 10:29:43','2022-05-19 10:29:43'),('d828468232bb6ab644d752f6fca387262035b30f744b2b613a27b81365af044990101cea43556ecf',6,2,NULL,'[]',0,'2021-05-19 10:03:59','2021-05-19 10:03:59','2022-05-19 10:03:59');

#
# Structure for table "oauth_auth_codes"
#

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "oauth_auth_codes"
#


#
# Structure for table "oauth_clients"
#

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "oauth_clients"
#

INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','m6MpyRS9bhsWNMLuBjTAVN5xCo3qD5H6mEo3xdMY',NULL,'http://localhost',1,0,0,'2021-05-18 18:49:47','2021-05-18 18:49:47'),(2,NULL,'Laravel Password Grant Client','0sfqTMbqI6k8kHyak4Y8GXYwqxwvRYnOoGTzoS1y','users','http://localhost',0,1,0,'2021-05-18 18:49:47','2021-05-18 18:49:47');

#
# Structure for table "oauth_personal_access_clients"
#

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "oauth_personal_access_clients"
#

INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2021-05-18 18:49:47','2021-05-18 18:49:47');

#
# Structure for table "oauth_refresh_tokens"
#

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "oauth_refresh_tokens"
#

INSERT INTO `oauth_refresh_tokens` VALUES ('205e13c5672f0bfcb2810400fe80170660636c76a6e442cee75070dc116a8a4553e4b77419559d77','4ac8ab4d0f92a7b27c007ce43c72a8d31e87389c07e7383dfc8c7b50e5db7724ac55542b4a7936e2',0,'2022-05-19 10:02:40'),('833cdbd48fb55387ce1d1ce804942096f2a8ce563419da4a8fe32a77e50a2638bbba464a6d35531c','d828468232bb6ab644d752f6fca387262035b30f744b2b613a27b81365af044990101cea43556ecf',0,'2022-05-19 10:03:59'),('efc9bdc77c284dae3e75cbe8908ee05d014eb39784836d851207ac0c569606103bd6057ccb5615b8','087e1cccd27af5e56990c15a3da622551fd3fbc5598b99c987dad5168dd79e89a7c5843ae1985410',0,'2022-05-18 19:01:20');

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "sensor_graph"
#

DROP TABLE IF EXISTS `sensor_graph`;
CREATE TABLE `sensor_graph` (
  `id` int(5) NOT NULL,
  `user_topic_id` int(5) NOT NULL,
  `approach` int(1) NOT NULL COMMENT 'یک = مثبت، دو =منفی',
  `sensore_id` int(2) NOT NULL,
  `score_sum` int(2) NOT NULL DEFAULT 0,
  `score_large_scale` int(3) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='گراف حسی';

#
# Data for table "sensor_graph"
#


#
# Structure for table "sensor_labels"
#

DROP TABLE IF EXISTS `sensor_labels`;
CREATE TABLE `sensor_labels` (
  `id` int(2) NOT NULL,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `sensor_id` int(2) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "sensor_labels"
#

INSERT INTO `sensor_labels` VALUES (1,'انرژی و نشاط',8,'2019-11-02 02:57:36'),(2,'کیف  و کشش بدنی',8,'2019-11-02 02:57:36'),(3,'شادابی و آرامش بدنی',8,'2019-11-02 02:57:36'),(4,'خستگی و  بی حالی',10,'2019-11-02 02:57:36'),(5,'رنج بدنی',10,'2019-11-02 02:57:36'),(6,'دافعه بدنی',10,'2019-11-02 02:57:36'),(7,'حق انتخاب و موثر بودن',7,'2019-11-02 02:57:36'),(8,'قدرت',7,'2019-11-02 02:57:36'),(9,'آزادی',7,'2019-11-02 02:57:36'),(10,'نداشتن انتخاب',9,'2019-11-02 02:57:36'),(11,'ضعف',9,'2019-11-02 02:57:36'),(12,'محدودیت و ناچاری',9,'2019-11-02 02:57:36'),(13,'برنده بودن',5,'2019-11-02 02:57:36'),(14,'امید',5,'2019-11-02 02:57:36'),(15,'فایده',5,'2019-11-02 02:57:36'),(16,'بازنده بودن',6,'2019-11-02 02:57:36'),(17,'ناامیدی',6,'2019-11-02 02:57:36'),(18,'ضرر',6,'2019-11-02 02:57:36'),(19,'پایداری',3,'2019-11-02 02:57:36'),(20,'حمایت',3,'2019-11-02 02:57:36'),(21,'نظم',3,'2019-11-02 02:57:36'),(22,'عدم پایداری',4,'2019-11-02 02:57:36'),(23,'عدم حمایت',4,'2019-11-02 02:57:36'),(24,'بی‌نظمی',4,'2019-11-02 02:57:36'),(25,'افتخار',1,'2019-11-02 02:57:36'),(26,'اهمیت',1,'2019-11-02 02:57:36'),(27,'ارزش',1,'2019-11-02 02:57:36'),(28,'حقارت و شرم',2,'2019-11-02 02:57:36'),(29,'اهمیت نداشتن',2,'2019-11-02 02:57:36'),(30,'بی‌ارزشی',2,'2019-11-02 02:57:36'),(31,'انرژی',8,'2019-11-07 01:57:49'),(32,'لذت بدنی',8,'2019-11-07 01:57:49'),(33,'آرامش بدنی',8,'2019-11-07 01:57:49'),(34,'کسالت',10,'2019-11-07 01:57:49'),(35,'رنج بدنی',10,'2019-11-07 01:57:49'),(36,'درد بدنی',10,'2019-11-07 01:57:49'),(37,'آزادی',7,'2019-11-07 01:59:57'),(38,'قدرت',7,'2019-11-07 01:59:57'),(39,'حق انتخاب',7,'2019-11-07 01:59:57'),(40,'اجبـار',9,'2019-11-07 01:59:57'),(41,'ضعف',9,'2019-11-07 01:59:57'),(42,'نداشتن انتخاب',9,'2019-11-07 01:59:57'),(43,'بـرد',5,'2019-11-07 02:02:25'),(44,'سـود',5,'2019-11-07 02:02:25'),(45,'اعتبار',5,'2019-11-07 02:02:25'),(46,'باخت',6,'2019-11-07 02:02:25'),(47,'زیان',6,'2019-11-07 02:02:25'),(48,'بی‌اعتباری',6,'2019-11-07 02:02:25'),(49,'اعتماد',3,'2019-11-07 02:04:17'),(50,'شهامت',3,'2019-11-07 02:04:17'),(51,'حمایت',3,'2019-11-07 02:04:17'),(52,'بی‌اعتمادی',4,'2019-11-07 02:04:17'),(53,'تـرس',4,'2019-11-07 02:04:17'),(54,'عدم‌حمایت',4,'2019-11-07 02:04:17'),(61,'احتـرام',1,'2019-11-07 02:06:34'),(62,'افتخـار',1,'2019-11-07 02:06:34'),(63,'ارزشمندی',1,'2019-11-07 02:06:34'),(64,'بی‌احترامی',2,'2019-11-07 02:06:34'),(65,'تحقیر',2,'2019-11-07 02:06:34'),(66,'بی‌ارزشی',2,'2019-11-07 02:06:34');

#
# Structure for table "sensor_words"
#

DROP TABLE IF EXISTS `sensor_words`;
CREATE TABLE `sensor_words` (
  `id` int(4) NOT NULL,
  `sensor_label_id` int(2) DEFAULT NULL,
  `words` varchar(4000) COLLATE utf8_persian_ci NOT NULL,
  `priority` int(4) NOT NULL,
  `sensory_sensors_id` int(2) NOT NULL,
  `topic_type` int(1) NOT NULL DEFAULT 1 COMMENT 'یک = فعالیت، دو = رابطه',
  `status` int(1) NOT NULL DEFAULT 1,
  `description` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `sensory_sensors_id` (`sensory_sensors_id`),
  KEY `sensore_word_label_fk` (`sensor_label_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='واگویه های حسی';

#
# Data for table "sensor_words"
#

INSERT INTO `sensor_words` VALUES (187,1,'با انرژی شدن، سر کیف آمدن، با نشاط شدن، سر حال آمدن',1,8,1,1,NULL,'2019-11-02 05:09:36'),(188,2,'لذت بدنی، آسودگی بدنی، رضایت جسمی',2,8,1,1,NULL,'2019-11-02 05:10:18'),(189,3,'طعم خوب، بوی خوب، صدای خوب',3,8,1,1,NULL,'2019-11-02 05:10:53'),(190,4,'بی‌انرژی شدن، کسل شدن، بی‌نشاط شدن، وا رفتن',1,10,1,1,NULL,'2019-11-02 05:12:44'),(191,5,'درد بدنی، خستگی بدنی، عدم رضایت جسمی',2,10,1,1,NULL,'2019-11-02 05:13:25'),(192,6,'طعم بد، بوی بد، صدای بد',3,10,1,1,NULL,'2019-11-02 05:13:58'),(193,8,'قدرت دارم، اختیار دارم، حق انتخاب دارم، آزادی عمل دارم، فضای شخصی دارم، بر اوضاع کنترل دارم، در امور مشارکت دارم، ابراز وجود کردن',1,7,1,1,NULL,'2019-11-02 05:17:28'),(194,9,'توانا کردن دیگران، آزادی بخشیدن، مشارکت دادن، اختیار بخشیدن',2,7,1,1,NULL,'2019-11-02 05:17:28'),(195,7,'رویای خودم را دنبال می کنم',3,7,1,1,NULL,'2019-11-02 05:17:28'),(196,11,'ناتوانی، اختیار نداشتن، مجبور بودن، آزادی عمل نداشتن، فضای شخصی نداشتن، کنترل شدن، به بازی گرفته نشدن، آدم حساب نشدن',1,9,1,1,NULL,'2019-11-02 05:21:51'),(197,10,'ضعیف کردن، محدود کردن، گرفتن حق انتخاب',2,9,1,1,NULL,'2019-11-02 05:22:15'),(198,12,'از رویای خود دور شدن',3,9,1,1,NULL,'2019-11-02 05:23:02'),(199,13,'ثروتمند شدن، در رفاه بودن، فقیر نبودن، امکانات مادی داشتن، سود مالی کردن',1,5,1,1,NULL,'2019-11-02 05:23:48'),(200,14,'از نظر معنوی غنی تر شدن، بهرمند شدن، رو به کمال بودن، پیشرفت کردن، رشد کردن',2,5,1,1,NULL,'2019-11-02 05:24:18'),(201,15,'خوش شانسی، برنده بودن، پاداش گرفتن، جایزگرفتن،  هدیه گرفتن، آجر اخروی داشتن',3,5,1,1,NULL,'2019-11-02 05:24:55'),(202,16,'فقیر شدن، در رفاه نبودن، کمبود امکانات مادی، زیان مالی دیدن، بده کار شدن',1,6,1,1,NULL,'2019-11-02 05:25:30'),(203,17,'از نظر معنوی فقیر شدن، بی بهره بودن،سقوط کردن، پس رفت کردن، رشد نکردن',2,6,1,1,NULL,'2019-11-02 05:25:56'),(204,18,'بد شانسی، بازنده بودن، مجازات شدن، پاداش نگرفتن، هدیه نگرفتن، مجازات معنوی داشتن',3,6,1,1,NULL,'2019-11-02 05:26:22'),(205,19,'امنیت داشتن، شرایط پایدار، ضمانت داشتن، در خطر نبودن، اطمینان خاطر داشتن، بیمه بودن،مطمئن بودن،اعتماد داشتن',1,3,1,1,NULL,'2019-11-02 05:27:03'),(206,20,'در جای خود بودن، وفادار بودن، تعهد داشتن',2,3,1,1,NULL,'2019-11-02 05:27:29'),(207,21,'حمایت شدن، حمایت کردن، پشتوانه داشتن، سرپناه داشتن، دلگرمی داشتن، ایمنی، پشت گرمی داشتن، تنهانبودن',3,3,1,1,NULL,'2019-11-02 05:27:58'),(208,22,'امنیت نداشتن، شرایط ناپایدار، تضمین نداشتن، در خطر بودن، اطمینان خاطر نداشتن، بیمه نبودن،مطمئن نبودن،اعتماد نداشتن',1,4,1,1,NULL,'2019-11-02 05:28:55'),(209,23,'درجای خود نبودن، وفادار نبودن، تعهد نداشتن',2,4,1,1,NULL,'2019-11-02 05:29:40'),(210,24,'حمایت نشدن، حمایت نکردن، پشتوانه نداشتن، بی پناه بودن، دلگرمی نداشتن، ناامنی، بی کس بودن، تنها بودن',3,4,1,1,NULL,'2019-11-02 05:30:15'),(211,25,'تایید شدن، تحسین شدن، دیده شدن، مفتخر شدن، تشویق شدن، احترام دیدن، اهمیت داشتن، غرور داشتن، عزت دیدن، سربلند شدن،درک شدن',1,1,1,1,NULL,'2019-11-02 05:31:01'),(212,26,'معنوی بودن،خدمت به بشریت، رضای خدا',2,1,1,1,NULL,'2019-11-02 05:31:28'),(213,27,'با ارزش بودن، زیبا بودن،اخلاقی بودن، درجای درست بودن، انسان بودن',3,1,1,1,NULL,'2019-11-02 05:32:00'),(214,28,'رد شدن، مورد انتقاد بودن، دیده نشدن، تحقیر شدن، غلط بودن، سرزنش شدن، بی اهمیت بودن، غرور نداشتن، مسخره شده، کوچک شدن، سرافکندگی',1,2,1,1,NULL,'2019-11-02 05:33:07'),(215,29,'غیرمعنوی بودن،خودخواه بودن، نارضایتی خدا',2,2,1,1,NULL,'2019-11-02 05:33:43'),(216,30,'بی ارزش بودن، زیبا نبودن،اخلاقی نبودن، درجای درست نبودن، غیر انسانی بودن',3,2,1,1,'','2019-11-02 05:34:30'),(223,31,'با انرژی شدن، سر کیف آمدن، با نشاط شدن، سر حال آمدن',1,8,2,1,NULL,'2019-11-07 02:45:42'),(224,32,'لذت بدنی، جذابت جسمی، آسودگی بدنی، رضایت جسمی',2,8,2,1,NULL,'2019-11-07 02:45:42'),(225,33,'طعم خوب، بوی خوب، صدای خوب',3,8,2,1,NULL,'2019-11-07 02:45:42'),(226,34,'بی انرژی شدن، کسل شدن، بی نشاط شدن، وا رفتن',1,10,2,1,NULL,'2019-11-07 02:45:42'),(227,35,'درد بدنی، بیزاری جسمی، خستگی بدنی، عدم رضایت جسمی',2,10,2,1,NULL,'2019-11-07 02:45:42'),(228,36,'طعم بد، بوی بد، صدای بد',3,10,2,1,NULL,'2019-11-07 02:45:42'),(229,37,'قدرت دارم، اختیار دارم، حق انتخاب دارم، آزادی عمل دارم، فضای شخصی دارم، بر اوضاع کنترل دارم، در امور مشارکت دارم، ابراز وجود کردن',1,7,2,1,NULL,'2019-11-07 03:06:36'),(230,38,'آزادی می دهم، اختیار می دهم، فضا می دهم، کنترل دادن، محدود نمی کنم، مشارکت می دهم، حق اظهار نظر می دهم',2,7,2,1,NULL,'2019-11-07 03:06:36'),(231,39,'با کسی هستم که انتخاب من است',3,7,2,1,NULL,'2019-11-07 03:06:36'),(232,40,'ناتوانی، اختیار نداشتن، مجبور بودن، آزادی عمل نداشتن، فضای شخصی نداشتن، کنترل شدن، به بازی گرفته نشدن، آدم حساب نشدن',1,9,2,1,NULL,'2019-11-07 03:12:13'),(233,41,'آزادی نمی دهم، اجبار می کنم، فضا نمی دهم، زیادی کنترل می کنم، زیادی محدود می کنم، اجازه مشارکت نمی دهم ، حق اظهار نظر نمی دهم',2,9,2,1,NULL,'2019-11-07 03:12:13'),(234,42,'با کسی از سر ناچاری بودن',3,9,2,1,NULL,'2019-11-07 03:12:13'),(235,43,'ثروتمند بودن، در رفاه بودن، فقیر نبودن، امکانات مادی داشتن، سود مالی کردن',1,5,2,1,NULL,'2019-11-07 03:30:07'),(236,44,'از نظر معنوی غنی تر شدن، بهرمند شدن، رو به کمال بودن، پیشرفت کردن، رشد کردن، ثواب کردن',2,5,2,1,NULL,'2019-11-07 03:30:07'),(237,45,'خوش شانسی، برنده بودن، پاداش گرفتن، جایزگرفتن،  هدیه گرفتن',3,5,2,1,NULL,'2019-11-07 03:30:07'),(238,46,'فقیر بودن، در رفاه نبودن، کمبود امکانات مادی، زیان مالی دیدن، بده کار شدن',1,6,2,1,NULL,'2019-11-07 03:35:33'),(239,47,'از نظر معنوی فقیر شدن، بی بهره بودن،سقوط کردن، پس رفت کردن، رشد نکردن',2,6,2,1,NULL,'2019-11-07 03:35:33'),(240,48,'بد شانسی، بازنده بودن، مجازات شدن، پاداش نگرفتن، هدیه نگرفتن',3,6,2,1,NULL,'2019-11-07 03:35:33'),(241,49,'اعتماد داشتن به او، وفاداری او، اطمینان داشتن به او، صداقت او',1,3,2,1,NULL,'2019-11-07 03:39:31'),(242,50,'مورد اعتماد قرار گرفتن، وفا کردنم، اطمینان او، صادق بودنم',2,3,2,1,NULL,'2019-11-07 03:39:31'),(243,51,'حمایت شدن، حمایت کردن، پشتوانه داشتن، سرپناه داشتن، دلگرمی داشتن، ایمنی، پشت گرمی داشتن، تنهانبودن',3,3,2,1,NULL,'2019-11-07 03:39:31'),(244,52,'بی اعتمادی، خیانت دیدن، اطمینان نداشتن، عدم صداقت، شک داشتن',1,4,2,1,NULL,'2019-11-07 03:43:42'),(245,53,'مورد بی اعتمادی قرار گرفتن، بی وفایی کردنم، مورد سوظن بودن، صادق نبودنم',2,4,2,1,NULL,'2019-11-07 03:43:42'),(246,54,'حمایت نشدن، حمایت نکردن، پشتوانه نداشتن، بی پناه بودن، دلگرمی نداشتن، ناامنی، بی کس بودن، تنها بودن',3,4,2,1,NULL,'2019-11-07 03:43:42'),(247,61,'تایید شدن، تحسین شدن، دیده شدن، مفتخر شدن، تشویق شدن، احترام دیدن، اهمیت داشتن، غرور داشتن، عزت دیدن، سربلند شدن',1,1,2,1,NULL,'2019-11-07 03:49:42'),(248,62,'تایید کردن او، افتخار کردن به او، تحسین کردن او، احترام گذاشتن به او',2,1,2,1,NULL,'2019-11-07 03:49:42'),(249,63,'درک شدن، فهمیده شدن، همدل بودن، هم رای بودن',3,1,2,1,NULL,'2019-11-07 03:49:42'),(250,64,'رد شدن، مورد انتقاد بودن، دیده نشدن، تحقیر شدن، غلط بودن، سرزنش شدن، بی اهمیت بودن، غرور نداشتن، مسخره شده، کوچک شدن، سرافکندگی',1,2,2,1,NULL,'2019-11-07 03:55:17'),(251,65,'ایراد گرفتن از او، خجالت کشیدن از او، سرزنش کردن او، احترام نگذاشتن به او، خجل کردن، کوچک کردن',2,2,2,1,NULL,'2019-11-07 03:55:17'),(252,66,'درک نشدن، عدم تفاهم، عدم همدلی، اختلاف داشتن',3,2,2,1,NULL,'2019-11-07 03:55:17');

#
# Structure for table "sensory_sensors"
#

DROP TABLE IF EXISTS `sensory_sensors`;
CREATE TABLE `sensory_sensors` (
  `id` int(2) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `priority_graph` int(2) NOT NULL,
  `priority_word` int(2) NOT NULL,
  `sensor_type` int(1) NOT NULL COMMENT 'یک = مثبت، دو = منفی',
  `status` int(1) NOT NULL DEFAULT 1,
  `description` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='سنسورهای حسی';

#
# Data for table "sensory_sensors"
#

INSERT INTO `sensory_sensors` VALUES (1,'تایید',1,9,1,1,NULL,'2019-09-26 17:31:10'),(2,'عدم تایید',6,10,2,1,NULL,'2019-09-26 17:31:10'),(3,'امنیت',3,7,1,1,NULL,'2019-09-26 17:32:08'),(4,'ناامنی',8,8,2,1,NULL,'2019-09-26 17:32:08'),(5,'به دست آوردن',4,5,1,1,NULL,'2019-09-26 17:35:28'),(6,'از دست دادن',9,6,2,1,NULL,'2019-09-26 17:35:28'),(7,'اختیار',2,3,1,1,NULL,'2019-09-26 17:37:30'),(8,'لذت',5,1,1,1,NULL,'2019-09-26 17:37:30'),(9,'اجبار',7,4,2,1,NULL,'2019-09-26 17:55:14'),(10,'درد',10,2,2,1,NULL,'2019-09-26 17:55:14');

#
# Structure for table "topic_scores"
#

DROP TABLE IF EXISTS `topic_scores`;
CREATE TABLE `topic_scores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_topics_id` int(11) DEFAULT NULL,
  `approach` int(11) DEFAULT NULL,
  `sensor_words_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "topic_scores"
#

INSERT INTO `topic_scores` VALUES (1,1,2,3,4,'2021-07-16 23:25:18'),(2,1,2,444,4,'2021-07-16 23:43:16');

#
# Structure for table "topic_sensory_sensors_score"
#

DROP TABLE IF EXISTS `topic_sensory_sensors_score`;
CREATE TABLE `topic_sensory_sensors_score` (
  `id` int(10) NOT NULL,
  `user_topics_id` int(5) NOT NULL,
  `approach` int(1) NOT NULL COMMENT 'یک = موافق، دو = عدم موافق',
  `sensor_words_id` int(4) NOT NULL,
  `score` int(2) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_topics_id` (`user_topics_id`),
  KEY `sensor_words_id` (`sensor_words_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='نمره سنسورهای حسی موضوعات کاربران';

#
# Data for table "topic_sensory_sensors_score"
#


#
# Structure for table "topic_type_class"
#

DROP TABLE IF EXISTS `topic_type_class`;
CREATE TABLE `topic_type_class` (
  `id` int(2) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `class_type` int(1) DEFAULT NULL COMMENT 'یک = فعالیت، دو = رابطه',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "topic_type_class"
#

INSERT INTO `topic_type_class` VALUES (0,'بدون مقدار',NULL,'2019-11-30 09:36:53',''),(1,'فعالیت مرتبط با رشد شخصی',1,'2019-11-01 18:05:09',''),(2,'فعالیت مرتبط با خانواده',1,'2019-11-01 18:05:09',''),(3,'فعالیت مرتبط با عشق و رابطه جنسی',1,'2019-11-01 18:09:14',''),(4,'فعالیت مرتبط با تحصیل، تخصص و یادگیری',1,'2019-11-01 18:09:14',''),(5,'فعالیت مرتبط با کار و درآمد',1,'2019-11-01 18:09:56',''),(6,'فعالیت مرتبط با وضع ظاهر و سلامتی',1,'2019-11-01 18:09:56',''),(7,'فعالیت مرتبط با سرگرمی، تفریح، اوقات فراغت',1,'2019-11-01 18:10:47',''),(8,'رابطه خانوادگی',2,'2019-11-01 18:10:47',''),(9,'رابطه زناشویی',2,'2019-11-01 18:12:26',''),(10,'رابطه دوستانه',2,'2019-11-01 18:12:26',''),(11,'رابطه کاری',2,'2019-11-01 18:12:55',''),(12,'رابطه مرتبط با محیط های آموزشی، ورزشی، فرهنگی، هنر',2,'2019-11-01 18:12:55',''),(13,'سایر',2,'2019-11-06 13:02:54',''),(15,'سایر',1,'2019-11-07 19:02:43','');

#
# Structure for table "user_topics"
#

DROP TABLE IF EXISTS `user_topics`;
CREATE TABLE `user_topics` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `topic_type_class_id` int(2) DEFAULT 0,
  `save_step` int(2) NOT NULL DEFAULT 0,
  `users_id` int(5) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='موضوعات کاربران';

#
# Data for table "user_topics"
#

INSERT INTO `user_topics` VALUES (1,'test',1,2,1,'2021-06-11 17:38:07'),(2,'test',1,2,1,'2021-06-11 17:54:24'),(4,'test',3,23,13,'2021-06-11 19:24:49'),(5,'test',3,23,13,'2021-06-11 19:33:16'),(6,'testm',3,23,14,'2021-06-11 19:33:46'),(8,'test',3,23,13,'2021-06-11 21:13:23'),(9,'test3',6,8,19,'2021-06-20 19:40:25');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (5,'mohmadreza','mohmad.res@gmail.com',NULL,'$2y$10$CR5QH0/HfS6X3oz87KFXDOOpqBOtpoQQ/Ll17YeyDLsH6AD4ULq/a','09124432231',NULL,'2021-05-19 10:02:39','2021-05-19 10:02:39'),(6,'heydarlou','f.heydarlou@gmail.com',NULL,'$2y$10$Hm.Jz6g4j4JXXLs3QvW./.9z4jqSet/sH2RyEy4GIR0.L5ri.Sy.m','09125442232',NULL,'2021-05-19 10:03:58','2021-05-19 10:03:58'),(9,'sakhamanesh','m.sakha@gmail.com',NULL,'$2y$10$zmJlNnjVE5z5vVBdVDEt9eEorf6kO6xthHJXmOB4/miIA5G.FRmfK','09375320230',NULL,'2021-05-19 10:13:29','2021-05-19 10:13:29');
