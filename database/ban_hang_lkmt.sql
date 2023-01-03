-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 02:11 PM
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
-- Database: `ban_hang_lkmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_user`
--

CREATE TABLE `comment_user` (
  `ID` int(255) NOT NULL,
  `ID_user` int(255) NOT NULL,
  `ID_product` int(255) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Rep_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Vui lòng chờ Admin trả lời bình luận',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa trả lời',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_user`
--

INSERT INTO `comment_user` (`ID`, `ID_user`, `ID_product`, `username`, `Comment`, `Rep_comment`, `status`, `datetime`) VALUES
(4, 1, 47, 'trangiabaoo', 'asdasdas', 'Vui lòng chờ Admin trả lời bình luận', 'Chưa trả lời', '2022-12-02 17:21:52'),
(5, 1, 47, 'trangiabaoo', 'cccccccaaaa', 'Vui lòng chờ Admin trả lời bình luận', 'Chưa trả lời', '2022-12-02 11:26:17'),
(6, 1, 47, 'trangiabaoo', 'asdasdasdccccc', 'Vui lòng chờ Admin trả lời bình luận', 'Chưa trả lời', '2022-12-02 11:26:24'),
(10, 0, 77, '', 'uuu', 'Vui lòng chờ Admin trả lời bình luận', 'Chưa trả lời', '2022-12-03 09:53:49'),
(11, 0, 77, '', 'ff', 'Vui lòng chờ Admin trả lời bình luận', 'Chưa trả lời', '2022-12-03 10:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_info`
--

CREATE TABLE `danhmuc_info` (
  `id` int(255) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc_info`
--

INSERT INTO `danhmuc_info` (`id`, `tendanhmuc`, `image_name`) VALUES
(1, 'Laptop', 'laptop.jpg'),
(2, 'Screen', 'manhinh1.jpg'),
(3, 'Keyboard', 'edra-ek389.png'),
(4, 'Mouse', 'logitech-g502-black.jpg'),
(5, 'Headphone - Speaker', 'HyperX-cloud.png');

-- --------------------------------------------------------

--
-- Table structure for table `image_desc`
--

CREATE TABLE `image_desc` (
  `ID` int(255) NOT NULL,
  `ID_product` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_desc`
--

INSERT INTO `image_desc` (`ID`, `ID_product`, `image`) VALUES
(1, 46, 'acer-nitro-eagle-2.png'),
(2, 46, 'acer-nitro-eagle-3.png'),
(3, 46, 'acer-nitro-eagle-4.png'),
(4, 148, 'acer-nitro-eagle-2.png'),
(5, 148, 'acer-nitro-eagle-3.png'),
(6, 148, 'acer-nitro-eagle-4.png'),
(7, 149, 'viewsonic-75hz.jpg'),
(8, 149, 'tufgaming-144.png'),
(9, 149, 'trueAir.jpg'),
(10, 47, 'aero 15 oled-2.png'),
(11, 47, 'aero 15 oled-3.png'),
(12, 47, 'aero 15 oled-4.png'),
(13, 49, 'acer-nitro-5-2.png'),
(14, 49, 'acer-nitro-5-3.png'),
(15, 49, 'acer-nitro-5-4.png'),
(16, 5, 'AOC-165hz.png'),
(17, 5, 'asus-rog-strix.jpg'),
(18, 5, 'asus-tuf-f15.png'),
(19, 1, 'AOC-165hz.png'),
(20, 1, 'asus-rog-strix.jpg'),
(21, 1, 'asus-tuf-f15.png'),
(22, 112, 'dareu-ek807-2.png'),
(23, 112, 'dareu-ek807-3.png'),
(24, 112, 'dareu-ek807-4.png'),
(25, 113, 'Dareu-ek1280-2.jpg'),
(26, 113, 'Dareu-ek1280-3.jpg'),
(27, 113, 'Dareu-ek1280-4.jpg'),
(28, 114, 'edra-ek312-2.png'),
(29, 114, 'edra-ek312-3.png'),
(30, 114, 'edra-ek312-4.png'),
(31, 115, 'edra-ek312-pink-2.png'),
(32, 115, 'edra-ek312-pink-3.png'),
(33, 116, 'edra-ek312-den-2.png'),
(34, 117, 'logitech-g102-black-2.jpg'),
(35, 117, 'logitech-g102-black-3.jpg'),
(36, 118, 'logitech-g102-white-2.jpg'),
(37, 118, 'logitech-g102-white-3.jpg'),
(38, 118, 'logitech-g102-white-4.jpg'),
(39, 120, 'logitech-g-pro-black-2.jpg'),
(40, 120, 'logitech-g-pro-black-3.jpg'),
(41, 120, 'logitech-g-pro-black-4.jpg'),
(42, 121, 'logitech-g-pro-pink-2.jpg'),
(43, 121, 'logitech-g-pro-pink-3.jpg'),
(44, 121, 'logitech-g-pro-pink-4.jpg'),
(45, 122, 'logitech-g-pro-lol-2.jpg'),
(46, 122, 'logitech-g-pro-lol-3.jpg'),
(47, 122, 'logitech-g-pro-lol-4.jpg'),
(48, 123, 'logitech-mx-2.jpg'),
(49, 123, 'logitech-mx-3.jpg'),
(50, 123, 'logitech-mx-4.jpg'),
(51, 124, 'logitech-mx-gray-2.jpg'),
(52, 124, 'logitech-mx-gray-3.jpg'),
(53, 124, 'logitech-mx-gray-4.jpg'),
(54, 126, 'logitech-g703-black-2.jpg'),
(55, 126, 'logitech-g703-black-3.jpg'),
(56, 126, 'logitech-g703-black-4.jpg'),
(57, 127, 'HyperX-cloud-2.png'),
(58, 127, 'HyperX-cloud-3.png'),
(59, 127, 'HyperX-cloud-4.png'),
(60, 128, 'HyperX-cloud-stinger-2.png'),
(61, 128, 'HyperX-cloud-stinger-3.png'),
(62, 128, 'HyperX-cloud-stinger-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(255) NOT NULL,
  `AdminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `AdminName`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(255) NOT NULL,
  `ID_order` int(255) NOT NULL,
  `ID_product` int(255) NOT NULL,
  `Soluong` int(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `NgayDat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `ID_order`, `ID_product`, `Soluong`, `Gia`, `NgayDat`) VALUES
(7, 4, 47, 1, 73140000, '2022-12-03 07:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `ID_order` int(255) NOT NULL,
  `ID_user` int(255) NOT NULL,
  `Hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Không chú thích',
  `Ngaydat` datetime NOT NULL DEFAULT current_timestamp(),
  `Tongtien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Thanhtoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`ID_order`, `ID_user`, `Hoten`, `SDT`, `DiaChi`, `GhiChu`, `Ngaydat`, `Tongtien`, `Thanhtoan`) VALUES
(4, 7, 'Hoàng Kiên', '0845202304', 'Khu phố 8, Thị trấn Hồ Xá', 'kkk', '2022-12-03 07:55:24', '73140000', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `ID` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `sold` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `old_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`ID`, `title`, `amount`, `sold`, `old_price`, `new_price`, `featured`, `description`, `image_name`, `category_id`) VALUES
(46, ' Acer Nitro 5 Eagle AN515 57', 115, '0', '22490000', '24990000', 'Có', '<p>Với sự kết hợp từ CPU Core i5 -11400H và GPU NVIDIA GeForce GTX 1650 4GB, Acer Nitro 5 Eagle AN515-57 sẽ cho chúng ta hiệu năng tốt để xử lý các công việc đồ họa đơn giản trên các phần mềm chuyên dụng, tốc độ xử lý thông tin cũng tương</p>', 'acer-nitro-eagle.png', 1),
(47, ' AERO 15 OLED YD ', 100, '1', '76990000', '73140000', 'Có', 'Laptop dành cho dân đồ họa\r\nLaptop Gigabyte AERO 15 OLED YD 73S1624GH là chiếc laptop cao cấp thuộc AERO Series từ Gigabyte. Là những sản phẩm sẽ mở ra những bước tiến đầu tiên của Gigabyte vào khả năng chinh phục người dùng laptop cần sự sáng tạo ', 'aero 15 oled.png', 1),
(49, ' Acer Nitro 5 AN515 45 ', 100, '0', '25990000', '22490000', 'Có', 'Diện mạo gaming mới\r\nNitro 5 2021 AN515 45 R3SM sở hữu thiết kế ấn tượng với hai màu đen-đỏ chủ đạo. Bề mặt được thiết kế hầm hố và góc cạnh hơn. Thể hiện phong cách hiếu chiến đặc trưng của dòng Nitro. Viền màn hình siêu mỏng 6.3mm ', 'acer-nitro-5.png', 1),
(51, ' ASUS TUF Gaming F15 ', 100, '0', '25990000', '21790000', 'Có', 'Laptop cao cấp vượt trội với CPU Intel Core i5-10300H và GPU GeForce GTX™ 1650Ti mạnh mẽ, các tựa game hành động sẽ chạy nhanh, mượt mà và khai thác tối đa màn hình IPS tần số quét 144Hz.\r\n', 'asus-tuf-f15.png', 1),
(53, ' Asus ROG Strix G15', 100, '0', '23990000', '20990000', 'Có', 'Một trong những dòng laptop gaming  ASUS ROG Strix G15 sở hữu phong cách thể thao thể hiện qua ba màu sắc khác biệt giúp nâng tầm diện mạo và phong cách của bạn.', 'asus-rog-strix.jpg', 1),
(57, ' Acer Aspire 3 A315 57G ', 100, '0', '14090000', '13000000', 'Không', 'Laptop Acer Aspire A315 57G 524Z được tạo nên với vẻ ngoài thanh lịch của một chiếc laptop sinh viên, văn phòng. Màu đen mạnh mẽ cùng đường nét giản đơn tạo nên thiết kế thường có trên dòng laptop Acer Aspire.', 'acer-aspire-A315.jpg', 1),
(58, ' Acer Aspire 5 A515 57 ', 100, '0', '18990000', '15990000', 'Không', 'Acer Aspire 5 A515 57 52Y2 là một trong những sản phẩm laptop văn phòng bán chạy có mặt tại Electro. Sản phẩm sở hữu ngoại hình sang trọng, cấu hình mạnh mẽ, xử lý đa nhiệm hiệu quả giúp bạn hoàn thành mọi công việc hằng ngày. ', 'acer-aspire-5.png', 1),
(60, 'Acer Aspire 3 A315 56 ', 100, '0', '11990000', '10490000', 'Không', 'Trang bị bộ vi xử lý Intel thế hệ thứ 10 Ice Lake mới nhất, ổ cứng SSD siêu tốc và màn hình Full HD tuyệt đẹp, Acer Aspire 3 A315 56 37DV là chiếc laptop đáp ứng tốt công việc và giải trí của bạn trong tầm giá hấp dẫn.\r\n\r\n', 'acer-aspire-3.png', 1),
(61, ' Acer Aspire 7 A715 75G', 100, '0', '20290000', '19490000', 'Không', 'Là laptop gaming giá rẻ tốt nhất phân khúc, Acer Aspire 7 A715 75G 58U4 được trang bị card đồ họa GTX 1650 4GB GDDR6, bộ vi xử lý Intel Core i5 thế hệ 10, tất cả tạo nên sức mạnh xử lý tuyệt vời với những tựa game Esport hot nhất hiện nay.', 'acer-aspire-7.png', 1),
(64, ' ASUS ZenBook UX425EA ', 100, '0', '21790000', '20490000', 'Không', 'Vỏ máy của chiếc ZenBook UX425 được làm từ hợp kim nhôm với logo ASUS nổi bật trên nắp máy cùng với thiết kế vòng đồng tâm đem lại cho máy vẻ bề ngoài tinh tế và hoàn thiện. Chiếc laptop mỏng nhẹ chỉ nặng 1.13kg và sở hữu bề dày chỉ chưa đến 14mm', 'asus-zenbook.jpeg', 1),
(66, ' MSI Modern 14 B10MW ', 100, '0', '12600000', '11490000', 'Không', 'Laptop MSI Modern 14 B10MW 427VN có CPU i3 thế hệ thứ 10 và SSD cực nhanh. Cung cấp khả năng tính toán tuyệt vời, thời gian khởi động ngay lập tức.', 'msi-modern-14.jpg', 1),
(77, ' AOC 24G2 24″ IPS 144Hz ', 100, '0', '4790000', '3000000', 'Có', 'Xé hình và rách hình sẽ làm ảnh hưởng đến hình ảnh, trải nghiệm gaming. Công nghệ AMD FreeSync Premium sẽ đồng bộ hóa tần số quét của màn hình với máy tính của bạn.', 'manhinh-AOC.jpg', 2),
(78, ' LG 24MP60G-B 24″ IPS 75Hz ', 100, '0', '4000000', '3140000', 'Có', 'Một màn hình với thiết kế nổi bật, chân đế nhỏ gọn và khả năng chơi game vượt trội nhờ tần số quét cao 75Hz đi kèm khả năng đồng bộ với AMD FreeSync chống xé hình đảm bảo mượt mà khi trải nghiệm gaming và sử dụng.', 'manhinh-LG.jpeg', 2),
(79, ' AOC 24G2E 24″ IPS 144Hz ', 100, '0', '13990000', '12886000', 'Có', 'Màn hình AOC 24G2E 24\" IPS 144Hz chuyên gaming là một trong những màn hình máy tính được trang bị tần số quét 144Hz và tốc độ phản hồi 1ms, màn hình 24G2 là tiêu chuẩn của E-Sport chuyên nghiệp. ', 'AOC-144hz.jpg', 2),
(80, ' AOC 24B1XH5 24″ IPS 75Hz', 100, '0', '3550000', '2490000', 'Không', 'Màn hình AOC 24B1XH5 24 inch IPS 75Hz FHD là một trong những dòng màn hình máy tính sở hữu thiết kế mỏng, tối giản nhưng sang trọng, không chỉ giúp không gian phát triển ý tưởng của bạn thêm tươi mới mà còn tiết kiệm đáng kể cho góc làm việc của bạn. ', 'product02.jpg', 2),
(81, ' Acer EK241Y 24″ IPS 75Hz', 100, '0', '3350000', '2490000', 'Có', 'Một trong những dòng màn hình máy tính với kích thước 24\" tấm nền IPS, tần số quét 75Hz kết hợp cùng thời gian phản hồi chỉ 4ms. Màn hình Acer EK241Y dễ dàng đáp ứng tốt cho mọi nhu cầu từ các tác vụ làm việc, học tập cho tới giải trí, gaming hay đồ họa.', 'acer-75hz.jpg', 2),
(82, 'HKC M24G1 Gaming 24″ 144Hz', 100, '0', '3990000', '2790000', 'Không', 'Màn hình cong HKC M24G1 24\" VA 144Hz là mẫu màn hình máy tính chơi game phân khúc trung cấp, với giá thành tốt phù hợp kinh tế. Nhưng vẫn đảm bảo tốt trải nghiệm chơi game mượt mà. ', 'HKC-144hz.jpg', 2),
(83, ' AOC C27G2X 27″ VA 165Hz ', 100, '0', '5290000', '4990000', 'Có', 'Màn hình máy tính cong mang đến trải nghiệm phong phú hơn, đặt bạn vào trung tâm của hành động. Bằng cách bắt chước độ cong của mắt, việc theo dõi chuyển động xung quanh màn hình cũng bớt căng thẳng hơn.', 'AOC-165hz.png', 2),
(84, ' Viewsonic VA2418-SH-2 24″ IPS 75Hz', 100, '0', '3800000', '2490000', 'Không', 'ViewSonic VA2418-SH-2 là màn hình máy tính có kích thước 24\", độ phân giải Full HD và sử dụng công nghệ tấm nền IPS cùng độ phủ màu lên tới 104% sRGB mang đến sự cân bằng hoàn hảo cho trải nghiệm game sống động ở mọi góc nhìn.', 'viewsonic-75hz.jpg', 2),
(86, ' LG 27GP850-B UltraGear 27″ 180Hz', 100, '0', '11190000', '10490000', 'Không', 'LG đã mang đến một phần cứng cao cấp trên mẫu màn hình này, chúng ta có những gì tốt nhất của một màn hình gaming với các thông số tuyệt vời. Màn hình máy tính sở hữu độ chuẩn màu cũng rất cao đạt DCI-P3 98% (CIE1976). ', 'LG-180hz.jpg', 2),
(107, ' DAREU EK87 - Black ', 100, '0', '599000', '499000', 'Không', 'Nếu như DareU EK87 phiên bản trước chỉ được trang bị LED 1 màu đỏ với độ sáng vừa phải, thì nay với phiên bản DAREU EK87 - Black (Multi-LED), người dùng đã sở hữu được chiếc bàn phím cơ với LED Rainbow nhiều màu chia theo vùng rất đẹp', 'dareu_EK87.png', 3),
(108, 'Rapoo V500L Rainbow', 100, '0', '1050000', '900000', 'Có', 'Bàn phím cơ giá rẻ Rapoo V500L mang một thiết kế full-size cần thiết, được trang bị đèn bàn phím riêng biệt giữa các phím, thiết kế không gây xung đột khi ấn và các phím tắt tiện lợi.', 'rapoo.png', 3),
(109, ' DareU EK810 Queen', 100, '0', '699000', '580000', 'Có', 'Xu hướng gear Hồng đang ngày càng được nhiều game thủ, đặc biệt là game thủ Nữ chú ý tới. Và Bàn phím cơ giá rẻ DareU EK810 Queen Pink chính là sản phẩm mới nhất, hoàn thiện bộ sưu tập gaming gear Hồng cho hãng.', 'dareu-ek810.png', 3),
(110, ' E-Dra EK389 V2', 100, '0', '690000', '590000', 'Có', 'Bàn phím E-DRA EK389 V2 được nâng cấp từ phiên bản cũ với hệ thống LED 7 màu rainbow siêu sáng mới. Thực sự, LED của EK389 V2 cực sáng, sáng hơn cả EK387 hay các phiên bản phím cơ đắt tiền hơn của hãng. Đây có lẽ là phần nâng cấp thực sự đáng giá.', 'edra-ek389V2.jpg', 3),
(111, ' Fuhlen G900L', 100, '0', '590000', '490000', 'Có', 'Fuhlen G900L với dãy đèn LED RGB. LED Rainbow 7 màu chính là lựa chọn khôn ngoan của hãng và cũng là xu thế của những chiếc bàn phím cơ giá rẻ hiện tại.', 'fulhen-g900l.jpg', 3),
(112, ' DareU EK807G Wireless', 100, '0', '699000', '640000', 'Không', 'DareU EK807G Wireless sử dụng 2 viên pin AAA cực kỳ thông dụng, dễ mua. Thời lượng sử dụng pin tối đa lên tới 6 tháng, đáp ứng công việc sử dụng phím lâu dài, bền bỉ và rất tiện lợi. Chỗ lắp pin đã có sẵn khe cất đầu USB Receiver.', 'dareu-ek807.png', 3),
(113, ' DAREU EK1280s', 100, '0', '790000', '650000', 'Không', 'Thiết kế bàn phím đẹp, chất lượng hoàn thiện tốt. DareU với truyền thống hàng tốt giá rẻ của mình lại một lần nữa khiến chúng ta bất ngờ bởi mẫu phím gaming giá rẻ của họ. EK1280 RGB thực sự là một bàn phím chất lượng với \"D\" switch độc quyền từ DareU.', 'Dareu-ek1280.jpg', 3),
(114, ' E-DRA EK312 White', 100, '0', '899000', '659000', 'Không', 'E-DRA EK312 White nằm trong phân khúc bàn phím cơ giá rẻ trang bị đầy đủ những tính năng mà người dùng cần. Nếu bạn đang tìm một chiếc bàn phím cơ phục vụ cho nhu cầu làm việc, học tập hay chơi game thì đừng bỏ qua sản phẩm nhà E-DRA này.', 'edra-ek312.png', 3),
(115, ' E-DRA EK312 Pink', 100, '0', '899000', '659000', 'Không', 'E-DRA EK312 Pink nằm trong phân khúc bàn phím cơ giá rẻ trang bị đầy đủ những tính năng mà người dùng cần. Nếu bạn đang tìm một chiếc bàn phím cơ phục vụ cho nhu cầu làm việc, học tập hay chơi game thì đừng bỏ qua sản phẩm nhà E-DRA này.', 'edra-ek312-pink.png', 3),
(116, ' E-DRA EK312', 100, '0', '899000', '659000', 'Không', 'Bàn phím E-DRA EK312 là dòng sản phẩm bàn phím cơ chủ đạo của nhà sản xuất. Sở hữu thiết kế đẹp mắt, hiện đại và trang trọng, E-DRA EK312 còn được trang bị bộ switch E-Dra mới nhất nhằm đem lại trải nghiệm gõ phím tốt nhất cho người dùng. ', 'edra-ek312-den.png', 3),
(117, 'Logitech G102 Lightsync RGB Black', 100, '0', '599000', '400000', 'Có', 'Dù có mức giá rất bình dân nhưng chuột Logitech G102 Lightsync RGB lại được trang bị led  RGB 16,8 triệu màu .Chọn một màu hay trộn 3 màu, hiệu ứng có sẵn hay tạo hiệu ứng của riêng bạn .', 'logitech-g102-black.jpg', 4),
(118, ' Logitech G102 Lightsync RGB White', 100, '0', '599000', '499000', 'Không', 'Dù có mức giá rất bình dân nhưng Chuột Logitech G102 Lightsync RGB lại được trang bị led  RGB 16,8 triệu màu .Chọn một màu hay trộn 3 màu, hiệu ứng có sẵn hay tạo hiệu ứng của riêng bạn . ', 'logitech-g102-white.jpg', 4),
(120, 'Logitech G Pro X Wireless Black', 100, '0', '3490000', '2990000', 'Có', 'Chuột Logitech G Pro X Superlight Wireless Black là một trong những dòng chuột máy tính nhẹ nhất từ trước tới nay của Logitech, Logitech G Pro X Superlight Wireless White là bước đột phá về kỹ thuật khi đạt được trọng lượng ít hơn 63 gram – nhẹ hơn gần 25', 'logitech-g-pro-black.jpg', 4),
(121, 'Logitech G Pro X Wireless Pink', 100, '0', '3490000', '3190000', 'Không', 'G Pro X Superlight Wireless Pink là một trong những dòng chuột Logitech sở hữu mắt cảm biến HERO 25K độc quyền của Logitech G đem lại độ chính xác, tốc độ và độ ổn định. Với độ chính xác cao và khả năng điều khiển cực tốt điều đó sẽ hỗ trợ và mang đến cho', 'logitech-g-pro-pink.jpg', 4),
(122, ' Logitech G Pro Wireless League Of Legends', 100, '0', '3190000', '2490000', 'Có', 'Logitech G Pro Wireless là một trong những dòng chuột máy tính chơi game sở hữu trọng lượng vô cùng nhẹ, điều này giúp cho người chơi có những pha xử lý nhanh chóng, chính xác chiếm ưu thế trong mọi tựa game.', 'logitech-g-pro-lol.jpg', 4),
(123, ' Logitech MX Master 3 for Mac', 100, '0', '2490000', '2290000', 'Không', 'Logitech MX Master 3 sở hữu thiết kế nhỏ gọn, sử dụng tốt trên mọi bề mặt, hỗ trợ tốt nền tảng MAC OS, trang bị nhiều công năng hiện đại MagSpeed cuộn 1000 vòng/ giây', 'logitech-mx.jpg', 4),
(124, 'Logitech MX Master 3 Wireless (Mid Grey)', 100, '0', '2490000', '2190000', 'Không', 'Chuột Logitech MX Master 3 Wireless mang đến trải nghiệm vô cùng mới cho người dùng đặc biệt là liên quan đến công việc văn phòng. Đây là dòng chuột không dây thuộc Master Series mới, được Logitech thiết kế cho các nhà sáng tạo và các lập trình viên.', 'logitech-mx-gray.jpg', 4),
(126, ' Logitech G703 HERO Wireless', 100, '0', '2290000', '1790000', 'Không', 'G703 là một trong những dòng sản phẩm chuột không dây Logitech mới nhất gia nhập cuộc chơi với cảm biến 16K HERO thế hệ mới. Cảm biến tiên tiến nhất của Logitech từ trước tới nay, với khả năng theo dõi 1:1, 400+ IPS và độ nhạy DPI tối đa 100-16,000 — cùng', 'logitech-g703-black.jpg', 4),
(127, ' HyperX Cloud Stinger Core Gaming', 100, '0', '890000', '799000', 'Có', 'HyperX Cloud Stinger Core là tai nghe máy tính hoàn hảo cho game thủ điều khiển trò chơi thích chất lượng âm thanh hay nhưng giá mềm. Tương thích với nhiều loại máy và có bộ điều khiển âm thanh ngay trên cáp. ', 'HyperX-cloud.png', 5),
(128, ' Kingston HyperX Cloud Stinger ', 100, '0', '1990000', '790000', 'Có', 'Từ đó đến nay, qua các đời nâng cấp, cải tiến và đổi mới, từ HyperX Cloud Gaming, Kingston liên tục cho ra các sản phẩm tai nghe máy tính thuộc dòng Cloud Gaming như: Cloud 2 - Cloud Core - Cloud Revolver - Cloud X với những mức giá rất đáng cân nhắc khi ', 'HyperX-cloud- stinger.png', 5),
(131, ' True Wireless Soundpeats Bluetooth', 100, '0', '1200000', '750000', 'Không', '', 'trueAir.jpg', 5),
(132, ' Apple AirPods Pro VN/A', 100, '0', '7990000', '5300000', 'Không', '', 'airpod-pro.jpg', 5),
(133, ' Logitech Z407 2.1', 100, '0', '2490000', '1790000', 'Không', '', 'logitech-z407.png', 5),
(134, 'Edifier 2.0 R12U', 100, '0', '522000', '450000', 'Không', '', 'edifier.jpg', 5),
(135, 'Rapoo A100', 100, '0', '550000', '390000', 'Không', '', 'rapoo-a100.png', 5),
(136, 'JBL Go 2', 100, '0', '849000', '590000', 'Không', '', 'jgl-go2.jpg', 5),
(137, 'AKKO 3068B Plus', 100, '0', '2899000', '2590000', 'Không', '', 'AKKO 3068B Plus.jpg', 3),
(138, 'logitech mechanical', 100, '0', '1599000', '1390000', 'Không', '', 'logitech-mechanical .jpg', 3),
(139, 'logitech G pro X', 100, '0', '3790000', '2690000', 'Không', '', 'logitech-G-pro-X.jpg', 3),
(140, 'logitech G213', 100, '0', '1099000', '990000', 'Không', '', 'logitech-g213.jpg', 3),
(141, 'dareu ek884', 100, '0', '890000', '690000', 'Không', '', 'dareu-ek884.jpg', 3),
(142, 'Razer DeathAdder V3 Pro Wireless', 100, '0', '3890000', '3590000', 'Không', '', 'razer-deathadderV3.jpg', 4),
(143, 'Corsair M65 RGB ULTRA Black', 100, '0', '1690000', '1590000', 'Không', '', 'corsair-M65-RGB.jpg', 4),
(144, 'DareU EM901X RGB Superlight Wireless Black', 100, '0', '799000', '720000', 'Không', '', 'dareu-em901x.jpg', 4),
(145, 'Asus TUF M4 Wireless Gaming', 100, '0', '1190000', '990000', 'Không', '', 'asus-tuf-m4.jpg', 4),
(146, 'HyperX PulseFire FPS Core Gaming', 100, '0', '790000', '690000', 'Không', '', 'hyperX-pulsefire.jpg', 4),
(147, 'Logitech G535 LIGHTSPEED Wireless Black', 100, '0', '3299000', '3290000', 'Không', '', 'logitech-G535.jpg', 5),
(148, 'Razer Kraken X for Console', 100, '0', '1400000', '749000', 'Không', '', 'razer-kraken.jpg', 5),
(149, 'SteelSeries Arctis 1 Wireless For Playstation', 100, '0', '2950000', '2690000', 'Không', 'asas', 'steelserirs-arctics.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `username`, `password`, `HoTen`, `Email`, `SDT`) VALUES
(1, 'trangiabaoo', '123456', 'Tran Gia Bao', 'trangiabaoo@gmail.com', '0123456789'),
(2, 'leminhngoc', '123123123', 'Le Minh Ngoc', 'leminhngoc@gmail.com', '065498713'),
(3, 'lehoainam', '4567893', 'Le Hoai Nam', 'lehoainam@gmail.com', '09876514651'),
(4, 'tranvanb', '111222333', 'Tran Van B', 'tranvanb@gmail.com', '0123123123'),
(5, 'nguyenvanthanh', '123456', 'Nguyen Van Thanh', 'nguyenvanthanh@gmail.com', '0456789123'),
(6, 'nguyennhunghia', '159789', 'Nguyen Nhu Nghia', 'nguyennhunghia@gmail.com', '0957465412'),
(7, 'HoangKi3n', '123456', 'Hoàng Kiên', 'dangkien2342003@gmail.com', '0845202304'),
(8, 'asdasdasd1111', '2342342432', 'DangHoangKien', 'leminhngoc@gmail.com', '2132131312');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_user`
--
ALTER TABLE `comment_user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`,`ID_product`);

--
-- Indexes for table `danhmuc_info`
--
ALTER TABLE `danhmuc_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_desc`
--
ALTER TABLE `image_desc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_product` (`ID_product`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_2` (`ID_product`),
  ADD KEY `fk_1` (`ID_order`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`ID_order`),
  ADD KEY `fk_3` (`ID_user`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_user`
--
ALTER TABLE `comment_user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image_desc`
--
ALTER TABLE `image_desc`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `ID_order` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`ID_order`) REFERENCES `order_user` (`ID_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`ID_product`) REFERENCES `product_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`ID_user`) REFERENCES `user_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `danhmuc_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
