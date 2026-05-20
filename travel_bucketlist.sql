-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_bucketlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `capital` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `continent` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `best_time` varchar(100) DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `population` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `country`, `capital`, `description`, `image`, `city`, `continent`, `category`, `best_time`, `highlights`, `rating`, `population`) VALUES
(1, 'Tokyo', 'Japan', '', 'A futuristic city mixed with deep traditions.', 'tokyo.jpg', 'Tokyo', 'Asia', 'City', 'March–May, September–November', 'Shibuya, temples, food, anime', NULL, NULL),
(3, 'Rome', 'Italy', '', 'Historic city full of culture and food.', 'rome.jpg', 'Rome', 'Europe', 'City', 'April–June, September–October', 'Colosseum, Vatican, history', NULL, NULL),
(4, 'Amazon Rainforest', 'Brazil', 'Brasília', 'Vast tropical rainforest full of biodiversity', 'AmazonRainforest.jpg', NULL, 'South America', 'nature', 'June–September', 'Wildlife, river cruises, jungle tours', 4.0, 214000000),
(5, 'Banff National Park', 'Canada', 'Ottawa', 'Stunning mountains and lakes', 'BanffNationalPark.jpg', NULL, 'North America', 'nature', 'June–August', 'Lake Louise, mountains, hiking', 4.0, 39000000),
(6, 'Serengeti', 'Tanzania', 'Dodoma', 'Famous wildlife safari park', 'serengeti.jpg', NULL, 'Africa', 'nature', 'June–October', 'Safari, wildebeest migration, wildlife', 4.0, 63000000),
(7, 'Mount Kilimanjaro', 'Tanzania', 'Dodoma', 'Africa’s highest peak', 'mountkilimanjaro.jpg', NULL, 'Africa', 'nature', 'January–March, June–October', 'Climbing, views, glaciers', 4.0, 63000000),
(8, 'Yellowstone', 'USA', 'Washington, D.C.', 'First national park, geysers & wildlife', 'yellowstone.jpg', NULL, 'North America', 'nature', 'April–October', 'Geysers, wildlife, hot springs', 4.0, 335000000),
(9, 'Patagonia', 'Argentina', 'Buenos Aires', 'Glaciers and rugged landscapes', 'patagonia.jpg', NULL, 'South America', 'nature', 'October–March', 'Glaciers, hiking, mountains', 4.0, 46000000),
(10, 'Great Barrier Reef', 'Australia', 'Canberra', 'World’s largest coral reef', 'GreatBarrierReef.jpg', NULL, 'Oceania', 'nature', 'June–October', 'Snorkeling, coral reefs, diving', 4.0, 26000000),
(11, 'Icelandic Highlands', 'Iceland', 'Reykjavik', 'Volcanic landscapes and glaciers', 'IcelandicHighlands.jpg', NULL, 'Europe', 'nature', 'June–August', 'Volcanoes, hiking, lava fields', 4.0, 380000),
(13, 'Galápagos Islands', 'Ecuador', 'Quito', 'Unique wildlife and volcanic islands', 'GalápagosIslands.jpg', NULL, 'South America', 'nature', 'December–May', 'Unique animals, snorkeling, вулcanic islands', 4.0, 18000000),
(14, 'Rocky Mountains', 'USA', 'Washington, D.C.', 'Majestic mountain range', 'RockyMountains.jpg', NULL, 'North America', 'nature', NULL, NULL, 4.0, 335000000),
(15, 'Fiordland', 'New Zealand', 'Wellington', 'Famous fjords and hiking trails', 'fiordland.jpg', NULL, 'Oceania', 'nature', 'May–September', 'Fjords, waterfalls, hiking trails', 4.0, 5200000),
(16, 'Sahara Desert', 'Algeria', 'Algiers', 'Expansive desert dunes', 'sahara.jpg', NULL, 'Africa', 'nature', 'October–April', 'Desert dunes, camel rides, sunsets', 4.0, 43000000),
(18, 'Alps', 'Switzerland', 'Bern', 'Iconic mountains and skiing resorts', 'alps.jpg', NULL, 'Europe', 'nature', 'December–March', 'Skiing, mountains, alpine villages', 4.0, 9000000),
(21, 'Komodo Island', 'Indonesia', 'Jakarta', 'Home to Komodo dragons', 'KomodoIsland.jpg', NULL, 'Asia', 'nature', 'April–October', 'Komodo dragons, islands, diving', 4.0, 280000000),
(23, 'Mount Fuji', 'Japan', 'Tokyo', 'Sacred volcanic mountain', 'mountfuji.jpg', NULL, 'Asia', 'nature', 'July–September', 'Climbing, sunrise views, culture', 4.0, 125000000),
(24, 'Torres del Paine', 'Chile', 'Santiago', 'Mountains, lakes, glaciers', 'torresdelpaine.jpg', NULL, 'South America', 'nature', 'October–April', 'Mountains, lakes, hiking trails', 4.0, 19200000),
(26, 'Cairngorms', 'UK', 'London', 'Mountains and forests in Scotland', 'cairngorms.jpg', NULL, 'Europe', 'nature', NULL, NULL, 4.0, 68000000),
(29, 'Bora Bora', 'French Polynesia', 'Papeete', 'Crystal-clear waters and overwater bungalows', 'borabora.jpg', NULL, 'Oceania', 'beach', 'May–October', 'Luxury resorts, snorkeling, lagoons', 4.0, 300000),
(30, 'Curacao', 'Curacao', 'Willemstad', 'Colorful island with turquoise waters and beaches', 'Curacao.jpg', NULL, 'North America', 'beach', 'December–April', 'Colorful beaches, diving, culture', 4.0, 160000),
(31, 'Maldives', 'Maldives', 'Malé', 'White sand beaches and turquoise waters', 'maldives.jpg', NULL, 'Asia', 'beach', 'November–April', 'Overwater villas, clear water, diving', 4.0, 530000),
(33, 'Seychelles', 'Seychelles', 'Victoria', 'Tropical paradise islands', 'seychelles.jpg', NULL, 'Africa', 'beach', 'April–November', 'Granite beaches, crystal water', 4.0, 100000),
(34, 'Fiji', 'Fiji', 'Suva', 'Island nation with coral reefs and sandy beaches', 'fiji.jpg', NULL, 'Oceania', 'beach', 'May–October', 'Coral reefs, snorkeling, island life', 4.0, 900000),
(35, 'Bali', 'Indonesia', 'Jakarta', 'Famous surf and rice terraces', 'bali.jpg', NULL, 'Asia', 'beach', 'April–October', 'Surfing, temples, beach clubs', 4.0, 280000000),
(36, 'Tahiti', 'French Polynesia', 'Papeete', 'Idyllic island paradise in the Pacific', 'tahiti.jpg', NULL, 'Oceania', 'beach', 'May–October', 'Beaches, culture, lagoons', 4.0, 280000),
(37, 'Palawan', 'Philippines', 'Manila', 'Pristine beaches and limestone cliffs', 'palawan.jpg', NULL, 'Asia', 'beach', 'November–May', 'Limestone cliffs, clear water, lagoons', 4.0, 113000000),
(38, 'Maui', 'USA', 'Washington, D.C.', 'Hawaiian island with scenic beaches', 'maui.jpg', NULL, 'North America', 'beach', 'April–October', 'Beaches, volcanoes, scenic drives', 4.0, 335000000),
(39, 'Moorea', 'French Polynesia', 'Papeete', 'Tropical paradise island', 'moorea.jpg', NULL, 'Oceania', 'beach', 'May–September', 'Tropical island, lagoons, hiking', 4.0, 300000),
(40, 'Tulum', 'Mexico', 'Mexico City', 'Beach ruins and cenotes nearby', 'tulum.jpg', NULL, 'North America', 'beach', 'November–April', 'Beach ruins, cenotes, turquoise water', 4.0, 126000000),
(41, 'Phi Phi Islands', 'Thailand', 'Bangkok', 'Famous islands for snorkeling and diving', 'phiphi.jpg', NULL, 'Asia', 'beach', 'November–April', 'Snorkeling, cliffs, clear water', 4.0, 70000000),
(42, 'Zanzibar', 'Tanzania', 'Dodoma', 'Exotic island beaches', 'zanzibar.jpg', NULL, 'Africa', 'beach', 'June–October', 'White sand beaches, culture, spice tours', 4.0, 63000000),
(43, 'Amalfi Coast', 'Italy', 'Rome', 'Cliffside beaches with charming towns', 'amalficoast.jpg', NULL, 'Europe', 'beach', 'May–September', 'Cliffside views, coastal towns, food', 4.0, 60000000),
(44, 'Sardinia', 'Italy', 'Rome', 'Mediterranean beaches and coves', 'sardinia.jpg', NULL, 'Europe', 'beach', 'May–September', 'Clear waters, beaches, nature', 4.0, 60000000),
(45, 'Gold Coast', 'Australia', 'Canberra', 'Surfing beaches and theme parks', 'goldcoast.jpg', NULL, 'Oceania', 'beach', 'April–October', 'Surfing, nightlife, beaches', 4.0, 26000000),
(46, 'Ibiza', 'Spain', 'Madrid', 'Party beaches and scenic coastlines', 'ibiza.jpg', NULL, 'Europe', 'beach', 'May–October', 'Party scene, beaches, sunsets', 4.0, 47000000),
(47, 'Copacabana', 'Brazil', 'Brasília', 'Iconic Rio beach', 'copacabana.jpg', NULL, 'South America', 'beach', 'December–March', 'Iconic beach, city vibe, scenery', 4.0, 214000000),
(48, 'Waikiki Beach', 'USA', 'Washington, D.C.', 'Popular Hawaiian resort beach', 'waikiki.jpg', NULL, 'North America', 'beach', 'April–October', 'Resort beach, surfing, nightlife', 4.0, 335000000),
(49, 'Nha Trang', 'Vietnam', 'Hanoi', 'Coastal city with beaches and islands', 'nhatrang.jpg', NULL, 'Asia', 'beach', 'February–August', 'Coastal city, islands, snorkeling', 4.0, 97000000),
(52, 'Barbados', 'Barbados', 'Bridgetown', 'Caribbean paradise with turquoise waters', 'barbados.jpg', NULL, 'North America', 'beach', 'December–April', 'Caribbean beaches, culture, relaxation', 4.0, 287000),
(53, 'St. Lucia', 'St. Lucia', 'Castries', 'Volcanic beaches with lush scenery', 'stlucia.jpg', NULL, 'North America', 'beach', 'December–May', 'Volcanic peaks, beaches, nature', 4.0, 183000),
(54, 'Paris', 'France', 'Paris', 'Paris, the capital of France, is a global hub for art, fashion, gastronomy, and culture, famously known as the \"City of Light\" (la Ville Lumière). Divided into 20 districts called arrondissements, it is renowned for iconic landmarks like the Eiffel Tower, Louvre Museum, and Notre Dame Cathedral. The Seine River flows through the city, and it is a major, densely populated European center known for its café culture and historic charm.', 'Paris.jpg\r\n', NULL, 'Europe', 'city', 'April–June, September–October', 'Eiffel Tower, museums, cafes', 4.0, 67000000),
(56, 'New York', 'USA', 'Washington, D.C.', 'Famous skyline and landmarks', 'newyork.jpg', NULL, 'North America', 'city', 'April–June, September–November', 'Statue of Liberty, skyline, Central Park', 4.0, 335000000),
(57, 'London', 'UK', 'London', 'Historic and modern city', 'london.jpg', NULL, 'Europe', 'city', 'May–September', 'Big Ben, museums, history', 4.0, 68000000),
(59, 'Barcelona', 'Spain', 'Madrid', 'Gaudi architecture and beaches', 'barcelona.jpg', NULL, 'Europe', 'city', 'May–June, September–October', 'Gaudi, beaches, nightlife', 4.0, 47000000),
(60, 'Dubai', 'UAE', 'Abu Dhabi', 'Modern skyscrapers and luxury', 'dubai.jpg', NULL, 'Asia', 'city', 'November–March', 'Burj Khalifa, malls, luxury', 4.0, 9800000),
(61, 'Istanbul', 'Turkey', 'Ankara', 'City bridging two continents', 'istanbul.jpg', NULL, 'Europe/Asia', 'city', 'April–May, September–November', 'Mosques, bazaars, Bosphorus views', 4.0, 85000000),
(62, 'Sydney', 'Australia', 'Canberra', 'Opera House and Harbour Bridge', 'sydney.jpg', NULL, 'Oceania', 'city', 'September–November, March–May', 'Opera House, harbour, beaches', 4.0, 26000000),
(63, 'Amsterdam', 'Netherlands', 'Amsterdam', 'Canals and museums', 'amsterdam.jpg', NULL, 'Europe', 'city', 'April–October', 'Canals, bikes, museums', 4.0, 17500000),
(64, 'Berlin', 'Germany', 'Berlin', 'History and nightlife', 'berlin.jpg', NULL, 'Europe', 'city', 'May–September', 'History, nightlife, Berlin Wall', 4.0, 84000000),
(65, 'Bangkok', 'Thailand', 'Bangkok', 'Vibrant street markets and temples', 'bangkok.jpg', NULL, 'Asia', 'city', 'November–February', 'Temples, street food, nightlife', 4.0, 70000000),
(66, 'Singapore', 'Singapore', 'Singapore', 'Clean, modern city with gardens', 'singapore.jpg', NULL, 'Asia', 'city', 'February–April', 'Gardens, skyline, clean city', 4.0, 5900000),
(67, 'Los Angeles', 'USA', 'Washington, D.C.', 'Entertainment capital', 'la.jpg', NULL, 'North America', 'city', 'March–May, September–November', 'Hollywood, beaches, entertainment', 4.0, 335000000),
(68, 'Venice', 'Italy', 'Rome', 'Canals and historic architecture', 'venice.jpg', NULL, 'Europe', 'city', 'April–June, September–October', 'Canals, gondolas, architecture', 4.0, 60000000),
(69, 'Hong Kong', 'China', 'Beijing', 'Skyscrapers and harbor views', 'hongkong.jpg', NULL, 'Asia', 'city', 'October–December', 'Skyline, harbor, shopping', 4.0, 1420000000),
(70, 'Buenos Aires', 'Argentina', 'Buenos Aires', 'Tango, cafes, and colorful streets', 'buenosaires.jpg', NULL, 'South America', 'city', 'March–May, September–November', 'Tango, culture, food', 4.0, 46000000),
(71, 'Cape Town', 'South Africa', 'Pretoria', 'Waterfronts and Table Mountain', 'capetown.jpg', NULL, 'Africa', 'city', 'November–March', 'Table Mountain, coast, wine', 4.0, 60000000),
(72, 'Rio de Janeiro', 'Brazil', 'Brasília', 'Famous carnival city', 'rio.jpg', NULL, 'South America', 'city', 'December–March', 'Carnival, beaches, Christ statue', 4.0, 214000000),
(73, 'Prague', 'Czech Republic', 'Prague', 'Medieval streets and castles', 'prague.jpg', NULL, 'Europe', 'city', 'May–September', 'Castles, old town, bridges', 4.0, 10700000),
(74, 'Vienna', 'Austria', 'Vienna', 'Music and historic palaces', 'vienna.jpg', NULL, 'Europe', 'city', 'April–June, September–October', 'Music, palaces, culture', 4.0, 8900000),
(75, 'Marrakech', 'Morocco', 'Rabat', 'Souks and desert culture', 'marrakech.jpg', NULL, 'Africa', 'city', 'March–May, September–November', 'Markets, desert vibe, culture', 4.0, 37000000),
(76, 'Montreal', 'Canada', 'Ottawa', 'French-Canadian culture and festivals', 'montreal.jpg', NULL, 'North America', 'city', 'June–September', 'Festivals, culture, old town', 4.0, 39000000),
(77, 'Lisbon', 'Portugal', 'Lisbon', 'Hills, tiles, and coastal views', 'lisbon.jpg', NULL, 'Europe', 'city', 'March–May, September–October', 'Trams, viewpoints, tiles', 4.0, 10200000),
(78, 'Seoul', 'South Korea', 'Seoul', 'Modern city with traditional palaces', 'seoul.jpg', NULL, 'Asia', 'city', 'April–June, September–November', 'Palaces, K-pop, food', 4.0, 52000000),
(94, 'Norwegian Fjords', 'Norway', 'Oslo', 'Kayaking and mountain hiking', 'fjordadventure.jpg', NULL, 'Europe', 'adventure', 'May–September', 'Fjords, kayaking, hiking', 4.0, 5500000),
(100, 'Carpathian Mountains', 'Romania', 'Bucharest', 'Forest and mountain adventure', 'carpathian.jpg', NULL, 'Europe', 'adventure', 'May–September', 'Forests, wildlife, hiking', 4.0, 19200000),
(102, 'Atlas Mountains', 'Morocco', 'Rabat', 'Hiking and cultural experience', 'atlas.jpg', NULL, 'Africa', 'adventure', 'March–May, September–November', 'Mountains, Berber culture, hiking', 4.0, 37000000),
(104, 'Machu Picchu', 'Peru', 'Lima', 'Ancient Inca city in the Andes mountains', 'machupicchu.jpg', NULL, 'South America', 'adventure', 'May–September', 'Inca ruins, mountain views, UNESCO site', 4.5, 34000000),
(105, 'Great Wall of China', 'China', 'Beijing', 'Historic wall stretching thousands of kilometers', 'greatwall.jpg', NULL, 'Asia', 'adventure', 'April–May, September–October', 'Ancient fortifications, hiking sections, scenic views', 4.5, 1420000000),
(106, 'Colosseum', 'Italy', 'Rome', 'Ancient Roman amphitheater', 'colosseum.jpg', NULL, 'Europe', 'city', 'April–June, September–October', 'Gladiator history, Roman architecture', 4.5, 60000000),
(107, 'Taj Mahal', 'India', 'New Delhi', 'Iconic marble mausoleum', 'tajmahal.jpg', NULL, 'Asia', 'city', 'October–March', 'White marble monument, Mughal architecture', 4.5, 1400000000),
(108, 'Petra', 'Jordan', 'Amman', 'Rock-cut ancient city', 'petra.jpg', NULL, 'Asia', 'adventure', 'March–May, September–November', 'Siq canyon, Treasury facade, desert ruins', 4.5, 11000000),
(110, 'Plitvice Lakes', 'Croatia', 'Zagreb', 'Waterfalls and turquoise lakes', 'plitvice.jpg', NULL, 'Europe', 'nature', 'May–September', 'Waterfalls, wooden walkways, lakes', 4.4, 4000000),
(112, 'Faroe Islands', 'Denmark', 'Copenhagen', 'Dramatic cliffs and remote islands', 'faroe.jpg', NULL, 'Europe', 'nature', 'June–August', 'Cliffs, puffins, fjords', 4.4, 6000000),
(113, 'Lake Bled', 'Slovenia', 'Ljubljana', 'Scenic lake with island church', 'bled.jpg', NULL, 'Europe', 'nature', 'May–September', 'Island church, rowing, alpine views', 4.4, 2100000),
(114, 'Whitehaven Beach', 'Australia', 'Canberra', 'Pure white silica sand beach', 'whitehaven.jpg', NULL, 'Oceania', 'beach', 'May–October', 'White silica sand, turquoise water', 4.5, 26000000),
(115, 'Navagio Beach', 'Greece', 'Athens', 'Famous shipwreck beach', 'navagio.jpg', NULL, 'Europe', 'beach', 'May–September', 'Shipwreck view, cliffs, boat access', 4.5, 10400000),
(116, 'Anse Source d Argente', 'Seychelles', 'Victoria', 'Iconic granite boulders beach', 'anse.jpg', NULL, 'Africa', 'beach', 'April–October', 'Granite rocks, clear water, snorkeling', 4.5, 100000),
(118, 'Railay Beach', 'Thailand', 'Bangkok', 'Cliffs and crystal-clear water', 'railay.jpg', NULL, 'Asia', 'beach', 'November–March', 'Rock climbing, limestone cliffs', 4.5, 70000000),
(119, 'Kyoto', 'Japan', 'Tokyo', 'Traditional temples and culture', 'kyoto.jpg', NULL, 'Asia', 'city', 'March–April, October–November', 'Temples, geisha districts, cherry blossoms', 4.5, 125000000),
(120, 'Florence', 'Italy', 'Rome', 'Renaissance art and architecture', 'florence.jpg', NULL, 'Europe', 'city', 'April–June, September–October', 'Duomo, Renaissance art, museums', 4.5, 60000000),
(121, 'San Francisco', 'USA', 'Washington, D.C.', 'Golden Gate Bridge and hills', 'sanfrancisco.jpg', NULL, 'North America', 'city', 'September–November', 'Golden Gate Bridge, Alcatraz, hills', 4.5, 335000000),
(122, 'Reykjavik', 'Iceland', 'Reykjavik', 'Northern lights gateway', 'reykjavik.jpg', NULL, 'Europe', 'city', 'September–March', 'Northern lights, geothermal pools', 4.5, 380000),
(123, 'Cusco', 'Peru', 'Lima', 'Historic gateway to Machu Picchu', 'cusco.jpg', NULL, 'South America', 'city', 'May–September', 'Inca heritage, Andes culture', 4.5, 34000000);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `destination_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 1, 'uh', '2026-04-15 11:01:22', NULL),
(4, 1, 3, 1, 'uh', '2026-04-15 11:01:29', NULL),
(6, 1, 2, 1, 'mm\r\n', '2026-04-15 11:32:15', NULL),
(9, 1, 5, 2, 'kjnjl', '2026-04-15 12:45:54', NULL),
(13, 1, 2, 0, 'be', '2026-05-09 18:07:44', NULL),
(15, 1, 4, 3, 'brr', '2026-05-20 07:30:31', '2026-05-20 07:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'wengelo', 'charwengelo516@gmail.com', '$2y$10$ffLLrw/EdU8lnJRhBs5Ux.O4H3N4wHUoKp.v9OgECJg0o/XbbDLU.', '2026-03-23 11:40:22'),
(8, 'root', NULL, '', '2026-03-23 11:58:46'),
(9, 'root', NULL, '', '2026-03-23 11:58:53'),
(10, 'root', NULL, '', '2026-03-23 11:59:07'),
(11, 've', 've@gmail.com', '$2y$10$nBkSIrbAJodE1ef4ZT.W7.fcTVWkKXEkb.9o2zQeSdko9k33kVx9K', '2026-03-24 08:33:38'),
(12, 'test-user', 'wengelocec@gmail.com', '$2y$10$bv8h3Y6VCk75JSfvLr4wX.xo0i0C6t1eugOL2dA9XRxlU6kgirh2y', '2026-03-27 08:26:15'),
(13, 'test', 'test@gmail.com', '$2y$10$4bi490.Apba3OjRp9V3PoeYHqxTLTsF6QH4QDy9XplWY4rdAOYRHq', '2026-04-15 07:44:32'),
(17, 'chunny', 'charison@gmail.com', '$2y$10$SLO4faYOmYvodyrP78eGv.4YXgagA8EIXbUDX8kpdQt7zo46ifoQG', '2026-05-13 07:41:38'),
(18, 'Hussein', 'hassounigt@gmail.com', '$2y$10$vzZv.6L2GO5365kW/Qi.JensqK4yii1gqf.6v2PmC7v9/vb6UvrK.', '2026-05-13 12:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_destinations`
--

CREATE TABLE `user_destinations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `status` enum('planned','visited') DEFAULT 'planned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_destinations`
--

INSERT INTO `user_destinations` (`id`, `user_id`, `destination_id`, `status`) VALUES
(13, 1, 4, 'visited'),
(15, 1, 9, 'planned'),
(16, 18, 42, 'visited');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`destination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_destinations`
--
ALTER TABLE `user_destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`destination_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_destinations`
--
ALTER TABLE `user_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_destinations`
--
ALTER TABLE `user_destinations`
  ADD CONSTRAINT `user_destinations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_destinations_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
