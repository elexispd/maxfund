-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2025 at 11:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxfund`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets`
--

CREATE TABLE `admin_wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `wallet_method_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_wallets`
--

INSERT INTO `admin_wallets` (`id`, `wallet_method_id`, `address`, `qr_code_path`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '1JuQ9vc75XchkTd7zyWsouncHqoj12UddK', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(2, 2, '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB381', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(3, 3, '3255UweswsGcR1u3x8AoiJQQWQwGF1aLZviowQoAn1Hm', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(4, 5, 'TCYMXyWXBtLJExGTcc3qGjf3ZtyrQE6Mvw', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(5, 6, '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB381', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(6, 7, 'TCYMXyWXBtLJExGTcc3qGjf3ZtyrQE6Mvw', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(7, 11, '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB381', NULL, 1, '2025-04-26 06:52:35', NULL),
(10, 4, '0x6864A7deE52d9A9C395CDdCc350F46d9EFaFB381', NULL, 1, '2025-04-26 07:05:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `wallet_method_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `screenshot_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'd0c95553-02fe-4eb9-be95-0b2888bb314f', 'database', 'default', '{\"uuid\":\"d0c95553-02fe-4eb9-be95-0b2888bb314f\",\"displayName\":\"App\\\\Notifications\\\\ReferralBonusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:85;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\ReferralBonusNotification\\\":4:{s:8:\\\"referrer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:85;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"referredUser\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:174;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"bonusAmount\\\";d:5;s:2:\\\"id\\\";s:36:\\\"692be4d4-7fe1-430d-b5c6-05736c1bcb01\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 'PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php:47\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(47): PDO->prepare()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(809): Illuminate\\Database\\MySqlConnection->Illuminate\\Database\\{closure}()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#50 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#51 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist (Connection: mysql, SQL: insert into `notifications` (`id`, `type`, `data`, `read_at`, `notifiable_id`, `notifiable_type`, `updated_at`, `created_at`) values (692be4d4-7fe1-430d-b5c6-05736c1bcb01, App\\Notifications\\ReferralBonusNotification, {\"message\":\"You received $5.00 referral bonus from Olufemi Jethro\'s first investment\",\"url\":\"\\/transactions\",\"icon\":\"fa-money-bill-transfer\"}, ?, 85, App\\Models\\User, 2025-07-14 16:07:02, 2025-07-14 16:07:02)) in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php:822\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#50 {main}', '2025-07-14 14:07:02'),
(2, 'bd550272-79fe-493c-80a0-75e57c48a2cc', 'database', 'default', '{\"uuid\":\"bd550272-79fe-493c-80a0-75e57c48a2cc\",\"displayName\":\"App\\\\Notifications\\\\ReferralBonusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:85;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\ReferralBonusNotification\\\":4:{s:8:\\\"referrer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:85;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"referredUser\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:151;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"bonusAmount\\\";d:6.5;s:2:\\\"id\\\";s:36:\\\"9e4f0a1d-69ca-464d-9e9a-44d7eea82aae\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 'PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php:47\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(47): PDO->prepare()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(809): Illuminate\\Database\\MySqlConnection->Illuminate\\Database\\{closure}()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#50 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#51 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist (Connection: mysql, SQL: insert into `notifications` (`id`, `type`, `data`, `read_at`, `notifiable_id`, `notifiable_type`, `updated_at`, `created_at`) values (9e4f0a1d-69ca-464d-9e9a-44d7eea82aae, App\\Notifications\\ReferralBonusNotification, {\"message\":\"You received $6.50 referral bonus from Chidi Joy\'s first investment\",\"url\":\"\\/transactions\",\"icon\":\"fa-money-bill-transfer\"}, ?, 85, App\\Models\\User, 2025-07-27 22:34:02, 2025-07-27 22:34:02)) in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php:822\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#50 {main}', '2025-07-27 20:34:02');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(3, '0e89929f-8e05-4357-8c71-05d27a17be0b', 'database', 'default', '{\"uuid\":\"0e89929f-8e05-4357-8c71-05d27a17be0b\",\"displayName\":\"App\\\\Notifications\\\\ReferralBonusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:174;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\ReferralBonusNotification\\\":4:{s:8:\\\"referrer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:174;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"referredUser\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"bonusAmount\\\";d:5;s:2:\\\"id\\\";s:36:\\\"b404f623-6442-4f84-bd08-e39013382629\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 'PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php:47\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(47): PDO->prepare()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(809): Illuminate\\Database\\MySqlConnection->Illuminate\\Database\\{closure}()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#50 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#51 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist (Connection: mysql, SQL: insert into `notifications` (`id`, `type`, `data`, `read_at`, `notifiable_id`, `notifiable_type`, `updated_at`, `created_at`) values (b404f623-6442-4f84-bd08-e39013382629, App\\Notifications\\ReferralBonusNotification, {\"message\":\"You received $5.00 referral bonus from Adedeji George Akin\'s first investment\",\"url\":\"\\/transactions\",\"icon\":\"fa-money-bill-transfer\"}, ?, 174, App\\Models\\User, 2025-08-04 18:48:01, 2025-08-04 18:48:01)) in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php:822\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#50 {main}', '2025-08-04 16:48:01'),
(4, 'd9da0241-731f-4f65-85a9-9553e91889c3', 'database', 'default', '{\"uuid\":\"d9da0241-731f-4f65-85a9-9553e91889c3\",\"displayName\":\"App\\\\Notifications\\\\ReferralBonusNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:183;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\ReferralBonusNotification\\\":4:{s:8:\\\"referrer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:183;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"referredUser\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:205;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"bonusAmount\\\";d:10;s:2:\\\"id\\\";s:36:\\\"4934f199-3581-4423-8d24-70f47c9fac21\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 'PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php:47\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(47): PDO->prepare()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(809): Illuminate\\Database\\MySqlConnection->Illuminate\\Database\\{closure}()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#49 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#50 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#51 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S02]: Base table or view not found: 1146 Table \'maxfundn_maxfund.notifications\' doesn\'t exist (Connection: mysql, SQL: insert into `notifications` (`id`, `type`, `data`, `read_at`, `notifiable_id`, `notifiable_type`, `updated_at`, `created_at`) values (4934f199-3581-4423-8d24-70f47c9fac21, App\\Notifications\\ReferralBonusNotification, {\"message\":\"You received $10.00 referral bonus from Adedeji Oluwasayo Favour\'s first investment\",\"url\":\"\\/transactions\",\"icon\":\"fa-money-bill-transfer\"}, ?, 183, App\\Models\\User, 2025-08-05 20:23:02, 2025-08-05 20:23:02)) in /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php:822\nStack trace:\n#0 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(776): Illuminate\\Database\\Connection->runQueryCallback()\n#1 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php(42): Illuminate\\Database\\Connection->run()\n#2 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php(3720): Illuminate\\Database\\MySqlConnection->insert()\n#3 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php(2208): Illuminate\\Database\\Query\\Builder->insert()\n#4 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1384): Illuminate\\Database\\Eloquent\\Builder->__call()\n#5 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(1212): Illuminate\\Database\\Eloquent\\Model->performInsert()\n#6 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(370): Illuminate\\Database\\Eloquent\\Model->save()\n#7 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(399): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->Illuminate\\Database\\Eloquent\\Relations\\{closure}()\n#8 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/HasOneOrMany.php(367): tap()\n#9 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/Channels/DatabaseChannel.php(19): Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany->create()\n#10 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(147): Illuminate\\Notifications\\Channels\\DatabaseChannel->send()\n#11 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(105): Illuminate\\Notifications\\NotificationSender->sendToNotifiable()\n#12 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#13 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/NotificationSender.php(100): Illuminate\\Notifications\\NotificationSender->withLocale()\n#14 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow()\n#15 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Notifications/SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow()\n#16 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle()\n#17 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#19 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#20 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#21 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(125): Illuminate\\Container\\Container->call()\n#22 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#23 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#24 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(129): Illuminate\\Pipeline\\Pipeline->then()\n#25 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#26 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#27 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#28 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#29 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#30 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call()\n#31 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(391): Illuminate\\Queue\\Worker->process()\n#33 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(177): Illuminate\\Queue\\Worker->runJob()\n#34 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon()\n#35 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#36 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#39 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#40 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Container/Container.php(754): Illuminate\\Container\\BoundMethod::call()\n#41 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#42 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Command/Command.php(279): Illuminate\\Console\\Command->execute()\n#43 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#44 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(1094): Illuminate\\Console\\Command->run()\n#45 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand()\n#46 /home/maxfundn/domains/maxfund.net/app/vendor/symfony/console/Application.php(193): Symfony\\Component\\Console\\Application->doRun()\n#47 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(197): Symfony\\Component\\Console\\Application->run()\n#48 /home/maxfundn/domains/maxfund.net/app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 /home/maxfundn/domains/maxfund.net/app/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#50 {main}', '2025-08-05 18:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `expected_profit` decimal(15,2) NOT NULL,
  `total_interest_paid` double(15,2) DEFAULT NULL,
  `last_interest_payment_date` datetime DEFAULT NULL,
  `status` enum('active','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investment_plans`
--

CREATE TABLE `investment_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(15,2) NOT NULL,
  `max_amount` decimal(15,2) NOT NULL,
  `interest_rate` decimal(5,2) NOT NULL,
  `duration_days` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investment_plans`
--

INSERT INTO `investment_plans` (`id`, `name`, `slug`, `min_amount`, `max_amount`, `interest_rate`, `duration_days`, `created_at`, `updated_at`) VALUES
(6, 'Spot Plan', 'spot-plan', '50.00', '5000.00', '4.50', 7, '2025-04-24 21:45:09', NULL),
(7, 'Futures Plan', 'future-plan', '5000.00', '50000.00', '6.50', 7, '2025-04-24 21:45:09', NULL),
(8, 'Forex Plan', 'forex-plan', '50000.00', '500000.00', '8.50', 7, '2025-04-24 21:49:34', NULL),
(9, 'Stock Plan', 'stock-plan', '500000.00', '5000000.00', '10.50', 7, '2025-04-24 21:49:34', NULL),
(10, 'Reit Plan', 'reit-plan', '5000000.00', '50000000.00', '12.50', 7, '2025-04-24 21:49:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `k_y_c_verifications`
--

CREATE TABLE `k_y_c_verifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `document_type` enum('nin','driver_license','passport') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `dob` date NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_09_103600_create_wallet_methods_table', 1),
(5, '2025_04_09_103622_create_wallets_table', 1),
(6, '2025_04_09_103641_create_deposits_table', 1),
(7, '2025_04_09_103700_create_investment_plans_table', 1),
(8, '2025_04_09_103709_create_investments_table', 1),
(9, '2025_04_09_103721_create_transactions_table', 1),
(10, '2025_04_09_141521_create_admin_wallets_table', 1),
(11, '2025_04_09_162845_add_slug_to_investment_plans_table', 2),
(12, '2025_04_09_191318_add_dob_and_kyc_verified_to_users_table', 3),
(14, '2025_04_10_090134_create_withdrawals_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ekebu4real@yahoo.com', '$2y$12$pJjizPORH83SZDsrI9e4/O1CpnbkzXZ/uFTD8iaTUhHpOS3mmdBvK', '2025-04-26 21:25:41'),
('imscotonou@gmail.com', '$2y$12$5SOeHexk01gRBBv7AUSG7e.HxCV03Ogt.5zZUq9/WesZ1euORV6ja', '2025-05-10 06:46:26'),
('ogbonnayadaniel095@gmail.com', '$2y$12$wL9gGM2cYeZ3ggbmlwJ55euhuKGzje6/sLokNKNSCzvNN2pxYAFRu', '2025-05-23 17:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0o9LnxESt4qe070LqASYuoS7VHJZlhnoQJcY8bJJ', NULL, '40.77.167.28', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3JkZVg5UHIyY3RoVEQ4bmJHakJoMG9IblhCYkpmTmpEeG5Qa2p2aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvZmFxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755375662),
('1N30hqtTznrB8QmnAIdxxmc2DrEjOrVQCfVN3Ot3', NULL, '40.77.167.3', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjFHYVpsaHhOZU4ySGR2ZzluUFpSdDh1MWl4dUo2UEJpZFFJUldVaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vd3d3Lm1heGZ1bmQubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755345845),
('1sJ7Yt1sjQl7JvjFXcjZ5yGh6NPBFJezVnZ3ekVC', NULL, '36.112.209.154', 'Mozilla/5.0 Firefox/35.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1AwM0phR3hDbEtxaGlmek1WZmNaWDM3VTZIUGJ3cFVpNUw0Z0FVcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9tYXhmdW5kLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755362653),
('3tsJeb3vf8j5ZYvlmLLyME5HLZVEvppWZKBzzAIM', NULL, '117.150.20.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFZ5Sm1SekgxeWpDeTBlcVJZZEFpVXNKeE4wTkNZc3g2a1dQa0VsdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvZmFxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755335328),
('9PVu4hnB43JfruWlatZHKtY2uokwCtEMJ9G6rDLZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidW4ySGNGV2x3UFhMWmtnUzBlb1BaTWFMeHhJeGtha0NFVEJpMk5yUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755380567),
('BfXu9ZqCGvzaWWTbxTznAM5mJozhprqPB9uVZBDS', NULL, '52.167.144.145', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0Z4aE1zVDNUdTNtd04zZXVDV1JONkdVOG5sN01KeThUQUFubmV2cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvc2VydmljZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755348480),
('c8FGlO1wWmdVLBRTk8vBZN7Mc2YUW6gOLvUcfygu', NULL, '15.160.209.38', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2RCZ2Y2NFB5Q2dIT3p4NXRRNzhqeW93T1paZU0ycTV2T2h5OHF0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755357093),
('DiqZeHM00L9cwRqgntmdBdq2eugPSPJicRwDtBfg', NULL, '220.197.30.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFpkZXdMSGxEb0c5Z0hWeWNFNFp6UU9pYmtSTlNxVGdMV1lsNlI3ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly93d3cubWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755321591),
('e0LDJrj86cljuLDtbEQ46DLFQx1YeEAL60OFRM0R', NULL, '52.167.144.228', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSE9HZldjMFQ0eDhlU05uNXNWZGY1cFBuaDVESWs5eldyVmVqck40TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755373118),
('EeU7ZiQE4C8LeQHjjtNP1ZA9W4nE08IshJuI1ycG', NULL, '52.167.144.188', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0tFc3dWQ3pRdVhVVEppN1pUOXBUUTNlTWlaWHM2OWxwdGxpM2J3cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvZmFxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755337233),
('h2BE2tQXJeSgvx8Tfh496qPSzll8UBnnXDZHP7WX', NULL, '110.227.200.101', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmZvZ041MExJQnRqMjVabmlaQldsbXNqZzB4TERDN0NlVUJTNVJRcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755328271),
('isRw3ko4jeUcOTufLfnZVettP3QCz5RKGycDreBk', 212, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZUFka2NYaDBvUHlWMXNMbkoxdUNIN05Ba0VMZEJYUG5nR1paTHAwOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnZlc3RtZW50L3Nwb3QtcGxhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIxMjt9', 1755384817),
('IY8GmOm4QuWCs5Giu4pRYxF3dTPXxPxlDJpjLdBY', NULL, '159.65.7.110', 'Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnV1NnJlZk9pZWhBY01KWFpxdkVoYktqcWJna3FOOUxNVm1ZTFVuRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9tYXhmdW5kLm5ldC9pbmRleC5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755313371),
('jxhVgssKH1vwXlz36JnB2ivgRxPPXolh9mKoh184', NULL, '40.77.167.17', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3BlbHBTVXJGS05QeGNKMXlCNFNBWFhybldqaWpzbTg4aVZhVW9vZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvYWJvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755348476),
('kK3WFPEvSl21ZiufkUwDbfwNOcW5wsuL71ECFzVq', 151, '105.112.176.71', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/139.0.7258.76 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUttMnhiNk5KQUYxWWN0YVhjbzRSbjVkN0dJNGlVMTVxNlRCTjJsQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvaW52ZXN0bWVudC9zcG90LXBsYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTE7fQ==', 1755296579),
('MTZrbuyNWXKi1GfwHRB6YfHgUqmuCZaUalpTAZqA', NULL, '220.197.30.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTER4ZWdLT2RTU05XTmhRYnphNTlhcGNESDJaYVI4ZmtTNGI4RUE2byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755321591),
('N4UQz05O6OjEL3AsmTYtPcRyHlRG0f5k3pJQbqgJ', NULL, '123.182.49.196', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) CriOS/56.0.2924.75 Mobile/14E5239e YisouSpider/5.0 Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlB0MTFvajl5Nk5xdTAyME05WjhNek04ZlFOWmtLWDcybVNKQXlkTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9tYXhmdW5kLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755326277),
('pOSyT0tCrggnwIJc2t2zuDHga088ti8W36hzI1gR', NULL, '185.54.49.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0t1M0V0VE1zMm00ODdPcUxXamRHY0J3RFpub01XZ1RkdmlNTTVBOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755345737),
('s5O58DDWPp7znyNJn7wzgljioQDmuui9YzxIaXXL', NULL, '105.112.192.75', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/139.0.7258.76 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicG96VEE4ZmxtR2F4anlKdklrTloyMlY1S3A3cUw2VWJuZEk5eGllRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cHM6Ly9tYXhmdW5kLm5ldC9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNToiaHR0cHM6Ly9tYXhmdW5kLm5ldC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755344554),
('sQ5ATux423vINjto19J7deDfBEn7M90CrGv6E9C8', NULL, '102.69.220.200', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWno5NEx0VmhMeW4wajFQUU5mbUpyMG8wUWRVeEFneDFQVnl6NnNqRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755355159),
('TLfaiALGL5Hla72lyHdEbAWw2yUuVuIYN4Dn38gd', NULL, '52.167.144.188', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWI3SnNucnRXbXhDS1RhZ0s3U3o0QmF0Q2ZYRnM5M0NiaDhkTWNndCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755337233),
('UU21rdFEtTbWcPRvvKWtRqDyZWh44gKB8L37LhhS', 151, '105.112.192.75', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/139.0.7258.76 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT29wNUpodFNXNjRESXJtQVZDRnE5VmVvUDRxdnU1N0o3T0RMV1JZeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwczovL21heGZ1bmQubmV0L2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE1MTt9', 1755325148),
('vGeDduGao3HCktLvIlbSLRNKVB70ZOkk2gIqiZpg', NULL, '102.90.96.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0FUdGxTOG1FSWJ4cnlMN2JYZTdMdWtPMTJkdlVwUmpiU3BFajZ6VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755300266),
('VOguWEfYKi0mrQfLwfNmFGzRcvzzK2uLJePhDTf1', NULL, '185.54.49.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGU4Q29nNUZRYUk2WVduT2ZQMUhhTDNzWUNRWmlWbVhQbVBBelEyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vbWF4ZnVuZC5uZXQvY29udGFjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755345747),
('yKiLQDRbB5yUarUVJwaQPWtsiK0vix0zXDgWvwvs', NULL, '89.187.168.71', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXRiMDl3UFd6YVU5UnpRaHhTRk9BblpZektjZkdpQUNqdjcyZVhSZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vbWF4ZnVuZC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755357093),
('zErioENi04si7IdrWAFuZY20DUOczyVRkZMIwIZK', NULL, '220.197.30.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVFxbmZubnU1OUdKb0VKWVpTMFc1dWZhMHdHQ3F1QWVVbVJDM2ZGSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9tYXhmdW5kLm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755321591),
('zobyBttuCunxqbrRzTvz5Lqhaq8x3Xdjc4rGMBd7', NULL, '220.197.30.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTJzZnFTbmFOMGJHR1lXbUJxU0p6MmJtRFg4VXByVWxPT0NwWTRUSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vd3d3Lm1heGZ1bmQubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755321591);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `kyc_verified` tinyint(1) NOT NULL DEFAULT '0',
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` bigint UNSIGNED DEFAULT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `referral_bonus` decimal(10,2) NOT NULL DEFAULT '0.00',
  `referral_count` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `role`, `address`, `state`, `zip`, `country`, `dob`, `kyc_verified`, `referral_code`, `referred_by`, `balance`, `referral_bonus`, `referral_count`, `status`, `profile_image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Elexis Promise', 'promisedeco24@gmail.com', NULL, '08181346796', 'admin', NULL, 'NY', '12', 'Nigeria', '2025-04-03', 1, 'promise', NULL, '8381.60', '0.00', 0, 'active', NULL, '$2y$12$7kbwcP3uBi9tx3SX.U9a4.yYMLlm9H3bkzo.nsjqHeoG6L4jYWpNK', NULL, '2025-04-09 14:46:52', '2025-05-16 20:00:03'),
(212, 'Test User', 'user@example.com', NULL, '08181321496', 'user', NULL, NULL, NULL, 'russia', NULL, 0, NULL, NULL, '0.00', '0.00', 0, 'active', NULL, '$2y$12$9xk0LKF1AfibEJDdQzTfUer0m.KoFV4.WJXMYEdEsBMPbFDkKHVhi', NULL, '2025-08-16 21:49:31', '2025-08-16 21:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `wallet_method_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_methods`
--

CREATE TABLE `wallet_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_methods`
--

INSERT INTO `wallet_methods` (`id`, `name`, `code`, `network`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bitcoin', 'bitcoin', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(2, 'Ethereum', 'ethereum', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(3, 'Solana', 'solana', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(4, 'BNB Smart Chain', 'binancecoin', 'BEP20', 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(5, 'USDT', 'usdt', 'TRC20', 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(6, 'USDT', 'usdt', 'BEP20', 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(7, 'Tron', 'tron', NULL, 1, '2025-04-09 14:47:14', '2025-04-09 14:47:14'),
(11, 'USDT ', 'usdt', 'ERC20', 1, '2025-04-26 06:47:17', '2025-04-26 06:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `wallet_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_wallets_wallet_method_id_foreign` (`wallet_method_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposits_user_id_foreign` (`user_id`),
  ADD KEY `deposits_wallet_method_id_foreign` (`wallet_method_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investments_user_id_foreign` (`user_id`),
  ADD KEY `investments_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `investment_plans`
--
ALTER TABLE `investment_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_y_c_verifications`
--
ALTER TABLE `k_y_c_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kyc_verifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_code_unique` (`referral_code`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`),
  ADD KEY `wallets_wallet_method_id_foreign` (`wallet_method_id`);

--
-- Indexes for table `wallet_methods`
--
ALTER TABLE `wallet_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdrawals_user_id_foreign` (`user_id`),
  ADD KEY `withdrawals_wallet_id_foreign` (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investment_plans`
--
ALTER TABLE `investment_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=814;

--
-- AUTO_INCREMENT for table `k_y_c_verifications`
--
ALTER TABLE `k_y_c_verifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_methods`
--
ALTER TABLE `wallet_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD CONSTRAINT `admin_wallets_wallet_method_id_foreign` FOREIGN KEY (`wallet_method_id`) REFERENCES `wallet_methods` (`id`);

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `investments_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `investment_plans` (`id`),
  ADD CONSTRAINT `investments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
