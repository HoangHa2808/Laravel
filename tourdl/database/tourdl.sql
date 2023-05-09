-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 05:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `show_on_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `show_on_menu`, `created_at`, `updated_at`) VALUES
(1, 'Du lịch', 'du-lich', 'Danh mục chứa các bài viết liên quan đến tour du lịch', 1, '2023-05-06 12:50:43', '2023-05-06 12:50:43'),
(2, 'Khách sạn', 'khach-san', 'Danh mục chứa các bài viết liên quan đến khách sạn', 1, '2023-05-06 12:52:52', '2023-05-06 12:52:52'),
(3, 'Ẩm thực', 'am-thuc', 'Danh mục chứa các bài viết liên quan đến ẩm thực', 1, '2023-05-06 12:55:48', '2023-05-06 12:55:48'),
(4, 'Tin tức', 'tin-tuc', 'Danh mục chứa các bài viết liên quan đến tin tức', 1, '2023-05-06 12:56:43', '2023-05-06 12:56:43'),
(5, 'Xin chào', 'xin-chao', 'Chào mừng bạn đã đến đây', 0, '2023-05-06 14:11:23', '2023-05-06 14:11:23'),
(6, 'Xin chào', 'xin-chao', 'Chào mừng bạn đã đến đây', 0, '2023-05-06 14:31:14', '2023-05-06 14:31:14'),
(7, 'Xin chao', 'xin-chao', 'Chào mừng bạn đã đến đây', 0, '2023-05-06 14:42:11', '2023-05-06 14:42:11'),
(8, 'chao', 'chao', 'Chào mừng bạn đã đến đây', 0, '2023-05-06 14:43:55', '2023-05-06 14:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `dirves`
--

CREATE TABLE `dirves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `user_name`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 2, 'minhminh', 'Bài viết này thật hữu ích, tôi rất thích nó.', NULL, NULL),
(2, 5, 'baoanh', 'Tôi rất thích bài viết này, mong là sẽ có nhiều bài viết hay như thế.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `ratting` char(5) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `category_id`, `title`, `slug`, `discount`, `ratting`, `short_description`, `description`, `published`, `created_at`, `updated_at`) VALUES
(1, 2, 'Khách sạn được yêu thích nhất', 'khach-san-duoc-yeu-thich-nhat', 999999.99, '*****', 'Là một khách sạn 5 sao tốt nhất đã rất quen thuộc với các tín đồ du lịch yêu Đà Lạt.', 'Khách sạn đạt chuẩn 5 sao được bố trí các trang thiết bị tiện nghi, hiện đại đi kèm là những dịch vụ đẳng cấp. Chỉ cách Hồ Xuân Hương và Chợ đêm Đà Lạt vài phút đi bộ, khách sạn được đánh giá là khách sạn tốt nhất dành cho du khách muốn tham quan tận hưởng thiên đường du lịch xứ sở sương mù.', 0, '2023-05-02 12:51:23', NULL),
(2, 2, 'Khách sạn được yêu thích nhất', 'khach-san-duoc-yeu-thich-nhat', 999999.99, '*****', 'Là một khách sạn 5 sao tốt nhất đã rất quen thuộc với các tín đồ du lịch yêu Đà Lạt.', 'Khách sạn đạt chuẩn 5 sao được bố trí các trang thiết bị tiện nghi, hiện đại đi kèm là những dịch vụ đẳng cấp. Chỉ cách Hồ Xuân Hương và Chợ đêm Đà Lạt vài phút đi bộ, khách sạn được đánh giá là khách sạn tốt nhất dành cho du khách muốn tham quan tận hưởng thiên đường du lịch xứ sở sương mù.', 0, '2023-05-02 12:51:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_07_023511_create_categories_table', 1),
(6, '2023_05_07_072905_create_feedback_table', 1),
(7, '2023_05_07_081640_create_hotels_table', 1),
(8, '2023_05_07_081657_create_tours_table', 1),
(9, '2023_05_07_081706_create_news_table', 1),
(10, '2023_05_07_095707_create_post_types_table', 1),
(11, '2023_05_07_095723_create_roles_table', 1),
(12, '2023_05_07_095805_create_orders_table', 1),
(13, '2023_05_07_095818_create_dirves_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `view_count` int(11) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `view_count`, `short_description`, `description`, `published`, `created_at`, `updated_at`) VALUES
(1, 4, 'Mặc gì khi đi Đà Lạt mùa thu đông?', 'mac-gi-khi-di-Da-Lat-mua-thu-đong?', 40, 'Thường thì từ cuối tháng 10 đến cuối tháng 11 Đà Lạt sẽ bước vào giai đoạn “lập đông”, theo TOP Homestay thì lúc này là thời điểm đẹp nhất. Đây là lúc nhiệt độ ở Đà Lạt vào khoảng từ 10 – 20 độ mà thôi, nhất là khi vào sáng sớm hay lúc tối đến thì chắc chắn bạn sẽ phải co ro trong cái lạnh tê tái của Đà Lạt', 'Một combo hoàn hảo mà chúng mình gợi ý cho bạn. Những chiếc quần jeans ống rộng được xem là “must have item” đình đám mà bất kì cô nàng nào cũng phải có trong tủ đồ của mình. Vậy nên, trong chuyến du lịch Đà Lạt sắp tới bạn đừng quên đem theo chiếc quần hot trend này trong vali du lịch của mình nhé.\r\n\r\nMột tips nhỏ dành cho bạn là nên mix cùng với 1 chiếc áo lên body ở bên trong và khoác áo cardigan họa tiết ở bên ngoài. Việc kết hợp này không chỉ khiến set đồ trở nên thời trang hơn mà còn giúp bạn ăn gian chiều cao đáng kể. Một số địa điểm chụp ảnh ở Đà Lạt đặc biệt thích hợp với phong cách thời trang này như: chợ Đà Lạt hay các đồi chè,…\r\n\r\nNếu như bạn thích mặc quần short ngắn thì hãy xem trước dự báo thời tiết trước 3 ngày để tránh bị lạnh khi tới thành phố du lịch này, và hãy nhớ mang theo áo khoác dày đề phòng cảm lạnh.', 1, '2023-04-19 14:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị viên', NULL, NULL),
(2, 'staff', 'Nhân viên', NULL, NULL),
(3, 'manage', 'Người quản lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `times` varchar(100) NOT NULL,
  `schedule` datetime NOT NULL,
  `time_down` datetime NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `place` varchar(5) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `category_id`, `title`, `slug`, `times`, `schedule`, `time_down`, `price`, `discount`, `place`, `short_description`, `description`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tour du lịch lễ 30/4', 'Tour-du-lich-le-30/4', 'Tp.Hồ Chí Minh - Đà Lạt - Tp.Hồ Chí Minh', '2023-05-01 20:58:58', '2023-04-30 20:58:58', 999999.99, 999999.99, '10', 'Chào mừng Đại lễ 30/4 - ngày giải phóng miền Nam thống nhất Đất nước và Quốc tế lao động 1/5, Tours du lịch ra mắt chùm tour du lịch Lễ 30/4 và 1/5 năm 2023 giá rẻ với nhiều điểm điểm du lịch mới và hấp dẫn.', 'Tour du lịch Đà Lạt 3 ngày 3 đêm lễ 30/4 - 1/5/2024\r\nNhững tour du lịch của Tours du lịch ngoài giá cả cạnh tranh nhưng chất lượng tour vẫn không hề thay đổi ra thì chương trình tour được nghiên cứu bải bản, lên kế hoạch rõ ràng từ khâu ăn uống, ngủ nghỉ đến các địa điểm vui chơi giải trí nổi bật đảm bảo cho Quý khách hàng có chuyến du lịch 30/4/2023 vui nhộn và ý nghĩa nhất\r\n\r\n', 1, '2023-04-28 13:58:58', NULL),
(2, 1, 'Tour du lịch lễ 30/4', 'Tour-du-lich-le-30/4', 'Tp.Hồ Chí Minh - Đà Lạt - Tp.Hồ Chí Minh', '2023-05-01 20:58:58', '2023-04-30 20:58:58', 999999.99, 999999.99, '10', 'Chào mừng Đại lễ 30/4 - ngày giải phóng miền Nam thống nhất Đất nước và Quốc tế lao động 1/5, Tours du lịch ra mắt chùm tour du lịch Lễ 30/4 và 1/5 năm 2023 giá rẻ với nhiều điểm điểm du lịch mới và hấp dẫn.', 'Tour du lịch Đà Lạt 3 ngày 3 đêm lễ 30/4 - 1/5/2024\r\nNhững tour du lịch của Tours du lịch ngoài giá cả cạnh tranh nhưng chất lượng tour vẫn không hề thay đổi ra thì chương trình tour được nghiên cứu bải bản, lên kế hoạch rõ ràng từ khâu ăn uống, ngủ nghỉ đến các địa điểm vui chơi giải trí nổi bật đảm bảo cho Quý khách hàng có chuyến du lịch 30/4/2023 vui nhộn và ý nghĩa nhất\r\n\r\n', 1, '2023-04-28 13:58:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123@gmail.com', NULL, '$2y$10$rPij5NmLnkMXGOQpwemK/ukiGX8WjVZkCsP731sEjthysd083FLP.', 'mg1R5NDpNk4Yeg4Dema2SB1bF7CiLNqN10TufQP3EDwwjgt5tgtZYLi1cyHa', '2023-05-07 03:00:36', '2023-05-07 03:00:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dirves`
--
ALTER TABLE `dirves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dirves`
--
ALTER TABLE `dirves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
