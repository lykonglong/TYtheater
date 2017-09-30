-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2017 at 03:44 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tycinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(2, 'Hi-Fi'),
(3, 'Action'),
(4, 'Romantic'),
(6, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `movie_cate_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_image` varchar(100) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_date` date NOT NULL,
  `movie_tags` varchar(255) NOT NULL,
  `movie_trailer` varchar(255) NOT NULL,
  `movie_full` varchar(255) NOT NULL,
  `movie_resolution` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `user_id`, `movie_cate_id`, `movie_title`, `movie_image`, `movie_description`, `movie_date`, `movie_tags`, `movie_trailer`, `movie_full`, `movie_resolution`, `status`, `date_added`) VALUES
(1, 7, 3, 'Hit Man 2', 'hitman.jpg', 'Hello world', '0000-00-00', 'Hit man, action movie,a', 'trailer.mp4', 'full movie.mp4', 'HD 1080p', 1, '2017-09-10 10:42:05'),
(2, 7, 4, 'Once apon a time', 'once upon a time.jpg', 'remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages', '2017-02-12', 'romantic,action,love', 'Once Upon A Time Official Trailer.MP4', 'containing ', 'HD 1080p', 1, '2017-09-10 10:50:48'),
(3, 7, 3, 'Super man', 'man of steal 2.jpg', 'arious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2016-02-12', 'hello,world,hi', 'aaaaaaaaaaa', 'ddddddddd', 'HD 1080p', 1, '2017-09-10 11:07:43'),
(4, 7, 3, 'lasdl', 'once upon a time.jpg', 'asdsd', '0000-00-00', 'sdfsdf', 'sdfsdfs', 'dsdfsd', 'HD 1080p', 0, '2017-09-10 11:13:35'),
(5, 7, 4, 'asd', 'once upon a time.jpg', 'asdf', '0000-00-00', 'asdf', 'jk', 'hghj', 'HD 1080p', 0, '2017-09-10 11:15:19'),
(6, 7, 2, 'hgjkgh', 'hitman.jpg', 'ghjk', '0000-00-00', 'hjkjhj', 'ghj', 'hgk', 'HD 1080p', 0, '2017-09-10 11:16:04'),
(10, 7, 4, 'Beauty and the beast', 'Beauty-Beast-2017-Movie-Posters.jpg', 'BAB des', '2034-03-04', 'cute girl, the beast', 'vvvvvvvv', 'bbbbbbbbbbbbbbbb', 'HD 720p', 1, '2017-09-10 11:18:46'),
(11, 7, 3, 'Black Panther', 'Black-panther.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of', '2018-02-12', 'fighting movie', 'BLACK PANTHER Trailer (2018).MP4', '', 'HD 1080p', 1, '2017-09-10 11:57:16'),
(12, 7, 2, 'xxx', 'Beauty-Beast-2017-Movie-Posters.jpg', 'vvvvv', '0000-00-00', 'vvv', 'asdfsd', 'zcxv', 'HD 1080p', 1, '2017-09-10 13:18:04'),
(13, 7, 3, 'Avatar 2', 'Avatar-2.jpg', 'Avatar Episode', '2019-03-12', 'asdasd,sh,et', 'aaaaaa', 'ssssssss', 'HD 1080p', 1, '2017-09-10 13:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_link` varchar(255) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_image`, `slider_link`) VALUES
(5, 'once a time', 'hitman.jpg', 'gotoooooooooo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `user_image`, `user_role`, `date_added`) VALUES
(7, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'Admin', 'user8-128x128.jpg', 'Admin', '2017-09-08 07:55:08'),
(8, 'admin', 'ZHLOqIcte3uEs39NIq/hjnE5j1qGlI3jxlRFUSBnVRw=', 'admin test', 'avatar2.png', 'Subscriber', '2017-09-08 10:23:30'),
(9, 'hong', 'B5QETFAvzV+n0EzeMGE2LTkoX0GWRjNpNspLwhOxU4g=', 'Heng Kimhong', 'once upon a time.jpg', 'Subscriber', '2017-09-10 21:25:14');
