-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 17-08-21 09:52
-- 서버 버전: 10.1.19-MariaDB
-- PHP 버전: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `project`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `id` varchar(25) NOT NULL,
  `pw` varchar(25) NOT NULL,
  `title` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `view` int(25) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `content` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `curl` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`idx`, `id`, `pw`, `title`, `view`, `date`, `name`, `content`, `curl`, `category`) VALUES
(23, '123123', '263fec58861449aacc1c328a4', 'zzz', 0, '2017-08-16 23:16:08', '123123', 'zzzz', '123123', '전체글보기'),
(24, '123123', '263fec58861449aacc1c328a4', 'zddasd', 0, '2017-08-16 23:16:38', '123123', 'asd', '123123', 'zzzzzzzz'),
(25, 'admin', 'c7ad44cbad762a5da0a452f9e', '모두의마블 같이 하실분~', 0, '2017-08-21 16:24:26', 'admin', '친구가 없어요 ㅠㅠ\r\n', 'modu', '게임 친구 모집'),
(26, 'admin', 'c7ad44cbad762a5da0a452f9e', '다이아는 언제..?', 0, '2017-08-21 16:24:41', 'admin', '언제주시죠 ?ㅜㅜ', 'modu', '전체글보기'),
(28, 'admin', 'c7ad44cbad762a5da0a452f9e', '출석체크 꽝!', 0, '2017-08-21 16:25:14', 'admin', '오늘 들려요~!!', 'modu', '출석체크'),
(29, 'admin', 'c7ad44cbad762a5da0a452f9e', '안녕하세요^^', 0, '2017-08-21 16:25:47', 'admin', '첫글이네요~', 'doje_2_5', '전체글보기'),
(30, 'admin', 'c7ad44cbad762a5da0a452f9e', '급식마블 짱짱 재밌네요~~~', 0, '2017-08-21 16:30:27', 'admin', '너무 잼남 ㅎㅎ', 'marble', '전체글보기'),
(31, 'admin', 'c7ad44cbad762a5da0a452f9e', '로고 한쪽손이 없네요ㅜㅜ', 0, '2017-08-21 16:31:55', 'admin', 'ㅠㅠ 만드렁죠용', 'marble', '실망해'),
(32, 'admin', 'c7ad44cbad762a5da0a452f9e', '완전잼슴!!', 0, '2017-08-21 16:32:11', 'admin', 'ㅋㅋㅋㅋ잼남', 'marble', '칭찬해'),
(33, 'admin', 'c7ad44cbad762a5da0a452f9e', '영국쌤 존경합니당', 0, '2017-08-21 16:34:28', 'admin', '♥♥♥♥♥♥♥♥', 'dudrnrajtwu', '전체글보기'),
(34, 'admin', 'c7ad44cbad762a5da0a452f9e', '여행 갈 만한 곳 추천좀', 0, '2017-08-21 16:35:28', 'admin', '어디를 가는게 좋을까요?', 'travel', '전체글보기'),
(35, 'alstjr', '7ab474432848f198bd902d40f', 'ㅎㅇ염', 0, '2017-08-21 16:40:52', '김민석', 'ㅎㅇ', 'doje_2_5', '전체글보기');

-- --------------------------------------------------------

--
-- 테이블 구조 `cafe`
--

CREATE TABLE `cafe` (
  `idx` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cbenner` varchar(200) NOT NULL,
  `curl` varchar(100) NOT NULL,
  `cexp` varchar(100) NOT NULL,
  `cadmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `cafe`
--

INSERT INTO `cafe` (`idx`, `cname`, `cbenner`, `curl`, `cexp`, `cadmin`) VALUES
(1, '서울디지텍고 2-5', '9ab49116b1475bf24f46c0be3169a004.jpg', 'doje_2_5', '서울 디지텍고 도제반의 카페입니다.', 'admin'),
(2, '모두의마블 카페', 'KakaoTalk_20170518_225149377.png', 'modu', '모바일 게임 모두의 마블 게임 카페입니다!\r\n가입하시면 500개 다이아 증정!', 'admin'),
(3, 'travel!', 'KakaoTalk_20170429_173316910.jpg', 'travel', '같이 여행을 떠나요~', 'admin'),
(4, '급식마블!', 'logo.png', 'marble', '자바 프로그램으로 개발한 급식마블 카페입니다~', 'admin'),
(5, '서울디지텍고 이영국 선생님 팬카페', 'dudrnr.png', 'dudrnrajtwu', '영국쌤 사랑해요 ♥', 'admin');

-- --------------------------------------------------------

--
-- 테이블 구조 `cafejoin`
--

CREATE TABLE `cafejoin` (
  `idx` int(11) NOT NULL,
  `curl` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `allow` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='가입승인';

--
-- 테이블의 덤프 데이터 `cafejoin`
--

INSERT INTO `cafejoin` (`idx`, `curl`, `user`, `allow`) VALUES
(4, '123123', '123123', 1),
(5, 'asdasd', '123123', 1),
(6, 'doje_2_5', 'admin', 1),
(7, 'modu', 'admin', 1),
(8, 'travel', 'admin', 1),
(9, 'marble', 'admin', 1),
(10, 'dudrnrajtwu', 'admin', 1),
(11, 'marble', 'dlsxo', 1),
(12, 'doje_2_5', 'dlsxo', 1),
(13, 'marble', 'yejin', 1),
(15, 'dudrnrajtwu', 'alstjr', 1),
(16, 'doje_2_5', 'alstjr', 1),
(17, 'travel', 'ehdgk', 0),
(18, 'dudrnrajtwu', 'ehdgk', 1),
(19, 'doje_2_5', 'ehdgk', 1),
(20, 'dudrnrajtwu', 'yejin', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `catecory`
--

CREATE TABLE `catecory` (
  `idx` int(11) NOT NULL,
  `curl` varchar(100) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `catecory`
--

INSERT INTO `catecory` (`idx`, `curl`, `name`) VALUES
(3, '123123', 'zzzzzzzz'),
(4, 'modu', '게임 스샷'),
(5, 'modu', '게임 친구 모집'),
(6, 'modu', '출석체크'),
(7, 'marble', '칭찬해'),
(8, 'marble', '실망해');

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `idx` int(11) NOT NULL,
  `id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `content` varchar(25) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`idx`, `id`, `name`, `content`, `number`) VALUES
(12, '123123', '123123', 'zzzzzz', 23),
(13, 'dlsxo', '김인태', '존경합니다', 33),
(14, 'dlsxo', '김인태', '감사합니당', 32),
(15, 'dlsxo', '김인태', '저도 주세요ㅜㅜㅜ', 26),
(16, 'yejin', '이예진', '헉 ㅠㅠㅠㅠ', 31),
(17, 'yejin', '이예진', 'ㅎㅎㅎ', 33),
(18, 'alstjr', '김민석', '재밌다', 32),
(19, 'alstjr', '김민석', '우와', 33),
(20, 'alstjr', '김민석', 'ㅎㅇㅎ', 29),
(21, 'ehdgk', '김동하', '일본추천이염', 34),
(22, 'ehdgk', '김동하', '오아아아ㅏ아앙', 33),
(23, 'ehdgk', '김동하', 'ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ', 35);

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `idx` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `id` varchar(300) NOT NULL,
  `pw` varchar(300) NOT NULL,
  `email` varchar(45) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`idx`, `name`, `id`, `pw`, `email`, `profile`) VALUES
(7, 'admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'admin@naver.com', '09295aa5aac9796025e2ae4a9af1668b.gif'),
(8, '이예진', 'yejin', '1e697bf5aaf1c0aee42893283e8062040257afbd7f14031781dea460e166f05b8e0e135704f9f9903e85d1663d7657f13b65a6c4eb1721fa8788a9f32ce6bba8', 'yejin@naver.com', 'images.jpg'),
(9, '김민석', 'alstjr', '7ab474432848f198bd902d40f2836d37c206e2dcb144e337192c6fa7a86ddcb52277944ee500a92910bea21d7b2bfe64dd216e5c12741c3a94afa651f1ca3b5b', 'alstjr@naver.com', 'KakaoTalk_20160910_031026444.gif'),
(10, '김동하', 'ehdgk', 'db39a3dea72f82c317eb6e1b777a2b90426991afd3692c6c7c2ff477ca7e6b092c654910e808d4f5bf971ae414ee52f5c7f96f8a7410c1e093b6a130ee8beb7e', 'ehdgk@naver.com', 'sdf.png'),
(12, '김인태', 'dlsxo', '17ae21274a05b071511e9512072c5b388d342c914c937af85c62f70014c8322f003479202b5bd49e0b086963d38426e06e04e3439e41e0d53f99d310439cca52', 'dlsxo@naver.com', 'dddd.jpg');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `cafejoin`
--
ALTER TABLE `cafejoin`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `catecory`
--
ALTER TABLE `catecory`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- 테이블의 AUTO_INCREMENT `cafe`
--
ALTER TABLE `cafe`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 테이블의 AUTO_INCREMENT `cafejoin`
--
ALTER TABLE `cafejoin`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 테이블의 AUTO_INCREMENT `catecory`
--
ALTER TABLE `catecory`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
