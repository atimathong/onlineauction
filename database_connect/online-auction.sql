-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 07, 2022 at 02:30 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bid_ID` int(11) NOT NULL,
  `buyer_ID` int(11) DEFAULT NULL,
  `item_ID` int(11) DEFAULT NULL,
  `bidding_date` date NOT NULL,
  `bidding_time` time NOT NULL,
  `bid_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bid_ID`, `buyer_ID`, `item_ID`, `bidding_date`, `bidding_time`, `bid_price`) VALUES
(8, 10, 1031, '2022-11-12', '01:08:56', 1500),
(9, 12, 1018, '2022-11-12', '01:12:08', 50000),
(10, 12, 1031, '2022-11-12', '01:13:11', 1700),
(11, 10, 1000, '2022-11-12', '22:05:56', 7),
(12, 12, 1000, '2022-11-12', '22:06:41', 6),
(19, 12, 1003, '2022-11-26', '21:35:19', 13),
(24, 12, 1003, '2022-11-28', '00:12:56', 17),
(25, 12, 1030, '2022-11-28', '00:17:42', 605),
(26, 13, 1020, '2022-12-01', '14:29:05', 32000),
(27, 13, 1022, '2022-12-02', '00:14:38', 810),
(39, 10, 1003, '2022-12-03', '17:24:05', 25),
(40, 10, 1043, '2022-12-03', '17:25:31', 20),
(41, 10, 1036, '2022-12-03', '17:25:54', 15),
(42, 13, 1031, '2022-12-03', '22:45:25', 1800),
(43, 13, 1043, '2022-12-03', '22:54:48', 26),
(44, 12, 1043, '2022-12-03', '22:55:17', 30),
(45, 13, 1049, '2022-12-06', '23:13:29', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_ID` varchar(30) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `category`) VALUES
('1', 'Body and Hair'),
('10', 'Cars'),
('11', 'Laptops'),
('12', 'Furniture'),
('2', 'Sports'),
('3', 'Phones'),
('4', 'Books'),
('5', 'Arts'),
('6', 'Toys'),
('7', 'Cameras'),
('8', 'Jewellery and Watch'),
('9', 'Music Instrument');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_ID` int(20) NOT NULL,
  `seller_ID` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `pro_desc` varchar(1000) DEFAULT NULL,
  `cond` varchar(20) DEFAULT NULL,
  `starting_price` int(10) DEFAULT NULL,
  `reserve_price` int(10) DEFAULT NULL,
  `sta_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `category_ID` varchar(30) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_ID`, `seller_ID`, `item_name`, `pro_desc`, `cond`, `starting_price`, `reserve_price`, `sta_date`, `start_time`, `end_date`, `end_time`, `category_ID`, `picture`) VALUES
(1000, 1, 'body wash', 'It is new, and there are 3 bottles in a pack. Each of them is 50ml.\r\n', 'Brand new', 6, 9, '2022-08-12', '00:00:00', '2023-06-13', '22:10:00', '1', 'Bodywash.jpg'),
(1001, 17, 'GA.MA iQ Perfetto Hairdryer Rose', 'It has been used for 1 year, and the color is gray. The length of the cable is 3 m', 'Well Used', 15, 22, '2022-10-10', '00:00:00', '2023-05-10', '17:00:00', '1', 'Perfettohairdryerrose.jpg'),
(1002, 1, 'Wooden hair brush', 'It is new with a completed package.\r\n', 'Brand new', 5, 6, '2022-03-10', '00:00:00', '2023-03-19', '00:00:00', '1', 'Woodenhairbrush.jpg'),
(1003, 3, 'hair daryer', 'It has been used, and the color is silver.\r\nThe length of the cable is 2 m. And the Voltage range from 220 to 240 V with frequency from 50 to 60 Hz', 'Lightly used', 10, 14, '2022-05-04', '00:00:00', '2023-04-20', '00:00:00', '1', 'Hairdryer.jpg'),
(1004, 2, '10 Pieces Hair Brush Set', 'This brush set has been used for 3 months. There might be light scratches on surface, but it does not affect the performance of product.', 'Lightly used', 9, 11, '2022-03-19', '00:00:00', '2023-03-31', '00:00:00', '1', 'Hairbrushset.jpg'),
(1005, 2, 'Tarmak R100 Basketball', 'It has been used for 2 months, and the size is 7', 'Lightly used', 20, 23, '2022-08-31', '00:00:00', '2023-05-20', '12:00:00', '2', 'BasketballTarmakR100.jpg'),
(1006, 17, 'Basketball-pro 23', 'It is almost new, and it has been used for 1 weeks, and the size is 5', 'Like new', 11, 14, '2022-08-20', '09:00:00', '2023-05-04', '12:00:00', '2', 'BasketballpPro23.jpg'),
(1007, 3, 'tennis racket', ' It is almost new, and it has been unboxed for 1 day.\r\n', 'Like new', 25, 30, '2022-07-05', '09:30:00', '2023-04-01', '12:00:00', '2', 'Tennisracket.jpg'),
(1008, 3, 'Premier League Football 2021-2022', 'Size is 3, and it is new with packing intact\r\n', 'Brand new', 17, 20, '2022-10-21', '09:00:00', '2023-05-10', '12:00:00', '2', 'Football.jpg'),
(1009, 3, 'Baseball Hardwood Solid Stick', 'Used for several years\r\n', 'Heavily Used', 6, 10, '2022-08-19', '10:00:00', '2023-03-15', '17:00:00', '2', 'Baseballhardwooddsolidstick.jpg'),
(1010, 12, 'Apple iPhone 13', 'The condition is 9.9 New and the color is blue. \r\nThis is without a contract and the operating system: IOS 15\r\nMemory storage capacity: 128 GB', 'Like new', 281, 332, '2022-10-06', '09:30:00', '2023-05-29', '12:00:00', '3', 'iphone13.jpg'),
(1011, 12, 'Samsung Galaxy Z Flip 4', 'A brand-new, unused, unopened and undamaged item in original retail packaging, and the color is black. The operating system is Android        \r\nIt can Connect with 5G wifi and the storage Capacity is 512 GB\r\n', 'Brand new', 238, 260, '2022-11-30', '09:00:00', '2023-04-08', '12:00:00', '3', 'SamsungGalaxyZFlip4.jpg'),
(1012, 12, 'Apple iPhone 14 Pro', 'The Colour is Space Black and the storage is 128 GB\r\nI bought this unlocked and went for the smaller version however, I miss the ‘pro max’ size screen and will therefore be buying the bigger one. I’ve used it for all of one day, 9.9 New.\r\nWill be posted registered post. Don’t contact me making daft offers - I’ll ignore you.\r\nThanks.', 'Well Used', 310, 330, '2022-05-22', '13:00:00', '2023-07-05', '12:00:00', '3', 'iPhone14Pro.jpg'),
(1013, 12, 'Samsung Galaxy A52s', 'It has been used for 1.5 years, so there are some scratches on the screen. It\'s function is normal.It can Connect with 5G wifi, and the storage Capacity is 128 GB', 'Well Used', 260, 280, '2022-03-14', '15:00:00', '2023-03-03', '00:00:00', '3', 'SamsungGalaxyA52s.jpg'),
(1014, 2, 'Apple iphone X', '9.9 New!! \r\nThe colour is white, and the storage is 256 GB. I’ve used it for only less than one week, because I bought this with the wrong storage. Therefore, I want to sell this and buy the other one with higher storage.\r\n', 'Like new', 292, 312, '2022-09-16', '10:00:00', '2023-05-01', '00:00:00', '3', 'iphoneX.jpg'),
(1015, 5, 'Cute Heart Set Necklace 925 Silver Jewellery Dephini', 'The conditiion is new with tags, unused, unworn and undamaged item in the original packaging. This necklace is made by Heart with metal purity of 925 and beaded style decorated with navy blue Akoya Crystal.', 'Brand new', 180, 200, '2022-05-15', '12:00:00', '2023-05-31', '15:00:00', '8', 'necklace.jpg'),
(1016, 3, 'Stainless Steel Plain or Gold IP Polished Wedding Band Ring', '\r\nThe conditiion is new with tags, unused, unworn and undamaged item in the original packaging.\r\nIt is orginated from Russia and has only gold colour, made of  stainless steel.', 'Like new', 150, 180, '2022-07-18', '12:00:00', '2023-06-18', '18:00:00', '8', 'bandring.jpg'),
(1017, 5, 'Voutilainen Decimal Minute Repeater GMT Unique Manual Gold Mens Watch Special', 'Pre-Owned Voutilainen Decimal Minute Repeater GMT Piece Unique (Special1) manual wind watch, features a 42mm 18k white gold case surrounding a silver engine-turn dial on a navy blue leather strap with an 18k white gold tang buckle. Functions include hours, minutes, small seconds, minute repeater and GMT. This watch comes with the original box and warranty. We back this watch with a 2-Year Watchbox warranty!', 'Brand new', 10000, 15000, '2022-08-25', '11:00:00', '2023-04-30', '19:00:00', '8', 'watch1.jpg'),
(1018, 2, '2021 BMW M3 Competition Saloon', 'This has been used for 1 year with 8310 miles. The registration date is 2021/06/08. The fuel type is Petrol.', 'Lightly used', 29000, 33000, '2022-07-18', '12:00:00', '2023-03-06', '21:55:00', '10', 'BMW.jpg'),
(1019, 1, '2021 Porsche Taycan Performance Plus Turbo Saloon Electric Automatic', 'This car has been used for 3 years with 19664 miles. The registration date is 2019/06/08. The fuel type is Electric.', 'Lightly used', 40000, 50000, '2022-08-25', '12:00:00', '2022-12-28', '21:00:00', '10', 'Porsche.jpg'),
(1020, 1, '2018 Mercedes-Benz S Class S500L AMG Line Execiutive/Premium Plus 4dr 9G-Tronic Auto', 'This has been used for 4 years with 29000 miles. The registration date is 2018/11/22. The fuel type is Petrol. This is a used car, but it is in very good condition', 'Well Used', 30000, 35000, '2022-08-25', '11:00:00', '2023-02-01', '19:00:00', '10', 'Mercedes.jpg'),
(1021, 1, 'Apple MacBook Pro 16(512GB SSD, M1 Pro,16GB) Laptop - Space Grey - MK183B/A (October, 2021)', 'The condition is 9.9 New and the color is Space Grey. The operating system is IOS 15. Memory storage capacity: 512 GB The screen size is 16.2 in. and the RAM size is 16 GB.', 'Brand new', 900, 1000, '2022-10-06', '10:00:00', '2023-04-30', '15:00:00', '11', 'Mac.jpg'),
(1022, 1, 'NEW Samsung Galaxy Book2 Pro 13.3 OLED i5 1240P 8G 256GB \r\nThin Ultrabook Laptop', 'This Laptop is quite new, and it is packed in the original box. The memory storage capacity is 256 GB and the RAM size is 8 GB. For more information about the product please search on the Samsung website.', 'Brand new', 800, 930, '2022-10-08', '14:00:00', '2023-05-15', '16:00:00', '11', 'Samsung_Galaxy.jpg'),
(1023, 1, 'Lenovo ThinkPad X13, 13.3 Full \r\nHD Laptop Core i5-10210U 8GB 256GB SSD Win10 Pro', 'This Laptop is quite new and it is packed in the original box, and the operating system is Windows. The memory storage capacity is 256 GB and the RAM size is 8 GB. For more information about the product please search on the Samsung website.', 'Brand new', 892, 940, '2022-09-30', '09:00:00', '2023-03-03', '21:00:00', '11', 'Lenovo.jpg '),
(1024, 1, 'Mens Army Military Stainless Steel Wrist Watch Quartz Date Analog Sports Watches', '        \r\nA brand-new, unused, unworn and undamaged item in the original packaging, made from stainless steel and         \r\nequipped with quartz (battery) movement.', 'Lightly used', 5000, 5800, '2022-10-12', '12:00:00', '2023-04-25', '20:00:00', '8', 'watch2.jpg'),
(1025, 1, 'Canon Canonet 35mm Film Rangefinder Camera Original Model', 'An item that has been previously used. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. It is of rangefinder type with 35 mm lens kit, originally made by Canon and has only silver colour.', 'Well Used', 1800, 2000, '2022-09-15', '10:00:00', '2023-02-25', '15:00:00', '7', 'canon.jpg'),
(1026, 1, 'Olympus Trip MD3 DX Point And Shoot 35mm Compact Film Camera', 'Belonging to one of Olympus Trip Series, the model is Olympus Trip XB40 AF which is of type compact with the features built-in flash and electric drive.', 'Lightly used', 2500, 2700, '2022-10-20', '14:00:00', '2023-03-15', '16:00:00', '7', 'olympus.jpg'),
(1027, 1, 'LEICA M9 DIGITAL CAMERA BODY - PARTS ONLY', 'The model was made in Germany back in late 1980s, belonging to the Series Leica M with the maximum resolution of       \r\n18.0MP and Lithium-Ion battery.', 'Like new', 2800, 2950, '2022-09-10', '09:00:00', '2023-06-25', '21:00:00', '7', 'leica.jpg'),
(1029, 5, 'Nikon COOLPIX P900 Digital Bridge Camera', 'Capture details not visible to the naked eye with the 83x NIKKOR zoom lens - extendable to 166x Dynamic Fine Zoom\r\nBack-illuminated 16MP CMOS image sensor enables clear, richly detailed images which are easy to achieve, even at night\r\nGet fast and detailed location information with GPS/GLONASS/QZSS international satellite systems tracking your route.\r\nShare images anywhere, using the one-touch Wi-Fi button ot tapping the NFC enabled camera to a smart device.\r\nFull HD movies have high-quality directional sound, as the Zoom microphone changes direction to match how you operate the zoom.', 'Lightly used', 4800, 5500, '2022-09-14', '20:00:00', '2023-06-25', '13:00:00', '7', 'nikon.jpg'),
(1030, 5, 'Forenza Violin and Case', 'Forenza Violin and case with bow in good condition, size 4/4 , and handle on case. Made in Lithuania. Buy from us, get free chinrest, 4 replacement strings, and many song sheets.', 'Well Used', 600, 750, '2022-08-10', '15:00:00', '2023-06-25', '22:00:00', '9', 'violin.jpg'),
(1031, 4, 'Beautiful rich deep toned vintage viola 4/4 c1950 flamed maple inlaid purfling', 'This lovely Viola has a rich deep tone. The oil varnish is honey amber which makes it a stand out instrument. It has fine purfling and a flamed maple back. It was made in West Germany probably in the 50’s or 60’s. Based on Stradivarius design.There are no open cracks or seams. The sound post is in place and it comes professionally set up and ready to play. A new set of strings will improve the sound further, although the present ones have no issues. Fitted with fine tuners, chin rest and good quality bridge.', 'Like new', 1350, 1480, '2022-09-01', '12:00:00', '2023-06-25', '22:00:00', '9', 'viola.jpg'),
(1032, 3, 'Boosey and Hawkes 400 Cello with Bow and Carry Case', 'This is a Boosey and Hawkes 400 Cello complete with Bow & Carry Case. It is in Very Good Condition with just a couple of small marks.\r\nIt was Manufactured in Czechoslovakia. It Measures approximately 50 inches long and has a 1 Piece Back. The Endpin lifts and drops correctly as required.', 'Well Used', 2400, 2600, '2022-09-05', '11:00:00', '2023-06-25', '22:00:00', '9', 'cello.jpg'),
(1033, 4, 'Orange O Bass Guitar 2022 In Mint Unplayed Condition With Gig Bag', 'Gorgeous white binding. Also comes with white scratch plate unused. Collection from NN18 Northamptonshire. Cheers. Absolutely no postage available.', 'Brand new', 1100, 1250, '2022-09-21', '08:00:00', '2023-06-25', '23:00:00', '9', 'guitar.jpg'),
(1034, 4, 'Trainset for kids', 'Super fun train set for bos and girls, hop on board now! You can organize your own route and even open your own station. It\'s never too late to buy your kids their first train set toys for Christmas!', 'Like new', 4, 9, '2022-05-14', '00:00:00', '2023-06-25', '00:00:00', '6', 'trainset.jpeg'),
(1035, 1, 'Teddy Bear - New', 'A gift from a friend, but my daughter is already a teenager, way past the stuffed animals phase, so decided to sell it.', 'Brand new', 6, 25, '2022-07-05', '00:00:00', '2023-04-15', '00:00:00', '6', 'teddybear.jpeg'),
(1036, 4, 'Buzz Lightyear Toy', 'A limited edition from Toy Story 1, the appearance may seem a little old, but when you press the button, it still talks. ', 'Well Used', 5, 9, '2022-05-10', '00:00:00', '2023-06-25', '00:00:00', '6', 'lightyearbuzz.jpeg'),
(1037, 5, 'Baby Toy - circles,Good toy for kids younger than 3 years old', 'Recommend to have adults\' company while playing. Please don\'t swallow the toy. The toy is safe for one-year-old to play with.', 'Like new', 6, 11, '2022-04-14', '00:00:00', '2023-06-25', '00:00:00', '6', 'babytoy.jpeg'),
(1038, 2, 'Yellow Truck', 'This used to be mine, but now I don\'t play it anymore. Surprisingly it still looks pretty new, so I thought I can put it on bidding ', 'Lightly used', 1, 12, '2022-07-22', '00:00:00', '2023-06-25', '00:00:00', '6', 'yellowtruck.jpeg'),
(1039, 5, 'Modern design poster', 'Bought at a flea market, I also got it framed, so it\'s nearly as new. Feel free to bid on my amazing and interesting poster. ', 'Lightly used', 1, 3, '2022-03-11', '00:00:00', '2023-06-25', '00:00:00', '5', 'poster.jpeg'),
(1040, 4, 'Self-design Thankyou card', 'This is my own design of card, find out more on leftfootcorner.com!! The design is inspired by one of my best friend\'s cat, and its name is Fatty.', 'Brand new', 4, 10, '2022-07-01', '00:00:00', '2023-05-25', '00:00:00', '5', 'card.jpg'),
(1041, 2, 'Statue - Marble Greek Style', 'The marble statue makes your house feels like a grand museum. Time to brag your wealth with some naked Greek statues. Although the statue identity remains mystery, we can definitely appreciate the beautiful art piece.', 'Heavily Used', 22, 30, '2022-08-20', '00:00:00', '2023-06-25', '00:00:00', '5', 'statue.jpeg'),
(1042, 2, 'Art Brush - Almost New', 'I bought this brush a couple of years ago, but I never had the chance to paint actually. It\'s still in very good condition. ', 'Brand new', 1, 3, '2022-05-14', '00:00:00', '2023-03-29', '00:00:00', '5', 'brush.jpeg'),
(1043, 5, 'Oil Painting', 'This painting is bought at a flea market, but with good quality and great potential. The artist is a friend of mine.', 'Lightly used', 13, 20, '2022-05-14', '01:00:00', '2023-06-25', '00:00:00', '5', 'oilpainting.jpeg'),
(1044, 3, 'Pride and Prejudice,Jane Austen\'s all time favorite', 'A must-read if you love romance and witty lines.', 'Heavily Used', 2, 4, '2022-06-06', '00:00:00', '2023-06-25', '00:00:00', '4', 'prideandprejudice.jpg'),
(1045, 3, 'The DaVinci Code', 'The book is only read once, but the ridge is pretty broken. Goodread, recommend to younger readers or any-age readers! ', 'Well Used', 3, 5, '2022-05-14', '00:00:00', '2023-06-25', '00:00:00', '4', 'davincicode.jpeg'),
(1046, 5, '101 Essays that Will Change the Way You Think', 'Almost new. Only bought this for class, yet I only read it twice. No markings in pages.', 'Brand new', 4, 6, '2022-05-14', '00:00:00', '2023-06-25', '00:00:00', '4', '101essays.jpeg'),
(1047, 5, 'Thinking Fast and Slow', 'I bought this book two years ago, it was a good read, bestseller, but I really don\'t have more spaces on the bookshelf.', 'Lightly used', 1, 5, '2022-04-09', '00:00:00', '2023-05-25', '00:00:00', '4', 'thinkingfastandslow.jpeg'),
(1048, 1, 'Milk and Honey by rupi kaur', 'This is a secondhand book, but it\'s only read once. It\'d be a perfect light-read if you\'re also a bookworm.', 'Like new', 1, 5, '2022-07-07', '00:00:00', '2023-06-25', '00:00:00', '4', 'milkandhoney.jpeg'),
(1049, 5, 'Bamboo Portable Folding Legs Laptop Notebook Table Bed Tray PC Desk UK ', 'This is a brand new folding computer desk which is made of bamboo.', 'Brand new', 5, 10, '2022-09-08', '00:00:00', '2023-06-25', '00:00:00', '12', 'desk.jpg'),
(1050, 4, 'Vinsetto Gaming Chair with Headrest, Footrest, Racing Gamer Recliner, Red White', 'This is a brand new gaming chair made of spong and PU leather.', 'Brand new', 40, 110, '2022-10-10', '00:00:00', '2023-06-25', '00:00:00', '12', 'chair.jpg'),
(1051, 3, 'Chest of 4 Drawers Bedroom Cabinet Wood Storage Clothes Organiser Unit Off White', 'This is a brand new bedroom drawer with height 95cm.', 'Brand new', 30, 90, '2022-10-04', '00:00:00', '2023-04-25', '00:00:00', '12', 'drawer.jpg'),
(1053, 13, 'Mona Lisa Copy-cat Picture', 'Mona Lisa, also called Portrait of Lisa Gherardini, wife of Francesco del Giocondo, Italian La Gioconda, or French La Joconde, oil painting on a poplar wood panel by Leonardo da Vinci, probably the world’s most famous painting. ', 'Like new', 100, 106, '2022-12-02', '05:11:00', '2023-06-25', '04:12:00', '5', 'mona.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `addressline_1` varchar(255) NOT NULL,
  `addressline_2` varchar(255) DEFAULT NULL,
  `postal_code` varchar(50) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `firstname`, `lastname`, `email`, `password`, `addressline_1`, `addressline_2`, `postal_code`, `phone_number`, `user_type`) VALUES
(1, 'Beau', 'Thongs', 'beau@yahoo.com', 'AA12362', '890', 'Grand Felda', 'HA9 0EF', '07340655237', 'seller'),
(2, 'Tima', 'Boon', 'timaboon2002@yahoo.co.th', '992a6d18b2a148cf20d9014c3524aa11', '554', 'Wembley', 'HA7 4ER', '0897654321', 'seller'),
(3, 'Gigi', 'Armani', 'beautieatima92@gmail.com', '8a2bd3e7515b99c88006a6956bc284e9', '674', 'Empire Way', '34210', '0943256673', 'seller'),
(4, 'Lady', 'Gaga', 'beau@gmail.com', '74b87337454200d4d33f80c4663dc5e5', '321', 'Borough', 'FR4 TH3', '0931146830', 'seller'),
(5, 'Andie', 'Kidman', 'ucabat6@ucl.ac.uk', 'f176fc999050e08c2c1a33b6da553adf', '4321', 'Euston Road', 'DF32 9RT', '0943217883', 'seller'),
(6, 'Tina', 'Wang', 'tina.w@gmail.com', 'f176fc999050e08c2c1a33b6da553adf', '304/99', 'Gower Street', 'FE45 T34', '0788824466', 'both'),
(7, 'Jenny', 'Blackpink', 'jenny@bp.co.uk', 'd81f9c1be2e08964bf9f24b15f0e4900', '1233', 'Baker Street', 'GF12 R45', '0987853244', 'buyer'),
(8, 'Fairy', 'Tale', 'ft@jk.rolling.com', '81dc9bdb52d04dc20036dbd8313ed055', '1125', 'Oxford Street', 'FE34 TG5', '0443221145', 'buyer'),
(9, 'Lisa', 'Lalala', 'lisa@bp.co.uk', '5072d348b267983ddc0786d821c3fe32', '1098', 'Dower Street', 'FG4 TR5', '0543214455', 'buyer'),
(10, 'Lisa', 'Twice', 'ucabat4@ucl.ac.uk', '9aa6e5f2256c17d2d430b100032b997c', '4433', 'Hailey Street', 'DF5 RT6', '0998443355', 'buyer'),
(11, 'Rose', 'Velvet', 'rose.v@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', '45A', 'Dolin Street', '121300', '0994839596', 'buyer'),
(12, 'Jisoo', 'Pinkblack', 'beautieatim92@gmail.com', '95c8fcfb13f40636ff2e4139bda00377', '1234', 'Finchery Road', 'RE3 EF1', '0999999999', 'both'),
(13, 'Bella', 'Sololo', 'codehanger.brand@gmail.com', 'e7e9ec3723447a642f762b2b6a15cfd7', '774', 'Saint paul', 'EW5 TU7', '0988832456', 'both'),
(14, 'Fendi', 'Hanna', 'fendi@hanna.com', '25d55ad283aa400af464c76d713c07ad', '12 Future', 'Lotus', '12345', '0944390099', 'both'),
(15, 'Boobo', 'Fedro', 'fedro@yahoo.com', 'f176fc999050e08c2c1a33b6da553adf', '1234', 'Spain', '12345', '0994355588', 'seller'),
(16, 'Rihanna', 'Degro', 'rihannee123@gmail.com', '9cf50661c2a035e12246a6a6e2e2b3be', '485960', 'Gower Street', 'GF5 RT7', '0992938485', 'seller'),
(17, 'Jiji', 'Fofo', 'jiji@gmail.com', 'b19f854c93aa7330289ce0325c7b81ec', '3425', 'Dodo', '12345', '0994568893', 'seller'),
(18, 'Siara', 'Leonal', 'siara@gmail.com', 'da87282e5002e52f16d3624cc4f661b9', 'Flat Number 109, Block A', 'Grand Felda House, Empire Way', 'HA9 0EF', '0993245664', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `view_history`
--

CREATE TABLE `view_history` (
  `search_ID` int(11) NOT NULL,
  `buyer_ID` int(11) DEFAULT NULL,
  `item_ID` int(11) DEFAULT NULL,
  `view_times` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `view_history`
--

INSERT INTO `view_history` (`search_ID`, `buyer_ID`, `item_ID`, `view_times`) VALUES
(1, 7, 1000, 4),
(2, 7, 1001, 2),
(3, 7, 1018, 7),
(4, 10, 1001, 29),
(5, 10, 1000, 39),
(6, 10, 1022, 4),
(7, 10, 1018, 9),
(8, 10, 1003, 65),
(9, 10, 1002, 9),
(10, 10, 1025, 17),
(11, 10, 1051, 3),
(12, 10, 1049, 3),
(13, 16, 1020, 2),
(14, 10, 1004, 1),
(15, 10, 1041, 1),
(16, 10, 1034, 1),
(17, 10, 1021, 1),
(18, 12, 1003, 28),
(19, 10, 1026, 5),
(20, 10, 1020, 11),
(21, 12, 1030, 1),
(22, 12, 1011, 3),
(23, 12, 1012, 4),
(24, 12, 1010, 3),
(25, 12, 1000, 11),
(26, 12, 1001, 2),
(27, 12, 1020, 1),
(28, 13, 1001, 3),
(29, 13, 1020, 3),
(30, 13, 1004, 1),
(31, 13, 1002, 1),
(32, 13, 1022, 2),
(33, 10, 1043, 1),
(34, 10, 1036, 1),
(35, 13, 1031, 2),
(36, 13, 1043, 2),
(37, 12, 1043, 2),
(38, 12, 1044, 1),
(39, 12, 1018, 4),
(40, 12, 1019, 3),
(41, 12, 1036, 3),
(42, 12, 1053, 2),
(43, 12, 1017, 2),
(44, 12, 1022, 2),
(45, 12, 1002, 1),
(46, 12, 1027, 1),
(47, 12, 1035, 1),
(48, 13, 1003, 1),
(49, 13, 1000, 1),
(50, 13, 1018, 1),
(51, 13, 1049, 3);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchitem_ID` int(11) NOT NULL,
  `buyer_ID` int(11) DEFAULT NULL,
  `item_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchitem_ID`, `buyer_ID`, `item_ID`) VALUES
(1, 7, 1000),
(2, 7, 1001),
(3, 8, 1002),
(4, 8, 1004),
(5, 8, 1003),
(7, 8, 1001),
(8, 9, 1003),
(9, 9, 1005),
(10, 9, 1020),
(11, 9, 1051),
(12, 9, 1009),
(13, 9, 1023),
(14, 9, 1026),
(16, 9, 1008),
(25, 9, 1000),
(26, 9, 1019),
(27, 9, 1018),
(28, 9, 1034),
(31, 11, 1000),
(34, 11, 1002),
(35, 11, 1003),
(36, 11, 1004),
(37, 12, 1008),
(38, 12, 1007),
(40, 12, 1036),
(41, 12, 1001),
(51, 12, 1003),
(54, 10, 1003),
(56, 10, 1051),
(58, 10, 1001),
(59, 10, 1043),
(66, 12, 1030),
(69, 13, 1022),
(70, 13, 1031),
(74, 12, 1053),
(75, 12, 1017),
(76, 12, 1000),
(77, 10, 1018),
(78, 12, 1002),
(79, 12, 1027),
(80, 12, 1035);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bid_ID`),
  ADD KEY `buyer_ID` (`buyer_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `seller_ID` (`seller_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `view_history`
--
ALTER TABLE `view_history`
  ADD PRIMARY KEY (`search_ID`),
  ADD KEY `buyer_ID` (`buyer_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchitem_ID`),
  ADD KEY `buyer_ID` (`buyer_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1054;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `view_history`
--
ALTER TABLE `view_history`
  MODIFY `search_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchitem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`buyer_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`seller_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`);

--
-- Constraints for table `view_history`
--
ALTER TABLE `view_history`
  ADD CONSTRAINT `view_history_ibfk_1` FOREIGN KEY (`buyer_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `view_history_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`buyer_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
