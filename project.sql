-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 04:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `time` text NOT NULL,
  `point` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`question_id`, `question`, `time`, `point`, `op1`, `op2`, `op3`, `op4`, `answer`) VALUES
(1, 'Arduino (Atmega) pins can source / sink current up to', '30', '1', '30mA', '40mA', '25mA', '52.5mA', '40mA'),
(2, 'Which mathematical formula can be used to convert analog values into corresponding voltage values?', '30', '1', '(1023 / 5V) * (SensorValue)', '(SensorValue) / (5V * 1023)', '(5V * 1023) / (SensorValue)', '(SensorValue) * (5V / 1023)', '(SensorValue) * (5V / 1023)'),
(3, 'How many serial ports are available on the Arduino Uno Board?', '30', '1', '2', '4', '1', '3', '1'),
(4, 'Identify the SPI pins in Arduino.', '30', '1', '7,8 & 9', '11,12 & 13', '10,11 & 12', '8,9 & 10', '11,12 & 13'),
(5, 'Which function does not return any value when it is called by any other function?', '30', '1', 'Serial.Read()', 'Serial.println()', 'AnalogRead()', 'DigitalRead()', 'Serial.println()'),
(6, 'A Zener diode __________.', '60', '5', 'Has a high forward voltage rating.', 'Has a negative resistance.', 'Is useful as an amplifier.', 'Has a sharp breakdown at low reverse voltage.', 'Has a sharp breakdown at low reverse voltage.'),
(7, 'A function declaration involves establishing the function\'s _________', '60', '5', 'Parameters', 'Function\'s name', 'Function\'s name', 'All of the above', 'All of the above'),
(8, 'Which loop executes the instructions in loop atleast once?', '60', '5', 'If loop', 'While loop', 'For loop', 'Do while loop', 'Do while loop'),
(9, 'The ability to alter the order in which code is executed is called_____.', '60', '5', 'Direction Control', 'Program control', 'Flow control', 'None of the above', 'Flow control'),
(10, 'What is the correct syntax to initialize serial communication?', '60', '5', 'Serial.begin()', 'Serial.begin(9600)', 'Serial.begun(9600)', 'Serial.initialize(9600)', 'Serial.begin(9600)');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `account_code` text NOT NULL,
  `score` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
