/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : sr_hospitality_service

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 27/07/2020 21:23:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for about_us
-- ----------------------------
DROP TABLE IF EXISTS `about_us`;
CREATE TABLE `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about_us
-- ----------------------------
BEGIN;
INSERT INTO `about_us` VALUES (1, 'Our story', NULL, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/Wat Damnak House 7_20200629161643.jpg', '<p>7 years ago we simplified the process of booking a private villa in Asia and made personalisation the highlight of our service.</p>\r\n\r\n<p>Experts at handpicking only the best villas for a perfect, stress-free stay, guests trust us to go beyond just selecting sought after properties; we curate one-of-a-kind holidays for unique travel experiences and tailor our bespoke concierge services to individual requests and needs.</p>\r\n\r\n<p>We don&rsquo;t just believe in holiday perfection, we guarantee it.</p>\r\n', '2020-06-29 16:16:43', 1, '2020-06-27 16:22:18', 1, 1, 1);
INSERT INTO `about_us` VALUES (2, 'Our Villas', NULL, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/Wat Damnak House 9_20200629161701.jpg', '<p>7 years ago we simplified the process of booking a private villa in Asia and made personalisation the highlight of our service.</p>\r\n\r\n<p>Experts at handpicking only the best villas for a perfect, stress-free stay, guests trust us to go beyond just selecting sought after properties; we curate one-of-a-kind holidays for unique travel experiences and tailor our bespoke concierge services to individual requests and needs.</p>\r\n\r\n<p>We don&rsquo;t just believe in holiday perfection, we guarantee it</p>\r\n', '2020-06-29 16:17:01', 1, '2020-06-27 16:22:33', 1, 1, 1);
INSERT INTO `about_us` VALUES (3, 'Experts', '1', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/eye_20200629162743.png', '<p>Our forte is the Villa experience. We make holiday dreams come true.</p>\r\n', '2020-06-29 16:27:43', 1, '2020-06-27 16:49:44', 1, 1, NULL);
INSERT INTO `about_us` VALUES (4, 'Genuine', '1', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/magic_20200629162803.png', '<p>Our forte is the Villa experience. We make holiday dreams come true.</p>\r\n', '2020-06-29 16:28:03', 1, '2020-06-27 16:50:07', 1, 1, NULL);
INSERT INTO `about_us` VALUES (5, 'Ambitious', '1', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/heart_20200629162811.png', '<p>Our forte is the Villa experience. We make holiday dreams come true.</p>\r\n', '2020-06-29 16:28:11', 1, '2020-06-27 16:57:02', 1, 1, NULL);
INSERT INTO `about_us` VALUES (6, 'Competitive', '1', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/about-us/tick_20200629162827.png', '<p>Our forte is the Villa experience. We make holiday dreams come true.</p>\r\n', '2020-06-29 16:28:27', 1, '2020-06-27 16:57:28', 1, 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_facility
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_facility`;
CREATE TABLE `accommodation_facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=688 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_facility
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_facility` VALUES (512, 52, 14);
INSERT INTO `accommodation_facility` VALUES (513, 52, 16);
INSERT INTO `accommodation_facility` VALUES (514, 52, 17);
INSERT INTO `accommodation_facility` VALUES (515, 52, 18);
INSERT INTO `accommodation_facility` VALUES (516, 52, 22);
INSERT INTO `accommodation_facility` VALUES (517, 52, 23);
INSERT INTO `accommodation_facility` VALUES (518, 52, 24);
INSERT INTO `accommodation_facility` VALUES (519, 53, 14);
INSERT INTO `accommodation_facility` VALUES (520, 53, 16);
INSERT INTO `accommodation_facility` VALUES (521, 53, 17);
INSERT INTO `accommodation_facility` VALUES (522, 53, 18);
INSERT INTO `accommodation_facility` VALUES (523, 53, 22);
INSERT INTO `accommodation_facility` VALUES (524, 53, 23);
INSERT INTO `accommodation_facility` VALUES (525, 53, 24);
INSERT INTO `accommodation_facility` VALUES (526, 54, 14);
INSERT INTO `accommodation_facility` VALUES (527, 54, 15);
INSERT INTO `accommodation_facility` VALUES (528, 54, 16);
INSERT INTO `accommodation_facility` VALUES (529, 54, 17);
INSERT INTO `accommodation_facility` VALUES (530, 54, 18);
INSERT INTO `accommodation_facility` VALUES (531, 54, 22);
INSERT INTO `accommodation_facility` VALUES (532, 54, 23);
INSERT INTO `accommodation_facility` VALUES (533, 55, 14);
INSERT INTO `accommodation_facility` VALUES (534, 55, 15);
INSERT INTO `accommodation_facility` VALUES (535, 55, 16);
INSERT INTO `accommodation_facility` VALUES (536, 55, 17);
INSERT INTO `accommodation_facility` VALUES (537, 55, 18);
INSERT INTO `accommodation_facility` VALUES (538, 55, 22);
INSERT INTO `accommodation_facility` VALUES (539, 55, 23);
INSERT INTO `accommodation_facility` VALUES (540, 56, 14);
INSERT INTO `accommodation_facility` VALUES (541, 56, 15);
INSERT INTO `accommodation_facility` VALUES (542, 56, 16);
INSERT INTO `accommodation_facility` VALUES (543, 56, 17);
INSERT INTO `accommodation_facility` VALUES (544, 56, 18);
INSERT INTO `accommodation_facility` VALUES (545, 56, 22);
INSERT INTO `accommodation_facility` VALUES (546, 56, 23);
INSERT INTO `accommodation_facility` VALUES (594, 57, 14);
INSERT INTO `accommodation_facility` VALUES (595, 57, 15);
INSERT INTO `accommodation_facility` VALUES (596, 57, 16);
INSERT INTO `accommodation_facility` VALUES (597, 57, 17);
INSERT INTO `accommodation_facility` VALUES (598, 57, 18);
INSERT INTO `accommodation_facility` VALUES (599, 57, 23);
INSERT INTO `accommodation_facility` VALUES (629, 51, 14);
INSERT INTO `accommodation_facility` VALUES (630, 51, 15);
INSERT INTO `accommodation_facility` VALUES (631, 51, 16);
INSERT INTO `accommodation_facility` VALUES (632, 51, 17);
INSERT INTO `accommodation_facility` VALUES (633, 51, 18);
INSERT INTO `accommodation_facility` VALUES (634, 51, 22);
INSERT INTO `accommodation_facility` VALUES (635, 51, 23);
INSERT INTO `accommodation_facility` VALUES (666, 49, 15);
INSERT INTO `accommodation_facility` VALUES (667, 49, 18);
INSERT INTO `accommodation_facility` VALUES (668, 50, 15);
INSERT INTO `accommodation_facility` VALUES (669, 50, 16);
INSERT INTO `accommodation_facility` VALUES (670, 50, 18);
INSERT INTO `accommodation_facility` VALUES (671, 50, 19);
INSERT INTO `accommodation_facility` VALUES (672, 50, 21);
INSERT INTO `accommodation_facility` VALUES (673, 50, 22);
INSERT INTO `accommodation_facility` VALUES (686, 48, 15);
INSERT INTO `accommodation_facility` VALUES (687, 48, 18);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_gallery_image
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_gallery_image`;
CREATE TABLE `accommodation_gallery_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `accommodation_title_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_gallery_image
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_gallery_image` VALUES (34, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200630163458_Wat Po House 1.jpg', 4, 18);
INSERT INTO `accommodation_gallery_image` VALUES (35, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200630163458_Wat Po House 2.jpg', 4, 18);
INSERT INTO `accommodation_gallery_image` VALUES (36, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701140555_Wat Po House 11.jpg', 41, 19);
INSERT INTO `accommodation_gallery_image` VALUES (37, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701140555_Wat Po House 12.jpg', 41, 19);
INSERT INTO `accommodation_gallery_image` VALUES (38, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-gallery-title/', '_20200701151341_Wat Po House 11.jpg', 18, NULL);
INSERT INTO `accommodation_gallery_image` VALUES (39, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-gallery-title/', '_20200701151341_Wat Po House 12.jpg', 18, NULL);
INSERT INTO `accommodation_gallery_image` VALUES (40, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-gallery-title/', '_20200701151536_Wat Po House 11.jpg', 18, NULL);
INSERT INTO `accommodation_gallery_image` VALUES (41, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-gallery-title/', '_20200701151536_Wat Po House 12.jpg', 18, NULL);
INSERT INTO `accommodation_gallery_image` VALUES (42, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151630_Wat Po House 19.jpg', 4, 18);
INSERT INTO `accommodation_gallery_image` VALUES (43, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151802_Wat Po House 18.jpg', 4, 18);
INSERT INTO `accommodation_gallery_image` VALUES (44, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151927_Wat Po House 11.jpg', 4, 20);
INSERT INTO `accommodation_gallery_image` VALUES (45, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151927_Wat Po House 12.jpg', 4, 20);
INSERT INTO `accommodation_gallery_image` VALUES (46, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151927_Wat Po House 13.jpg', 4, 20);
INSERT INTO `accommodation_gallery_image` VALUES (47, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701151927_Wat Po House 20.jpg', 4, 20);
INSERT INTO `accommodation_gallery_image` VALUES (54, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak1.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (55, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak2.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (56, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak3.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (57, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak4.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (58, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak5.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (59, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701161724_watdamnak6.jpg', 49, 22);
INSERT INTO `accommodation_gallery_image` VALUES (60, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo1.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (61, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo2.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (62, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo3.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (63, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo4.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (64, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo5.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (65, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701162326_watpo6.jpg', 50, 23);
INSERT INTO `accommodation_gallery_image` VALUES (66, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent1.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (67, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent2.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (68, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent3.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (69, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent4.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (70, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent5.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (71, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701163241_parent6.jpg', 51, 24);
INSERT INTO `accommodation_gallery_image` VALUES (72, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.1.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (73, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.2.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (74, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.3.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (75, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.4.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (76, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.5.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (77, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164008_parent2.6.jpg', 52, 25);
INSERT INTO `accommodation_gallery_image` VALUES (78, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.1.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (79, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.2.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (80, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.3.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (81, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.4.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (82, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.5.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (83, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701164657_parent3.6.jpg', 53, 26);
INSERT INTO `accommodation_gallery_image` VALUES (84, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden1.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (85, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden2.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (86, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden3.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (87, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden4.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (88, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden5.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (89, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701165550_golden6.jpg', 54, 27);
INSERT INTO `accommodation_gallery_image` VALUES (90, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.1.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (91, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.2.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (92, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.3.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (93, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.4.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (94, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.5.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (95, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170431_golden2.6.jpg', 55, 28);
INSERT INTO `accommodation_gallery_image` VALUES (96, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.1.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (97, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.2.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (98, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.3.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (99, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.4.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (100, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.5.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (101, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701170900_golden3.6.jpg', 56, 29);
INSERT INTO `accommodation_gallery_image` VALUES (102, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.1.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (103, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.2.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (104, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.3.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (105, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.4.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (106, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.5.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (107, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200701171300_villa4.6.jpg', 57, 30);
INSERT INTO `accommodation_gallery_image` VALUES (108, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200716110523__20200630160605_wat_bo4.jpg', 65, 31);
INSERT INTO `accommodation_gallery_image` VALUES (109, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200716110523__20200630160605_wat_bo5.jpg', 65, 31);
INSERT INTO `accommodation_gallery_image` VALUES (110, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200716110709__20200630160605_wat_bo4.jpg', 65, 32);
INSERT INTO `accommodation_gallery_image` VALUES (111, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200723131842__20200630162704_wat_bo2.jpg', 48, 21);
INSERT INTO `accommodation_gallery_image` VALUES (112, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200723131842__20200630162704_wat_bo3.jpg', 48, 21);
INSERT INTO `accommodation_gallery_image` VALUES (113, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200723131842__20200630162704_wat_bo4.jpg', 48, 21);
INSERT INTO `accommodation_gallery_image` VALUES (114, '/dropbox/srhs_system/backend/web/uploads/accommodation-gallery-title/', '_20200723131842__20200630162736_wat_bo6.jpg', 48, 21);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_gallery_title
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_gallery_title`;
CREATE TABLE `accommodation_gallery_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_gallery_title
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_gallery_title` VALUES (18, 'Indoorssdf', 4, '2020-07-01 15:18:02', 1, '2020-06-30 16:34:58', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (19, 'indoor', 41, NULL, NULL, '2020-07-01 14:05:55', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (20, 'Out size', 4, NULL, NULL, '2020-07-01 15:19:27', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (21, 'WAT BO HOUSE', 48, '2020-07-23 13:18:42', 1, '2020-07-01 16:03:01', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (22, 'WAT DAMNAK HOUSE', 49, NULL, NULL, '2020-07-01 16:17:24', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (23, 'WAT PO HOUSE', 50, NULL, NULL, '2020-07-01 16:23:26', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (24, 'PARENTS LODGE VILLA 1', 51, NULL, NULL, '2020-07-01 16:32:41', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (25, 'PARENTS LODGE VILLA 2 ', 52, NULL, NULL, '2020-07-01 16:40:08', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (26, 'PARENTS LODGE VILLA 3', 53, NULL, NULL, '2020-07-01 16:46:57', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (27, 'AUTHENTIC GOLDEN VISHNU VILLA 1', 54, NULL, NULL, '2020-07-01 16:55:50', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (28, 'AUTHENTIC GOLDEN VISHNU VILLA 2', 55, NULL, NULL, '2020-07-01 17:04:31', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (29, 'AUTHENTIC GOLDEN VISHNU VILLA 3', 56, NULL, NULL, '2020-07-01 17:09:00', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (30, 'AUTHENTIC GOLDEN VISHNU VILLA 4 ', 57, NULL, NULL, '2020-07-01 17:13:00', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (31, 'Tesitng galery', 65, NULL, NULL, '2020-07-16 11:05:23', 1, 1);
INSERT INTO `accommodation_gallery_title` VALUES (32, 'tsitng 2', 65, NULL, NULL, '2020-07-16 11:07:09', 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_meal
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_meal`;
CREATE TABLE `accommodation_meal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `meal_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_meal
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_meal` VALUES (31, 52, 9);
INSERT INTO `accommodation_meal` VALUES (32, 53, 9);
INSERT INTO `accommodation_meal` VALUES (33, 51, 9);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_profile
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_profile`;
CREATE TABLE `accommodation_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `reservation_email` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `accommodation_type` int(11) DEFAULT NULL,
  `accommodation_size` text DEFAULT NULL,
  `star_rating` int(10) DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `term_condition` text DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `LatitudeLongitude` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of accommodation_profile
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_profile` VALUES (48, 'Wat Bo House', '', '', 'measmengtry191@gmail.com', 'WAT BO HOUSE, Krong Siem Reap, Cambodia', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:02:26', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/watbohouse_20200726110007.jpg', '2020-07-26 11:00:07', 1, '', '', 4, '', 1, 5, 12, '<p>Wat Bo House is a traditional Khmer villa with modern amenities and a private natural pool immersed in a tropical garden. Located behind the oldest pagoda in town, it is in a quiet and safe position in the popular Wat Bo district. At walking distance there are some of the best bars and restaurants and a lively neighbourhood that blends local life with tourist facilities. The Old Market and the nightlife hubs, Pub Street and Night Market, are only ten minutes by foot or three minute by tuk-tuk.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>The building preserves all the cosy charm of a traditional Cambodian wooden house while it tastefully combines both modern and comfortable amenities.<br />\r\nThere are five beautiful rooms each with en-suite bathroom, wardrobe, minibar and safe, and a comfortable communal living room with kitchenette, where you can prepare and enjoy your own meals or be served by our staff on request.</p>\r\n\r\n<p>The tropical garden surrounds a natural swimming pool that avoids the use of chemicals thanks to water lilies, lotus flowers, and other plants, which filter the water.<br />\r\nA nebulizer provides a refreshing sensation while sunbathing.<br />\r\nA small wooden structure next to the pool offers shed in the hot hours and shelter from humidity at night. On request we can serve meals or you can have a traditional Khmer massage on the spot.<br />\r\nBanana, coconut and mango trees as well as passion fruit plants and fragrant flowers round off the sensual experience of this tropical oasis in the heart of the town.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>Our guests can access the entire house.<br />\r\nYou can enjoy meals in our dining room and on the terrace upstairs, or in the garden if you prefer. Under the mango tree or by the pool, on the deck or under the wooden shelter, there is always a spot where you can chill out and enjoy your time in complete freedom and privacy.<br />\r\nWi-Fi is accessible anywhere in the house and in the garden.<br />\r\nA printer with scanner is available in the living room.</p>\r\n\r\n<p>* The laundry and the second kitchen in the backyard are accessible to our staff only.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>If you book in advance we can organize upon request:</p>\r\n\r\n<p>&ndash; Daily cleaning service<br />\r\n&ndash; Laundry service<br />\r\n&ndash; Breakfast (Khmer or Continental)<br />\r\n&ndash; Lunch box for your trips<br />\r\n&ndash; Dinner (Khmer, Thai and Italian)<br />\r\n&ndash; Cooking Classes (Khmer)<br />\r\n&ndash; Massage (Traditional Khmer and Aroma Therapy)<br />\r\n&ndash; Bike rental<br />\r\n&ndash; Tuk-tuk service<br />\r\n&ndash; Minivan service<br />\r\n&ndash; Jeep Explorer tours<br />\r\n&ndash; Tour Guides<br />\r\n&ndash; Organized tours</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.8904179023084!2d103.86244091459953!3d13.357089390603754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311017c4c5cdcd11%3A0x4a63c52400af05aa!2sWAT%20BO%20HOUSE!5e0!3m2!1sen!2skh!4v1594292858525!5m2!1sen!2skh\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '', '', '13.3570894,103.8646296');
INSERT INTO `accommodation_profile` VALUES (49, 'Wat Damnak House', '', '', NULL, 'Wat Damnak, Wat Bo Road, Krong Siem Reap, Cambodia', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:14:22', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/watdamnak6_20200701161654.jpg', '2020-07-14 13:41:15', 1, '', '', 4, '', 1, 5, 12, '<p>Wat Damnak House is a private tropical oasis at a walking distance from Old market and the nightlife hubs, Pub Street and Night Market. This traditional Khmer villa features modern amenities and private spa service nestled in a tropical garden with a natural pool. The house is in a quiet and safe position behind Wat Damnak pagoda, in a lively neighbourhood that blends local life with tourist facilities. A charming retreat a few steps away from the finest restaurants and popular spots in town.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>The building combines the cosy charm of the traditional Cambodian wooden house with the sensorial experience of a tropical water garden, to create a tropical oasis in the heart of the town.<br />\r\nWith its four beautiful rooms with en-suite bathroom, and two more bedrooms with shared bathroom, the house can host up to 12 people.<br />\r\nSpa facilities, a secluded terrace, a laptop friendly workplace, a comfortable reading space, a dining lounge, a kitchen and a barbecue area complete the house amenities.<br />\r\nThe tropical water garden surrounds the building and feeds a natural swimming pool that avoids the use of chemicals thanks to lily pads, papyrus and other aquatic plants that filter the water.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>Our guests can access the entire house.<br />\r\nWi-Fi is accessible anywhere in the house and in the garden.<br />\r\nA printer with scanner is available in the living room.<br />\r\nThe laundry in the backyard is accessible to our staff only.</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', '', '', '', '13.3516762,103.8578313');
INSERT INTO `accommodation_profile` VALUES (50, 'Wat Po House', '', '', NULL, 'WAT PO HOUSE, River Road, Krong Siem Reap, Cambodia', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:22:34', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/watpo1_20200701162234.jpg', '2020-07-14 13:41:44', 1, '', '', 2, '', 1, 5, 6, '<p>Wat Po House is a traditional Khmer villa with modern amenities and a lush water garden with natural swimming pool and spa facilities.<br />\r\nThe house enjoys a strategic central location along the Siem Reap River.<br />\r\nJust a few steps away from the Angkor National Museum and the Royal Residence, close to some of the historical and most renowned hotels in town, it takes only ten minutes by bicycle or tuk-tuk to Angkor Wat. The perfect place for private stay in Siem Reap .</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>The building preserves all the cosy charm of a traditional Cambodian wooden house while it tastefully combines both modern and comfortable amenities.<br />\r\nThere are five beautiful bedrooms: three with en-suite bathroom, and two with a shared bathroom.<br />\r\nUpstairs is a comfortable living room with sofa bed, TV corner, and a workspace. A small terrace with a hanging chair overlooking the water garden offers the perfect spot for reading a book.<br />\r\nDownstairs is a fully equipped kitchen with backyard barbecue, where you can prepare and enjoy your own meals or be served by our staff on request.<br />\r\nA lush water garden surrounds a natural swimming pool that avoids the use of chemicals thanks tropical aquatic plants, which filter the water.<br />\r\nAn extra large canopy bed provides shadow and privacy next to the pool and is a perfect place for a traditional Khmer massage.<br />\r\nA small wooden structure in the middle of the water garden offers shed for a refreshing drink in the hot hours and a peaceful spot for a tea at the sunset.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>Our guests can access the entire house.<br />\r\nThere is always a spot where you can chill out and enjoy your time in complete freedom and privacy.<br />\r\nWi-Fi is accessible anywhere in the house and in the garden.<br />\r\nA printer with scanner is available in the living room.</p>\r\n\r\n<p>* The laundry and the second kitchen in the backyard are accessible to our staff only.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>If you book in advance we can organize upon request:</p>\r\n\r\n<p>&ndash; Daily cleaning service<br />\r\n&ndash; Laundry service<br />\r\n&ndash; Breakfast (Khmer or Continental)<br />\r\n&ndash; Lunch box for your trips<br />\r\n&ndash; Dinner (Khmer, Thai and Italian)<br />\r\n&ndash; Cooking Classes (Khmer)<br />\r\n&ndash; Massage (Traditional Khmer and Aroma Therapy)<br />\r\n&ndash; Bike rental<br />\r\n&ndash; Tuk-tuk service<br />\r\n&ndash; Minivan service<br />\r\n&ndash; Jeep Explorer tours<br />\r\n&ndash; Tour Guides<br />\r\n&ndash; Organized tours</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', '', '', '', '13.3670515,103.8635676');
INSERT INTO `accommodation_profile` VALUES (51, 'Parents Lodge Villa 1', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:29:54', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/parent1_20200701162954.jpg', '2020-07-12 22:46:57', 1, '', '', 2, '', 1, 3, 4, '<p>Featuring pool views, The Parent Lodges in Siem Reap features accommodation, free bikes, an outdoor swimming pool, a bar, a garden and a terrace. Complimentary WiFi is available throughout the property.<br />\r\nThe units come with parquet floors and feature a fully equipped kitchen with a microwave, a dining area, a flat-screen TV with satellite channels, and a private bathroom with shower and a hairdryer. For added convenience, the property can provide towels and bed linen for an extra charge.<br />\r\nThe bed and breakfast offers a continental or &agrave; la carte breakfast.<br />\r\nA car rental service is available at The Parent Lodges, while cycling can be enjoyed nearby.<br />\r\nPopular points of interest near the accommodation include King&rsquo;s Road Angkor, Pub Street and Old Market. The nearest airport is Siem Reap &ndash; Angkor International, 14 km from The Parent Lodges, and the property offers a paid airport shuttle service.</p>\r\n\r\n<p>Location:</p>\r\n', '', '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (52, 'Parents Lodge Villa 2', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:37:35', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/parent2.1_20200701163943.jpg', '2020-07-02 09:31:06', 1, '', '', 2, '', 1, 2, NULL, '<p>Featuring pool views, The Parent Lodges in Siem Reap features accommodation, free bikes, an outdoor swimming pool, a bar, a garden and a terrace. Complimentary WiFi is available throughout the property.<br />\r\nThe units come with parquet floors and feature a fully equipped kitchen with a microwave, a dining area, a flat-screen TV with satellite channels, and a private bathroom with shower and a hairdryer. For added convenience, the property can provide towels and bed linen for an extra charge.<br />\r\nThe bed and breakfast offers a continental or &agrave; la carte breakfast.<br />\r\nA car rental service is available at The Parent Lodges, while cycling can be enjoyed nearby.<br />\r\nPopular points of interest near the accommodation include King&rsquo;s Road Angkor, Pub Street and Old Market. The nearest airport is Siem Reap &ndash; Angkor International, 14 km from The Parent Lodges, and the property offers a paid airport shuttle service.</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', NULL, '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (53, 'Parent Lodge Villa 3', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:46:26', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/parent3.5_20200701164626.jpg', '2020-07-02 09:31:34', 1, '', '', 2, '', 1, 2, NULL, '<p>Featuring pool views, The Parent Lodges in Siem Reap features accommodation, free bikes, an outdoor swimming pool, a bar, a garden and a terrace. Complimentary WiFi is available throughout the property.<br />\r\nThe units come with parquet floors and feature a fully equipped kitchen with a microwave, a dining area, a flat-screen TV with satellite channels, and a private bathroom with shower and a hairdryer. For added convenience, the property can provide towels and bed linen for an extra charge.<br />\r\nThe bed and breakfast offers a continental or &agrave; la carte breakfast.<br />\r\nA car rental service is available at The Parent Lodges, while cycling can be enjoyed nearby.<br />\r\nPopular points of interest near the accommodation include King&rsquo;s Road Angkor, Pub Street and Old Market. The nearest airport is Siem Reap &ndash; Angkor International, 14 km from The Parent Lodges, and the property offers a paid airport shuttle service.</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', NULL, '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (54, 'Authentic Golden Vishnu  Villa 1', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 16:53:07', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/golden1_20200701165510.jpg', '2020-07-02 09:33:15', 1, '', '', 2, '', 1, 2, NULL, '<p>Our villa is situated in a quiet setting and designed in the unique Khmer style to accommodate both local and international families.<br />\r\nYour selection is a villa with two spacious bedrooms. The villa has a living room, 03 bathrooms , a fully equipped kitchen, air conditioning, cable TV and free fast-speed WiFi. The villa is service daily. Only 10 min from the city of Siem Reap, a popular resort town and a gateway to the Angkor region. Siem Reap today&mdash;being a popular tourist destination.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>&ldquo;Golden Vishnu Villa&rdquo; is a unique dream getaway. Far from the maddening crowd in a lush tropical setting you will find it the perfect place to relax after a day visiting the temples. Comfort, elegance and space await you in a Zen-like, cozy and romantic atmosphere. You will have full privacy with a professional team at your service, with a nice outdoor swimming pool. On the ground floor, there is a sitting area with TV, a fully equipped kitchen to complement with comfortable sofa to relax and 04 seats dining table. Climb up to the first floor there are two bedrooms with separate bathrooms and toilets. Our bathrooms have a nice shower with hot water and strong water pressure.<br />\r\nwe have high standard wooden furniture, Multiple cold AC units with inverter for incredible comfort, Iron and Ironing Board, Wardrobe with hangers, Quality cotton sheets, Bath towels &ndash; which are changed every two days, Shampoo, Body wash, Hand Wash, Hair Dryer, Dishes, Utensils, Pots, Pan, Electric Water Kettle, Toaster, Coffee Maker, Refrigerator with ice tray.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>You will have an entire house for yourself. Full access to the whole building with an outdoor swimming pool ready for you to relax after visiting temples, easy for you to take a rest with sun beds. Smoking is allowed outside the house building.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>Tour Arrangement Tips:<br />\r\n1. Angkor Wat Small Circuit Tour<br />\r\n2. Grand Circuit Tour<br />\r\n3. Kbal Spean Waterfall and Banteay Srei temple<br />\r\n4. Kulen Mountain and Bateay Srei Temple<br />\r\n5. Beng Mealea Temple and Kompung Pluk Village<br />\r\n6. Floating Village<br />\r\n7. City Tour<br />\r\nFeel free to contact us for tour arrangement in advance via Airbnb massage</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', NULL, '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (55, 'Authentic Golden Vishnu  Villa 2', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 17:03:47', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/golden2.1_20200701170347.jpg', '2020-07-02 09:34:18', 1, '', '', 2, '', 1, 2, NULL, '<p>Our villa is situated in a quiet setting and designed in the unique Khmer style to accommodate both local and international families.<br />\r\nYour selection is a villa with two bedrooms. The villa has a living room, 03 bathrooms , a fully equipped kitchen, air conditioning, cable TV and free fast-speed WiFi. The villa is service daily. Only 10 min from the city of Siem Reap, a popular resort town and a gateway to the Angkor region. Siem Reap today&mdash;being a popular tourist destination.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>&ldquo;Golden Vishnu Villa&rdquo; is a unique dream getaway. Far from the maddening crowd in a lush tropical setting you will find it the perfect place to relax after a day visiting the temples. Comfort, elegance and space await you in a Zen-like, cozy and romantic atmosphere. You will have full privacy with a professional team at your service, with a nice outdoor swimming pool. On the ground floor, there is a sitting area with TV, a fully equipped kitchen to complement with comfortable sofa to relax and 04 seats dining table. Climb up to the first floor there are two bedrooms with separate bathrooms and toilets. Our bathrooms have a nice shower with hot water and strong water pressure.<br />\r\nwe have high standard wooden furniture, Multiple cold AC units with inverter for incredible comfort, Iron and Ironing Board, Wardrobe with hangers, Quality cotton sheets, Bath towels &ndash; which are changed every two days, Shampoo, Body wash, Hand Wash, Hair Dryer, Dishes, Utensils, Pots, Pan, Electric Water Kettle, Toaster, Coffee Maker, Refrigerator with ice tray.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>You will have an entire house for yourself. Full access to the whole building with an outdoor swimming pool ready for you to relax after visiting temples, easy for you to take a rest with sun beds. Smoking is allowed outside the house building.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>Tour Arrangement Tips:<br />\r\n1. Angkor Wat Small Circuit Tour<br />\r\n2. Grand Circuit Tour<br />\r\n3. Kbal Spean Waterfall and Banteay Srei temple<br />\r\n4. Kulen Mountain and Bateay Srei Temple<br />\r\n5. Beng Mealea Temple and Kompung Pluk Village<br />\r\n6. Floating Village<br />\r\n7. City Tour</p>\r\n\r\n<p>Feel free to contact us for tour arrangement in advance via Airbnb massage</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', NULL, '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (56, 'Authentic Golden Vishnu Villa 3', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 17:08:29', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/golden3.1_20200701170829.jpg', '2020-07-02 09:34:53', 1, '', '', 2, '', 1, 2, NULL, '<p>Our villa is situated in a quiet setting and designed in the unique Khmer style to accommodate both local and international families.<br />\r\nYour selection is a villa with two bedrooms. The villa has a living room, 03 bathrooms , a fully equipped kitchen, air conditioning, cable TV and free fast-speed WiFi. The villa is service daily. Only 10 min from the city of Siem Reap, a popular resort town and a gateway to the Angkor region. Siem Reap today&mdash;being a popular tourist destination.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>&ldquo;Golden Vishnu Villa&rdquo; is a unique dream getaway. Far from the maddening crowd in a lush tropical setting you will find it the perfect place to relax after a day visiting the temples. Comfort, elegance and space await you in a Zen-like, cozy and romantic atmosphere. You will have full privacy with a professional team at your service, with a nice outdoor swimming pool. On the ground floor, there is a sitting area with TV, a fully equipped kitchen to complement with comfortable sofa to relax and 04 seats dining table. Climb up to the first floor there are two bedrooms with separate bathrooms and toilets. Our bathrooms have a nice shower with hot water and strong water pressure.<br />\r\nwe have high standard wooden furniture, Multiple cold AC units with inverter for incredible comfort, Iron and Ironing Board, Wardrobe with hangers, Quality cotton sheets, Bath towels &ndash; which are changed every two days, Shampoo, Body wash, Hand Wash, Hair Dryer, Dishes, Utensils, Pots, Pan, Electric Water Kettle, Toaster, Coffee Maker, Refrigerator with ice tray.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>You will have an entire house for yourself. Full access to the whole building with an outdoor swimming pool ready for you to relax after visiting temples, easy for you to take a rest with sun beds. Smoking is allowed outside the house building.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>Tour Arrangement Tips:<br />\r\n1. Angkor Wat Small Circuit Tour<br />\r\n2. Grand Circuit Tour<br />\r\n3. Kbal Spean Waterfall and Banteay Srei temple<br />\r\n4. Kulen Mountain and Bateay Srei Temple<br />\r\n5. Beng Mealea Temple and Kompung Pluk Village<br />\r\n6. Floating Village<br />\r\n7. City Tour</p>\r\n\r\n<p>Feel free to contact us for tour arrangement in advance via Airbnb massage</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', NULL, '', '', '13.3670515,103.8613789,17');
INSERT INTO `accommodation_profile` VALUES (57, 'Authentic Golden Vishnu Villa 4', '', '', NULL, 'Cambodia, Siem Reap', 56, 48.00, 3, 1, 1, '08:00:00', '05:00:00', '2020-07-01 17:12:26', '/dropbox/srhs_system/backend/web/uploads/accommodation-profile/villa4.1_20200701171226.jpg', '2020-07-10 12:26:32', 1, '', '', 2, '', 1, 3, NULL, '<p>Our villa is situated in a quiet setting and designed in the unique Khmer style to accommodate both local and international families.<br />\r\nYour selection is a villa with two bedrooms. The villa has a living room, 03 bathrooms , a fully equipped kitchen, air conditioning, cable TV and free fast-speed WiFi. The villa is service daily. Only 10 min from the city of Siem Reap, a popular resort town and a gateway to the Angkor region. Siem Reap today&mdash;being a popular tourist destination.</p>\r\n\r\n<h2><strong>The space</strong></h2>\r\n\r\n<p>&ldquo;Golden Vishnu Villa&rdquo; is a unique dream getaway. Far from the maddening crowd in a lush tropical setting you will find it the perfect place to relax after a day visiting the temples. Comfort, elegance and space await you in a Zen-like, cozy and romantic atmosphere. You will have full privacy with a professional team at your service, with a nice outdoor swimming pool. On the ground floor, there is a sitting area with TV, a fully equipped kitchen to complement with comfortable sofa to relax and 04 seats dining table. Climb up to the first floor there are two bedrooms with separate bathrooms and toilets. Our bathrooms have a nice shower with hot water and strong water pressure.<br />\r\nwe have high standard wooden furniture, Multiple cold AC units with inverter for incredible comfort, Iron and Ironing Board, Wardrobe with hangers, Quality cotton sheets, Bath towels &ndash; which are changed every two days, Shampoo, Body wash, Hand Wash, Hair Dryer, Dishes, Utensils, Pots, Pan, Electric Water Kettle, Toaster, Coffee Maker, Refrigerator with ice tray.</p>\r\n\r\n<h2><strong>Guest access</strong></h2>\r\n\r\n<p>You will have an entire house for yourself. Full access to the whole building with an outdoor swimming pool ready for you to relax after visiting temples, easy for you to take a rest with sun beds. Smoking is allowed outside the house building.</p>\r\n\r\n<h2><strong>Other things to note</strong></h2>\r\n\r\n<p>Tour Arrangement Tips:<br />\r\n1. Angkor Wat Small Circuit Tour<br />\r\n2. Grand Circuit Tour<br />\r\n3. Kbal Spean Waterfall and Banteay Srei temple<br />\r\n4. Kulen Mountain and Bateay Srei Temple<br />\r\n5. Beng Mealea Temple and Kompung Pluk Village<br />\r\n6. Floating Village<br />\r\n7. City Tour</p>\r\n\r\n<p>Feel free to contact us for tour arrangement in advance via Airbnb massage</p>\r\n\r\n<p>Location: Krong Siem Reap, Siem Reap, Cambodia</p>\r\n', '', '', '', '13.3670515,103.8613789,17');
COMMIT;

-- ----------------------------
-- Table structure for accommodation_service
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_service`;
CREATE TABLE `accommodation_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=573 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_service
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_service` VALUES (221, 52, 11);
INSERT INTO `accommodation_service` VALUES (222, 52, 14);
INSERT INTO `accommodation_service` VALUES (223, 53, 11);
INSERT INTO `accommodation_service` VALUES (224, 53, 14);
INSERT INTO `accommodation_service` VALUES (225, 54, 7);
INSERT INTO `accommodation_service` VALUES (226, 54, 9);
INSERT INTO `accommodation_service` VALUES (227, 54, 10);
INSERT INTO `accommodation_service` VALUES (228, 54, 11);
INSERT INTO `accommodation_service` VALUES (229, 54, 13);
INSERT INTO `accommodation_service` VALUES (230, 54, 14);
INSERT INTO `accommodation_service` VALUES (231, 54, 15);
INSERT INTO `accommodation_service` VALUES (232, 54, 16);
INSERT INTO `accommodation_service` VALUES (233, 55, 7);
INSERT INTO `accommodation_service` VALUES (234, 55, 9);
INSERT INTO `accommodation_service` VALUES (235, 55, 10);
INSERT INTO `accommodation_service` VALUES (236, 55, 11);
INSERT INTO `accommodation_service` VALUES (237, 55, 13);
INSERT INTO `accommodation_service` VALUES (238, 55, 14);
INSERT INTO `accommodation_service` VALUES (239, 55, 15);
INSERT INTO `accommodation_service` VALUES (240, 55, 16);
INSERT INTO `accommodation_service` VALUES (241, 56, 7);
INSERT INTO `accommodation_service` VALUES (242, 56, 9);
INSERT INTO `accommodation_service` VALUES (243, 56, 10);
INSERT INTO `accommodation_service` VALUES (244, 56, 11);
INSERT INTO `accommodation_service` VALUES (245, 56, 13);
INSERT INTO `accommodation_service` VALUES (246, 56, 14);
INSERT INTO `accommodation_service` VALUES (247, 56, 15);
INSERT INTO `accommodation_service` VALUES (248, 56, 16);
INSERT INTO `accommodation_service` VALUES (321, 57, 7);
INSERT INTO `accommodation_service` VALUES (322, 57, 9);
INSERT INTO `accommodation_service` VALUES (323, 57, 10);
INSERT INTO `accommodation_service` VALUES (324, 57, 11);
INSERT INTO `accommodation_service` VALUES (325, 57, 13);
INSERT INTO `accommodation_service` VALUES (326, 57, 14);
INSERT INTO `accommodation_service` VALUES (327, 57, 15);
INSERT INTO `accommodation_service` VALUES (328, 57, 16);
INSERT INTO `accommodation_service` VALUES (377, 51, 7);
INSERT INTO `accommodation_service` VALUES (378, 51, 11);
INSERT INTO `accommodation_service` VALUES (379, 51, 14);
INSERT INTO `accommodation_service` VALUES (380, 51, 15);
INSERT INTO `accommodation_service` VALUES (501, 49, 7);
INSERT INTO `accommodation_service` VALUES (502, 49, 8);
INSERT INTO `accommodation_service` VALUES (503, 49, 10);
INSERT INTO `accommodation_service` VALUES (504, 49, 11);
INSERT INTO `accommodation_service` VALUES (505, 49, 12);
INSERT INTO `accommodation_service` VALUES (506, 49, 13);
INSERT INTO `accommodation_service` VALUES (507, 49, 14);
INSERT INTO `accommodation_service` VALUES (508, 49, 15);
INSERT INTO `accommodation_service` VALUES (509, 50, 7);
INSERT INTO `accommodation_service` VALUES (510, 50, 8);
INSERT INTO `accommodation_service` VALUES (511, 50, 10);
INSERT INTO `accommodation_service` VALUES (512, 50, 11);
INSERT INTO `accommodation_service` VALUES (513, 50, 12);
INSERT INTO `accommodation_service` VALUES (514, 50, 13);
INSERT INTO `accommodation_service` VALUES (515, 50, 14);
INSERT INTO `accommodation_service` VALUES (516, 50, 15);
INSERT INTO `accommodation_service` VALUES (565, 48, 7);
INSERT INTO `accommodation_service` VALUES (566, 48, 8);
INSERT INTO `accommodation_service` VALUES (567, 48, 9);
INSERT INTO `accommodation_service` VALUES (568, 48, 10);
INSERT INTO `accommodation_service` VALUES (569, 48, 11);
INSERT INTO `accommodation_service` VALUES (570, 48, 12);
INSERT INTO `accommodation_service` VALUES (571, 48, 13);
INSERT INTO `accommodation_service` VALUES (572, 48, 14);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_sport
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_sport`;
CREATE TABLE `accommodation_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_sport
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_sport` VALUES (35, 52, 3);
INSERT INTO `accommodation_sport` VALUES (36, 52, 4);
INSERT INTO `accommodation_sport` VALUES (37, 53, 3);
INSERT INTO `accommodation_sport` VALUES (38, 53, 4);
INSERT INTO `accommodation_sport` VALUES (39, 51, 3);
INSERT INTO `accommodation_sport` VALUES (40, 51, 4);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_transportation
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_transportation`;
CREATE TABLE `accommodation_transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `transportation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accommodation_transportation
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_transportation` VALUES (14, 52, 4);
INSERT INTO `accommodation_transportation` VALUES (15, 53, 4);
COMMIT;

-- ----------------------------
-- Table structure for accommodation_type
-- ----------------------------
DROP TABLE IF EXISTS `accommodation_type`;
CREATE TABLE `accommodation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature_image` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of accommodation_type
-- ----------------------------
BEGIN;
INSERT INTO `accommodation_type` VALUES (2, 'Villa', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem voluptas eos impedit eligendi dolorum inventore expedita veritatis cupiditate, sit fugit, ipsum quidem temporibus perspiciatis voluptatem, earum, molestiae eum explicabo quisquam.</p>\r\n', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-type/Authentic Golden Vishnu Villa1-5_20200629155056.jpg', b'1', '2020-06-29 10:39:43', 1, '2020-06-29 15:50:56', 1);
INSERT INTO `accommodation_type` VALUES (3, 'Residence', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ut iure eveniet pariatur, consequatur distinctio minus inventore itaque beatae fugit, libero! Eos, non porro quisquam aliquam quo sequi, asperiores sit.</p>\r\n', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-type/Authentic Golden Vishnu Villa1-13_20200629155118.jpg', b'1', '2020-06-29 10:41:07', 1, '2020-06-29 15:51:18', 1);
INSERT INTO `accommodation_type` VALUES (4, 'Hostel', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ut iure eveniet pariatur, consequatur distinctio minus inventore itaque beatae fugit, libero! Eos, non porro quisquam aliquam quo sequi, asperiores sit.</p>\r\n', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/accommodation-type/Authentic Golden Vishnu Villa1-2_20200629155130.jpg', b'1', '2020-06-29 10:41:27', 1, '2020-06-29 15:51:30', 1);
COMMIT;

-- ----------------------------
-- Table structure for allotment
-- ----------------------------
DROP TABLE IF EXISTS `allotment`;
CREATE TABLE `allotment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_id` int(11) DEFAULT NULL,
  `number_of_guest` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1= active, 0= stop_sell',
  `updated_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allotment
-- ----------------------------
BEGIN;
INSERT INTO `allotment` VALUES (8, 48, 1, NULL, '2020-08-03', 1, 1, '2020-07-27 18:56:03', NULL, NULL);
INSERT INTO `allotment` VALUES (9, 48, 1, NULL, '2020-08-02', 1, 1, '2020-07-27 18:56:03', NULL, NULL);
INSERT INTO `allotment` VALUES (10, 48, 1, NULL, '2020-08-01', 1, 1, '2020-07-27 18:56:03', NULL, NULL);
INSERT INTO `allotment` VALUES (11, 49, 0, NULL, '2020-08-03', 1, 1, '2020-07-27 18:56:27', NULL, NULL);
INSERT INTO `allotment` VALUES (13, 49, 1, NULL, '2020-08-01', 1, 1, '2020-07-27 18:56:27', NULL, NULL);
INSERT INTO `allotment` VALUES (14, 49, 1, NULL, '2020-08-02', 1, 1, '2020-07-27 18:56:48', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
BEGIN;
INSERT INTO `blog` VALUES (1, 'Partnership', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/blog/Wat Damnak House 10_20200629161354.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore mollitia eius corporis tempore id, totam omnis dolor soluta enim rem velit dignissimos dicta quasi, harum, iste excepturi veniam ea accusamus.</p>\r\n', 1, '2020-06-29 09:30:15', 1, '2020-06-29 16:13:54', 1);
INSERT INTO `blog` VALUES (2, 'Global Meeting', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/blog/Wat Damnak House 13_20200629160321.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore mollitia eius corporis tempore id, totam omnis dolor soluta enim rem velit dignissimos dicta quasi, harum, iste excepturi veniam ea accusamus.</p>\r\n', 1, '2020-06-29 09:31:11', 1, '2020-07-03 11:31:02', 0);
INSERT INTO `blog` VALUES (3, 'Promot Employee', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/blog/Wat Damnak House 11_20200629160302.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore mollitia eius corporis tempore id, totam omnis dolor soluta enim rem velit dignissimos dicta quasi, harum, iste excepturi veniam ea accusamus.</p>\r\n', 1, '2020-06-29 09:31:36', 1, '2020-06-29 16:03:02', 1);
COMMIT;

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `feature_image` varchar(250) DEFAULT NULL,
  `video_link` varchar(250) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of city
-- ----------------------------
BEGIN;
INSERT INTO `city` VALUES (2, 2, NULL, NULL, 'Siem Reap', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-17 04:53:37');
INSERT INTO `city` VALUES (3, 3, 1, NULL, 'Siem Reap', '', NULL, NULL, NULL, NULL, 1, '2020-02-01 10:04:47', b'1', 1, '2020-01-20 09:05:03');
INSERT INTO `city` VALUES (4, 3, 1, NULL, 'Phnom Penh', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:27:43', b'1', 1, '2020-01-20 09:14:58');
INSERT INTO `city` VALUES (5, 3, 1, NULL, 'Kom Pot', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:27:47', b'1', 1, '2020-01-20 09:15:10');
INSERT INTO `city` VALUES (6, 3, 1, NULL, 'Prey Veng', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:27:52', b'1', 1, '2020-01-20 09:16:20');
INSERT INTO `city` VALUES (7, 3, 1, NULL, 'Kep', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:27:57', b'1', 1, '2020-01-20 09:17:18');
INSERT INTO `city` VALUES (8, 3, 1, NULL, 'Ratanak Kiri', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:28:05', b'1', 1, '2020-01-20 09:17:31');
INSERT INTO `city` VALUES (9, 3, 1, NULL, 'Koh Kong', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 09:28:11', b'1', 1, '2020-01-20 09:17:44');
INSERT INTO `city` VALUES (10, 3, 1, NULL, 'Battambang', '', NULL, NULL, NULL, NULL, 1, '2020-02-01 10:04:37', b'1', 1, '2020-01-20 09:28:56');
INSERT INTO `city` VALUES (11, 3, NULL, NULL, 'Kandal', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:14:14');
INSERT INTO `city` VALUES (13, 3, 1, NULL, 'Kratié', '', '/dropbox/siem_reap_angkor/backend/web/uploads/eocambo_technology/city/Consultant Contract - GGC-page-006_20200324110346.jpg', NULL, NULL, NULL, 1, '2020-03-24 11:03:46', b'1', 1, '2020-01-20 10:14:32');
INSERT INTO `city` VALUES (14, 3, NULL, NULL, 'Mondulkiri', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:14:41');
INSERT INTO `city` VALUES (15, 3, NULL, NULL, 'Pursat', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:14:55');
INSERT INTO `city` VALUES (17, 3, NULL, NULL, 'Preah Sihanouk', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:15:18');
INSERT INTO `city` VALUES (18, 3, NULL, NULL, 'Steung Treng', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:15:34');
INSERT INTO `city` VALUES (19, 3, NULL, NULL, 'Svay Rieng', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:15:44');
INSERT INTO `city` VALUES (20, 3, NULL, NULL, 'Takéo', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:15:55');
INSERT INTO `city` VALUES (22, 3, NULL, NULL, 'Pailin', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:17:14');
INSERT INTO `city` VALUES (23, 3, NULL, NULL, 'Tboung Khmum', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:17:25');
INSERT INTO `city` VALUES (24, 3, NULL, NULL, 'Banteay Meanchey', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:23:23');
INSERT INTO `city` VALUES (25, 3, NULL, NULL, 'Kampong Cham', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:23:47');
INSERT INTO `city` VALUES (26, 3, NULL, NULL, 'Kampong Chhnang', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:23:54');
INSERT INTO `city` VALUES (27, 3, NULL, NULL, 'Kampong Speu', '', NULL, NULL, NULL, NULL, NULL, NULL, b'1', 1, '2020-01-20 10:24:03');
INSERT INTO `city` VALUES (28, 3, 1, NULL, 'Kompong Thom', '', NULL, NULL, NULL, NULL, 1, '2020-01-20 10:24:54', b'1', 1, '2020-01-20 10:24:14');
COMMIT;

-- ----------------------------
-- Table structure for company_profile
-- ----------------------------
DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1 DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `feature_image` varchar(250) DEFAULT NULL,
  `contact_person` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `general_email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `invoice_email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `mobile_number_invoice` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `main_phone_1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `main_phone_2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `website_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `company_type` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `company_status` int(11) DEFAULT NULL COMMENT '1=lived , 2 = Inprocesing , 0 = Deactived',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `rate_currency_id` int(11) DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `term_condition` text DEFAULT NULL,
  `gmail_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmail_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservation_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `link_twitter` varchar(255) DEFAULT NULL,
  `payment_term` varchar(255) DEFAULT NULL,
  `link_linkedin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company_profile
-- ----------------------------
BEGIN;
INSERT INTO `company_profile` VALUES (1, '', 'Siem Reap Hospitality Service', 'Wat Damnak Village Sala Kamreuk Commune Siem Reap, Cambodia', 56, 2, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.8904179023084!2d103.86244091459953!3d13.357089390603758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311017c4c5cdcd11%3A0x4a63c52400af05aa!2sWAT%20BO%20HOUSE!5e0!3m2!1sen!2skh!4v1594431329937!5m2!1sen!2skh\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/company-profile/angkor-stay logo_20200708125013.png', 'Mr. Leang Somneang', 'info@angkorstays.com', '', '', '+855 (0) 89 286 195', '+855 (0) 61 813 007', 'www.angkorstays.com', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id aperiam, fugiat ullam obcaecati laboriosam unde rem perferendis deleniti, nihil doloremque quibusdam temporibus consequatur odit nam est. Quia ea suscipit voluptates.</p>\r\n', 1, 2, 1, '2020-02-26 07:27:07', '2020-07-27 16:42:47', 1, 3, '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id aperiam, fugiat ullam obcaecati laboriosam unde rem perferendis deleniti, nihil doloremque quibusdam temporibus consequatur odit nam est. Quia ea suscipit voluptates.</p>\r\n', '086907907mara', 'meymaranet@gmail.com', 'measmengtry@eocambo.com', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id aperiam, fugiat ullam obcaecati laboriosam unde rem perferendis deleniti, nihil doloremque quibusdam temporibus consequatur odit nam est. Quia ea suscipit voluptates.</p>\r\n', '', '<ul>\r\n	<li>Confirmation is immediate</li>\r\n	<li>No registration required</li>\r\n	<li>No booking or credit card fees!</li>\r\n	<li>Pay on arrival!</li>\r\n</ul>\r\n', '');
COMMIT;

-- ----------------------------
-- Table structure for company_user
-- ----------------------------
DROP TABLE IF EXISTS `company_user`;
CREATE TABLE `company_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of company_user
-- ----------------------------
BEGIN;
INSERT INTO `company_user` VALUES (160, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `feature_image` varchar(250) DEFAULT NULL,
  `video_link` varchar(250) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `names` (`name`) USING BTREE,
  KEY `id_area` (`id_area`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of country
-- ----------------------------
BEGIN;
INSERT INTO `country` VALUES (21, NULL, 1, 'Afghanistan', 'AF', '', NULL, 'JDrScVo7aBs', '0', '0', 38, '2018-08-12 17:24:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (22, NULL, 2, 'Albania', 'AL', '', NULL, '', '0', '0', 38, '2018-08-12 17:25:50', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (23, NULL, 3, 'Algeria', 'DZ', '', NULL, '', '0', '0', 38, '2018-08-12 17:50:07', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (24, NULL, 6, 'American Samoa', 'DS', '', NULL, '', '0', '0', 38, '2018-08-12 18:31:58', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (25, NULL, 2, 'Andorra', 'AD', '', NULL, '', '0', '0', 38, '2018-08-12 17:26:21', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (26, NULL, 3, 'Angola', 'AO', '', NULL, '', '0', '0', 38, '2018-08-12 17:50:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (27, NULL, 1, 'Anguilla', 'AI', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (28, NULL, 1, 'Antarctica', 'AQ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (29, NULL, 4, 'Antigua and Barbuda', 'AG', '', NULL, '', '0', '0', 38, '2018-08-12 18:15:11', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (30, NULL, 5, 'Argentina', 'AR', '', NULL, '', '0', '0', 38, '2018-08-12 18:24:31', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (31, NULL, 2, 'Armenia', 'AM', '', NULL, '', '0', '0', 38, '2018-08-12 17:26:40', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (32, NULL, 1, 'Aruba', 'AW', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (33, NULL, 6, 'Australia', 'AU', '', NULL, '', '0', '0', 38, '2018-08-12 18:28:59', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (34, NULL, 2, 'Austria', 'AT', '', NULL, '', '0', '0', 38, '2018-08-12 17:27:02', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (35, NULL, 2, 'Azerbaijan', 'AZ', '', NULL, '', '0', '0', 38, '2018-08-12 17:27:31', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (36, NULL, 4, 'Bahamas', 'BS', '', NULL, '', '0', '0', 38, '2018-08-12 18:15:50', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (37, NULL, 1, 'Bahrain', 'BH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (38, NULL, 1, 'Bangladesh', 'BD', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (39, NULL, 4, 'Barbados', 'BB', '', NULL, '', '0', '0', 38, '2018-08-12 18:16:08', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (40, NULL, 2, 'Belarus', 'BY', '', NULL, '', '0', '0', 38, '2018-08-12 17:27:57', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (41, NULL, 2, 'Belgium', 'BE', '', NULL, '', '0', '0', 38, '2018-08-12 17:28:16', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (42, NULL, 4, 'Belize', 'BZ', '', NULL, '', '0', '0', 38, '2018-08-12 18:16:28', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (43, NULL, 3, 'Benin', 'BJ', '', NULL, '', '0', '0', 38, '2018-08-12 17:51:11', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (44, NULL, 1, 'Bermuda', 'BM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (45, NULL, 1, 'Bhutan', 'BT', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (46, NULL, 5, 'Bolivia', 'BO', '', NULL, '', '0', '0', 38, '2018-08-12 18:24:54', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (47, NULL, 2, 'Bosnia and Herzegovina', 'BA', '', NULL, '', '0', '0', 38, '2018-08-12 17:28:36', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (48, NULL, 3, 'Botswana', 'BW', '', NULL, '', '0', '0', 38, '2018-08-12 17:51:30', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (49, NULL, 1, 'Bouvet Island', 'BV', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (50, NULL, 5, 'Brazil', 'BR', '', NULL, '', '0', '0', 38, '2018-08-12 18:25:16', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (51, NULL, 1, 'British Indian Ocean Territory', 'IO', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (52, NULL, 1, 'Brunei Darussalam', 'BN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (53, NULL, 2, 'Bulgaria', 'BG', '', NULL, '', '0', '0', 38, '2018-08-12 17:29:23', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (54, NULL, 3, 'Burkina Faso', 'BF', '', NULL, '', '0', '0', 38, '2018-08-12 17:52:12', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (55, NULL, 3, 'Burundi', 'BI', '', NULL, '', '0', '0', 38, '2018-08-12 17:52:41', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (56, NULL, 1, 'Cambodia', 'KH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (57, NULL, 3, 'Cameroon', 'CM', '', NULL, '', '0', '0', 38, '2018-08-12 17:53:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (58, NULL, 4, 'Canada', 'CA', '', NULL, '', '0', '0', 38, '2018-08-12 18:16:47', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (59, NULL, 1, 'Cape Verde', 'CV', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (60, NULL, 1, 'Cayman Islands', 'KY', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (61, NULL, 3, 'Central African Republic', 'CF', '', NULL, '', '0', '0', 38, '2018-08-12 17:53:58', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (62, NULL, 3, 'Chad', 'TD', '', NULL, '', '0', '0', 38, '2018-08-12 17:54:18', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (63, NULL, 5, 'Chile', 'CL', '', NULL, '', '0', '0', 38, '2018-08-12 18:25:32', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (64, NULL, 1, 'China', 'CN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (65, NULL, 1, 'Christmas Island', 'CX', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (66, NULL, 1, 'Cocos (Keeling) Islands', 'CC', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (67, NULL, 5, 'Colombia', 'CO', '', NULL, '', '0', '0', 38, '2018-08-12 18:26:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (68, NULL, 3, 'Comoros', 'KM', '', NULL, '', '0', '0', 38, '2018-08-12 17:54:40', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (69, NULL, 3, 'Congo', 'CG', '', NULL, '', '0', '0', 38, '2018-08-12 17:55:49', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (70, NULL, 1, 'Cook Islands', 'CK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (71, NULL, 4, 'Costa Rica', 'CR', '', NULL, '', '0', '0', 38, '2018-08-12 18:17:05', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (72, NULL, 2, 'Croatia (Hrvatska)', 'HR', '', NULL, '', '0', '0', 38, '2018-08-12 17:29:47', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (73, NULL, 4, 'Cuba', 'CU', '', NULL, '', '0', '0', 38, '2018-08-12 18:17:23', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (74, NULL, 2, 'Cyprus', 'CY', '', NULL, '', '0', '0', 38, '2018-08-12 17:30:07', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (75, NULL, 2, 'Czech Republic', 'CZ', '', NULL, '', '0', '0', 38, '2018-08-12 17:30:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (76, NULL, 2, 'Denmark', 'DK', '', NULL, '', '0', '0', 38, '2018-08-12 17:30:49', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (77, NULL, 3, 'Djibouti', 'DJ', '', NULL, '', '0', '0', 38, '2018-08-12 17:56:46', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (78, NULL, 4, 'Dominica', 'DM', '', NULL, '', '0', '0', 38, '2018-08-12 18:17:44', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (79, NULL, 4, 'Dominican Republic', 'DO', '', NULL, '', '0', '0', 38, '2018-08-12 18:17:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (80, NULL, 1, 'East Timor', 'TP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (81, NULL, 5, 'Ecuador', 'EC', '', NULL, '', '0', '0', 38, '2018-08-12 18:26:22', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (82, NULL, 3, 'Egypt', 'EG', '', NULL, '', '0', '0', 38, '2018-08-12 17:57:20', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (83, NULL, 4, 'El Salvador', 'SV', '', NULL, '', '0', '0', 38, '2018-08-12 18:18:19', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (84, NULL, 3, 'Equatorial Guinea', 'GQ', '', NULL, '', '0', '0', 38, '2018-08-12 17:57:47', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (85, NULL, 3, 'Eritrea', 'ER', '', NULL, '', '0', '0', 38, '2018-08-12 17:58:09', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (86, NULL, 2, 'Estonia', 'EE', '', NULL, '', '0', '0', 38, '2018-08-12 17:31:22', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (87, NULL, 3, 'Ethiopia', 'ET', '', NULL, '', '0', '0', 38, '2018-08-12 17:58:53', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (88, NULL, 1, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (89, NULL, 1, 'Faroe Islands', 'FO', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (90, NULL, 6, 'Fiji', 'FJ', '', NULL, '', '0', '0', 38, '2018-08-12 18:29:19', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (91, NULL, 2, 'Finland', 'FI', '', NULL, '', '0', '0', 38, '2018-08-12 17:31:43', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (92, NULL, 2, 'France', 'FR', '', NULL, '', '0', '0', 38, '2018-08-12 17:32:09', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (93, NULL, 2, 'France, Metropolitan', 'FX', '', NULL, '', '0', '0', 38, '2018-08-12 17:32:21', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (94, NULL, 1, 'French Guiana', 'GF', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (95, NULL, 1, 'French Polynesia', 'PF', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (96, NULL, 1, 'French Southern Territories', 'TF', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (97, NULL, 3, 'Gabon', 'GA', '', NULL, '', '0', '0', 38, '2018-08-12 17:59:35', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (98, NULL, 3, 'Gambia', 'GM', '', NULL, '', '0', '0', 38, '2018-08-12 17:59:52', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (99, NULL, 2, 'Georgia', 'GE', '', NULL, '', '0', '0', 38, '2018-08-12 17:32:51', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (100, NULL, 2, 'Germany', 'DE', '', NULL, '', '0', '0', 38, '2018-08-12 17:33:33', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (101, NULL, 3, 'Ghana', 'GH', '', NULL, '', '0', '0', 38, '2018-08-12 18:00:11', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (102, NULL, 1, 'Gibraltar', 'GI', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (103, NULL, 1, 'Guernsey', 'GK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (104, NULL, 2, 'Greece', 'GR', '', NULL, '', '0', '0', 38, '2018-08-12 17:34:02', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (105, NULL, 1, 'Greenland', 'GL', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (106, NULL, 4, 'Grenada', 'GD', '', NULL, '', '0', '0', 38, '2018-08-12 18:18:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (107, NULL, 1, 'Guadeloupe', 'GP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (108, NULL, 1, 'Guam', 'GU', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (109, NULL, 4, 'Guatemala', 'GT', '', NULL, '', '0', '0', 38, '2018-08-12 18:19:05', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (110, NULL, 3, 'Guinea', 'GN', '', NULL, '', '0', '0', 38, '2018-08-12 18:00:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (111, NULL, 3, 'Guinea-Bissau', 'GW', '', NULL, '', '0', '0', 38, '2018-08-12 18:00:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (112, NULL, 5, 'Guyana', 'GY', '', NULL, '', '0', '0', 38, '2018-08-12 18:26:41', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (113, NULL, 4, 'Haiti', 'HT', '', NULL, '', '0', '0', 38, '2018-08-12 18:19:22', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (114, NULL, 1, 'Heard and Mc Donald Islands', 'HM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (115, NULL, 4, 'Honduras', 'HN', '', NULL, '', '0', '0', 38, '2018-08-12 18:19:39', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (116, NULL, 1, 'Hong Kong', 'HK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (117, NULL, 2, 'Hungary', 'HU', '', NULL, '', '0', '0', 38, '2018-08-12 17:34:27', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (118, NULL, 2, 'Iceland', 'IS', '', NULL, '', '0', '0', 38, '2018-08-12 17:34:46', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (119, NULL, 1, 'India', 'IN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (120, NULL, 1, 'Isle of Man', 'IM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (121, NULL, 1, 'Indonesia', 'ID', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (122, NULL, 1, 'Iran (Islamic Republic of)', 'IR', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (123, NULL, 1, 'Iraq', 'IQ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (124, NULL, 2, 'Ireland', 'IE', '', NULL, '', '0', '0', 38, '2018-08-12 17:35:09', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (125, NULL, 1, 'Israel', 'IL', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (126, NULL, 2, 'Italy', 'IT', '', NULL, '', '0', '0', 38, '2018-08-12 17:35:37', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (127, NULL, 1, 'Ivory Coast', 'CI', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (128, NULL, 1, 'Jersey', 'JE', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (129, NULL, 4, 'Jamaica', 'JM', '', NULL, '', '0', '0', 38, '2018-08-12 18:20:09', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (130, NULL, 1, 'Japan', 'JP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (131, NULL, 1, 'Jordan', 'JO', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (132, NULL, 2, 'Kazakhstan', 'KZ', '', NULL, '', '0', '0', 38, '2018-08-12 17:36:08', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (133, NULL, 3, 'Kenya', 'KE', '', NULL, '', '0', '0', 38, '2018-08-12 18:01:30', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (134, NULL, 6, 'Kiribati', 'KI', '', NULL, '', '0', '0', 38, '2018-08-12 18:29:36', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (135, NULL, 1, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (136, NULL, 1, 'Korea, Republic of', 'KR', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (137, NULL, 2, 'Kosovo', 'XK', '', NULL, '', '0', '0', 38, '2018-08-12 17:36:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (138, NULL, 1, 'Kuwait', 'KW', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (139, NULL, 1, 'Kyrgyzstan', 'KG', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (140, NULL, 1, 'Laos', 'LA', '', NULL, '', '0', '0', 1000028, '2018-08-13 17:23:16', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (141, NULL, 2, 'Latvia', 'LV', '', NULL, '', '0', '0', 38, '2018-08-12 17:36:53', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (142, NULL, 1, 'Lebanon', 'LB', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (143, NULL, 3, 'Lesotho', 'LS', '', NULL, '', '0', '0', 38, '2018-08-12 18:01:49', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (144, NULL, 3, 'Liberia', 'LR', '', NULL, '', '0', '0', 38, '2018-08-12 18:02:07', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (145, NULL, 3, 'Libyan Arab Jamahiriya', 'LY', '', NULL, '', '0', '0', 38, '2018-08-12 18:02:25', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (146, NULL, 2, 'Liechtenstein', 'LI', '', NULL, '', '0', '0', 38, '2018-08-12 17:37:12', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (147, NULL, 2, 'Lithuania', 'LT', '', NULL, '', '0', '0', 38, '2018-08-12 17:38:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (148, NULL, 2, 'Luxembourg', 'LU', '', NULL, '', '0', '0', 38, '2018-08-12 17:38:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (149, NULL, 1, 'Macau', 'MO', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (150, NULL, 2, 'Macedonia', 'MK', '', NULL, '', '0', '0', 38, '2018-08-12 17:39:10', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (151, NULL, 3, 'Madagascar', 'MG', '', NULL, '', '0', '0', 38, '2018-08-12 18:02:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (152, NULL, 3, 'Malawi', 'MW', '', NULL, '', '0', '0', 38, '2018-08-12 18:03:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (153, NULL, 1, 'Malaysia', 'MY', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (154, NULL, 1, 'Maldives', 'MV', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (155, NULL, 3, 'Mali', 'ML', '', NULL, '', '0', '0', 38, '2018-08-12 18:03:19', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (156, NULL, 2, 'Malta', 'MT', '', NULL, '', '0', '0', 38, '2018-08-12 17:39:34', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (157, NULL, 6, 'Marshall Islands', 'MH', '', NULL, '', '0', '0', 38, '2018-08-12 18:29:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (158, NULL, 1, 'Martinique', 'MQ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (159, NULL, 3, 'Mauritania', 'MR', '', NULL, '', '0', '0', 38, '2018-08-12 18:03:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (160, NULL, 3, 'Mauritius', 'MU', '', NULL, '', '0', '0', 38, '2018-08-12 18:04:17', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (161, NULL, 1, 'Mayotte', 'TY', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (162, NULL, 4, 'Mexico', 'MX', '', NULL, '', '0', '0', 38, '2018-08-12 18:20:31', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (163, NULL, 6, 'Micronesia, Federated States of', 'FM', '', NULL, '', '0', '0', 38, '2018-08-12 18:30:13', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (164, NULL, 2, 'Moldova, Republic of', 'MD', '', NULL, '', '0', '0', 38, '2018-08-12 17:39:57', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (165, NULL, 2, 'Monaco', 'MC', '', NULL, '', '0', '0', 38, '2018-08-12 17:40:15', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (166, NULL, 1, 'Mongolia', 'MN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (167, NULL, 2, 'Montenegro', 'ME', '', NULL, '', '0', '0', 38, '2018-08-12 17:40:35', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (168, NULL, 1, 'Montserrat', 'MS', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (169, NULL, 3, 'Morocco', 'MA', '', NULL, '', '0', '0', 38, '2018-08-12 18:04:37', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (170, NULL, 3, 'Mozambique', 'MZ', '', NULL, '', '0', '0', 38, '2018-08-12 18:04:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (171, NULL, 1, 'Myanmar', 'MM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (172, NULL, 3, 'Namibia', 'NA', '', NULL, '', '0', '0', 38, '2018-08-12 18:05:12', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (173, NULL, 6, 'Nauru', 'NR', '', NULL, '', '0', '0', 38, '2018-08-12 18:30:32', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (174, NULL, 1, 'Nepal', 'NP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (175, NULL, 2, 'Netherlands', 'NL', '', NULL, '', '0', '0', 38, '2018-08-12 17:41:05', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (176, NULL, 2, 'Netherlands Antilles', 'AN', '', NULL, '', '0', '0', 38, '2018-08-12 17:41:17', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (177, NULL, 1, 'New Caledonia', 'NC', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (178, NULL, 6, 'New Zealand', 'NZ', '', NULL, '', '0', '0', 38, '2018-08-12 18:30:52', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (179, NULL, 4, 'Nicaragua', 'NI', '', NULL, '', '0', '0', 38, '2018-08-12 18:20:50', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (180, NULL, 3, 'Niger', 'NE', '', NULL, '', '0', '0', 38, '2018-08-12 18:05:30', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (181, NULL, 3, 'Nigeria', 'NG', '', NULL, '', '0', '0', 38, '2018-08-12 18:05:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (182, NULL, 1, 'Niue', 'NU', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (183, NULL, 1, 'Norfolk Island', 'NF', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (184, NULL, 1, 'Northern Mariana Islands', 'MP', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (185, NULL, 2, 'Norway', 'NO', '', NULL, '', '0', '0', 38, '2018-08-12 17:41:50', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (186, NULL, 1, 'Oman', 'OM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (187, NULL, 1, 'Pakistan', 'PK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (188, NULL, 6, 'Palau', 'PW', '', NULL, '', '0', '0', 38, '2018-08-12 18:31:14', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (189, NULL, 1, 'Palestine', 'PS', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (190, NULL, 4, 'Panama', 'PA', '', NULL, '', '0', '0', 38, '2018-08-12 18:21:18', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (191, NULL, 6, 'Papua New Guinea', 'PG', '', NULL, '', '0', '0', 38, '2018-08-12 18:31:39', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (192, NULL, 5, 'Paraguay', 'PY', '', NULL, '', '0', '0', 38, '2018-08-12 18:27:08', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (193, NULL, 5, 'Peru', 'PE', '', NULL, '', '0', '0', 38, '2018-08-12 18:27:27', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (194, NULL, 1, 'Philippines', 'PH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (195, NULL, 1, 'Pitcairn', 'PN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (196, NULL, 2, 'Poland', 'PL', '', NULL, '', '0', '0', 38, '2018-08-12 17:42:25', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (197, NULL, 2, 'Portugal', 'PT', '', NULL, '', '0', '0', 38, '2018-08-12 17:42:43', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (198, NULL, 1, 'Puerto Rico', 'PR', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (199, NULL, 1, 'Qatar', 'QA', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (200, NULL, 1, 'Reunion', 'RE', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (201, NULL, 2, 'Romania', 'RO', '', NULL, '', '0', '0', 38, '2018-08-12 17:43:03', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (202, NULL, 2, 'Russian Federation', 'RU', '', NULL, '', '0', '0', 38, '2018-08-12 17:43:22', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (203, NULL, 3, 'Rwanda', 'RW', '', NULL, '', '0', '0', 38, '2018-08-12 18:06:21', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (204, NULL, 4, 'Saint Kitts and Nevis', 'KN', '', NULL, '', '0', '0', 38, '2018-08-12 18:21:42', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (205, NULL, 4, 'Saint Lucia', 'LC', '', NULL, '', '0', '0', 38, '2018-08-12 18:21:59', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (206, NULL, 4, 'Saint Vincent and the Grenadines', 'VC', '', NULL, '', '0', '0', 38, '2018-08-12 18:22:23', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (207, NULL, 6, 'Samoa', 'WS', '', NULL, '', '0', '0', 38, '2018-08-12 18:32:16', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (208, NULL, 2, 'San Marino', 'SM', '', NULL, '', '0', '0', 38, '2018-08-12 17:43:50', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (209, NULL, 3, 'Sao Tome and Principe', 'ST', '', NULL, '', '0', '0', 38, '2018-08-12 18:06:40', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (210, NULL, 1, 'Saudi Arabia', 'SA', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (211, NULL, 3, 'Senegal', 'SN', '', NULL, '', '0', '0', 38, '2018-08-12 18:07:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (212, NULL, 2, 'Serbia', 'RS', '', NULL, '', '0', '0', 38, '2018-08-12 17:44:37', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (213, NULL, 3, 'Seychelles', 'SC', '', NULL, '', '0', '0', 38, '2018-08-12 18:07:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (214, NULL, 3, 'Sierra Leone', 'SL', '', NULL, '', '0', '0', 38, '2018-08-12 18:07:48', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (215, NULL, 1, 'Singapore', 'SG', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (216, NULL, 2, 'Slovakia', 'SK', '', NULL, '', '0', '0', 38, '2018-08-12 17:45:20', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (217, NULL, 2, 'Slovenia', 'SI', '', NULL, '', '0', '0', 38, '2018-08-12 17:46:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (218, NULL, 6, 'Solomon Islands', 'SB', '', NULL, '', '0', '0', 38, '2018-08-12 18:32:37', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (219, NULL, 3, 'Somalia', 'SO', '', NULL, '', '0', '0', 38, '2018-08-12 18:03:40', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (220, NULL, 3, 'South Africa', 'ZA', '', NULL, '', '0', '0', 38, '2018-08-12 18:08:30', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (221, NULL, 2, 'South Georgia South Sandwich Islands', 'GS', '', NULL, '', '0', '0', 38, '2018-08-12 17:33:10', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (222, NULL, 3, 'South Sudan', 'SS', '', NULL, '', '0', '0', 38, '2018-08-12 18:11:16', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (223, NULL, 2, 'Spain', 'ES', '', NULL, '', '0', '0', 38, '2018-08-12 17:46:15', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (224, NULL, 1, 'Sri Lanka', 'LK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (225, NULL, 1, 'St. Helena', 'SH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (226, NULL, 1, 'St. Pierre and Miquelon', 'PM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (227, NULL, 3, 'Sudan', 'SD', '', NULL, '', '0', '0', 38, '2018-08-12 18:11:35', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (228, NULL, 5, 'Suriname', 'SR', '', NULL, '', '0', '0', 38, '2018-08-12 18:27:46', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (229, NULL, 1, 'Svalbard and Jan Mayen Islands', 'SJ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (230, NULL, 1, 'Swaziland', 'SZ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (231, NULL, 2, 'Sweden', 'SE', '', NULL, '', '0', '0', 38, '2018-08-12 17:46:34', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (232, NULL, 2, 'Switzerland', 'CH', '', NULL, '', '0', '0', 38, '2018-08-12 17:46:58', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (233, NULL, 1, 'Syrian Arab Republic', 'SY', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (234, NULL, 1, 'Taiwan', 'TW', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (235, NULL, 1, 'Tajikistan', 'TJ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (236, NULL, 3, 'Tanzania, United Republic of', 'TZ', '', NULL, '', '0', '0', 38, '2018-08-12 18:12:48', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (237, NULL, 1, 'Thailand', 'TH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (238, NULL, 3, 'Togo', 'TG', '', NULL, '', '0', '0', 38, '2018-08-12 18:13:10', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (239, NULL, 1, 'Tokelau', 'TK', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (240, NULL, 6, 'Tonga', 'TO', '', NULL, '', '0', '0', 38, '2018-08-12 18:33:08', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (241, NULL, 4, 'Trinidad and Tobago', 'TT', '', NULL, '', '0', '0', 38, '2018-08-12 18:22:43', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (242, NULL, 3, 'Tunisia', 'TN', '', NULL, '', '0', '0', 38, '2018-08-12 18:13:30', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (243, NULL, 2, 'Turkey', 'TR', '', NULL, '', '0', '0', 38, '2018-08-12 17:47:55', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (244, NULL, 1, 'Turkmenistan', 'TM', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (245, NULL, 1, 'Turks and Caicos Islands', 'TC', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (246, NULL, 6, 'Tuvalu', 'TV', '', NULL, '', '0', '0', 38, '2018-08-12 18:33:29', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (247, NULL, 3, 'Uganda', 'UG', '', NULL, '', '0', '0', 38, '2018-08-12 18:13:49', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (248, NULL, 2, 'Ukraine', 'UA', '', NULL, '', '0', '0', 38, '2018-08-12 17:48:22', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (249, NULL, 1, 'United Arab Emirates', 'AE', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (250, NULL, 2, 'United Kingdom', 'GB', '', NULL, '', '0', '0', 38, '2018-08-12 17:49:03', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (251, NULL, 4, 'United States', 'US', '', NULL, '', '0', '0', 38, '2018-08-12 18:23:19', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (252, NULL, 4, 'United States minor outlying islands', 'UM', '', NULL, '', '0', '0', 38, '2018-08-12 18:23:31', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (253, NULL, 5, 'Uruguay', 'UY', '', NULL, '', '0', '0', 38, '2018-08-12 18:28:08', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (254, NULL, 1, 'Uzbekistan', 'UZ', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (255, NULL, 6, 'Vanuatu', 'VU', '', NULL, '', '0', '0', 38, '2018-08-12 18:33:47', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (256, NULL, 2, 'Vatican City State', 'VA', '', NULL, '', '0', '0', 38, '2018-08-12 17:49:24', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (257, NULL, 5, 'Venezuela', 'VE', '', NULL, '', '0', '0', 38, '2018-08-12 18:28:26', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (258, NULL, 1, 'Vietnam', 'VN', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (259, NULL, 1, 'Virgin Islands (British)', 'VG', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (260, NULL, 1, 'Virgin Islands (U.S.)', 'VI', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (261, NULL, 1, 'Wallis and Futuna Islands', 'WF', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (262, NULL, 1, 'Western Sahara', 'EH', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (263, NULL, 1, 'Yemen', 'YE', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (264, NULL, 1, 'Zaire', 'ZR', NULL, NULL, NULL, '0', '0', 35, '2018-08-12 16:19:01', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (265, NULL, 3, 'Zambia', 'ZM', '', NULL, '', '0', '0', 38, '2018-08-12 18:14:10', 1, 35, '2018-08-12 16:19:01');
INSERT INTO `country` VALUES (266, NULL, 3, 'Zimbabwe', 'ZW', '', NULL, '', '0', '0', 38, '2018-08-12 18:14:28', 1, 35, '2018-08-12 16:19:01');
COMMIT;

-- ----------------------------
-- Table structure for custom_field
-- ----------------------------
DROP TABLE IF EXISTS `custom_field`;
CREATE TABLE `custom_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_description` varchar(100) DEFAULT NULL,
  `feature_image` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of custom_field
-- ----------------------------
BEGIN;
INSERT INTO `custom_field` VALUES (1, 'Online Experiences', 'ANGKOR STAYS', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/cambodia-2237987_1920_20200702110400.jpg', '<p>Explore some of the best tips in Siem Reap</p>\r\n', 1, '2020-07-13 09:22:36', b'1', 1, '2020-06-27 15:25:21');
INSERT INTO `custom_field` VALUES (2, 'Our Fleet, Your Fleet', 'Contact Us', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/36293_20200702141209.jpg', '<p>We know the difference is in the details and that&rsquo;s why our car rental services, in the tourism and business industry, stand out for their quality and good taste, to offer you an unique experience</p>\r\n\r\n<h2 style=\"text-align:center\">Call Now (54)-344-4533-4</h2>\r\n', 1, '2020-07-02 14:12:09', b'1', 1, '2020-06-27 15:28:13');
INSERT INTO `custom_field` VALUES (3, 'Contact Us', '', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/Ck_DqRmXAAAwKcp_20200702141026.jpg', '<p>If you have any queries or questions, please do not hesitate to contact us at Siem Reap Hospitality Service by using the form below:</p>\r\n', 1, '2020-07-02 14:10:26', b'1', 1, '2020-06-27 15:29:44');
INSERT INTO `custom_field` VALUES (4, 'Blog Post', 'Explore some of the best tips from around the world', NULL, '', NULL, NULL, b'1', 1, '2020-06-29 09:15:48');
INSERT INTO `custom_field` VALUES (5, 'About Us', '', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/hero Why Natural Gas  1440x500_20200702134515.jpg', '', 1, '2020-07-02 13:45:15', b'1', 1, '2020-06-29 16:22:42');
INSERT INTO `custom_field` VALUES (6, 'News', '', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/36293_20200702134813.jpg', '', 1, '2020-07-02 13:48:13', b'1', 1, '2020-06-29 16:30:18');
INSERT INTO `custom_field` VALUES (7, 'Gallery', '', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/custom-field/nhc3iP_20200702135012.jpg', '', 1, '2020-07-02 13:50:12', b'1', 1, '2020-07-02 09:17:37');
INSERT INTO `custom_field` VALUES (8, 'The Property Type', '', NULL, '', NULL, NULL, b'1', 1, '2020-07-13 09:17:50');
INSERT INTO `custom_field` VALUES (9, 'All Properties', '', NULL, '', 1, '2020-07-21 09:38:45', b'1', 1, '2020-07-13 09:18:03');
INSERT INTO `custom_field` VALUES (10, 'Other Accommodation', '', NULL, '', NULL, NULL, b'1', 1, '2020-07-13 09:28:47');
INSERT INTO `custom_field` VALUES (11, 'Sleeping Arrangement', '', NULL, '', NULL, NULL, b'1', 1, '2020-07-13 09:44:04');
COMMIT;

-- ----------------------------
-- Table structure for experience
-- ----------------------------
DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of experience
-- ----------------------------
BEGIN;
INSERT INTO `experience` VALUES (4, 'Message and Spa', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/experience/36293_20200702134813_20200718164920.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate voluptatem maiores nam reprehenderit deserunt molestiae porro ipsum, fugiat nostrum, assumenda ipsa. Ipsa reiciendis architecto minus, eveniet similique delectus. Amet, ratione.</p>\r\n', 1, '2020-07-18 16:46:09', 1, '2020-07-18 17:35:38', 1);
COMMIT;

-- ----------------------------
-- Table structure for facility
-- ----------------------------
DROP TABLE IF EXISTS `facility`;
CREATE TABLE `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of facility
-- ----------------------------
BEGIN;
INSERT INTO `facility` VALUES (1, 'Back-up generator', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:54:23');
INSERT INTO `facility` VALUES (2, 'Electricity', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:54:43');
INSERT INTO `facility` VALUES (3, 'Fire extinguisher', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:55:06');
INSERT INTO `facility` VALUES (4, 'Gezebo', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:55:22');
INSERT INTO `facility` VALUES (5, 'Hairdryer', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:55:38');
INSERT INTO `facility` VALUES (6, 'Mosquito nets', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:55:57');
INSERT INTO `facility` VALUES (7, 'Off-street parking', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:56:16');
INSERT INTO `facility` VALUES (8, 'Safety box', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:56:31');
INSERT INTO `facility` VALUES (9, 'Terrace', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:56:46');
INSERT INTO `facility` VALUES (10, 'Wardrobe space', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:57:02');
INSERT INTO `facility` VALUES (11, 'Wi-Fi internet', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:57:22');
INSERT INTO `facility` VALUES (12, 'Yoga bale', NULL, '', NULL, NULL, 1, 1, '2020-06-25 14:57:42');
INSERT INTO `facility` VALUES (13, 'Bedroom', NULL, '', 1, '2020-06-26 14:57:48', 1, 1, '2020-06-26 14:38:40');
INSERT INTO `facility` VALUES (14, 'Bathroom', NULL, '', 1, '2020-06-26 14:58:03', 1, 1, '2020-06-26 14:52:48');
INSERT INTO `facility` VALUES (15, 'Kitchen', NULL, '', NULL, NULL, 1, 1, '2020-06-26 14:56:39');
INSERT INTO `facility` VALUES (16, 'Livingroom ', NULL, '', NULL, NULL, 1, 1, '2020-06-26 14:57:22');
INSERT INTO `facility` VALUES (17, 'Parking', NULL, '', 1, '2020-06-26 15:07:48', 1, 1, '2020-06-26 14:58:39');
INSERT INTO `facility` VALUES (18, 'Natural Swimming Pool', NULL, '', NULL, NULL, 1, 1, '2020-06-26 14:59:07');
INSERT INTO `facility` VALUES (19, 'Washing Machine', NULL, '', NULL, NULL, 1, 1, '2020-06-26 15:00:19');
INSERT INTO `facility` VALUES (20, 'Full Equipments', NULL, '', NULL, NULL, 1, 1, '2020-06-26 15:00:42');
INSERT INTO `facility` VALUES (21, 'No Parking', NULL, '', NULL, NULL, 1, 1, '2020-06-26 15:01:17');
INSERT INTO `facility` VALUES (22, 'Full Equipments For Kitchen', NULL, '', NULL, NULL, 1, 1, '2020-06-26 15:01:52');
INSERT INTO `facility` VALUES (23, 'Bathroom', NULL, '', NULL, NULL, 1, 1, '2020-07-01 16:06:33');
INSERT INTO `facility` VALUES (24, 'Business Center', NULL, '', NULL, NULL, 1, 1, '2020-07-01 16:37:47');
COMMIT;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery
-- ----------------------------
BEGIN;
INSERT INTO `gallery` VALUES (1, 'Villa', NULL, NULL, '2020-06-30 09:59:17', 1, 1, NULL);
INSERT INTO `gallery` VALUES (2, 'Wat Bo House', NULL, NULL, '2020-07-02 14:05:28', 1, 1, NULL);
INSERT INTO `gallery` VALUES (3, 'Wat Damnak House', NULL, NULL, '2020-07-02 14:05:59', 1, 1, NULL);
INSERT INTO `gallery` VALUES (4, 'Wat Po House', NULL, NULL, '2020-07-02 14:06:20', 1, 1, NULL);
INSERT INTO `gallery` VALUES (5, 'Authentic Golden Vishnu', '2020-07-02 14:07:03', 1, '2020-07-02 14:06:45', 1, 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for gallery_image
-- ----------------------------
DROP TABLE IF EXISTS `gallery_image`;
CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for meal
-- ----------------------------
DROP TABLE IF EXISTS `meal`;
CREATE TABLE `meal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meal
-- ----------------------------
BEGIN;
INSERT INTO `meal` VALUES (2, 'Coffee maker', NULL, '', NULL, NULL, 1, 1, '2020-06-26 10:59:28');
INSERT INTO `meal` VALUES (3, 'Daily breakfast included', NULL, '', NULL, NULL, 1, 1, '2020-06-26 10:59:54');
INSERT INTO `meal` VALUES (4, 'Dinner (15 USD / person)', NULL, '', NULL, NULL, 1, 1, '2020-06-26 11:00:45');
INSERT INTO `meal` VALUES (5, 'Fully equipped kitchen', NULL, '', NULL, NULL, 1, 1, '2020-06-26 11:01:27');
INSERT INTO `meal` VALUES (6, 'Lunch (extra cost) (12 USD / person)', NULL, '', NULL, NULL, 1, 1, '2020-06-26 11:01:59');
INSERT INTO `meal` VALUES (7, 'Oven', NULL, '', NULL, NULL, 1, 1, '2020-06-26 11:02:10');
INSERT INTO `meal` VALUES (8, 'Toaster', NULL, '', NULL, NULL, 1, 1, '2020-06-26 11:02:24');
INSERT INTO `meal` VALUES (9, 'Free Breakfast ', NULL, '', NULL, NULL, 1, 1, '2020-07-01 16:31:53');
COMMIT;

-- ----------------------------
-- Table structure for month_list
-- ----------------------------
DROP TABLE IF EXISTS `month_list`;
CREATE TABLE `month_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `value` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of month_list
-- ----------------------------
BEGIN;
INSERT INTO `month_list` VALUES (1, 'January', '01');
INSERT INTO `month_list` VALUES (2, 'February', '02');
INSERT INTO `month_list` VALUES (3, 'March', '03');
INSERT INTO `month_list` VALUES (4, 'April', '04');
INSERT INTO `month_list` VALUES (5, 'May', '05');
INSERT INTO `month_list` VALUES (6, 'June', '06');
INSERT INTO `month_list` VALUES (7, 'July', '07');
INSERT INTO `month_list` VALUES (8, 'August', '08');
INSERT INTO `month_list` VALUES (9, 'September', '09');
INSERT INTO `month_list` VALUES (10, 'October', '10');
INSERT INTO `month_list` VALUES (11, 'November', '11');
INSERT INTO `month_list` VALUES (12, 'December', '12');
COMMIT;

-- ----------------------------
-- Table structure for our_service
-- ----------------------------
DROP TABLE IF EXISTS `our_service`;
CREATE TABLE `our_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of our_service
-- ----------------------------
BEGIN;
INSERT INTO `our_service` VALUES (4, 'Birthday Party with Cake', '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/our-service/36293_20200702134813_20200718163441.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eius enim quae natus, dolorum fugit doloremque nobis dolores, inventore, iste, in maxime eum ea ducimus amet possimus blanditiis necessitatibus vitae.</p>\r\n', 1, '2020-07-18 16:32:26', 1, '2020-07-18 17:32:35', 1);
COMMIT;

-- ----------------------------
-- Table structure for promotion
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `min_stay` int(11) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `rate_plan_id` int(11) DEFAULT NULL,
  `promotion` float(11,0) DEFAULT NULL,
  `promotion_type` int(11) DEFAULT NULL COMMENT '1= amount; 0= percentage',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of promotion
-- ----------------------------
BEGIN;
INSERT INTO `promotion` VALUES (1, 'High Season', 3, 49, 32, 5, 0, '2020-07-29', '2020-08-03', '', 1, '2020-07-27 16:08:06', b'1', 1, '2020-07-24 16:27:41');
INSERT INTO `promotion` VALUES (2, 'High Season', 3, 48, 30, 5, 0, '2020-07-25', '2020-07-25', '', 1, '2020-07-25 10:02:08', b'1', 1, '2020-07-25 09:58:53');
INSERT INTO `promotion` VALUES (3, 'Chrismast', 3, 48, 30, 12, 0, '2020-07-26', '2020-08-04', '', 1, '2020-07-27 15:26:23', b'1', 1, '2020-07-25 10:09:47');
INSERT INTO `promotion` VALUES (4, 'High Season', 3, 48, 30, 10, 0, '2020-07-26', '2020-07-26', '', 1, '2020-07-26 11:02:42', b'1', 1, '2020-07-25 10:22:20');
COMMIT;

-- ----------------------------
-- Table structure for rate
-- ----------------------------
DROP TABLE IF EXISTS `rate`;
CREATE TABLE `rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `promotion` double(10,0) DEFAULT NULL,
  `promotion_type` int(11) DEFAULT NULL COMMENT '1= amount, 2= %',
  `rate_plan_id` int(11) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1= active, 0= inactive',
  `updated_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2034 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rate
-- ----------------------------
BEGIN;
INSERT INTO `rate` VALUES (559, 1000.00, 0, 0, 30, NULL, '2020-08-31', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (560, 1000.00, 0, 0, 30, NULL, '2020-08-30', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (561, 1000.00, 0, 0, 30, NULL, '2020-08-29', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (562, 1000.00, 0, 0, 30, NULL, '2020-08-28', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (563, 1000.00, 0, 0, 30, NULL, '2020-08-27', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (564, 1000.00, 0, 0, 30, NULL, '2020-08-26', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (565, 1000.00, 0, 0, 30, NULL, '2020-08-25', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (566, 1000.00, 0, 0, 30, NULL, '2020-08-24', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (567, 1000.00, 0, 0, 30, NULL, '2020-08-23', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (568, 1000.00, 0, 0, 30, NULL, '2020-08-22', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (569, 1000.00, 0, 0, 30, NULL, '2020-08-21', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (570, 1000.00, 0, 0, 30, NULL, '2020-08-20', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (571, 1000.00, 0, 0, 30, NULL, '2020-08-19', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (572, 1000.00, 0, 0, 30, NULL, '2020-08-18', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (573, 1000.00, 0, 0, 30, NULL, '2020-08-17', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (574, 1000.00, 0, 0, 30, NULL, '2020-08-16', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (575, 1000.00, 0, 0, 30, NULL, '2020-08-15', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (576, 1000.00, 0, 0, 30, NULL, '2020-08-14', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (577, 1000.00, 0, 0, 30, NULL, '2020-08-13', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (578, 1000.00, 0, 0, 30, NULL, '2020-08-12', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (579, 1000.00, 0, 0, 30, NULL, '2020-08-11', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (580, 1000.00, 0, 0, 30, NULL, '2020-08-10', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (581, 1000.00, 0, 0, 30, NULL, '2020-08-09', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (582, 1000.00, 0, 0, 30, NULL, '2020-08-08', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (584, 1000.00, 0, 0, 30, NULL, '2020-08-06', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (585, 1000.00, 0, 0, 30, NULL, '2020-08-05', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (589, 1000.00, 0, 1, 30, NULL, '2020-08-01', 1, 48, 1, '2020-07-09 17:56:54', NULL, NULL);
INSERT INTO `rate` VALUES (590, 500.00, 0, 0, 31, NULL, '2020-08-31', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (591, 500.00, 0, 0, 31, NULL, '2020-08-30', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (592, 500.00, 0, 0, 31, NULL, '2020-08-29', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (593, 500.00, 0, 0, 31, NULL, '2020-08-28', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (594, 500.00, 0, 0, 31, NULL, '2020-08-27', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (595, 500.00, 0, 0, 31, NULL, '2020-08-26', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (596, 500.00, 0, 0, 31, NULL, '2020-08-25', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (597, 500.00, 0, 0, 31, NULL, '2020-08-24', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (598, 500.00, 0, 0, 31, NULL, '2020-08-23', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (599, 500.00, 0, 0, 31, NULL, '2020-08-22', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (600, 500.00, 0, 0, 31, NULL, '2020-08-21', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (601, 500.00, 0, 0, 31, NULL, '2020-08-20', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (602, 500.00, 0, 0, 31, NULL, '2020-08-19', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (603, 500.00, 0, 0, 31, NULL, '2020-08-18', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (604, 500.00, 0, 0, 31, NULL, '2020-08-17', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (605, 500.00, 0, 0, 31, NULL, '2020-08-16', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (606, 500.00, 0, 0, 31, NULL, '2020-08-15', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (607, 500.00, 0, 0, 31, NULL, '2020-08-14', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (608, 500.00, 0, 0, 31, NULL, '2020-08-13', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (609, 500.00, 0, 0, 31, NULL, '2020-08-12', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (610, 500.00, 0, 0, 31, NULL, '2020-08-11', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (611, 500.00, 0, 0, 31, NULL, '2020-08-10', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (612, 500.00, 0, 0, 31, NULL, '2020-08-09', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (613, 500.00, 0, 0, 31, NULL, '2020-08-08', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (614, 500.00, 0, 0, 31, NULL, '2020-08-07', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (615, 500.00, 0, 0, 31, NULL, '2020-08-06', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (616, 500.00, 0, 0, 31, NULL, '2020-08-05', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (617, 500.00, 0, 0, 31, NULL, '2020-08-04', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (618, 500.00, 0, 0, 31, NULL, '2020-08-03', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (619, 500.00, 0, 0, 31, NULL, '2020-08-02', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (620, 500.00, 0, 0, 31, NULL, '2020-08-01', 1, 48, 1, '2020-07-09 17:57:03', NULL, NULL);
INSERT INTO `rate` VALUES (621, 1220.00, 0, 0, 32, NULL, '2020-08-31', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (622, 1220.00, 0, 0, 32, NULL, '2020-08-30', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (623, 1220.00, 0, 0, 32, NULL, '2020-08-29', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (624, 1220.00, 0, 0, 32, NULL, '2020-08-28', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (625, 1220.00, 0, 0, 32, NULL, '2020-08-27', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (626, 1220.00, 0, 0, 32, NULL, '2020-08-26', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (627, 1220.00, 0, 0, 32, NULL, '2020-08-25', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (628, 1220.00, 0, 0, 32, NULL, '2020-08-24', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (629, 1220.00, 0, 0, 32, NULL, '2020-08-23', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (630, 1220.00, 0, 0, 32, NULL, '2020-08-22', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (631, 1220.00, 0, 0, 32, NULL, '2020-08-21', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (632, 1220.00, 0, 0, 32, NULL, '2020-08-20', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (633, 1220.00, 0, 0, 32, NULL, '2020-08-19', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (634, 1220.00, 0, 0, 32, NULL, '2020-08-18', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (635, 1220.00, 0, 0, 32, NULL, '2020-08-17', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (636, 1220.00, 0, 0, 32, NULL, '2020-08-16', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (637, 1220.00, 0, 0, 32, NULL, '2020-08-15', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (638, 1220.00, 0, 0, 32, NULL, '2020-08-14', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (639, 1220.00, 0, 0, 32, NULL, '2020-08-13', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (640, 1220.00, 0, 0, 32, NULL, '2020-08-12', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (641, 1220.00, 0, 0, 32, NULL, '2020-08-11', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (642, 1220.00, 0, 0, 32, NULL, '2020-08-10', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (643, 1220.00, 0, 0, 32, NULL, '2020-08-09', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (644, 1220.00, 0, 0, 32, NULL, '2020-08-08', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (645, 1220.00, 0, 0, 32, NULL, '2020-08-07', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (646, 1220.00, 0, 0, 32, NULL, '2020-08-06', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (647, 1220.00, 0, 0, 32, NULL, '2020-08-05', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (648, 1220.00, 0, 0, 32, NULL, '2020-08-04', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (649, 1220.00, 0, 0, 32, NULL, '2020-08-03', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (650, 1220.00, 0, 0, 32, NULL, '2020-08-02', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (651, 1220.00, 0, 0, 32, NULL, '2020-08-01', 1, 49, 1, '2020-07-09 17:57:17', NULL, NULL);
INSERT INTO `rate` VALUES (652, 300.00, 0, 0, 33, NULL, '2020-08-31', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (653, 300.00, 0, 0, 33, NULL, '2020-08-30', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (654, 300.00, 0, 0, 33, NULL, '2020-08-29', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (655, 300.00, 0, 0, 33, NULL, '2020-08-28', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (656, 300.00, 0, 0, 33, NULL, '2020-08-27', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (657, 300.00, 0, 0, 33, NULL, '2020-08-26', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (658, 300.00, 0, 0, 33, NULL, '2020-08-25', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (659, 300.00, 0, 0, 33, NULL, '2020-08-24', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (660, 300.00, 0, 0, 33, NULL, '2020-08-23', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (661, 300.00, 0, 0, 33, NULL, '2020-08-22', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (662, 300.00, 0, 0, 33, NULL, '2020-08-21', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (663, 300.00, 0, 0, 33, NULL, '2020-08-20', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (664, 300.00, 0, 0, 33, NULL, '2020-08-19', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (665, 300.00, 0, 0, 33, NULL, '2020-08-18', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (666, 300.00, 0, 0, 33, NULL, '2020-08-17', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (667, 300.00, 0, 0, 33, NULL, '2020-08-16', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (668, 300.00, 0, 0, 33, NULL, '2020-08-15', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (669, 300.00, 0, 0, 33, NULL, '2020-08-14', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (670, 300.00, 0, 0, 33, NULL, '2020-08-13', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (671, 300.00, 0, 0, 33, NULL, '2020-08-12', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (672, 300.00, 0, 0, 33, NULL, '2020-08-11', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (673, 300.00, 0, 0, 33, NULL, '2020-08-10', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (674, 300.00, 0, 0, 33, NULL, '2020-08-09', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (675, 300.00, 0, 0, 33, NULL, '2020-08-08', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (676, 300.00, 0, 0, 33, NULL, '2020-08-07', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (677, 300.00, 0, 0, 33, NULL, '2020-08-06', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (678, 300.00, 0, 0, 33, NULL, '2020-08-05', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (679, 300.00, 0, 0, 33, NULL, '2020-08-04', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (680, 300.00, 0, 0, 33, NULL, '2020-08-03', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (681, 300.00, 0, 0, 33, NULL, '2020-08-02', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (682, 300.00, 0, 0, 33, NULL, '2020-08-01', 1, 49, 1, '2020-07-09 17:57:28', NULL, NULL);
INSERT INTO `rate` VALUES (683, 20.00, 0, 0, 34, NULL, '2020-07-31', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (684, 20.00, 0, 0, 34, NULL, '2020-07-30', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (685, 20.00, 0, 0, 34, NULL, '2020-07-29', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (686, 20.00, 0, 0, 34, NULL, '2020-07-28', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (687, 20.00, 0, 0, 34, NULL, '2020-07-27', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (688, 20.00, 0, 0, 34, NULL, '2020-07-26', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (689, 20.00, 0, 0, 34, NULL, '2020-07-25', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (690, 20.00, 0, 0, 34, NULL, '2020-07-24', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (691, 20.00, 0, 0, 34, NULL, '2020-07-23', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (692, 20.00, 0, 0, 34, NULL, '2020-07-22', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (693, 20.00, 0, 0, 34, NULL, '2020-07-21', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (694, 20.00, 0, 0, 34, NULL, '2020-07-20', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (695, 20.00, 0, 0, 34, NULL, '2020-07-19', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (696, 20.00, 0, 0, 34, NULL, '2020-07-18', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (697, 20.00, 0, 0, 34, NULL, '2020-07-17', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (698, 20.00, 0, 0, 34, NULL, '2020-07-16', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (699, 20.00, 0, 0, 34, NULL, '2020-07-15', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (700, 20.00, 0, 0, 34, NULL, '2020-07-14', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (701, 20.00, 0, 0, 34, NULL, '2020-07-13', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (702, 20.00, 0, 0, 34, NULL, '2020-07-12', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (703, 20.00, 0, 0, 34, NULL, '2020-07-11', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (704, 20.00, 0, 0, 34, NULL, '2020-07-10', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (705, 20.00, 0, 0, 34, NULL, '2020-07-09', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (706, 20.00, 0, 0, 34, NULL, '2020-07-08', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (707, 20.00, 0, 0, 34, NULL, '2020-07-07', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (708, 20.00, 0, 0, 34, NULL, '2020-07-06', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (709, 20.00, 0, 0, 34, NULL, '2020-07-05', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (710, 20.00, 0, 0, 34, NULL, '2020-07-04', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (711, 20.00, 0, 0, 34, NULL, '2020-07-03', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (712, 20.00, 0, 0, 34, NULL, '2020-07-02', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (713, 20.00, 0, 0, 34, NULL, '2020-07-01', 1, 50, 1, '2020-07-10 09:03:07', NULL, NULL);
INSERT INTO `rate` VALUES (745, 100.00, 0, 0, 36, NULL, '2020-07-31', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (746, 100.00, 0, 0, 36, NULL, '2020-07-30', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (747, 100.00, 0, 0, 36, NULL, '2020-07-29', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (748, 100.00, 0, 0, 36, NULL, '2020-07-28', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (749, 100.00, 0, 0, 36, NULL, '2020-07-27', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (750, 100.00, 0, 0, 36, NULL, '2020-07-26', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (751, 100.00, 0, 0, 36, NULL, '2020-07-25', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (752, 100.00, 0, 0, 36, NULL, '2020-07-24', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (753, 100.00, 0, 0, 36, NULL, '2020-07-23', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (754, 100.00, 0, 0, 36, NULL, '2020-07-22', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (755, 100.00, 0, 0, 36, NULL, '2020-07-21', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (756, 100.00, 0, 0, 36, NULL, '2020-07-20', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (757, 100.00, 0, 0, 36, NULL, '2020-07-19', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (758, 100.00, 0, 0, 36, NULL, '2020-07-18', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (759, 100.00, 0, 0, 36, NULL, '2020-07-17', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (760, 100.00, 0, 0, 36, NULL, '2020-07-16', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (761, 100.00, 0, 0, 36, NULL, '2020-07-15', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (762, 100.00, 0, 0, 36, NULL, '2020-07-14', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (763, 100.00, 0, 0, 36, NULL, '2020-07-13', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (764, 100.00, 0, 0, 36, NULL, '2020-07-12', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (765, 100.00, 0, 0, 36, NULL, '2020-07-11', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (766, 100.00, 0, 0, 36, NULL, '2020-07-10', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (767, 100.00, 0, 0, 36, NULL, '2020-07-09', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (768, 100.00, 0, 0, 36, NULL, '2020-07-08', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (769, 100.00, 0, 0, 36, NULL, '2020-07-07', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (770, 100.00, 0, 0, 36, NULL, '2020-07-06', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (771, 100.00, 0, 0, 36, NULL, '2020-07-05', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (772, 100.00, 0, 0, 36, NULL, '2020-07-04', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (773, 100.00, 0, 0, 36, NULL, '2020-07-03', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (774, 100.00, 0, 0, 36, NULL, '2020-07-02', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (775, 100.00, 0, 0, 36, NULL, '2020-07-01', 1, 52, 1, '2020-07-10 09:04:02', NULL, NULL);
INSERT INTO `rate` VALUES (776, 100.00, 0, 0, 37, NULL, '2020-07-31', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (777, 100.00, 0, 0, 37, NULL, '2020-07-30', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (778, 100.00, 0, 0, 37, NULL, '2020-07-29', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (779, 100.00, 0, 0, 37, NULL, '2020-07-28', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (780, 100.00, 0, 0, 37, NULL, '2020-07-27', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (781, 100.00, 0, 0, 37, NULL, '2020-07-26', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (782, 100.00, 0, 0, 37, NULL, '2020-07-25', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (783, 100.00, 0, 0, 37, NULL, '2020-07-24', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (784, 100.00, 0, 0, 37, NULL, '2020-07-23', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (785, 100.00, 0, 0, 37, NULL, '2020-07-22', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (786, 100.00, 0, 0, 37, NULL, '2020-07-21', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (787, 100.00, 0, 0, 37, NULL, '2020-07-20', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (788, 100.00, 0, 0, 37, NULL, '2020-07-19', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (789, 100.00, 0, 0, 37, NULL, '2020-07-18', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (790, 100.00, 0, 0, 37, NULL, '2020-07-17', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (791, 100.00, 0, 0, 37, NULL, '2020-07-16', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (792, 100.00, 0, 0, 37, NULL, '2020-07-15', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (793, 100.00, 0, 0, 37, NULL, '2020-07-14', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (794, 100.00, 0, 0, 37, NULL, '2020-07-13', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (795, 100.00, 0, 0, 37, NULL, '2020-07-12', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (796, 100.00, 0, 0, 37, NULL, '2020-07-11', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (797, 100.00, 0, 0, 37, NULL, '2020-07-10', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (798, 100.00, 0, 0, 37, NULL, '2020-07-09', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (799, 100.00, 0, 0, 37, NULL, '2020-07-08', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (800, 100.00, 0, 0, 37, NULL, '2020-07-07', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (801, 100.00, 0, 0, 37, NULL, '2020-07-06', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (802, 100.00, 0, 0, 37, NULL, '2020-07-05', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (803, 100.00, 0, 0, 37, NULL, '2020-07-04', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (804, 100.00, 0, 0, 37, NULL, '2020-07-03', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (805, 100.00, 0, 0, 37, NULL, '2020-07-02', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (806, 100.00, 0, 0, 37, NULL, '2020-07-01', 1, 53, 1, '2020-07-10 09:04:42', NULL, NULL);
INSERT INTO `rate` VALUES (807, 400.00, 0, 0, 38, NULL, '2020-07-31', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (808, 400.00, 0, 0, 38, NULL, '2020-07-30', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (809, 400.00, 0, 0, 38, NULL, '2020-07-29', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (810, 400.00, 0, 0, 38, NULL, '2020-07-28', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (811, 400.00, 0, 0, 38, NULL, '2020-07-27', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (812, 400.00, 0, 0, 38, NULL, '2020-07-26', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (813, 400.00, 0, 0, 38, NULL, '2020-07-25', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (814, 400.00, 0, 0, 38, NULL, '2020-07-24', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (815, 400.00, 0, 0, 38, NULL, '2020-07-23', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (816, 400.00, 0, 0, 38, NULL, '2020-07-22', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (817, 400.00, 0, 0, 38, NULL, '2020-07-21', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (818, 400.00, 0, 0, 38, NULL, '2020-07-20', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (819, 400.00, 0, 0, 38, NULL, '2020-07-19', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (820, 400.00, 0, 0, 38, NULL, '2020-07-18', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (821, 400.00, 0, 0, 38, NULL, '2020-07-17', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (822, 400.00, 0, 0, 38, NULL, '2020-07-16', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (823, 400.00, 0, 0, 38, NULL, '2020-07-15', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (824, 400.00, 0, 0, 38, NULL, '2020-07-14', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (825, 400.00, 0, 0, 38, NULL, '2020-07-13', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (826, 400.00, 0, 0, 38, NULL, '2020-07-12', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (827, 400.00, 0, 0, 38, NULL, '2020-07-11', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (828, 400.00, 0, 0, 38, NULL, '2020-07-10', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (829, 400.00, 0, 0, 38, NULL, '2020-07-09', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (830, 400.00, 0, 0, 38, NULL, '2020-07-08', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (831, 400.00, 0, 0, 38, NULL, '2020-07-07', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (832, 400.00, 0, 0, 38, NULL, '2020-07-06', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (833, 400.00, 0, 0, 38, NULL, '2020-07-05', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (834, 400.00, 0, 0, 38, NULL, '2020-07-04', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (835, 400.00, 0, 0, 38, NULL, '2020-07-03', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (836, 400.00, 0, 0, 38, NULL, '2020-07-02', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (837, 400.00, 0, 0, 38, NULL, '2020-07-01', 1, 54, 1, '2020-07-10 09:05:00', NULL, NULL);
INSERT INTO `rate` VALUES (838, 300.00, 0, 0, 39, NULL, '2020-07-31', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (839, 300.00, 0, 0, 39, NULL, '2020-07-30', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (840, 300.00, 0, 0, 39, NULL, '2020-07-29', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (841, 300.00, 0, 0, 39, NULL, '2020-07-28', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (842, 300.00, 0, 0, 39, NULL, '2020-07-27', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (843, 300.00, 0, 0, 39, NULL, '2020-07-26', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (844, 300.00, 0, 0, 39, NULL, '2020-07-25', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (845, 300.00, 0, 0, 39, NULL, '2020-07-24', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (846, 300.00, 0, 0, 39, NULL, '2020-07-23', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (847, 300.00, 0, 0, 39, NULL, '2020-07-22', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (848, 300.00, 0, 0, 39, NULL, '2020-07-21', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (849, 300.00, 0, 0, 39, NULL, '2020-07-20', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (850, 300.00, 0, 0, 39, NULL, '2020-07-19', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (851, 300.00, 0, 0, 39, NULL, '2020-07-18', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (852, 300.00, 0, 0, 39, NULL, '2020-07-17', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (853, 300.00, 0, 0, 39, NULL, '2020-07-16', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (854, 300.00, 0, 0, 39, NULL, '2020-07-15', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (855, 300.00, 0, 0, 39, NULL, '2020-07-14', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (856, 300.00, 0, 0, 39, NULL, '2020-07-13', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (857, 300.00, 0, 0, 39, NULL, '2020-07-12', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (858, 300.00, 0, 0, 39, NULL, '2020-07-11', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (859, 300.00, 0, 0, 39, NULL, '2020-07-10', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (860, 300.00, 0, 0, 39, NULL, '2020-07-09', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (861, 300.00, 0, 0, 39, NULL, '2020-07-08', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (862, 300.00, 0, 0, 39, NULL, '2020-07-07', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (863, 300.00, 0, 0, 39, NULL, '2020-07-06', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (864, 300.00, 0, 0, 39, NULL, '2020-07-05', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (865, 300.00, 0, 0, 39, NULL, '2020-07-04', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (866, 300.00, 0, 0, 39, NULL, '2020-07-03', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (867, 300.00, 0, 0, 39, NULL, '2020-07-02', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (868, 300.00, 0, 0, 39, NULL, '2020-07-01', 1, 55, 1, '2020-07-10 09:05:15', NULL, NULL);
INSERT INTO `rate` VALUES (869, 1000.00, 0, 0, 34, NULL, '2020-08-31', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (870, 1000.00, 0, 0, 34, NULL, '2020-08-30', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (871, 1000.00, 0, 0, 34, NULL, '2020-08-29', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (872, 1000.00, 0, 0, 34, NULL, '2020-08-28', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (873, 1000.00, 0, 0, 34, NULL, '2020-08-27', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (874, 1000.00, 0, 0, 34, NULL, '2020-08-26', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (875, 1000.00, 0, 0, 34, NULL, '2020-08-25', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (876, 1000.00, 0, 0, 34, NULL, '2020-08-24', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (877, 1000.00, 0, 0, 34, NULL, '2020-08-23', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (878, 1000.00, 0, 0, 34, NULL, '2020-08-22', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (879, 1000.00, 0, 0, 34, NULL, '2020-08-21', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (880, 1000.00, 0, 0, 34, NULL, '2020-08-20', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (881, 1000.00, 0, 0, 34, NULL, '2020-08-19', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (882, 1000.00, 0, 0, 34, NULL, '2020-08-18', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (883, 1000.00, 0, 0, 34, NULL, '2020-08-17', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (884, 1000.00, 0, 0, 34, NULL, '2020-08-16', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (885, 1000.00, 0, 0, 34, NULL, '2020-08-15', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (886, 1000.00, 0, 0, 34, NULL, '2020-08-14', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (887, 1000.00, 0, 0, 34, NULL, '2020-08-13', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (888, 1000.00, 0, 0, 34, NULL, '2020-08-12', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (889, 1000.00, 0, 0, 34, NULL, '2020-08-11', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (890, 1000.00, 0, 0, 34, NULL, '2020-08-10', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (891, 1000.00, 0, 0, 34, NULL, '2020-08-09', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (892, 1000.00, 0, 0, 34, NULL, '2020-08-08', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (893, 1000.00, 0, 0, 34, NULL, '2020-08-07', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (894, 1000.00, 0, 0, 34, NULL, '2020-08-06', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (895, 1000.00, 0, 0, 34, NULL, '2020-08-05', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (896, 1000.00, 0, 0, 34, NULL, '2020-08-04', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (897, 1000.00, 0, 0, 34, NULL, '2020-08-03', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (898, 1000.00, 0, 0, 34, NULL, '2020-08-02', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (899, 1000.00, 0, 0, 34, NULL, '2020-08-01', 1, 50, 1, '2020-07-10 09:12:07', NULL, NULL);
INSERT INTO `rate` VALUES (900, 1220.00, 0, 0, 35, NULL, '2020-08-31', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (901, 1220.00, 0, 0, 35, NULL, '2020-08-30', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (902, 1220.00, 0, 0, 35, NULL, '2020-08-29', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (903, 1220.00, 0, 0, 35, NULL, '2020-08-28', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (904, 1220.00, 0, 0, 35, NULL, '2020-08-27', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (905, 1220.00, 0, 0, 35, NULL, '2020-08-26', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (906, 1220.00, 0, 0, 35, NULL, '2020-08-25', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (907, 1220.00, 0, 0, 35, NULL, '2020-08-24', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (908, 1220.00, 0, 0, 35, NULL, '2020-08-23', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (909, 1220.00, 0, 0, 35, NULL, '2020-08-22', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (910, 1220.00, 0, 0, 35, NULL, '2020-08-21', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (911, 1220.00, 0, 0, 35, NULL, '2020-08-20', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (912, 1220.00, 0, 0, 35, NULL, '2020-08-19', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (913, 1220.00, 0, 0, 35, NULL, '2020-08-18', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (914, 1220.00, 0, 0, 35, NULL, '2020-08-17', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (915, 1220.00, 0, 0, 35, NULL, '2020-08-16', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (916, 1220.00, 0, 0, 35, NULL, '2020-08-15', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (917, 1220.00, 0, 0, 35, NULL, '2020-08-14', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (918, 1220.00, 0, 0, 35, NULL, '2020-08-13', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (919, 1220.00, 0, 0, 35, NULL, '2020-08-12', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (920, 1220.00, 0, 0, 35, NULL, '2020-08-11', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (921, 1220.00, 0, 0, 35, NULL, '2020-08-10', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (922, 1220.00, 0, 0, 35, NULL, '2020-08-09', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (923, 1220.00, 0, 0, 35, NULL, '2020-08-08', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (924, 1220.00, 0, 0, 35, NULL, '2020-08-07', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (925, 1220.00, 0, 0, 35, NULL, '2020-08-06', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (926, 1220.00, 0, 0, 35, NULL, '2020-08-05', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (927, 1220.00, 0, 0, 35, NULL, '2020-08-04', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (928, 1220.00, 0, 0, 35, NULL, '2020-08-03', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (929, 1220.00, 0, 0, 35, NULL, '2020-08-02', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (930, 1220.00, 0, 0, 35, NULL, '2020-08-01', 1, 51, 1, '2020-07-10 09:12:16', NULL, NULL);
INSERT INTO `rate` VALUES (931, 40.00, 0, 0, 36, NULL, '2020-08-31', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (932, 40.00, 0, 0, 36, NULL, '2020-08-30', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (933, 40.00, 0, 0, 36, NULL, '2020-08-29', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (934, 40.00, 0, 0, 36, NULL, '2020-08-28', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (935, 40.00, 0, 0, 36, NULL, '2020-08-27', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (936, 40.00, 0, 0, 36, NULL, '2020-08-26', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (937, 40.00, 0, 0, 36, NULL, '2020-08-25', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (938, 40.00, 0, 0, 36, NULL, '2020-08-24', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (939, 40.00, 0, 0, 36, NULL, '2020-08-23', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (940, 40.00, 0, 0, 36, NULL, '2020-08-22', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (941, 40.00, 0, 0, 36, NULL, '2020-08-21', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (942, 40.00, 0, 0, 36, NULL, '2020-08-20', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (943, 40.00, 0, 0, 36, NULL, '2020-08-19', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (944, 40.00, 0, 0, 36, NULL, '2020-08-18', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (945, 40.00, 0, 0, 36, NULL, '2020-08-17', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (946, 40.00, 0, 0, 36, NULL, '2020-08-16', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (947, 40.00, 0, 0, 36, NULL, '2020-08-15', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (948, 40.00, 0, 0, 36, NULL, '2020-08-14', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (949, 40.00, 0, 0, 36, NULL, '2020-08-13', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (950, 40.00, 0, 0, 36, NULL, '2020-08-12', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (951, 40.00, 0, 0, 36, NULL, '2020-08-11', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (952, 40.00, 0, 0, 36, NULL, '2020-08-10', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (953, 40.00, 0, 0, 36, NULL, '2020-08-09', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (954, 40.00, 0, 0, 36, NULL, '2020-08-08', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (955, 40.00, 0, 0, 36, NULL, '2020-08-07', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (956, 40.00, 0, 0, 36, NULL, '2020-08-06', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (957, 40.00, 0, 0, 36, NULL, '2020-08-05', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (958, 40.00, 0, 0, 36, NULL, '2020-08-04', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (959, 40.00, 0, 0, 36, NULL, '2020-08-03', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (960, 40.00, 0, 0, 36, NULL, '2020-08-02', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (961, 40.00, 0, 0, 36, NULL, '2020-08-01', 1, 52, 1, '2020-07-10 09:12:25', NULL, NULL);
INSERT INTO `rate` VALUES (962, 1000.00, 0, 0, 37, NULL, '2020-08-31', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (963, 1000.00, 0, 0, 37, NULL, '2020-08-30', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (964, 1000.00, 0, 0, 37, NULL, '2020-08-29', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (965, 1000.00, 0, 0, 37, NULL, '2020-08-28', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (966, 1000.00, 0, 0, 37, NULL, '2020-08-27', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (967, 1000.00, 0, 0, 37, NULL, '2020-08-26', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (968, 1000.00, 0, 0, 37, NULL, '2020-08-25', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (969, 1000.00, 0, 0, 37, NULL, '2020-08-24', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (970, 1000.00, 0, 0, 37, NULL, '2020-08-23', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (971, 1000.00, 0, 0, 37, NULL, '2020-08-22', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (972, 1000.00, 0, 0, 37, NULL, '2020-08-21', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (973, 1000.00, 0, 0, 37, NULL, '2020-08-20', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (974, 1000.00, 0, 0, 37, NULL, '2020-08-19', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (975, 1000.00, 0, 0, 37, NULL, '2020-08-18', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (976, 1000.00, 0, 0, 37, NULL, '2020-08-17', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (977, 1000.00, 0, 0, 37, NULL, '2020-08-16', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (978, 1000.00, 0, 0, 37, NULL, '2020-08-15', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (979, 1000.00, 0, 0, 37, NULL, '2020-08-14', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (980, 1000.00, 0, 0, 37, NULL, '2020-08-13', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (981, 1000.00, 0, 0, 37, NULL, '2020-08-12', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (982, 1000.00, 0, 0, 37, NULL, '2020-08-11', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (983, 1000.00, 0, 0, 37, NULL, '2020-08-10', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (984, 1000.00, 0, 0, 37, NULL, '2020-08-09', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (985, 1000.00, 0, 0, 37, NULL, '2020-08-08', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (986, 1000.00, 0, 0, 37, NULL, '2020-08-07', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (987, 1000.00, 0, 0, 37, NULL, '2020-08-06', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (988, 1000.00, 0, 0, 37, NULL, '2020-08-05', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (989, 1000.00, 0, 0, 37, NULL, '2020-08-04', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (990, 1000.00, 0, 0, 37, NULL, '2020-08-03', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (991, 1000.00, 0, 0, 37, NULL, '2020-08-02', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (992, 1000.00, 0, 0, 37, NULL, '2020-08-01', 1, 53, 1, '2020-07-10 09:12:39', NULL, NULL);
INSERT INTO `rate` VALUES (993, 1220.00, 0, 0, 38, NULL, '2020-08-31', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (994, 1220.00, 0, 0, 38, NULL, '2020-08-30', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (995, 1220.00, 0, 0, 38, NULL, '2020-08-29', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (996, 1220.00, 0, 0, 38, NULL, '2020-08-28', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (997, 1220.00, 0, 0, 38, NULL, '2020-08-27', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (998, 1220.00, 0, 0, 38, NULL, '2020-08-26', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (999, 1220.00, 0, 0, 38, NULL, '2020-08-25', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1000, 1220.00, 0, 0, 38, NULL, '2020-08-24', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1001, 1220.00, 0, 0, 38, NULL, '2020-08-23', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1002, 1220.00, 0, 0, 38, NULL, '2020-08-22', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1003, 1220.00, 0, 0, 38, NULL, '2020-08-21', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1004, 1220.00, 0, 0, 38, NULL, '2020-08-20', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1005, 1220.00, 0, 0, 38, NULL, '2020-08-19', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1006, 1220.00, 0, 0, 38, NULL, '2020-08-18', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1007, 1220.00, 0, 0, 38, NULL, '2020-08-17', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1008, 1220.00, 0, 0, 38, NULL, '2020-08-16', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1009, 1220.00, 0, 0, 38, NULL, '2020-08-15', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1010, 1220.00, 0, 0, 38, NULL, '2020-08-14', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1011, 1220.00, 0, 0, 38, NULL, '2020-08-13', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1012, 1220.00, 0, 0, 38, NULL, '2020-08-12', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1013, 1220.00, 0, 0, 38, NULL, '2020-08-11', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1014, 1220.00, 0, 0, 38, NULL, '2020-08-10', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1015, 1220.00, 0, 0, 38, NULL, '2020-08-09', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1016, 1220.00, 0, 0, 38, NULL, '2020-08-08', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1017, 1220.00, 0, 0, 38, NULL, '2020-08-07', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1018, 1220.00, 0, 0, 38, NULL, '2020-08-06', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1019, 1220.00, 0, 0, 38, NULL, '2020-08-05', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1020, 1220.00, 0, 0, 38, NULL, '2020-08-04', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1021, 1220.00, 0, 0, 38, NULL, '2020-08-03', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1022, 1220.00, 0, 0, 38, NULL, '2020-08-02', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1023, 1220.00, 0, 0, 38, NULL, '2020-08-01', 1, 54, 1, '2020-07-10 09:12:58', NULL, NULL);
INSERT INTO `rate` VALUES (1024, 1220.00, 0, 0, 39, NULL, '2020-08-31', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1025, 1220.00, 0, 0, 39, NULL, '2020-08-30', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1026, 1220.00, 0, 0, 39, NULL, '2020-08-29', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1027, 1220.00, 0, 0, 39, NULL, '2020-08-28', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1028, 1220.00, 0, 0, 39, NULL, '2020-08-27', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1029, 1220.00, 0, 0, 39, NULL, '2020-08-26', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1030, 1220.00, 0, 0, 39, NULL, '2020-08-25', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1031, 1220.00, 0, 0, 39, NULL, '2020-08-24', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1032, 1220.00, 0, 0, 39, NULL, '2020-08-23', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1033, 1220.00, 0, 0, 39, NULL, '2020-08-22', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1034, 1220.00, 0, 0, 39, NULL, '2020-08-21', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1035, 1220.00, 0, 0, 39, NULL, '2020-08-20', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1036, 1220.00, 0, 0, 39, NULL, '2020-08-19', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1037, 1220.00, 0, 0, 39, NULL, '2020-08-18', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1038, 1220.00, 0, 0, 39, NULL, '2020-08-17', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1039, 1220.00, 0, 0, 39, NULL, '2020-08-16', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1040, 1220.00, 0, 0, 39, NULL, '2020-08-15', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1041, 1220.00, 0, 0, 39, NULL, '2020-08-14', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1042, 1220.00, 0, 0, 39, NULL, '2020-08-13', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1043, 1220.00, 0, 0, 39, NULL, '2020-08-12', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1044, 1220.00, 0, 0, 39, NULL, '2020-08-11', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1045, 1220.00, 0, 0, 39, NULL, '2020-08-10', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1046, 1220.00, 0, 0, 39, NULL, '2020-08-09', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1047, 1220.00, 0, 0, 39, NULL, '2020-08-08', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1048, 1220.00, 0, 0, 39, NULL, '2020-08-07', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1049, 1220.00, 0, 0, 39, NULL, '2020-08-06', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1050, 1220.00, 0, 0, 39, NULL, '2020-08-05', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1051, 1220.00, 0, 0, 39, NULL, '2020-08-04', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1052, 1220.00, 0, 0, 39, NULL, '2020-08-03', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1053, 1220.00, 0, 0, 39, NULL, '2020-08-02', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1054, 1220.00, 0, 0, 39, NULL, '2020-08-01', 1, 55, 1, '2020-07-10 09:13:12', NULL, NULL);
INSERT INTO `rate` VALUES (1180, 400.00, 0, 0, 35, NULL, '2020-07-31', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1181, 400.00, 0, 0, 35, NULL, '2020-07-30', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1182, 400.00, 0, 0, 35, NULL, '2020-07-29', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1183, 400.00, 0, 0, 35, NULL, '2020-07-28', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1184, 400.00, 0, 0, 35, NULL, '2020-07-27', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1185, 400.00, 0, 0, 35, NULL, '2020-07-26', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1186, 400.00, 0, 0, 35, NULL, '2020-07-25', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1187, 400.00, 0, 0, 35, NULL, '2020-07-24', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1188, 400.00, 0, 0, 35, NULL, '2020-07-23', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1189, 400.00, 0, 0, 35, NULL, '2020-07-22', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1190, 400.00, 0, 0, 35, NULL, '2020-07-21', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1191, 400.00, 0, 0, 35, NULL, '2020-07-20', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1192, 400.00, 0, 0, 35, NULL, '2020-07-19', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1193, 400.00, 0, 0, 35, NULL, '2020-07-18', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1194, 400.00, 0, 0, 35, NULL, '2020-07-17', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1195, 400.00, 0, 0, 35, NULL, '2020-07-16', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1196, 400.00, 0, 0, 35, NULL, '2020-07-15', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1197, 400.00, 0, 0, 35, NULL, '2020-07-14', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1198, 400.00, 0, 0, 35, NULL, '2020-07-13', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1199, 400.00, 0, 0, 35, NULL, '2020-07-12', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1200, 400.00, 0, 0, 35, NULL, '2020-07-11', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1201, 400.00, 0, 0, 35, NULL, '2020-07-10', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1202, 400.00, 0, 0, 35, NULL, '2020-07-09', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1203, 400.00, 0, 0, 35, NULL, '2020-07-08', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1204, 400.00, 0, 0, 35, NULL, '2020-07-07', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1205, 400.00, 0, 0, 35, NULL, '2020-07-06', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1206, 400.00, 0, 0, 35, NULL, '2020-07-05', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1207, 400.00, 0, 0, 35, NULL, '2020-07-04', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1208, 400.00, 0, 0, 35, NULL, '2020-07-03', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1209, 400.00, 0, 0, 35, NULL, '2020-07-02', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1210, 400.00, 0, 0, 35, NULL, '2020-07-01', 1, 51, 1, '2020-07-10 09:35:15', NULL, NULL);
INSERT INTO `rate` VALUES (1273, 5.00, 0, 0, 30, NULL, '2021-08-31', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1274, 5.00, 0, 0, 30, NULL, '2021-08-30', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1275, 5.00, 0, 0, 30, NULL, '2021-08-29', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1276, 5.00, 0, 0, 30, NULL, '2021-08-28', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1277, 5.00, 0, 0, 30, NULL, '2021-08-27', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1278, 5.00, 0, 0, 30, NULL, '2021-08-26', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1279, 5.00, 0, 0, 30, NULL, '2021-08-25', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1280, 5.00, 0, 0, 30, NULL, '2021-08-24', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1281, 5.00, 0, 0, 30, NULL, '2021-08-23', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1282, 5.00, 0, 0, 30, NULL, '2021-08-22', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1283, 5.00, 0, 0, 30, NULL, '2021-08-21', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1284, 5.00, 0, 0, 30, NULL, '2021-08-20', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1285, 5.00, 0, 0, 30, NULL, '2021-08-19', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1286, 5.00, 0, 0, 30, NULL, '2021-08-18', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1287, 5.00, 0, 0, 30, NULL, '2021-08-17', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1288, 5.00, 0, 0, 30, NULL, '2021-08-16', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1289, 5.00, 0, 0, 30, NULL, '2021-08-15', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1290, 5.00, 0, 0, 30, NULL, '2021-08-14', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1291, 5.00, 0, 0, 30, NULL, '2021-08-13', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1292, 5.00, 0, 0, 30, NULL, '2021-08-12', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1293, 5.00, 0, 0, 30, NULL, '2021-08-11', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1294, 5.00, 0, 0, 30, NULL, '2021-08-10', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1295, 5.00, 0, 0, 30, NULL, '2021-08-09', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1296, 5.00, 0, 0, 30, NULL, '2021-08-08', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1297, 5.00, 0, 0, 30, NULL, '2021-08-07', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1298, 5.00, 0, 0, 30, NULL, '2021-08-06', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1299, 5.00, 0, 0, 30, NULL, '2021-08-05', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1300, 5.00, 0, 0, 30, NULL, '2021-08-04', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1301, 5.00, 0, 0, 30, NULL, '2021-08-03', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1302, 5.00, 0, 0, 30, NULL, '2021-08-02', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1303, 5.00, 0, 0, 30, NULL, '2021-08-01', 1, 48, 1, '2020-07-11 08:49:16', NULL, NULL);
INSERT INTO `rate` VALUES (1554, 2.00, 0, 0, 31, NULL, '2020-07-31', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1555, 2.00, 0, 0, 31, NULL, '2020-07-30', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1556, 2.00, 0, 0, 31, NULL, '2020-07-29', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1557, 2.00, 0, 0, 31, NULL, '2020-07-28', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1558, 2.00, 0, 0, 31, NULL, '2020-07-27', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1559, 2.00, 0, 0, 31, NULL, '2020-07-26', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1560, 2.00, 0, 0, 31, NULL, '2020-07-25', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1561, 2.00, 0, 0, 31, NULL, '2020-07-24', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1562, 2.00, 0, 0, 31, NULL, '2020-07-23', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1563, 2.00, 0, 0, 31, NULL, '2020-07-22', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1564, 2.00, 0, 0, 31, NULL, '2020-07-21', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1565, 2.00, 0, 0, 31, NULL, '2020-07-20', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1566, 2.00, 0, 0, 31, NULL, '2020-07-19', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1567, 2.00, 0, 0, 31, NULL, '2020-07-18', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1568, 2.00, 0, 0, 31, NULL, '2020-07-17', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1569, 2.00, 0, 0, 31, NULL, '2020-07-16', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1570, 2.00, 0, 0, 31, NULL, '2020-07-15', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1571, 2.00, 0, 0, 31, NULL, '2020-07-14', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1572, 2.00, 0, 0, 31, NULL, '2020-07-13', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1573, 2.00, 0, 0, 31, NULL, '2020-07-12', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1574, 2.00, 0, 0, 31, NULL, '2020-07-11', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1575, 2.00, 0, 0, 31, NULL, '2020-07-10', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1576, 2.00, 0, 0, 31, NULL, '2020-07-09', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1577, 2.00, 0, 0, 31, NULL, '2020-07-08', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1578, 2.00, 0, 0, 31, NULL, '2020-07-07', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1579, 2.00, 0, 0, 31, NULL, '2020-07-06', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1580, 2.00, 0, 0, 31, NULL, '2020-07-05', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1581, 2.00, 0, 0, 31, NULL, '2020-07-04', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1582, 2.00, 0, 0, 31, NULL, '2020-07-03', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1583, 2.00, 0, 0, 31, NULL, '2020-07-02', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1584, 2.00, 0, 0, 31, NULL, '2020-07-01', 1, 48, 1, '2020-07-11 17:17:15', NULL, NULL);
INSERT INTO `rate` VALUES (1585, 3000.00, 0, 0, 32, NULL, '2020-07-31', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1586, 3000.00, 0, 0, 32, NULL, '2020-07-30', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1587, 3000.00, 0, 0, 32, NULL, '2020-07-29', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1588, 3000.00, 0, 0, 32, NULL, '2020-07-28', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1589, 3000.00, 0, 0, 32, NULL, '2020-07-27', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1590, 3000.00, 0, 0, 32, NULL, '2020-07-26', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1591, 3000.00, 0, 0, 32, NULL, '2020-07-25', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1592, 3000.00, 0, 0, 32, NULL, '2020-07-24', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1593, 3000.00, 0, 0, 32, NULL, '2020-07-23', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1594, 3000.00, 0, 0, 32, NULL, '2020-07-22', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1595, 3000.00, 0, 1, 32, NULL, '2020-07-21', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1596, 3000.00, 0, 0, 32, NULL, '2020-07-20', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1597, 3000.00, 0, 0, 32, NULL, '2020-07-19', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1598, 3000.00, 0, 0, 32, NULL, '2020-07-18', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1599, 3000.00, 0, 0, 32, NULL, '2020-07-17', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1600, 3000.00, 0, 0, 32, NULL, '2020-07-16', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1601, 3000.00, 0, 0, 32, NULL, '2020-07-15', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1602, 3000.00, 0, 0, 32, NULL, '2020-07-14', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1603, 3000.00, 0, 0, 32, NULL, '2020-07-13', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1604, 3000.00, 0, 0, 32, NULL, '2020-07-12', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1605, 3000.00, 0, 0, 32, NULL, '2020-07-11', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1606, 3000.00, 0, 0, 32, NULL, '2020-07-10', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1607, 3000.00, 0, 0, 32, NULL, '2020-07-09', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1608, 3000.00, 0, 0, 32, NULL, '2020-07-08', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1609, 3000.00, 0, 0, 32, NULL, '2020-07-07', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1610, 3000.00, 0, 0, 32, NULL, '2020-07-06', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1611, 3000.00, 0, 0, 32, NULL, '2020-07-05', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1612, 3000.00, 0, 0, 32, NULL, '2020-07-04', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1613, 3000.00, 0, 0, 32, NULL, '2020-07-03', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1614, 3000.00, 0, 0, 32, NULL, '2020-07-02', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1615, 3000.00, 0, 0, 32, NULL, '2020-07-01', 1, 49, 1, '2020-07-12 22:44:02', NULL, NULL);
INSERT INTO `rate` VALUES (1616, 500.00, 0, 0, 33, NULL, '2020-07-31', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1617, 500.00, 0, 0, 33, NULL, '2020-07-30', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1618, 500.00, 0, 0, 33, NULL, '2020-07-29', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1619, 500.00, 0, 0, 33, NULL, '2020-07-28', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1620, 500.00, 0, 0, 33, NULL, '2020-07-27', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1621, 500.00, 0, 0, 33, NULL, '2020-07-26', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1622, 500.00, 0, 0, 33, NULL, '2020-07-25', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1623, 500.00, 0, 0, 33, NULL, '2020-07-24', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1624, 500.00, 0, 0, 33, NULL, '2020-07-23', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1625, 500.00, 0, 0, 33, NULL, '2020-07-22', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1626, 500.00, 0, 0, 33, NULL, '2020-07-21', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1627, 500.00, 0, 0, 33, NULL, '2020-07-20', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1628, 500.00, 0, 0, 33, NULL, '2020-07-19', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1629, 500.00, 0, 0, 33, NULL, '2020-07-18', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1630, 500.00, 0, 0, 33, NULL, '2020-07-17', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1631, 500.00, 0, 0, 33, NULL, '2020-07-16', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1632, 500.00, 0, 0, 33, NULL, '2020-07-15', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1633, 500.00, 0, 0, 33, NULL, '2020-07-14', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1634, 500.00, 0, 0, 33, NULL, '2020-07-13', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1635, 500.00, 0, 0, 33, NULL, '2020-07-12', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1636, 500.00, 0, 0, 33, NULL, '2020-07-11', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1637, 500.00, 0, 0, 33, NULL, '2020-07-10', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1638, 500.00, 0, 0, 33, NULL, '2020-07-09', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1639, 500.00, 0, 0, 33, NULL, '2020-07-08', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1640, 500.00, 0, 0, 33, NULL, '2020-07-07', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1641, 500.00, 0, 0, 33, NULL, '2020-07-06', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1642, 500.00, 0, 0, 33, NULL, '2020-07-05', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1643, 500.00, 0, 0, 33, NULL, '2020-07-04', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1644, 500.00, 0, 0, 33, NULL, '2020-07-03', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1645, 500.00, 0, 0, 33, NULL, '2020-07-02', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1646, 500.00, 0, 0, 33, NULL, '2020-07-01', 1, 49, 1, '2020-07-12 22:44:17', NULL, NULL);
INSERT INTO `rate` VALUES (1710, 500.00, 0, 0, 31, NULL, '2021-01-31', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1711, 500.00, 0, 0, 31, NULL, '2021-01-30', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1712, 500.00, 0, 0, 31, NULL, '2021-01-29', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1713, 500.00, 0, 0, 31, NULL, '2021-01-28', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1714, 500.00, 0, 0, 31, NULL, '2021-01-27', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1715, 500.00, 0, 0, 31, NULL, '2021-01-26', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1716, 500.00, 0, 0, 31, NULL, '2021-01-25', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1717, 500.00, 0, 0, 31, NULL, '2021-01-24', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1718, 500.00, 0, 0, 31, NULL, '2021-01-23', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1719, 500.00, 0, 0, 31, NULL, '2021-01-22', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1720, 500.00, 0, 0, 31, NULL, '2021-01-21', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1721, 500.00, 0, 0, 31, NULL, '2021-01-20', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1722, 500.00, 0, 0, 31, NULL, '2021-01-19', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1723, 500.00, 0, 0, 31, NULL, '2021-01-18', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1724, 500.00, 0, 0, 31, NULL, '2021-01-17', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1725, 500.00, 0, 0, 31, NULL, '2021-01-16', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1726, 500.00, 0, 0, 31, NULL, '2021-01-15', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1727, 500.00, 0, 0, 31, NULL, '2021-01-14', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1728, 500.00, 0, 0, 31, NULL, '2021-01-13', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1729, 500.00, 0, 0, 31, NULL, '2021-01-12', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1730, 500.00, 0, 0, 31, NULL, '2021-01-11', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1731, 500.00, 0, 0, 31, NULL, '2021-01-10', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1732, 500.00, 0, 0, 31, NULL, '2021-01-09', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1733, 500.00, 0, 0, 31, NULL, '2021-01-08', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1734, 500.00, 0, 0, 31, NULL, '2021-01-07', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1735, 500.00, 0, 0, 31, NULL, '2021-01-06', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1736, 500.00, 0, 0, 31, NULL, '2021-01-05', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1737, 500.00, 0, 0, 31, NULL, '2021-01-04', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1738, 500.00, 0, 0, 31, NULL, '2021-01-03', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1739, 500.00, 0, 0, 31, NULL, '2021-01-02', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1740, 500.00, 0, 0, 31, NULL, '2021-01-01', 1, 48, 1, '2020-07-13 11:14:58', NULL, NULL);
INSERT INTO `rate` VALUES (1772, 300.00, 0, 0, 33, NULL, '2021-01-31', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1773, 300.00, 0, 0, 33, NULL, '2021-01-30', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1774, 300.00, 0, 0, 33, NULL, '2021-01-29', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1775, 300.00, 0, 0, 33, NULL, '2021-01-28', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1776, 300.00, 0, 0, 33, NULL, '2021-01-27', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1777, 300.00, 0, 0, 33, NULL, '2021-01-26', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1778, 300.00, 0, 0, 33, NULL, '2021-01-25', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1779, 300.00, 0, 0, 33, NULL, '2021-01-24', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1780, 300.00, 0, 0, 33, NULL, '2021-01-23', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1781, 300.00, 0, 0, 33, NULL, '2021-01-22', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1782, 300.00, 0, 0, 33, NULL, '2021-01-21', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1783, 300.00, 0, 0, 33, NULL, '2021-01-20', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1784, 300.00, 0, 0, 33, NULL, '2021-01-19', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1785, 300.00, 0, 0, 33, NULL, '2021-01-18', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1786, 300.00, 0, 0, 33, NULL, '2021-01-17', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1787, 300.00, 0, 0, 33, NULL, '2021-01-16', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1788, 300.00, 0, 0, 33, NULL, '2021-01-15', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1789, 300.00, 0, 0, 33, NULL, '2021-01-14', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1790, 300.00, 0, 0, 33, NULL, '2021-01-13', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1791, 300.00, 0, 0, 33, NULL, '2021-01-12', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1792, 300.00, 0, 0, 33, NULL, '2021-01-11', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1793, 300.00, 0, 0, 33, NULL, '2021-01-10', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1794, 300.00, 0, 0, 33, NULL, '2021-01-09', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1795, 300.00, 0, 0, 33, NULL, '2021-01-08', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1796, 300.00, 0, 0, 33, NULL, '2021-01-07', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1797, 300.00, 0, 0, 33, NULL, '2021-01-06', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1798, 300.00, 0, 0, 33, NULL, '2021-01-05', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1799, 300.00, 0, 0, 33, NULL, '2021-01-04', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1800, 300.00, 0, 0, 33, NULL, '2021-01-03', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1801, 300.00, 0, 0, 33, NULL, '2021-01-02', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1802, 300.00, 0, 0, 33, NULL, '2021-01-01', 1, 49, 1, '2020-07-13 11:15:20', NULL, NULL);
INSERT INTO `rate` VALUES (1850, 800.00, 0, 0, 32, NULL, '2021-01-31', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1851, 800.00, 0, 0, 32, NULL, '2021-01-30', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1852, 800.00, 0, 0, 32, NULL, '2021-01-29', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1853, 800.00, 0, 0, 32, NULL, '2021-01-28', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1854, 800.00, 0, 0, 32, NULL, '2021-01-27', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1855, 800.00, 0, 0, 32, NULL, '2021-01-26', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1856, 800.00, 0, 0, 32, NULL, '2021-01-25', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1857, 800.00, 0, 0, 32, NULL, '2021-01-24', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1858, 800.00, 0, 0, 32, NULL, '2021-01-23', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1859, 800.00, 0, 0, 32, NULL, '2021-01-22', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1860, 800.00, 0, 0, 32, NULL, '2021-01-21', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1861, 800.00, 0, 0, 32, NULL, '2021-01-20', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1862, 800.00, 0, 0, 32, NULL, '2021-01-19', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1863, 800.00, 0, 0, 32, NULL, '2021-01-18', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1864, 800.00, 0, 0, 32, NULL, '2021-01-17', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1865, 800.00, 0, 0, 32, NULL, '2021-01-16', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1866, 800.00, 0, 0, 32, NULL, '2021-01-15', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1867, 800.00, 0, 0, 32, NULL, '2021-01-14', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1868, 800.00, 0, 0, 32, NULL, '2021-01-13', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1869, 800.00, 0, 0, 32, NULL, '2021-01-12', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1870, 800.00, 0, 0, 32, NULL, '2021-01-11', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1871, 800.00, 0, 0, 32, NULL, '2021-01-10', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1872, 800.00, 0, 0, 32, NULL, '2021-01-09', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1873, 800.00, 0, 0, 32, NULL, '2021-01-08', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1874, 800.00, 0, 0, 32, NULL, '2021-01-07', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1875, 800.00, 0, 0, 32, NULL, '2021-01-06', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1876, 800.00, 0, 0, 32, NULL, '2021-01-05', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1877, 800.00, 0, 0, 32, NULL, '2021-01-04', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1878, 800.00, 0, 0, 32, NULL, '2021-01-03', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1879, 800.00, 0, 0, 32, NULL, '2021-01-02', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1880, 800.00, 0, 0, 32, NULL, '2021-01-01', 1, 49, 1, '2020-07-13 11:16:35', NULL, NULL);
INSERT INTO `rate` VALUES (1881, 999.00, 0, 0, 30, NULL, '2021-07-31', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1882, 999.00, 0, 0, 30, NULL, '2021-07-30', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1883, 999.00, 0, 0, 30, NULL, '2021-07-29', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1884, 999.00, 0, 0, 30, NULL, '2021-07-28', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1885, 999.00, 0, 0, 30, NULL, '2021-07-27', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1886, 999.00, 0, 0, 30, NULL, '2021-07-26', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1887, 999.00, 0, 0, 30, NULL, '2021-07-25', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1888, 999.00, 0, 0, 30, NULL, '2021-07-24', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1889, 999.00, 0, 0, 30, NULL, '2021-07-23', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1890, 999.00, 0, 0, 30, NULL, '2021-07-22', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1891, 999.00, 0, 0, 30, NULL, '2021-07-21', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1892, 999.00, 0, 0, 30, NULL, '2021-07-20', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1893, 999.00, 0, 0, 30, NULL, '2021-07-19', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1894, 999.00, 0, 0, 30, NULL, '2021-07-18', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1895, 999.00, 0, 0, 30, NULL, '2021-07-17', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1896, 999.00, 0, 0, 30, NULL, '2021-07-16', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1897, 999.00, 0, 0, 30, NULL, '2021-07-15', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1898, 999.00, 0, 0, 30, NULL, '2021-07-14', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1899, 999.00, 0, 0, 30, NULL, '2021-07-13', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1900, 999.00, 0, 0, 30, NULL, '2021-07-12', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1901, 999.00, 0, 0, 30, NULL, '2021-07-11', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1902, 999.00, 0, 0, 30, NULL, '2021-07-10', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1903, 999.00, 0, 0, 30, NULL, '2021-07-09', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1904, 999.00, 0, 0, 30, NULL, '2021-07-08', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1905, 999.00, 0, 0, 30, NULL, '2021-07-07', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1906, 999.00, 0, 0, 30, NULL, '2021-07-06', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1907, 999.00, 0, 0, 30, NULL, '2021-07-05', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1908, 999.00, 0, 0, 30, NULL, '2021-07-04', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1909, 999.00, 0, 0, 30, NULL, '2021-07-03', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1910, 999.00, 0, 0, 30, NULL, '2021-07-02', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1911, 999.00, 0, 0, 30, NULL, '2021-07-01', 1, 48, 1, '2020-07-13 11:17:34', NULL, NULL);
INSERT INTO `rate` VALUES (1912, 4.00, 0, 0, 30, NULL, '2020-07-31', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1913, 4.00, 0, 0, 30, NULL, '2020-07-30', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1914, 4.00, 0, 0, 30, NULL, '2020-07-29', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1915, 4.00, 0, 0, 30, NULL, '2020-07-28', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1916, 4.00, 0, 0, 30, NULL, '2020-07-27', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1917, 4.00, 0, 0, 30, NULL, '2020-07-26', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1918, 4.00, 0, 0, 30, NULL, '2020-07-25', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1919, 4.00, 0, 0, 30, NULL, '2020-07-24', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1920, 4.00, 0, 0, 30, NULL, '2020-07-23', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1921, 4.00, 0, 0, 30, NULL, '2020-07-22', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1922, 4.00, 0, 0, 30, NULL, '2020-07-21', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1923, 4.00, 0, 0, 30, NULL, '2020-07-20', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1924, 4.00, 0, 0, 30, NULL, '2020-07-19', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1925, 4.00, 0, 0, 30, NULL, '2020-07-18', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1926, 4.00, 0, 0, 30, NULL, '2020-07-17', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1927, 4.00, 0, 0, 30, NULL, '2020-07-16', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1928, 4.00, 0, 0, 30, NULL, '2020-07-15', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1929, 4.00, 0, 0, 30, NULL, '2020-07-14', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1930, 4.00, 0, 0, 30, NULL, '2020-07-13', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1931, 4.00, 0, 0, 30, NULL, '2020-07-12', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1932, 4.00, 0, 0, 30, NULL, '2020-07-11', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1933, 4.00, 0, 0, 30, NULL, '2020-07-10', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1934, 4.00, 0, 0, 30, NULL, '2020-07-09', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1935, 4.00, 0, 0, 30, NULL, '2020-07-08', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1936, 4.00, 0, 0, 30, NULL, '2020-07-07', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1937, 4.00, 0, 0, 30, NULL, '2020-07-06', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1938, 4.00, 0, 0, 30, NULL, '2020-07-05', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1939, 4.00, 0, 0, 30, NULL, '2020-07-04', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1940, 4.00, 0, 0, 30, NULL, '2020-07-03', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1941, 4.00, 0, 0, 30, NULL, '2020-07-02', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1942, 4.00, 0, 0, 30, NULL, '2020-07-01', 1, 48, 1, '2020-07-13 14:15:26', NULL, NULL);
INSERT INTO `rate` VALUES (1943, 43.00, 0, 0, 30, NULL, '2021-01-31', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1944, 43.00, 0, 0, 30, NULL, '2021-01-30', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1945, 43.00, 0, 0, 30, NULL, '2021-01-29', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1946, 43.00, 0, 0, 30, NULL, '2021-01-28', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1947, 43.00, 0, 0, 30, NULL, '2021-01-27', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1948, 43.00, 0, 0, 30, NULL, '2021-01-26', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1949, 43.00, 0, 0, 30, NULL, '2021-01-25', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1950, 43.00, 0, 0, 30, NULL, '2021-01-24', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1951, 43.00, 0, 0, 30, NULL, '2021-01-23', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1952, 43.00, 0, 0, 30, NULL, '2021-01-22', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1953, 43.00, 0, 0, 30, NULL, '2021-01-21', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1954, 43.00, 0, 0, 30, NULL, '2021-01-20', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1955, 43.00, 0, 0, 30, NULL, '2021-01-19', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1956, 43.00, 0, 0, 30, NULL, '2021-01-18', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1957, 43.00, 0, 0, 30, NULL, '2021-01-17', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1958, 43.00, 0, 0, 30, NULL, '2021-01-16', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1959, 43.00, 0, 0, 30, NULL, '2021-01-15', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1960, 43.00, 0, 0, 30, NULL, '2021-01-14', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1961, 43.00, 0, 0, 30, NULL, '2021-01-13', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1962, 43.00, 0, 0, 30, NULL, '2021-01-12', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1963, 43.00, 0, 0, 30, NULL, '2021-01-11', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1964, 43.00, 0, 0, 30, NULL, '2021-01-10', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1965, 43.00, 0, 0, 30, NULL, '2021-01-09', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1966, 43.00, 0, 0, 30, NULL, '2021-01-08', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1967, 43.00, 0, 0, 30, NULL, '2021-01-07', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1968, 43.00, 0, 0, 30, NULL, '2021-01-06', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1969, 43.00, 0, 0, 30, NULL, '2021-01-05', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1970, 43.00, 0, 0, 30, NULL, '2021-01-04', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1971, 43.00, 0, 0, 30, NULL, '2021-01-03', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1972, 43.00, 0, 0, 30, NULL, '2021-01-02', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1973, 43.00, 0, 0, 30, NULL, '2021-01-01', 1, 48, 1, '2020-07-13 14:17:26', NULL, NULL);
INSERT INTO `rate` VALUES (1974, 1000.00, 0, 0, 30, NULL, '2021-02-28', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1975, 1000.00, 0, 0, 30, NULL, '2021-02-27', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1976, 1000.00, 0, 0, 30, NULL, '2021-02-26', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1977, 1000.00, 0, 0, 30, NULL, '2021-02-25', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1978, 1000.00, 0, 0, 30, NULL, '2021-02-24', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1979, 1000.00, 0, 0, 30, NULL, '2021-02-23', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1980, 1000.00, 0, 0, 30, NULL, '2021-02-22', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1981, 1000.00, 0, 0, 30, NULL, '2021-02-21', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1982, 1000.00, 0, 0, 30, NULL, '2021-02-20', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1983, 1000.00, 0, 0, 30, NULL, '2021-02-19', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1984, 1000.00, 0, 0, 30, NULL, '2021-02-18', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1985, 1000.00, 0, 0, 30, NULL, '2021-02-17', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1986, 1000.00, 0, 0, 30, NULL, '2021-02-16', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1987, 1000.00, 0, 0, 30, NULL, '2021-02-15', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1988, 1000.00, 0, 0, 30, NULL, '2021-02-14', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1989, 1000.00, 0, 0, 30, NULL, '2021-02-13', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1990, 1000.00, 0, 0, 30, NULL, '2021-02-12', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1991, 1000.00, 0, 0, 30, NULL, '2021-02-11', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1992, 1000.00, 0, 0, 30, NULL, '2021-02-10', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1993, 1000.00, 0, 0, 30, NULL, '2021-02-09', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1994, 1000.00, 0, 0, 30, NULL, '2021-02-08', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1995, 1000.00, 0, 0, 30, NULL, '2021-02-07', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1996, 1000.00, 0, 0, 30, NULL, '2021-02-06', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1997, 1000.00, 0, 0, 30, NULL, '2021-02-05', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1998, 1000.00, 0, 0, 30, NULL, '2021-02-04', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (1999, 1000.00, 0, 0, 30, NULL, '2021-02-03', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (2000, 1000.00, 0, 0, 30, NULL, '2021-02-02', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (2001, 1000.00, 0, 0, 30, NULL, '2021-02-01', 1, 48, 1, '2020-07-15 14:55:07', NULL, NULL);
INSERT INTO `rate` VALUES (2002, 500.00, 0, 0, 31, NULL, '2021-02-28', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2003, 500.00, 0, 0, 31, NULL, '2021-02-27', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2004, 500.00, 0, 0, 31, NULL, '2021-02-26', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2005, 500.00, 0, 0, 31, NULL, '2021-02-25', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2006, 500.00, 0, 0, 31, NULL, '2021-02-24', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2007, 500.00, 0, 0, 31, NULL, '2021-02-23', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2008, 500.00, 0, 0, 31, NULL, '2021-02-22', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2009, 500.00, 0, 0, 31, NULL, '2021-02-21', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2010, 500.00, 0, 0, 31, NULL, '2021-02-20', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2011, 500.00, 0, 0, 31, NULL, '2021-02-19', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2012, 500.00, 0, 0, 31, NULL, '2021-02-18', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2013, 500.00, 0, 0, 31, NULL, '2021-02-17', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2014, 500.00, 0, 0, 31, NULL, '2021-02-16', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2015, 500.00, 0, 0, 31, NULL, '2021-02-15', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2016, 500.00, 0, 0, 31, NULL, '2021-02-14', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2017, 500.00, 0, 0, 31, NULL, '2021-02-13', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2018, 500.00, 0, 0, 31, NULL, '2021-02-12', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2019, 500.00, 0, 0, 31, NULL, '2021-02-11', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2020, 500.00, 0, 0, 31, NULL, '2021-02-10', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2021, 500.00, 0, 0, 31, NULL, '2021-02-09', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2022, 500.00, 0, 0, 31, NULL, '2021-02-08', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2023, 500.00, 0, 0, 31, NULL, '2021-02-07', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2024, 500.00, 0, 0, 31, NULL, '2021-02-06', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2025, 500.00, 0, 0, 31, NULL, '2021-02-05', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2026, 500.00, 0, 0, 31, NULL, '2021-02-04', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2027, 500.00, 0, 0, 31, NULL, '2021-02-03', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2028, 500.00, 0, 0, 31, NULL, '2021-02-02', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2029, 500.00, 0, 0, 31, NULL, '2021-02-01', 1, 48, 1, '2020-07-15 14:55:15', NULL, NULL);
INSERT INTO `rate` VALUES (2030, 800.00, 0, 0, 30, NULL, '2020-08-02', 1, 48, 1, '2020-07-26 16:00:54', NULL, NULL);
INSERT INTO `rate` VALUES (2031, 800.00, 0, 0, 30, NULL, '2020-08-03', 1, 48, 1, '2020-07-26 16:01:22', NULL, NULL);
INSERT INTO `rate` VALUES (2032, 800.00, 0, 0, 30, NULL, '2020-08-04', 1, 48, 1, '2020-07-26 16:03:22', NULL, NULL);
INSERT INTO `rate` VALUES (2033, 0.00, 0, 0, 30, NULL, '2020-08-07', 1, 48, 1, '2020-07-27 16:16:03', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for rate_plan
-- ----------------------------
DROP TABLE IF EXISTS `rate_plan`;
CREATE TABLE `rate_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `guest` int(11) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rate_plan
-- ----------------------------
BEGIN;
INSERT INTO `rate_plan` VALUES (30, '11 Guest', 11, 48, '6 Bedrooms');
INSERT INTO `rate_plan` VALUES (31, '5 Guest', 5, 48, '2 Bedrooms');
INSERT INTO `rate_plan` VALUES (32, '11 Guest', 11, 49, '5 Bedroom');
INSERT INTO `rate_plan` VALUES (33, '5 Guest', 4, 49, '3 Bedroom');
INSERT INTO `rate_plan` VALUES (34, 'Wat Po House 1', 5, 50, '');
INSERT INTO `rate_plan` VALUES (35, 'Parents Lodge Villa 1.1 ', 4, 51, '');
INSERT INTO `rate_plan` VALUES (36, 'Parents Lodge Villa 2.1 ', 3, 52, '');
INSERT INTO `rate_plan` VALUES (37, 'Parent Lodge Villa 3.1', 3, 53, '');
INSERT INTO `rate_plan` VALUES (38, 'Authentic Golden Vishnu Villa 1.1', 3, 54, '');
INSERT INTO `rate_plan` VALUES (39, 'Authentic Golden Vishnu Villa 2', 3, 55, '');
INSERT INTO `rate_plan` VALUES (40, '11 Guest', 11, 56, '4 Bedrooms');
INSERT INTO `rate_plan` VALUES (41, '5 Guest', 5, 56, '1 BEDROOMS');
INSERT INTO `rate_plan` VALUES (42, '11 Guest', 1, 57, '1 BEDROOMS');
INSERT INTO `rate_plan` VALUES (46, 'What Po 11', 11, 50, '1 BEDROOMS');
COMMIT;

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `number_of_bed` int(11) DEFAULT NULL,
  `rate_plan_id` int(11) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `agree_term_condition` int(11) DEFAULT NULL COMMENT 'agree = 1; disagree = 0; ',
  `number_of_guest` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirm_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `promotion` int(10) DEFAULT NULL,
  `promotion_type` int(10) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation
-- ----------------------------
BEGIN;
INSERT INTO `reservation` VALUES (1, 'Mr.', '2020-08-03', '2020-08-04', NULL, 32, 49, NULL, NULL, 'Maco', 'Buntheoun', 'theombuntheoun@gmail.com', NULL, '010448054', NULL, '', 1220.00, NULL, NULL, 1220.00, NULL, 1, NULL, NULL, '2020-07-27 16:19:06');
COMMIT;

-- ----------------------------
-- Table structure for reservation_detail
-- ----------------------------
DROP TABLE IF EXISTS `reservation_detail`;
CREATE TABLE `reservation_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `reservation_code` varchar(100) DEFAULT NULL,
  `credit_card_number` varchar(100) DEFAULT NULL,
  `credit_card_name` varchar(100) DEFAULT NULL,
  `credit_card_security_code` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `expired_month` int(11) DEFAULT NULL,
  `expired_year` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pick_up_location` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reservation_item
-- ----------------------------
DROP TABLE IF EXISTS `reservation_item`;
CREATE TABLE `reservation_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` decimal(6,0) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `recommended` int(1) DEFAULT NULL COMMENT '0= not recommended, 1= recommended',
  `duration_type` int(11) DEFAULT NULL COMMENT '1= day, 2= hour',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `accommodation_id` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
BEGIN;
INSERT INTO `room` VALUES (30, 'Ben1', 6, NULL);
INSERT INTO `room` VALUES (31, 'ben 3', 6, NULL);
INSERT INTO `room` VALUES (57, 'Twin Bed', 4, 'asdf');
INSERT INTO `room` VALUES (58, 'double', 4, 'asdf');
INSERT INTO `room` VALUES (60, 'WAT DAMNAK HOUSE', 49, '5 BEDROOMS');
INSERT INTO `room` VALUES (61, 'WAT PO HOUSE', 50, '5 BEDROOMS');
INSERT INTO `room` VALUES (63, 'PARENTS LODGE VILLA 1', 51, '3 BEDROOMS');
INSERT INTO `room` VALUES (64, 'PARENTS LODGE VILLA 2', 52, '2 BEDROOMS');
INSERT INTO `room` VALUES (65, 'PARENTS LODGE VILLA 3', 53, '2 BEDROOMS');
INSERT INTO `room` VALUES (67, 'AUTHENTIC GOLDEN VISHNU VILLA 1', 54, '2 BEDROOMS');
INSERT INTO `room` VALUES (68, 'AUTHENTIC GOLDEN VISHNU VILLA 2', 55, '2 BEDROOMS');
INSERT INTO `room` VALUES (69, 'AUTHENTIC GOLDEN VISHNU VILLA 3', 56, '2 BEDROOMS');
INSERT INTO `room` VALUES (70, 'AUTHENTIC GOLDEN VISHNU VILLA 4', 57, '3 BEDROOMS');
INSERT INTO `room` VALUES (80, 'WAT BO HOUSE', 48, '5 BEDROOMS');
COMMIT;

-- ----------------------------
-- Table structure for season_type
-- ----------------------------
DROP TABLE IF EXISTS `season_type`;
CREATE TABLE `season_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of season_type
-- ----------------------------
BEGIN;
INSERT INTO `season_type` VALUES (1, 'Low Season ', '', b'1', '2020-06-26 11:33:11', 1, NULL, NULL);
INSERT INTO `season_type` VALUES (2, 'High Season ', '', b'1', '2020-06-26 11:33:24', 1, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `policy` mediumtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
BEGIN;
INSERT INTO `service` VALUES (1, '24H Security', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-06-25 14:49:26');
INSERT INTO `service` VALUES (2, 'Gardener', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-06-25 14:49:44');
INSERT INTO `service` VALUES (3, 'Housekeeping', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-06-25 14:50:19');
INSERT INTO `service` VALUES (4, 'Laundry (extra cost)', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-06-25 14:50:48');
INSERT INTO `service` VALUES (5, 'Personal guest assistant', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-06-25 14:51:23');
INSERT INTO `service` VALUES (6, 'Welcome Drinks', NULL, '', '', NULL, 1, '2020-06-25 14:52:03', 1, 1, '2020-06-25 14:51:42');
INSERT INTO `service` VALUES (7, 'Kitchen', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:56:07');
INSERT INTO `service` VALUES (8, 'Heating', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:56:23');
INSERT INTO `service` VALUES (9, 'Free parking on premises', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:56:43');
INSERT INTO `service` VALUES (10, 'Essentials', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:56:57');
INSERT INTO `service` VALUES (11, 'Wifi', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:57:15');
INSERT INTO `service` VALUES (12, 'Washer', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:57:30');
INSERT INTO `service` VALUES (13, 'Iron', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:57:48');
INSERT INTO `service` VALUES (14, 'Pool', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 15:58:05');
INSERT INTO `service` VALUES (15, 'Air conditioning', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 16:14:50');
INSERT INTO `service` VALUES (16, 'Hair dryer', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 16:53:25');
COMMIT;

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
BEGIN;
INSERT INTO `slide` VALUES (1, 'Home', NULL, '2020-04-29 11:35:35', 1, '2020-04-06 10:40:03', 1, 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for slide_gallery
-- ----------------------------
DROP TABLE IF EXISTS `slide_gallery`;
CREATE TABLE `slide_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `slide_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sport
-- ----------------------------
DROP TABLE IF EXISTS `sport`;
CREATE TABLE `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sport
-- ----------------------------
BEGIN;
INSERT INTO `sport` VALUES (1, 'Yoga', '/dropbox/srhs_system/backend/web/uploads/sport/bms_report_3_20200625000709.jpg', '<p>dasdasdasdasdas</p>\r\n', 1, '2020-06-25 00:07:09', 1, 1, '2020-06-25 00:06:51');
INSERT INTO `sport` VALUES (2, 'Workout ', '/dropbox/srhs_system/backend/web/uploads/sport/bms_report_2_20200625000743.png', '', NULL, NULL, 1, 1, '2020-06-25 00:07:43');
INSERT INTO `sport` VALUES (3, 'Spa', NULL, '', NULL, NULL, 1, 1, '2020-07-01 16:30:33');
INSERT INTO `sport` VALUES (4, 'Gym', NULL, '', NULL, NULL, 1, 1, '2020-07-01 16:30:42');
COMMIT;

-- ----------------------------
-- Table structure for star_rating
-- ----------------------------
DROP TABLE IF EXISTS `star_rating`;
CREATE TABLE `star_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of star_rating
-- ----------------------------
BEGIN;
INSERT INTO `star_rating` VALUES (1, '1 Star', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `star_rating` VALUES (2, '2 Star', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `star_rating` VALUES (3, '3 Star', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `star_rating` VALUES (4, '4 Star', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `star_rating` VALUES (5, '5 Star', NULL, NULL, NULL, NULL, NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for tour_category
-- ----------------------------
DROP TABLE IF EXISTS `tour_category`;
CREATE TABLE `tour_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tour_category
-- ----------------------------
BEGIN;
INSERT INTO `tour_category` VALUES (1, 'Ankgor Wat Sightseeing', '', NULL, '/dropbox/srhs_system/backend/web/uploads/siem_reap_hospitality_service/tour-category/golden3.5_20200703091246.jpg', NULL, 1, 1, '2020-07-03 09:12:46');
COMMIT;

-- ----------------------------
-- Table structure for tour_item
-- ----------------------------
DROP TABLE IF EXISTS `tour_item`;
CREATE TABLE `tour_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` decimal(6,0) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `tip_note` text DEFAULT NULL,
  `recommended` int(1) DEFAULT NULL COMMENT '0= not recommended, 1= recommended',
  `duration_type` int(11) DEFAULT NULL COMMENT '1= day, 2= hour',
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tour_item
-- ----------------------------
BEGIN;
INSERT INTO `tour_item` VALUES (1, 1, 'Tuk Tuks', '/dropbox/srhs_system/admin/uploads/tour-item/_20200429152803_bigtour-gate_20200722085940.jpg', '', 23.00, 4, '05:00:00', '', 0, 1, 1, '2020-07-22 08:59:40', 1, 1, '2020-07-03 09:15:15');
COMMIT;

-- ----------------------------
-- Table structure for tour_item_gallery
-- ----------------------------
DROP TABLE IF EXISTS `tour_item_gallery`;
CREATE TABLE `tour_item_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `tour_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for transportation
-- ----------------------------
DROP TABLE IF EXISTS `transportation`;
CREATE TABLE `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `policy` mediumtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transportation
-- ----------------------------
BEGIN;
INSERT INTO `transportation` VALUES (3, 'Motor', NULL, '', '', 32.00, NULL, NULL, 1, 1, '2020-06-29 16:42:55');
INSERT INTO `transportation` VALUES (4, 'Airport Transportation', NULL, '', '', NULL, NULL, NULL, 1, 1, '2020-07-01 16:30:58');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, NULL, NULL, 5, 'admin', 1, '2QUmtoT1HsRzkYUkyVSpe2lUsYr3HM87', '$2y$13$x99JaU7sa.SC/FlTZIOqaeUdrRGFrPAFvvsSlzTSVBuL6PaToh2Ee', '', 'measmengtry191@gmail.com', 10, 1577767580, 1594722678, 'FrC_INdK7RxDPfF9SZipcTM6X5o62mVc_1577767580', NULL, NULL, '2020-01-03 09:43:01', 1);
COMMIT;

-- ----------------------------
-- Table structure for user_type
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` bit(1) DEFAULT NULL,
  `user_type_name` varchar(500) DEFAULT NULL,
  `default_view_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_type
-- ----------------------------
BEGIN;
INSERT INTO `user_type` VALUES (1, b'1', 'Super Admin', 1, NULL, NULL, '2019-10-18 15:56:19', 1);
INSERT INTO `user_type` VALUES (2, b'1', 'Sales', 1, NULL, NULL, '2019-09-06 13:59:58', 1);
INSERT INTO `user_type` VALUES (3, b'1', 'Web Developer', 1, NULL, NULL, '2019-09-05 13:04:13', 14);
INSERT INTO `user_type` VALUES (4, b'1', 'Senior Web Developer', NULL, '2019-09-04 10:01:05', 1, '2019-09-05 14:40:15', 1);
INSERT INTO `user_type` VALUES (5, b'1', 'Support', NULL, '2019-09-05 15:17:07', 1, '2019-09-11 14:38:08', 1);
INSERT INTO `user_type` VALUES (6, b'1', 'Senior - Accountant', NULL, '2019-09-14 09:30:30', 1, '2019-10-19 10:05:28', 1);
INSERT INTO `user_type` VALUES (7, b'1', 'Senior Web Application', NULL, '2019-10-08 08:19:58', 1, '2019-10-08 14:00:50', 1);
COMMIT;

-- ----------------------------
-- Table structure for year_list
-- ----------------------------
DROP TABLE IF EXISTS `year_list`;
CREATE TABLE `year_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of year_list
-- ----------------------------
BEGIN;
INSERT INTO `year_list` VALUES (2, '2020');
INSERT INTO `year_list` VALUES (3, '2021');
INSERT INTO `year_list` VALUES (4, '2022');
INSERT INTO `year_list` VALUES (5, '2023');
INSERT INTO `year_list` VALUES (6, '2024');
INSERT INTO `year_list` VALUES (7, '2025');
INSERT INTO `year_list` VALUES (8, '2026');
INSERT INTO `year_list` VALUES (9, '2027');
INSERT INTO `year_list` VALUES (10, '2028');
INSERT INTO `year_list` VALUES (11, '2029');
INSERT INTO `year_list` VALUES (12, '2030');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
