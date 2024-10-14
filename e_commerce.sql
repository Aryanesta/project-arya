-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2024 pada 13.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(2, 'Personal', 'personal', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(3, 'Mobile Development', 'mobile-development', '2024-10-12 06:16:06', '2024-10-12 06:16:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `phone_number`, `address`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 'Joni', 'male', 'karyawan1@gmail.com', '123456789012', 'Jubung', NULL, '2024-10-13 08:38:32', '2024-10-14 02:40:05'),
(2, 'Fani Thunderbolt', 'female', 'fani@gmail.com', '123456789013', 'KFC', NULL, '2024-10-13 08:51:46', '2024-10-13 08:59:32'),
(4, 'Sisi', 'female', 'karyawan2@gmail.com', '1310931932', 'Jember, Jatim', NULL, '2024-10-14 02:37:11', '2024-10-14 04:22:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_04_134959_create_posts_table', 1),
(5, '2024_10_05_070048_create_categories_table', 1),
(6, '2024_10_12_073908_create_products_table', 1),
(7, '2024_10_12_075038_create_product_categories_table', 1),
(8, '2024_10_13_075044_create_transactions_table', 2),
(9, '2024_10_13_075120_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `publish_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dolorem eaque rerum vero iste.', 'Necessitatibus perferendis tempore fugit voluptatibus ab vel.', 'Quia ad qui accusamus temporibus consequatur adipisci. Ea ut ut pariatur saepe id necessitatibus qui placeat. Tenetur quidem blanditiis in dolorum.', 'Necessitatibus sit molestias atque sit. In sit deleniti voluptas molestias nobis cupiditate. Amet voluptas aut incidunt quia eaque eos. Delectus officiis earum quis doloremque. Ducimus optio in praesentium odio non harum et id.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(2, 2, 1, 'Vel molestiae similique asperiores ea provident perspiciatis beatae iure.', 'Quasi occaecati ab culpa recusandae.', 'Doloribus et blanditiis hic. Qui qui mollitia mollitia quis unde laborum assumenda et. Facilis dicta ex libero fuga magnam. Omnis veniam beatae laudantium omnis id non.', 'Totam minima expedita atque. Accusantium et pariatur quis odit eveniet modi unde. Quia expedita aut hic totam. Ipsum magnam similique ex velit. Similique aut et aut dolorem voluptas omnis delectus. Est qui enim voluptatem dolores reprehenderit. Voluptatem laudantium adipisci vero dolor vel tenetur laborum.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(3, 1, 4, 'Deleniti et et perspiciatis exercitationem necessitatibus repellat voluptas.', 'Saepe distinctio est.', 'Totam animi enim ex necessitatibus sed animi. Harum impedit officiis quos aut ex facilis et aut. Mollitia distinctio qui error doloremque possimus facilis sint.', 'Quas eum dolorem quam molestiae quia atque. In sit et sit rem expedita ipsum. Sed iusto porro voluptas eum culpa ut suscipit est. Possimus id voluptas dolores aut. Saepe qui consequuntur quis occaecati aut ab quod. Id aut libero alias alias eos. Nemo rerum dolores qui doloribus. Aliquam dolor facilis harum ut. Quia quidem aspernatur sint ullam nisi commodi eius omnis.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(4, 3, 2, 'At odit voluptatem asperiores ut enim est aliquid earum.', 'Dolorum doloribus omnis.', 'Dolores suscipit nisi et qui molestiae et. Totam sit maxime ratione. Nisi autem quisquam non omnis culpa voluptatem.', 'Quidem fuga omnis rerum autem ut. Magnam sed suscipit id dignissimos unde omnis. Eum explicabo corrupti voluptatum fugiat. Veritatis minus voluptatem temporibus minima fugiat consequatur. Praesentium est dolor autem rerum.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(5, 3, 1, 'Nisi facere autem placeat corporis dolorem odit.', 'Et a eos.', 'Rerum inventore aut et dolores. Aut fuga ut vel expedita excepturi inventore consectetur sit. Vero et sunt quibusdam error consequatur consequuntur.', 'Quia sint inventore id tempore. Delectus voluptatibus incidunt omnis ut sunt doloremque omnis. Enim consequatur quasi velit et ipsam maiores laborum. Enim molestiae aut debitis et qui eaque laboriosam fugiat. Quis dolor modi repudiandae explicabo.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(6, 3, 5, 'Dignissimos enim ad ut.', 'Tenetur et ratione qui velit.', 'Nihil tempore distinctio provident illum maiores expedita perspiciatis. Mollitia excepturi voluptatibus est repudiandae. Et architecto minus perferendis non.', 'Autem qui vel dolor pariatur aut architecto natus. Nemo ut distinctio repellendus quia. Suscipit velit minima facere quae ex alias. Iusto saepe tempore tempore quasi iure. Est odit sed ullam amet quam porro voluptates. Consequuntur hic repudiandae ratione quam velit. Reiciendis aut sapiente veniam maxime voluptatem omnis ut. Sequi voluptas adipisci omnis autem aut atque.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(7, 3, 2, 'Officiis eius.', 'Accusamus ut hic repudiandae cupiditate quia necessitatibus deleniti.', 'Ab ut consequatur autem aspernatur minus. Pariatur voluptates quae facere illum consequuntur sunt odio facere. Cumque autem tempora tempora aliquid omnis.', 'Ad iste sit officiis modi. Ipsam assumenda aperiam perspiciatis dignissimos aut corporis voluptatem. At eos rerum ut ut doloribus architecto sit voluptatem. Et et vel eaque autem ad asperiores minus. Ullam vel sunt eius inventore vel voluptatem. Et consequatur sed non numquam. Sit autem quod ut iste dolorum numquam dignissimos. Amet aliquam iste illo est soluta. Sequi quasi quo ipsa possimus id.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(8, 1, 5, 'Sequi velit sequi aliquid blanditiis ducimus molestias.', 'Tenetur et repellendus repellat.', 'Laudantium qui est est asperiores ipsam et officiis. Tempora omnis quo tenetur voluptas numquam voluptates placeat omnis. Optio est delectus itaque reiciendis impedit quos. Expedita voluptate cupiditate voluptatem et saepe recusandae tempora maiores.', 'Totam ullam hic et est tempora aut. Distinctio alias fugit dolore alias doloremque. Rerum ut quam ullam molestias qui magni doloremque voluptas. Iste unde tenetur rerum numquam eius aut. Asperiores dolorum aut voluptatibus laborum dicta dolorem. Deserunt adipisci laborum vel similique perspiciatis commodi reiciendis nostrum. Officia incidunt deleniti ea atque rem.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(9, 2, 3, 'Odit praesentium.', 'Quis minima velit voluptatem distinctio animi consectetur odit velit libero cumque.', 'Expedita ducimus cupiditate libero at et. Id enim enim unde ipsa voluptates sint dolores. Dicta ut et est vero est voluptatibus.', 'Aspernatur et sint et aut quia. Accusantium labore eos totam porro repellat ex. Unde quaerat ut ut adipisci quaerat dolor id. Quibusdam quo delectus corporis repudiandae voluptatibus earum nam repellat. Id at qui iusto aut doloremque et.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(10, 3, 2, 'Dolor qui sint nihil id.', 'Minima dolores.', 'Occaecati est et temporibus rerum sint velit. Voluptates ratione blanditiis sit voluptatem repellendus perferendis facere. In possimus unde et officiis eaque.', 'Maxime sit cumque inventore fugit sint. Ut laborum aut dolorem unde omnis. Molestias sed adipisci id hic. Aut nulla pariatur culpa et exercitationem possimus. Laborum et ea laudantium natus ut quia unde. Ullam magni autem nihil totam quidem voluptatibus quae. Deserunt nostrum qui et magnam enim non quas iste. Distinctio repudiandae repellendus itaque recusandae tempora quidem.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(11, 2, 1, 'Occaecati qui qui eveniet quisquam est est laboriosam odit corrupti repudiandae.', 'Sapiente et et praesentium et iure.', 'Voluptatem omnis voluptas dolorem et et eligendi. Iusto ullam veniam dolor sed nam sed culpa in. Fugiat blanditiis temporibus est quo aspernatur voluptas. Explicabo saepe necessitatibus voluptate ipsa.', 'Excepturi at voluptas debitis eligendi occaecati dicta. Quod reiciendis dolor tenetur minus at. Aut architecto mollitia a consequuntur reprehenderit deserunt vitae. Ad eos velit placeat accusantium nobis nisi odio. Maiores voluptas possimus molestiae mollitia est sequi aspernatur. Unde animi ad omnis molestiae. Et cum autem corporis omnis aut alias voluptatem. Aliquid modi eligendi culpa odio ut tenetur quibusdam. Quos sapiente neque recusandae consequatur. Quo repellat id voluptas ad officia officia. Suscipit commodi id voluptas autem natus.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(12, 1, 3, 'Similique vel et aut natus velit esse autem.', 'Quos sed qui.', 'Alias ab ut fuga dolorem incidunt voluptate ut. Eum debitis ex voluptatem aliquam. Quo perspiciatis dolore sed tenetur quasi consequuntur hic expedita.', 'Adipisci est possimus consequatur aut facere et porro minima. Unde totam sunt voluptatum totam magnam dolorum. Voluptatem ipsa ea ut asperiores. Ullam rem nemo veritatis eos consequatur ut cupiditate. Dolorum eos consequatur illo voluptate nemo sequi. Eos sed beatae repudiandae qui cupiditate sit quam quia. Quia eligendi qui est.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(13, 2, 3, 'Nihil sed et quia sapiente maiores aut quo et.', 'Repellat magni nulla quia repellat rem culpa.', 'Quidem doloremque similique in aut. Ut ut enim adipisci qui esse. Optio dignissimos iure quidem consectetur ut repellat.', 'Officiis asperiores fugiat deleniti et quo ducimus necessitatibus. Sapiente aut ratione minima minus autem labore voluptatibus nemo. Incidunt voluptas ut rerum aut sapiente quaerat. Et consequatur aperiam quibusdam commodi facere enim ut. Dolorum optio atque laborum ea.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(14, 2, 2, 'Id similique facere dolore aut.', 'Molestias recusandae.', 'Sed voluptatem odit ipsam perferendis explicabo. Optio qui voluptate qui consequatur sed quia eos. Voluptatem tempora mollitia doloribus suscipit beatae similique esse. Quas consequatur ut occaecati maxime distinctio facilis quaerat. Voluptas et beatae aliquam ipsum eius.', 'Et aperiam et ea praesentium reprehenderit rem. Modi provident corrupti laboriosam magnam. Repellat asperiores et sit ipsam. A saepe dolores saepe natus quis qui. Quas quia ea repellat. Corrupti in excepturi eum voluptatem nostrum officiis ipsa. Est quod in numquam doloribus totam quibusdam.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(15, 2, 5, 'Eveniet nobis qui autem aliquid.', 'Ad placeat rerum consequatur esse vero perferendis culpa aut nesciunt.', 'Et et inventore sint ea natus beatae et. Odit neque atque sit nihil iste. Quibusdam recusandae suscipit repudiandae ullam consequatur rem. Quidem aut ut error minus facere sint voluptatem.', 'Temporibus autem sit maiores et ratione. Architecto vel et et atque et. Qui quod ea nulla maxime nemo quia. Molestiae totam aliquid quia autem neque quis placeat delectus. Distinctio autem tempore molestiae sit rem.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(16, 1, 1, 'Deserunt veniam ad eos numquam.', 'Provident sit nemo provident occaecati nostrum.', 'Dolores numquam officiis voluptatem fugiat rerum in. Voluptas minus autem culpa accusamus sapiente. Rerum eaque et necessitatibus quo. Blanditiis autem amet perferendis aut.', 'Voluptatum quae autem sit. Asperiores voluptatum sed tenetur voluptates modi odio maxime. Deserunt quos animi iure. Ut adipisci vel animi et et. Minus omnis cumque molestiae ipsa. Ipsum in quae perspiciatis consequuntur at sint. Magnam omnis modi beatae quia qui.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(17, 1, 3, 'Et alias unde.', 'Eum dolores aut rerum laborum adipisci.', 'Eveniet blanditiis sit porro placeat. Facilis sit magnam aut laboriosam et et sint. Dignissimos molestias commodi nostrum quis alias omnis.', 'Vero maiores rerum minus. Velit debitis ipsam distinctio. Ea vel iste omnis sit natus beatae consequatur facere. Sit repellendus voluptatem eligendi suscipit. Id sapiente laboriosam rerum non dignissimos et.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(18, 1, 4, 'Et qui iure similique neque modi laudantium at.', 'Repellendus veritatis distinctio necessitatibus voluptates.', 'Voluptas cupiditate temporibus eos expedita omnis eos veritatis. Consequatur ullam suscipit est sunt et. Facere nihil qui cupiditate quia.', 'Ratione et ad eveniet minima. Ratione voluptas nisi est. Facere officia amet error assumenda veniam rerum ut maxime. Similique rerum nihil quia asperiores molestias pariatur porro. Fugiat architecto quo quaerat et necessitatibus et et.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(19, 1, 4, 'Debitis commodi qui ipsa.', 'Est veniam non voluptatum ut ut enim.', 'Nemo nobis in officia neque explicabo est ut. Id temporibus repellat veniam culpa officia magnam qui. Ea unde suscipit dolores provident.', 'Aut laudantium corrupti aspernatur voluptatibus perspiciatis laudantium. Sunt aperiam quod beatae et eius atque. Consectetur possimus architecto sunt vel illo culpa libero. Eaque quod reprehenderit cum et dolores. Voluptatem qui possimus modi. Atque magni et nam eaque voluptas ut ut. Alias sit eveniet sit odit alias quaerat dolor. Ullam voluptatem ab dolores.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(20, 3, 3, 'Mollitia beatae perspiciatis numquam aperiam ut sed illo et.', 'Ut ut doloremque amet suscipit.', 'Est quo eos dolorem sequi quis. Quo quam ut asperiores odit non odio aperiam. Eum et omnis officiis facilis laborum laborum sit.', 'Iusto dolores doloribus aut excepturi ipsa in. Delectus dolores vero corporis ut voluptate molestias tempora. Autem eos consequatur qui reiciendis. Et qui ut eos. Iste aut veniam odio nisi. Eius incidunt dolore similique quod voluptate eaque quibusdam. Quae quam natus nihil veritatis odit ducimus dolores corporis. Minima dolorem iste placeat esse inventore nisi corporis. Sunt aut in quis dolorem et nostrum voluptas voluptatibus.', NULL, '2024-10-12 06:16:06', '2024-10-12 06:16:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Product 1', 11, 'product-1.png', 'This is product 1', '2024-10-12 06:18:55', '2024-10-12 06:18:55'),
(2, 2, 'Anggur Bulat Merah', 11, 'product-4.png', 'Merah bulat', '2024-10-12 06:18:55', '2024-10-12 22:21:26'),
(3, 2, 'Setroberi Jawa', 21, 'product-9.png', 'SETROBERUIYYY', '2024-10-12 07:15:09', '2024-10-12 09:30:52'),
(5, 2, 'Anggur Bulat', 20, 'product-5.png', 'ANGGURNYA BULAT', '2024-10-12 22:20:29', '2024-10-12 22:20:29'),
(6, 2, 'Lengkeng Perancis', 20, 'product-12.png', 'Asli perancis nih', '2024-10-13 08:13:09', '2024-10-13 08:13:09'),
(7, 2, 'Joni', 20, 'product-8.png', 'Jeruknya joni', '2024-10-13 08:31:36', '2024-10-13 08:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Minuman', 'Buat diminum', '2024-10-12 06:18:47', '2024-10-12 06:18:47'),
(2, 'Makanan', 'Buat dimakan', '2024-10-12 06:18:47', '2024-10-12 06:18:47'),
(4, 'Alat Gym', 'semelekete', '2024-10-13 00:46:53', '2024-10-13 00:46:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5DTI6ToqNasGWHS4WukBqzSLU56sl79Jpj0RSnHS', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZWg2YkN6TUwwdGs5RGhlNHRWRkp1M1FNTW1TYnlFbVVMZTcwTXFseCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jdXN0b21lciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1728904957),
('8Np3Rhj7EupBSb54BKQFVyL52rjlcvhJ5bKozxhq', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYVVONlE4OVI2WVRzbXNOSFJXdjBUaVRUekl2MHhaUVM2bmdZNXJ3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jdXN0b21lciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1728887937),
('qeKt9g5Ss4ppAhnfV2f0h00vpibILRceUhJM7nz9', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibzNza2VUR2NVSmxCOEdzZmowQXlCaldXRWlkWkQ4V3dEdTlNVXJIRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vY3VzdG9tZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1728835593);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL DEFAULT 'pending',
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raina Nurdiyanti', 'betania48', 'rpradipta@example.com', '2024-10-12 06:16:05', '$2y$12$LtgYlWRmkgKFbGvTo2A1Uub4QyRnb0l6pYQooU4zMMV.I7pPeQTpi', 'gKo4k7DyUo', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(2, 'Irma Anggraini', 'bakijan.ramadan', 'puspa.sinaga@example.com', '2024-10-12 06:16:06', '$2y$12$LtgYlWRmkgKFbGvTo2A1Uub4QyRnb0l6pYQooU4zMMV.I7pPeQTpi', 'amwgHwTEM3', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(3, 'Belinda Jasmin Wulandari M.TI.', 'pangeran.wahyudin', 'ifa71@example.net', '2024-10-12 06:16:06', '$2y$12$LtgYlWRmkgKFbGvTo2A1Uub4QyRnb0l6pYQooU4zMMV.I7pPeQTpi', 'y3B8G0sfX4', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(4, 'Ratih Utami', 'kasusra86', 'lidya98@example.net', '2024-10-12 06:16:06', '$2y$12$LtgYlWRmkgKFbGvTo2A1Uub4QyRnb0l6pYQooU4zMMV.I7pPeQTpi', '1slLb0TO6E', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(5, 'Jati Dongoran M.Farm', 'pratiwi.surya', 'hmahendra@example.com', '2024-10-12 06:16:06', '$2y$12$LtgYlWRmkgKFbGvTo2A1Uub4QyRnb0l6pYQooU4zMMV.I7pPeQTpi', 'nTQ0Sp0TDn', '2024-10-12 06:16:06', '2024-10-12 06:16:06'),
(6, 'Kolor takmir', 'aryanesta', 'edisusanoo@gmail.com', NULL, '$2y$12$jgAcdEqOap1tuMv7YP/dLu/JpzndsmjVXpsiClxIvNebe9kPhmpZu', NULL, '2024-10-12 06:16:47', '2024-10-12 06:16:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_number_unique` (`phone_number`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_category_name_unique` (`category_name`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
