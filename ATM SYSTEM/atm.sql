-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 07:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountId` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `userSsn` varchar(225) NOT NULL,
  `accountType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `pin`, `userSsn`, `accountType`) VALUES
(100015, 1234, '123456789', 'Gold Account'),
(100016, 1234, '123456789', 'Current Account'),
(100017, 1234, '123456789', 'Saving Account'),
(100018, 4321, '123459876', 'Gold Account'),
(100019, 4321, '123459876', 'Current Account'),
(100020, 4321, '123459876', 'Saving Account'),
(100021, 6789, '9876543212', 'Gold Account'),
(100022, 6789, '9876543212', 'Current Account'),
(100023, 6789, '9876543212', 'Saving Account');

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `name` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `location`, `balance`, `name`) VALUES
(1, 'Giza', 2501500, 'Giza ATM');

-- --------------------------------------------------------

--
-- Table structure for table `currentaccount`
--

CREATE TABLE `currentaccount` (
  `pin` int(11) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentaccount`
--

INSERT INTO `currentaccount` (`pin`, `balance`) VALUES
(1234, 10002611),
(4321, 35556914),
(6789, 1087766);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `amount`) VALUES
(111, 12345),
(114, 111),
(115, 22),
(116, 22),
(118, 1500),
(120, 4000),
(121, 3500),
(122, 111),
(124, 11);

-- --------------------------------------------------------

--
-- Table structure for table `goldaccount`
--

CREATE TABLE `goldaccount` (
  `pin` int(11) NOT NULL,
  `balance` double NOT NULL,
  `dailyIntrest` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goldaccount`
--

INSERT INTO `goldaccount` (`pin`, `balance`, `dailyIntrest`) VALUES
(1234, 4485163, 123),
(4321, 35098090, 123),
(6789, 824729, 123);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `reportData` date NOT NULL,
  `numOfWithdraw` int(11) NOT NULL,
  `numOfTransfer` int(11) NOT NULL,
  `numOfDeposit` int(11) NOT NULL,
  `atmName` varchar(448) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `adminId`, `reportData`, `numOfWithdraw`, `numOfTransfer`, `numOfDeposit`, `atmName`) VALUES
(1, 3415, '2023-10-27', 3, 3, 4, 'Giza ATM'),
(2, 3415, '2023-10-12', 3, 8, 6, 'Giza ATM'),
(3, 3415, '2023-10-06', 4, 8, 9, 'Giza ATM'),
(4, 3415, '2023-10-01', 10, 9, 4, 'Giza ATM');

-- --------------------------------------------------------

--
-- Table structure for table `savingaccount`
--

CREATE TABLE `savingaccount` (
  `pin` int(11) NOT NULL,
  `annuaIntrest` double NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savingaccount`
--

INSERT INTO `savingaccount` (`pin`, `annuaIntrest`, `balance`) VALUES
(1234, 1000, 2487230),
(4321, 1000, 5839292),
(6789, 1000, 35929);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `transactiontType` varchar(255) NOT NULL,
  `transactionData` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `account`, `transactiontType`, `transactionData`) VALUES
(109, 100015, 'Withdraw', '2023-10-05'),
(110, 100015, 'Withdraw', '2023-10-27'),
(111, 100015, 'Deposit', '2023-10-27'),
(112, 100015, 'Transfer', '2023-10-27'),
(113, 100015, 'Transfer', '2023-10-27'),
(114, 100016, 'Deposit', '2023-10-27'),
(115, 100015, 'Deposit', '2023-10-27'),
(116, 100015, 'Deposit', '2023-10-27'),
(117, 100021, 'Withdraw', '2023-10-27'),
(118, 100021, 'Deposit', '2023-10-27'),
(119, 100021, 'Transfer', '2023-10-27'),
(120, 100021, 'Deposit', '2023-10-27'),
(121, 100021, 'Deposit', '2023-10-27'),
(122, 100015, 'Deposit', '2023-11-19'),
(123, 100015, 'Withdraw', '2023-11-19'),
(124, 100015, 'Deposit', '2023-11-19'),
(125, 100015, 'Transfer', '2023-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `toAccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `amount`, `toAccount`) VALUES
(112, 123, 4321),
(113, 1236, 4321),
(119, 2500, 1234),
(125, 111, 6789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `pin` int(11) NOT NULL,
  `userStatus` varchar(200) NOT NULL DEFAULT 'valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `ssn`, `address`, `role`, `password`, `pin`, `userStatus`) VALUES
(3410, 'Amr Gamal ', '011124567', '123456789', 'giza', 'user', '1234', 1234, 'valid'),
(3411, 'Mohamed Ali ', '0123454665', '9876543212', 'cairo', 'user', '4321', 4321, 'valid'),
(3412, 'mahmoud yasin ', '013456764', '123459876', 'monofiya', 'user', '6789', 6789, 'valid'),
(3415, 'Ahmed', '019492392', '192837456', 'Giza', 'admin', '4567', 4567, 'valid'),
(3416, 'Ibrahim', '013948534', '123458769', 'Cairo', 'admin', '7654', 7654, 'valid'),
(3417, 'Ali ', '010148298', '987234567', 'hawmdiyaa', 'bankclerk', '1010', 1010, 'valid'),
(3418, 'yousef', '0107309792', '987654312', 'alex', 'bankclerk', '2020', 2020, 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `amount`) VALUES
(109, 100),
(110, 100),
(117, 800),
(123, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountId`),
  ADD UNIQUE KEY `accountId` (`accountId`),
  ADD KEY `user_ssn` (`userSsn`);

--
-- Indexes for table `currentaccount`
--
ALTER TABLE `currentaccount`
  ADD KEY `pin` (`pin`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goldaccount`
--
ALTER TABLE `goldaccount`
  ADD KEY `pin` (`pin`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `savingaccount`
--
ALTER TABLE `savingaccount`
  ADD KEY `pin` (`pin`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `account` (`account`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_account` (`toAccount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD UNIQUE KEY `pin` (`pin`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100024;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3420;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`userSsn`) REFERENCES `users` (`ssn`);

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`id`) REFERENCES `transactions` (`transactionId`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `transactions` (`transactionId`),
  ADD CONSTRAINT `transfers_ibfk_2` FOREIGN KEY (`toAccount`) REFERENCES `users` (`pin`);

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_ibfk_1` FOREIGN KEY (`id`) REFERENCES `transactions` (`transactionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
