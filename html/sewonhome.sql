-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 21-12-13 19:54
-- 서버 버전: 8.0.27
-- PHP 버전: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sewonhome`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `booking`
--

CREATE TABLE `booking` (
  `booking_array` int NOT NULL,
  `booking_name` varchar(20) DEFAULT NULL,
  `patient_rrn` varchar(13) DEFAULT NULL,
  `doctor_id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_num` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `booking`
--

INSERT INTO `booking` (`booking_array`, `booking_name`, `patient_rrn`, `doctor_id`, `booking_date`, `booking_num`) VALUES
(1, '박종윤', '8510231235478', 'red', '2021-11-17', '21110801'),
(2, '김준태', '9901231012132', 'red', '2021-11-18', '21111601'),
(3, '김준태', '9901231012132', 'red', '2021-11-19', '21111602'),
(5, '장동원', '0010231232456', 'hahaha', '2021-11-29', '21112901'),
(6, '장동원', '0010231232456', 'cyon', '2021-11-30', '21113001'),
(7, '장동원', '0010231232456', 'cyon', '2021-11-30', '21113002'),
(8, '장동원', '0010231232456', 'dsadas', '2021-11-30', '21113003'),
(9, '장동원', '0010231232456', 'hahaha', '2021-11-30', '21113004'),
(13, '장동원', '0010231232456', 'cyon', '2021-12-05', '21113005'),
(4, '장동원', '0010231232456', 'hahaha', '2021-12-01', '21120101'),
(10, '장동원', '0010231232456', 'cyon', '2021-12-05', '21120501'),
(11, '장동원', '0010231232456', 'cyan', '2021-12-07', '21120502'),
(12, '장동원', '0010231232456', 'cyon', '2021-12-06', '21120503'),
(14, '오희종', '7211232012324', 'yellow', '2021-12-05', '21120506'),
(15, '장동원', '0010231232456', 'hahaha', '2021-12-14', '21120701'),
(16, '히틀러', '9410211232123', 'hahaha', '2021-12-07', '21120702'),
(17, '히틀러', '9410211232123', 'cyon', '2021-12-07', '21120703'),
(18, '히틀러', '9410211232123', 'hahaha', '2021-12-07', '21120704'),
(19, '히틀러', '9410211232123', 'yellow', '2021-12-07', '21120705'),
(20, '히틀러', '9410211232123', 'cyon', '2021-12-07', '21120706'),
(21, '히틀러', '9410211232123', 'red', '2021-12-14', '21120707'),
(22, '할라피뇨', '0505051232145', 'red', '2021-12-14', '21120708'),
(23, '할라피뇨', '0505051232145', 'hahaha', '2021-12-14', '21120709'),
(24, '햄버거', '1010231012321', 'hahaha', '2021-12-10', '21121001'),
(25, '히틀러', '9410211232123', 'hahaha', '2021-12-10', '21121002'),
(26, '장동원', '0010231232456', 'hahaha', '2021-12-10', '21121003'),
(27, '오희종', '7211232012324', 'red', '2021-12-10', '21121004'),
(28, '김준태', '9901231012132', 'hahaha', '2021-12-10', '21121005'),
(29, '장동원', '0010231232456', 'hahaha', '2021-12-14', '21121006'),
(30, '장세원', '9804211562012', 'red', '2021-12-14', '21121301'),
(31, '오희종', '7211232012324', 'cyon', '2021-12-14', '21121302'),
(32, '김준태', '9901231012132', 'red', '2021-12-14', '21121303'),
(33, '할라피뇨', '0505051232145', 'yellow', '2021-12-14', '21121304'),
(34, '햄버거', '1010231012321', 'hahaha', '2021-12-14', '21121305');

-- --------------------------------------------------------

--
-- 테이블 구조 `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(40) NOT NULL,
  `doctor_pw` varchar(40) DEFAULT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `doctor_rrn` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_pw`, `doctor_name`, `doctor_rrn`) VALUES
('blue', '1234', '임경민', '9807121222222'),
('cyan', '1234', '엄석대', '6809131011412'),
('cyon', '1234', '인자기', '9910011232456'),
('hahaha', '1234', '이순신', '9904211012321'),
('red', '1234', '장세원', '9804211111111'),
('ryon', '1234', '사자', '0004235982314'),
('shingu', '1234', '신구', '591023102321'),
('testtest', '1234', '테스트테스트', '1212123131313'),
('yellow', '1234', '정지용', '9811231010101'),
('장세원', '123123', '장세원바보', '123123123123');

-- --------------------------------------------------------

--
-- 테이블 구조 `inpatient`
--

CREATE TABLE `inpatient` (
  `inpatient_array` int NOT NULL,
  `patient_name` varchar(20) DEFAULT NULL,
  `inpatient_start` date DEFAULT NULL,
  `inpatient_last` date DEFAULT NULL,
  `patient_rrn` varchar(13) DEFAULT NULL,
  `patient_diagn` varchar(45) DEFAULT NULL,
  `room_num` varchar(2) DEFAULT NULL,
  `inpatient_num` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `inpatient`
--

INSERT INTO `inpatient` (`inpatient_array`, `patient_name`, `inpatient_start`, `inpatient_last`, `patient_rrn`, `patient_diagn`, `room_num`, `inpatient_num`) VALUES
(25, '김갑생', '2021-11-30', '2021-12-04', '6504212020202', '무릎골절', '1', '21113001'),
(28, '드록바', '2021-11-30', '2021-12-04', '9701211212121', '십자인대손상', '1', '21113002'),
(29, '마운트', '2021-11-30', '2021-12-04', '0110122015489', '손목골절', '2', '21113003'),
(30, '램파드', '2021-11-30', '2021-12-04', '9804211111112', '인대파열', '3', '21113004'),
(31, '지예흐', '2021-11-30', '2021-12-04', '7810232021423', '치매', '3', '21113005'),
(35, '호날두', '2021-12-05', '2021-12-17', '8810221214567', '치통', '1', '21113006'),
(36, '엄석대', '2021-12-05', '2021-12-15', '0210121015472', '치통', '1', '21113008'),
(40, '햄버거', '2021-12-07', '2021-12-16', '1010231012321', '무릎골절', '2', '21120711'),
(41, '장동원', '2021-12-16', '2021-12-18', '0010231232456', '치통', '1', '21120712'),
(42, '김숙자', '2021-12-15', '2021-12-23', '3612252134567', '인대손상', '5', '21121301'),
(43, '김숙자', '2021-12-13', '2021-12-16', '3612252134567', '인대손상', '3', '21121302'),
(44, '햄버거', '2021-12-13', '2021-12-15', '1010231012321', '무릎골절', '3', '21121311');

-- --------------------------------------------------------

--
-- 테이블 구조 `patient`
--

CREATE TABLE `patient` (
  `num` int NOT NULL,
  `patient_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `patient_rrn` varchar(13) NOT NULL,
  `patient_chart` varchar(8) NOT NULL,
  `patient_diagn` varchar(45) DEFAULT NULL,
  `patient_meet_date` date DEFAULT NULL,
  `patient_room` char(1) DEFAULT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `hits` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `patient`
--

INSERT INTO `patient` (`num`, `patient_name`, `patient_rrn`, `patient_chart`, `patient_diagn`, `patient_meet_date`, `patient_room`, `doctor_name`, `hits`) VALUES
(2, '램파드', '9804211111112', '21101801', '인대파열', '2021-10-18', 'y', '장세원', 1),
(1, '드록바', '9701211212121', '21101802', '십자인대손상', '2021-10-18', 'y', '장세원', 0),
(4, '에시앙', '7211212354211', '21101803', '두통', '2021-10-18', 'n', '임경민', 3),
(3, '마운트', '0110122015489', '21101901', '손목골절', '2021-10-19', 'n', '임경민', 1),
(5, '지예흐', '7810232021423', '21101902', '치매', '2021-10-19', 'y', '정지용', 2),
(6, '호날두', '8810221214567', '21101905', '치통', '2021-10-19', 'n', '장세원', 2),
(7, '엄석대', '0210121015472', '21101906', '치통', '2021-10-19', 'n', '장세원', 5),
(11, '이주원', '9401233124571', '21111601', '치통', '2021-11-16', 'n', '장세원', 1),
(12, '이주원', '9401233124571', '21111602', '근육통', '2021-11-16', 'n', '임경민', 1),
(14, '호날두', '8810221214567', '21111603', '치통', '2021-11-16', 'n', '임경민', 1),
(16, '김갑생', '6504212020202', '21113001', '무릎골절', '2021-11-30', 'y', '장세원', 0),
(17, '장동원', '0010231232456', '21120501', '치통', '2021-12-05', 'n', '장세원', 0),
(18, '할라피뇨', '0505051232145', '21120701', '코로나', '2021-12-07', 'n', '이순신', 0),
(19, '할라피뇨', '0505051232145', '21120702', '목감기', '2021-12-07', 'n', '장세원', 0),
(20, '호나우두', '6804211232123', '21120703', '사마귀', '2021-12-07', 'n', '임경민', 0),
(21, '할라피뇨', '0505051232145', '21120704', '치통', '2021-12-07', 'n', '장세원', 0),
(22, '할라피뇨', '0505051232145', '21120705', '손목골절', '2021-12-07', 'n', '장세원', 3),
(23, '햄버거', '1010231012321', '21120706', '무릎골절', '2021-12-07', 'n', '신구', 2),
(25, '리춘수', '6010231023215', '21121001', '두통', '2021-12-10', 'n', '인자기', 0),
(26, '김숙자', '3612252134567', '21121301', '인대손상', '2021-12-13', 'n', '이순신', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE `room` (
  `room_num` varchar(2) DEFAULT NULL,
  `room_max` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `room`
--

INSERT INTO `room` (`room_num`, `room_max`) VALUES
('1', '2'),
('2', '1'),
('3', '2'),
('4', '1'),
('5', '5');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_num`),
  ADD KEY `booking_array` (`booking_array`);

--
-- 테이블의 인덱스 `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- 테이블의 인덱스 `inpatient`
--
ALTER TABLE `inpatient`
  ADD PRIMARY KEY (`inpatient_num`),
  ADD KEY `inpatient_array` (`inpatient_array`);

--
-- 테이블의 인덱스 `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_chart`),
  ADD KEY `num` (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_array` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 테이블의 AUTO_INCREMENT `inpatient`
--
ALTER TABLE `inpatient`
  MODIFY `inpatient_array` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 테이블의 AUTO_INCREMENT `patient`
--
ALTER TABLE `patient`
  MODIFY `num` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
