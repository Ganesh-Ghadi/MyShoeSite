-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 10:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'ganesh', 'admin', '900150983cd24fb0d6963f7d28e17f72'),
(36, 'rakesh1', 'ganesh1', 'fa1d87bc7f85769ea9dee2e4957321ae'),
(37, 'administator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(39, 'ganeshghadi', '123', '202cb962ac59075b964b07152d234b70'),
(40, 'ganesh', 'ghadi', '21232f297a57a5a743894a0e4a801fc3'),
(41, '1abcd', 'acbde', 'e2fc714c4727ee9395f324cd2e7f331f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `shoe_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `title`, `description`, `price`, `image_name`, `shoe_id`) VALUES
(194, 'Sneker A1', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Slip On\r\nFit Type: Regular\r\nShoe Width: Medium\r\nLight Weight\r\nBreathable\r\nFlexible', '1000.00', 'Shoe-Name-8403.webp', 25),
(195, 'Sneker A2', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Lace-Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nOuter Material: Synthetic\r\nClosure Type: Lace-Up\r\nToe Style: Round Toe', '1200.00', 'Shoe-Name-783.webp', 26),
(196, 'Sneker A7', 'Material: Canvas Fabric\r\nLifestyle: Casual\r\nClosure Type: Slip on', '950.00', 'Shoe-Name-7304.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`, `category_name`) VALUES
(30, 'Snekers  M', 'Shoes_Category_332.webp', 'Yes', 'Yes', 'Men'),
(31, 'Loafers M', 'Shoes_Category_8927.webp', 'Yes', 'Yes', 'Men'),
(32, 'Home shoes M', 'Shoes_Category_6932.jpg', 'Yes', 'Yes', 'Men'),
(33, 'slides M', 'Shoes_Category_3970.jpg', 'Yes', 'Yes', 'Men'),
(34, 'Snekers W', 'Shoes_Category_258.jpg', 'Yes', 'Yes', 'Women'),
(35, 'Heels', 'Shoes_Category_1492.jpg', 'Yes', 'Yes', 'Women'),
(41, 'Loafer W', 'Shoes_Category_1187.jpg', 'Yes', 'Yes', 'Women'),
(42, 'Home Shoes W', 'Shoes_Category_9761.jpg', 'Yes', 'Yes', 'Women'),
(43, 'Slides W', 'Shoes_Category_3020.webp', 'Yes', 'Yes', 'Women'),
(44, 'OXFORDS M', 'Shoes_Category_3794.jpg', 'Yes', 'Yes', 'Men'),
(45, 'OXFORDS W', 'Shoes_Category_4517.jpg', 'Yes', 'Yes', 'Women'),
(46, 'CHUKKAS M', 'Shoes_Category_980.jpg', 'Yes', 'Yes', 'Men'),
(47, 'CHUKKAS W', 'Shoes_Category_2562.jpg', 'Yes', 'Yes', 'Women'),
(48, 'Crocs K', 'Shoes_Category_9168.webp', 'Yes', 'Yes', 'Kids'),
(49, 'abc category', 'Shoes_Category_214.jpg', 'Yes', 'Yes', 'Kids'),
(50, 'kids abc', 'Shoes_Category_7618.jpg', 'Yes', 'Yes', 'Kids'),
(51, 'sports', 'Shoes_Category_8704.webp', 'Yes', 'Yes', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `shoes` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `shoes`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Sneker A1', '1000.00', 2, '2000.00', '2023-03-16 10:07:47', 'ordered', 'Ganesh ghadi', '1234567890', 'ghadiganesh@gmail.com', 'kalwa, thane.'),
(2, 'Sneker A6', '900.00', 3, '2700.00', '2023-03-16 10:19:13', 'Delivered', 'vijay', '12345655', 'abc@gmail.com', 'bhandup'),
(3, 'Sneker A8', '2000.00', 2, '4000.00', '2023-03-17 01:04:39', 'Delivered', 'ajay', '5635467678', 'ghadiganesh@gmail.com', 'mumbra1'),
(4, 'Sneker A2', '1200.00', 3, '3600.00', '2023-04-14 07:06:09', 'ordered', 'vijay', '1234567890', 'abc@gmail.com', 'mumbra'),
(5, 'Sneker A1', '1000.00', 1, '1000.00', '2023-04-23 11:21:43', 'ordered', 'Ganesh ghadi', '12345655', 'ghadiganesh@gmail.com', 'kalwa'),
(6, 'Sneker A8', '2000.00', 1, '2000.00', '2023-04-23 11:28:11', 'ordered', 'Ganesh ghadi\'', '1234567890', 'ghadiganesh@gmail.com', 'kalwa'),
(7, 'Sneker A7', '950.00', 1, '950.00', '2023-04-24 06:52:13', 'ordered', 'ajay', '1234567890', 'ghadiganesh@gmail.com', 'cvhgfh'),
(8, 'Sneker A1', '1000.00', 1, '1000.00', '2023-04-24 03:25:21', 'On Delivery', 'pratik', '12345655', 'ghadiganesh@gmail.com', 'abc'),
(9, 'Sneker A1', '1000.00', 1, '1000.00', '2023-04-25 06:17:49', 'ordered', 'Ganesh ghadi', '12345655', 'ghadiganesh@gmail.com', 'sdg'),
(10, 'Sneker A2', '1200.00', 1, '1200.00', '2023-04-25 08:32:48', 'Ordered', 'Ganesh ghadi', '1234567890', 'ghadiganesh@gmail.com', 'acv'),
(11, 'Sneker W2', '1000.00', 1, '1000.00', '2023-11-13 02:21:12', 'ordered', 'vijay patile', '1234567890', 'abc@gmail.com', 'dadar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoes`
--

CREATE TABLE `tbl_shoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_shoes`
--

INSERT INTO `tbl_shoes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(25, 'Sneker A1', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Slip On\r\nFit Type: Regular\r\nShoe Width: Medium\r\nLight Weight\r\nBreathable\r\nFlexible', '1000.00', 'Shoe-Name-8403.webp', 30, 'Yes', 'Yes'),
(26, 'Sneker A2', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Lace-Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nOuter Material: Synthetic\r\nClosure Type: Lace-Up\r\nToe Style: Round Toe', '1200.00', 'Shoe-Name-783.webp', 30, 'Yes', 'Yes'),
(27, 'Sneker A3', 'Material: Canvas Fabric\r\nLifestyle: Casual\r\nClosure Type: Slip on', '1120.00', 'Shoe-Name-3121.jpg', 30, 'Yes', 'Yes'),
(28, 'Sneker A5', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Slip On\r\nFit Type: Regular\r\nShoe Width: Medium\r\nLight Weight\r\nBreathable\r\nFlexible', '1300.00', 'Shoe-Name-7086.jpg', 30, 'Yes', 'Yes'),
(29, 'Sneker A6', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Lace-Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nOuter Material: Synthetic\r\nClosure Type: Lace-Up\r\nToe Style: Round Toe', '900.00', 'Shoe-Name-2546.jpg', 30, 'Yes', 'Yes'),
(30, 'Sneker A7', 'Material: Canvas Fabric\r\nLifestyle: Casual\r\nClosure Type: Slip on', '950.00', 'Shoe-Name-7304.jpg', 30, 'Yes', 'Yes'),
(31, 'Sneker A8', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Slip On\r\nFit Type: Regular\r\nShoe Width: Medium\r\nLight Weight\r\nBreathable\r\nFlexible', '2000.00', 'Shoe-Name-7456.jpg', 30, 'Yes', 'Yes'),
(32, 'Sneker A8', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Slip On\r\nFit Type: Regular\r\nShoe Width: Medium\r\nLight Weight\r\nBreathable\r\nFlexible', '600.00', 'Shoe-Name-3385.jpg', 30, 'Yes', 'Yes'),
(33, 'Sneker W1', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '800.00', 'Shoe-Name-739.jpg', 34, 'Yes', 'Yes'),
(34, 'Sneker W2', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '1000.00', 'Shoe-Name-5122.jpg', 34, 'Yes', 'Yes'),
(35, 'Sneker W3', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '1200.00', 'Shoe-Name-3207.jpg', 34, 'Yes', 'Yes'),
(36, 'Sneker W4', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '1500.00', 'Shoe-Name-281.jpg', 34, 'Yes', 'Yes'),
(37, 'Sneker W5', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '2000.00', 'Shoe-Name-5028.jpg', 34, 'Yes', 'Yes'),
(38, 'Sneker W7', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '400.00', 'Shoe-Name-9018.jpg', 34, 'Yes', 'Yes'),
(39, 'Sneker W9', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '500.00', 'Shoe-Name-6865.jpg', 34, 'Yes', 'Yes'),
(40, 'Sneker W10', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '700.00', 'Shoe-Name-1366.jpg', 34, 'Yes', 'Yes'),
(41, 'Sneker W11', 'Textured and patterned rubber outsole for traction\r\nLow boot construction\r\nPUMA Logo for subtle branding\r\nWarranty: 3 months', '1222.00', 'Shoe-Name-1928.jpg', 34, 'Yes', 'Yes'),
(42, 'Loafer L1', 'A pair of round toe navy blue loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '2000.00', 'Shoe-Name-8921.webp', 31, 'Yes', 'Yes'),
(43, 'Loafer L2', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1000.00', 'Shoe-Name-7813.jpg', 31, 'Yes', 'Yes'),
(44, 'Loafer L3', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '900.00', 'Shoe-Name-71.jpg', 31, 'Yes', 'Yes'),
(45, 'Loafer L4', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1200.00', 'Shoe-Name-3689.jpg', 31, 'Yes', 'Yes'),
(46, 'Loafer L5', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1400.00', 'Shoe-Name-2026.jpg', 31, 'Yes', 'Yes'),
(47, 'Loafer L9', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1800.00', 'Shoe-Name-9313.webp', 31, 'Yes', 'Yes'),
(48, 'Loafer L10', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1678.00', 'Shoe-Name-9593.jpg', 31, 'Yes', 'Yes'),
(49, 'Loafer V1', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '4342.00', 'Shoe-Name-9810.jpg', 31, 'Yes', 'Yes'),
(50, 'Loafer V2', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '3222.00', 'Shoe-Name-7231.jpg', 31, 'Yes', 'Yes'),
(51, 'Loafer V4', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1230.00', 'Shoe-Name-2823.jpg', 31, 'Yes', 'Yes'),
(52, 'Loafer m1', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '2000.00', 'Shoe-Name-3052.jpg', 41, 'Yes', 'Yes'),
(53, 'Loafer M2', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1324.00', 'Shoe-Name-5134.jpg', 41, 'Yes', 'Yes'),
(54, 'Loafer M3', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '890.00', 'Shoe-Name-4090.jpg', 41, 'Yes', 'Yes'),
(55, 'Loafer M4', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '987.00', 'Shoe-Name-6968.jpg', 41, 'Yes', 'Yes'),
(56, 'Loafer M6', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '1100.00', 'Shoe-Name-1929.jpg', 41, 'Yes', 'Yes'),
(57, 'Loafer M7', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '600.00', 'Shoe-Name-1276.jpg', 41, 'Yes', 'Yes'),
(58, 'Loafer M8', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '777.00', 'Shoe-Name-5188.jpg', 41, 'Yes', 'Yes'),
(59, 'Loafer M9', 'A pair of round toe loafers\r\nHas regular styling\r\nSlip-on detail\r\nLeather upper\r\nCushioned footbed\r\nTextured and patterned outsole', '2000.00', 'Shoe-Name-6991.jpg', 41, 'Yes', 'Yes'),
(60, 'Heel H1', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '1235.00', 'Shoe-Name-6167.jpg', 35, 'Yes', 'Yes'),
(61, 'Heel H2', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '900.00', 'Shoe-Name-2408.jpg', 35, 'Yes', 'Yes'),
(62, 'Heel H3', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '1200.00', 'Shoe-Name-305.jpg', 35, 'Yes', 'Yes'),
(63, 'Heel H4', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '3000.00', 'Shoe-Name-1258.jpg', 35, 'Yes', 'Yes'),
(64, 'Heel H5', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '4000.00', 'Shoe-Name-8494.jpg', 35, 'Yes', 'Yes'),
(65, 'Heel H6', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '2000.00', 'Shoe-Name-2191.jpg', 35, 'Yes', 'Yes'),
(66, 'Heel H6', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '1900.00', 'Shoe-Name-7386.jpg', 35, 'Yes', 'Yes'),
(67, 'Heel H7', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '3700.00', 'Shoe-Name-379.jpg', 35, 'Yes', 'Yes'),
(68, 'Heel H8', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '1256.00', 'Shoe-Name-7253.jpg', 35, 'Yes', 'Yes'),
(69, 'Heel H9', 'A must-have for every heel lover, these pink stilettoes by Ted Baker lend a confident and savvy look. The bow detail on the top adds a chic appeal to these heels. Team it with any fancy dress to look your impressive best.', '5000.00', 'Shoe-Name-4733.jpg', 35, 'Yes', 'Yes'),
(70, 'Home Shoes A1', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '300.00', 'Shoe-Name-9885.jpg', 32, 'Yes', 'Yes'),
(71, 'Home shoes A2', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '1133.00', 'Shoe-Name-9941.jpg', 32, 'Yes', 'Yes'),
(72, 'Home Shoes A3', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '200.00', 'Shoe-Name-2288.jpg', 32, 'Yes', 'Yes'),
(73, 'Home Shoes A4', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-3650.jpg', 32, 'Yes', 'Yes'),
(74, 'Home Shoes A5', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '50.00', 'Shoe-Name-9364.jpg', 32, 'Yes', 'Yes'),
(75, 'Home Shoes', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '150.00', 'Shoe-Name-4951.jpg', 32, 'Yes', 'Yes'),
(76, 'Home Shoes A6', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '150.00', 'Shoe-Name-9211.jpg', 32, 'Yes', 'Yes'),
(77, 'Home Shoes A7', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '60.00', 'Shoe-Name-7569.jpg', 32, 'Yes', 'Yes'),
(78, 'Home Shoes A8', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '300.00', 'Shoe-Name-28.jpg', 32, 'Yes', 'Yes'),
(79, 'Home Shoes', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-8492.jpg', 32, 'Yes', 'Yes'),
(80, 'Home Shoes P1', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-3611.jpg', 42, 'Yes', 'Yes'),
(81, 'Home Shoes P2', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '70.00', 'Shoe-Name-6973.jpg', 30, 'Yes', 'Yes'),
(82, 'Home Shoes P3', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '80.00', 'Shoe-Name-5957.jpg', 42, 'Yes', 'Yes'),
(83, 'Home Shoes P4', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-1402.jpg', 42, 'Yes', 'Yes'),
(84, 'Home Shoes P5', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '120.00', 'Shoe-Name-4871.jpg', 42, 'Yes', 'Yes'),
(85, 'Home Shoes P8', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '300.00', 'Shoe-Name-5674.jpg', 42, 'Yes', 'Yes'),
(86, 'Home Shoes P9', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '500.00', 'Shoe-Name-2602.jpg', 42, 'Yes', 'Yes'),
(87, 'Hone Shoes P10', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-1472.jpg', 42, 'Yes', 'Yes'),
(88, 'Home Shoes P11', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '100.00', 'Shoe-Name-9751.jpg', 42, 'Yes', 'Yes'),
(89, 'Home Shoes P12', 'Extra Soft, Padded, Comfortable and Cushioned Foot-Bed Enhances Comfort to the Feet. Doctor Extra Soft Slipper Provides You Better Walking Comfort ', '111.00', 'Shoe-Name-3005.jpg', 42, 'Yes', 'Yes'),
(90, 'Slides S1', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '200.00', 'Shoe-Name-3394.jpg', 33, 'Yes', 'Yes'),
(91, 'Slides S2', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '300.00', 'Shoe-Name-3673.jpg', 33, 'Yes', 'Yes'),
(92, 'Slides S3', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '400.00', 'Shoe-Name-9963.jpg', 33, 'Yes', 'Yes'),
(93, 'Slides S4', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '200.00', 'Shoe-Name-673.jpg', 33, 'Yes', 'Yes'),
(94, 'Slides S5', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '100.00', 'Shoe-Name-4680.jpg', 33, 'Yes', 'Yes'),
(95, 'Slides P6', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '150.00', 'Shoe-Name-7007.jpg', 33, 'Yes', 'Yes'),
(96, 'Slides S9', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '130.00', 'Shoe-Name-5904.jpg', 33, 'Yes', 'Yes'),
(97, 'Slides S10', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '110.00', 'Shoe-Name-3250.jpg', 33, 'Yes', 'Yes'),
(98, 'Slides S12', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '200.00', 'Shoe-Name-9115.jpg', 33, 'Yes', 'Yes'),
(99, 'Slides S13', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '400.00', 'Shoe-Name-9814.jpg', 33, 'Yes', 'Yes'),
(100, 'Slides S15', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '500.00', 'Shoe-Name-3798.jpg', 33, 'Yes', 'Yes'),
(101, 'Slides N1', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '300.00', 'Shoe-Name-6776.webp', 43, 'Yes', 'Yes'),
(102, 'Slides N2', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '200.00', 'Shoe-Name-9643.jpg', 43, 'Yes', 'Yes'),
(103, 'Slides N3', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '400.00', 'Shoe-Name-2075.jpg', 43, 'Yes', 'Yes'),
(104, 'Slides N4', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '500.00', 'Shoe-Name-7451.jpg', 43, 'Yes', 'Yes'),
(105, 'Slides N5', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '300.00', 'Shoe-Name-6785.jpg', 43, 'Yes', 'Yes'),
(106, 'Slides N6', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '200.00', 'Shoe-Name-3118.jpg', 43, 'Yes', 'Yes'),
(107, 'Slides N7', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '250.00', 'Shoe-Name-2415.jpg', 30, 'Yes', 'Yes'),
(108, 'Slides N8', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '190.00', 'Shoe-Name-9757.jpg', 43, 'Yes', 'Yes'),
(109, 'Slides N10', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '600.00', 'Shoe-Name-9803.jpg', 43, 'Yes', 'Yes'),
(110, 'Slides N11', 'This is imported model. High-quality lightweight material. Long time wearing duration. Size from IN 6-10, ratio 11112', '500.00', 'Shoe-Name-3721.jpg', 43, 'Yes', 'Yes'),
(111, 'OXFORDS A1', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2000.00', 'Shoe-Name-9843.jpg', 45, 'Yes', 'Yes'),
(112, 'OXFORDS A2', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2700.00', 'Shoe-Name-8985.jpg', 45, 'Yes', 'Yes'),
(113, 'OXFORD A3', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '1000.00', 'Shoe-Name-4153.jpg', 45, 'Yes', 'Yes'),
(114, 'OXFORDS A4', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2900.00', 'Shoe-Name-7495.jpg', 45, 'Yes', 'Yes'),
(115, 'OXFORDS A5', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '5000.00', 'Shoe-Name-8417.jpg', 45, 'Yes', 'Yes'),
(116, 'OXFORDS A7', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '3000.00', 'Shoe-Name-2850.jpg', 45, 'Yes', 'Yes'),
(117, 'OXFORDS A9', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2300.00', 'Shoe-Name-3170.jpg', 45, 'Yes', 'Yes'),
(118, 'OXFORDS A10', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '3000.00', 'Shoe-Name-36.jpg', 45, 'Yes', 'Yes'),
(119, 'OXFORDS A12', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '900.00', 'Shoe-Name-304.jpg', 44, 'Yes', 'Yes'),
(120, 'OXFORDS B1', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '1200.00', 'Shoe-Name-868.jpg', 45, 'Yes', 'Yes'),
(121, 'OXFORDS B2', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2000.00', 'Shoe-Name-8029.jpg', 44, 'Yes', 'Yes'),
(122, 'OXFORDS B3', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '4000.00', 'Shoe-Name-4011.jpg', 44, 'Yes', 'Yes'),
(123, 'OXFORDS B5', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '5000.00', 'Shoe-Name-8970.jpg', 44, 'Yes', 'Yes'),
(124, 'OXFORDS B6', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '5700.00', 'Shoe-Name-4507.jpg', 44, 'Yes', 'Yes'),
(125, 'OXFORDS B7', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '1000.00', 'Shoe-Name-7490.jpg', 44, 'Yes', 'Yes'),
(126, 'OXFORDS B8', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2000.00', 'Shoe-Name-8771.jpg', 30, 'Yes', 'Yes'),
(127, 'OXFORDS B9', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2377.00', 'Shoe-Name-3156.jpg', 44, 'Yes', 'Yes'),
(128, 'OXFORDS B10', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '10000.00', 'Shoe-Name-2198.jpg', 44, 'Yes', 'Yes'),
(129, 'OXFORDS B22', 'Wipe with a clean, dry cloth when needed\r\nLace Fastening\r\nContact our styling expert @ 08047186405 (10 AM to 7 PM)\r\nNarrow Fit\r\nLeather upper\r\nRubber sole', '2576.00', 'Shoe-Name-9473.jpg', 44, 'Yes', 'Yes'),
(130, 'CHUKKAS C1', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '4000.00', 'Shoe-Name-5396.jpg', 46, 'Yes', 'Yes'),
(131, 'Chukkas C2', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2000.00', 'Shoe-Name-4903.jpg', 46, 'Yes', 'Yes'),
(132, 'Chukkas C4', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '1000.00', 'Shoe-Name-5359.jpg', 46, 'Yes', 'Yes'),
(133, 'Chukkas C5', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2455.00', 'Shoe-Name-4756.jpg', 46, 'Yes', 'Yes'),
(134, 'Chukkas C6', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '3200.00', 'Shoe-Name-585.jpg', 46, 'Yes', 'Yes'),
(135, 'Chukkas C7', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '1000.00', 'Shoe-Name-5179.jpg', 46, 'Yes', 'Yes'),
(136, 'Chukkas C8', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2800.00', 'Shoe-Name-23.jpg', 46, 'Yes', 'Yes'),
(137, 'Chukkas C9', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '6300.00', 'Shoe-Name-951.jpg', 46, 'Yes', 'Yes'),
(138, 'Chukkas C11', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '7222.00', 'Shoe-Name-879.jpg', 46, 'Yes', 'Yes'),
(139, 'Chukkas J1', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '1900.00', 'Shoe-Name-3452.jpg', 47, 'Yes', 'Yes'),
(140, 'Chukkas J2', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '5233.00', 'Shoe-Name-1270.jpg', 47, 'Yes', 'Yes'),
(141, 'Chukkas J3', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2000.00', 'Shoe-Name-9447.jpg', 47, 'Yes', 'Yes'),
(142, 'Chukkas J4', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2000.00', 'Shoe-Name-8349.jpg', 47, 'Yes', 'Yes'),
(143, 'Chukkas J6', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '6000.00', 'Shoe-Name-814.jpg', 47, 'Yes', 'Yes'),
(144, 'Chukkas J9', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '1660.00', 'Shoe-Name-45.jpg', 47, 'Yes', 'Yes'),
(145, 'Chukkas J10', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '7366.00', 'Shoe-Name-943.jpg', 47, 'Yes', 'Yes'),
(146, 'Chukkas J12', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '1000.00', 'Shoe-Name-7572.jpg', 47, 'Yes', 'Yes'),
(147, 'Chukkas j15', 'Material Type: Leather\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions:', '2333.00', 'Shoe-Name-4436.jpg', 47, 'Yes', 'Yes'),
(148, 'Crocs C1', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '2000.00', 'Shoe-Name-409.jpg', 48, 'Yes', 'Yes'),
(149, 'crocs C2', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '1600.00', 'Shoe-Name-7191.jpg', 48, 'Yes', 'Yes'),
(150, 'crocs C3', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '1900.00', 'Shoe-Name-3528.jpg', 48, 'Yes', 'Yes'),
(151, 'crocs C4', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '6.00', 'Shoe-Name-4929.jpg', 48, 'Yes', 'Yes'),
(152, 'crocs C8', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '222.00', 'Shoe-Name-3239.jpg', 48, 'Yes', 'Yes'),
(153, 'crocs C10', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '100.00', 'Shoe-Name-2561.jpg', 48, 'Yes', 'Yes'),
(154, 'abc shoes', 'Sole: Croslite\r\nClosure: Slip On\r\nShoe Width: Medium\r\nMade to Last Long\r\nElegant Packaging\r\nPerfect Gifting Option\r\nZero compromise on quality', '120.00', 'Shoe-Name-8521.jpg', 49, 'Yes', 'Yes'),
(155, 'low price shoes', 'cheap product.', '30.00', 'Shoe-Name-4324.jpg', 50, 'Yes', 'Yes'),
(156, 'Nike AirForce', 'great shoes', '3000.00', 'Shoe-Name-3482.jpg', 30, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'admin', '$2y$10$TtL2a5B6Ldba4ymQnh6RKuWChtROHSV9UbyTd9GWfCh1GV8rq.0kO', '2023-03-15 05:48:49'),
(2, 'ganesh', '$2y$10$huXGky5Spa9wnWl793C8Se9UKJBZfHdgSUT28y47NzpzySy1MoYhq', '2023-03-15 05:50:26'),
(4, 'admin2', '$2y$10$Gu6d3L3wvtBUjclgwJVLauzGy7YioH2d9dxRd7bAq2Zna00.Cbmq6', '2023-04-25 09:47:08'),
(5, 'abc', '$2y$10$hUhNQMUFlbXy0z.aaVqE3uLn8wLD6gjigz.64U4e1BPe5tnl1Mwgq', '2023-04-25 12:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shoes`
--
ALTER TABLE `tbl_shoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shoes`
--
ALTER TABLE `tbl_shoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
