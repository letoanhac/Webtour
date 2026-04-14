-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2026 lúc 01:37 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tour_booking3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `email`, `role`, `createDate`, `updateDate`) VALUES
(2, 'admin', '$2y$12$98sqrCRanFEBVtPM6PZmAeF3DCpY89nxBQzy5GLYK4LxJCUc7WpFi', 'admin@gmail.com', NULL, '2026-04-13', '2026-04-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `tourID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `bookingDate` date DEFAULT NULL,
  `numAdults` int(11) DEFAULT NULL,
  `numChildren` int(11) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  `specialRequests` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`bookingID`, `tourID`, `userID`, `bookingDate`, `numAdults`, `numChildren`, `totalPrice`, `paymentStatus`, `specialRequests`) VALUES
(120, 1, 62, '2026-04-14', 1, 0, 3900000, 'Đã thanh toán', 'no'),
(121, 1, 63, '2026-04-14', 1, 2, 6800000, 'Đã thanh toán', NULL),
(122, 10, 62, '2026-04-14', 4, 2, 11200000, 'Đã thanh toán', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `chatID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL,
  `messages` text DEFAULT NULL,
  `readStatus` tinyint(1) DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout`
--

CREATE TABLE `checkout` (
  `checkoutID` int(11) NOT NULL,
  `bookingID` int(11) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  `transactionID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `checkout`
--

INSERT INTO `checkout` (`checkoutID`, `bookingID`, `paymentMethod`, `paymentDate`, `paymentStatus`, `transactionID`) VALUES
(101, 120, 'Momo', '2026-04-14', 'Đã thanh toán', NULL),
(102, 121, 'Tiền mặt', '2026-04-14', 'Đã thanh toán', NULL),
(103, 122, 'Tiền mặt', '2026-04-14', 'Đã thanh toán', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `tourID` int(11) DEFAULT NULL,
  `actionType` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`historyID`, `bookingID`, `userID`, `tourID`, `actionType`, `timestamp`) VALUES
(74, 120, 62, 1, 'Đặt tour', '2026-04-14 07:02:45'),
(75, 121, 63, 1, 'Đặt tour', '2026-04-14 07:24:23'),
(76, 122, 62, 10, 'Đặt tour', '2026-04-14 10:13:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `tourID` int(11) DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploadDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`imageID`, `tourID`, `imageURL`, `description`, `uploadDate`) VALUES
(6, 1, 'https://ik.imagekit.io/tvlk/blog/2022/02/dia-diem-du-lich-viet-nam-cover.jpeg', 'BIỂN ĐẢO 3N2Đ CÔN ĐẢO', '2025-05-12'),
(7, 1, 'https://th.bing.com/th/id/OIP.daAX72VzH3zbU93CugZhLgHaEK?cb=iwc2&pid=ImgDet&w=474&h=266&rs=1', 'BIỂN ĐẢO 3N2Đ CÔN ĐẢO', '2025-05-12'),
(8, 1, 'https://cdn-media.sforum.vn/storage/app/media/anh-dep-18.jpg', 'BIỂN ĐẢO 3N2Đ CÔN ĐẢO', '2025-05-12'),
(9, 1, 'https://cdn-media.sforum.vn/storage/app/media/anh-dep-24.jpg', 'BIỂN ĐẢO 3N2Đ CÔN ĐẢO', '2025-05-12'),
(21, 1, 'https://ik.imagekit.io/tvlk/blog/2022/02/dia-diem-du-lich-viet-nam-cover.jpeg', 'BIỂN ĐẢO 3N2Đ CÔN ĐẢO', '2025-05-12'),
(30, 8, 'https://vietnamtouristvn.com/upload/elfinder/H%C3%8CNH%20TOUR%20WEB%202024/TOUR%20WEB%20%20%C4%90%C3%80%20L%E1%BA%A0T/%E1%BA%A3nh%20b%C3%ACa%20web_dalat_suoima.png', 'dl1', '2025-06-01'),
(31, 8, 'https://latour.vn/upload/product/tour-da-lat-5-ngay-4-dem.jpg', 'dl2', '2025-06-01'),
(33, 8, 'https://www.mientrungtourism.com/uploads/post/1668270943.jpg', 'dl3', '2025-06-01'),
(34, 8, 'https://vietnamtimes.org.vn/stores/news_dataimages/minhchauvnt/042021/16/14/5608_dalat.png?rt=20210416145611', 'dl4', '2025-06-01'),
(35, 10, 'https://tinviettravel.com/uploads/tours/images/mien_nam/du_lich_sai_gon/du-lich-sai-gon-1-ngay.jpg', 'sg1', '2025-06-01'),
(36, 10, 'https://hopon-hopoff.vn/wp-content/uploads/2024/06/3T8A8769.png', 'sg2', '2025-06-01'),
(37, 10, 'https://bizweb.dktcdn.net/100/414/214/products/landtour-sai-gon.jpg?v=1685935578077', 'sg3', '2025-06-01'),
(38, 10, 'https://ontripquest-prod.s3.ap-southeast-1.amazonaws.com/wgd4w5xku4qvoplhqxbhhu1cmbiq', 'sg4', '2025-06-01'),
(39, 14, 'https://vietnamdailytour.vn/wp-content/uploads/2022/08/tour-ha-noi.3.jpg', 'sp1', '2025-06-01'),
(40, 14, 'https://lh5.googleusercontent.com/proxy/TDj2iWbO3qQDuoRPPz_rA6vhs86GDiFYvsUz9TUEPuDctENqCxBYYlo2lfZJd-2Dv8lp0YyMZrIkL4xVM4TDFCAiwIccjbmLLyWVK92a9kQqe9HysUxkYlcZuXiQxqvdHMX5n7pCbPxCLgTPjg', 'sp2', '2025-06-01'),
(41, 14, 'https://www.sapatours.com.vn/images/tour/items/img1/sapa-tour-1-day-tour-ma-tra-ta-phin-village.jpeg', 'sp3', '2025-06-01'),
(42, 17, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTF4VpZBDqQdx3lRi4urNOBJ0avtV7qOO73ug&s', 'mc1', '2025-06-01'),
(43, 17, 'https://sinhcafetouronline.com/wp-content/uploads/2018/02/moc-chau.jpg', 'mc2', '2025-06-01'),
(44, 17, 'https://kavotravel.com/wp-content/uploads/2023/03/tou-du-lich-moc-chau.jpeg', 'mc3', '2025-06-01'),
(45, 17, 'https://anbinhtravel.com/uploaded/tour/Tay-Bac/Moc-Chau-2-ngay-1-dem/Moc_Chau_arena_Village_2.jpg', 'mc4', '2025-06-01'),
(46, 18, 'https://tinviettravel.com/uploads/tours/images/da_nang/tour-da-nang.jpg', 'dnha1', '2025-06-01'),
(48, 18, 'https://www.vietourist.com.vn/public/frontend/uploads/files/tour/hoi-an.jpg', 'dnha2', '2025-06-01'),
(49, 18, 'https://vanhoasaigon.com/wp-content/uploads/2018/03/hoian-danang-hue.jpg', 'dnha3', '2025-06-01'),
(50, 18, 'https://bizweb.dktcdn.net/100/342/038/files/tour-da-nang-hue-hoi-an-5-ngay-4-dem-12-1.jpg?v=1666016204473', 'dnha4', '2025-06-01'),
(51, 18, 'https://vietnamtouristvn.com/thumbs/670x500x1/upload/product/ve-may-bay-di-da-nang-gia-re-1-393-6607.jpg', 'dnha5', '2025-06-01'),
(52, 19, 'https://datviettour.com.vn/uploads/images/tin-tuc/Tin-mo-ta-danh-muc-tour/hue/Hue-1.jpg', 'cdh1', '2025-06-01'),
(53, 19, 'https://huesmiletravel.com.vn/wp-content/uploads/2024/05/Cac-tour-du-lich-hue-1-scaled.jpg', 'h2', '2025-06-01'),
(54, 19, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6gkJJfcJAcyzfXZt168XnG6adNGsFr6-YKw&s', 'h3', '2025-06-01'),
(55, 20, 'https://quangbinhtravel.vn/wp-content/uploads/2024/09/suoimooc.jpg', 'qb1', '2025-06-01'),
(56, 20, 'https://mientrungtourism.com/uploads/post/1729581428.jpg', 'qb2', '2025-06-01'),
(57, 20, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzO0OvLeeZ7-uGbgMuxtFxeZhcDLpIWAZTGw&s', 'qb3', '2025-06-01'),
(58, 20, 'https://bestbooking.vn/wp-content/uploads/2025/01/BestBooking-Travel-Tour-Quang-Binh-3-ngay-2-dem-15-1-scaled.jpeg', 'qb4', '2025-06-01'),
(59, 4, 'https://statics.vinpearl.com/tour-ha-noi-1_1683258940.jpg', 'hn1', '2025-06-01'),
(60, 4, 'https://danangopentour.vn/uploads/09-2019/tour-tham-quan-thu-do-ha-noi-chua-mot-cot-m-(1).jpg', 'hn2', '2025-06-01'),
(61, 4, 'https://songhongtourist.vn/upload/2022-11-30/-getpaidstock-5.jpg', 'hn3', '2025-06-01'),
(62, 4, 'https://danangopentour.vn/uploads/images/images/tour-tham-quan-thu-do-ha-noi-chua-tran-quoc.jpg', 'hn4', '2025-06-01'),
(63, 23, 'https://tinviettravel.com/uploads/tours/images/can_tho/tour-can-tho-2-ngay-1-dem.jpg', 'ct1', '2025-06-01'),
(64, 23, 'https://media.loveitopcdn.com/40838/thumb/upload/images/tour-du-lich-tu-tp-hcm-di-can-tho.jpg', 'ct2', '2025-06-01'),
(65, 23, 'https://dulichviet.com.vn/images/bandidau/tour-du-lich-can-tho-3-ngay-2-dem.png', 'ct3', '2025-06-01'),
(66, 23, 'https://tour.dulichvietnam.com.vn/uploads/tour/1553744598_tour-can-tho-1-ngay-3.jpg', 'ct4', '2025-06-01'),
(67, 24, 'https://www.luavietours.com/wp/wp-content/uploads/2024/11/bai-sao-phu-quoc-750x460.jpg', 'pq1', '2025-06-01'),
(68, 24, 'https://apollotourist.vn/wp-content/uploads/2022/04/phu-quoc-678.jpg', 'pq2', '2025-06-01'),
(69, 24, 'https://statics.vinpearl.com/lan-bien-phu-quoc-5_1628671248.jpg', 'pq3', '2025-06-01'),
(70, 24, 'https://greentour.vn/wp-content/uploads/2017/02/tour-phu-quoc.jpg', 'pq4', '2025-06-01'),
(71, 25, 'https://atoztravel.vn/uploads/product/kien_guang.jpg', 'jp1', '2025-06-01'),
(72, 25, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2BOtpBdzC26bcg4NIVKU2C0uodkRrM_6fhcdphYOjw8hCMnkhgWV_VGVZ1UgK_pYeIGM&usqp=CAU', 'jp2', '2025-06-01'),
(73, 25, 'https://puolotrip.com/images/pro/package-media-tour-binh-hung-1678.jpg', 'jp3', '2025-06-01'),
(74, 25, 'https://media.travel.com.vn/Destination/tf_241003054359_796594_HON%20SON%20(3).jpg', 'jp4', '2025-06-01'),
(75, 50, 'https://i.postimg.cc/85BWW1TT/CANH-DONG-DIEN-GIO-3.webp', 'dnha4', '2025-06-01'),
(76, 51, 'https://i.postimg.cc/85BWW1TT/CANH-DONG-DIEN-GIO-3.webp', 'dnha5', '2025-06-01'),
(77, 52, 'https://i.postimg.cc/BvCQBtP7/ho-guom-1.webp', 'dnha4', '2025-06-01'),
(78, 53, 'https://i.postimg.cc/BvCQBtP7/ho-guom-1.webp', 'dnha5', '2025-06-01'),
(79, 54, 'https://i.postimg.cc/SNzStgzM/tfd-2-11231-cho-dem-1.webp', 'dnha5', '2025-06-01'),
(80, 55, 'https://i.postimg.cc/SNzStgzM/tfd-2-11231-cho-dem-1.webp', 'dnha5', '2025-06-01'),
(81, 56, 'https://i.postimg.cc/15xXPxSH/tfd-240610042859-359649-Starlight-r2.jpg', 'dnha5', '2025-06-01'),
(82, 57, 'https://i.postimg.cc/15xXPxSH/tfd-240610042859-359649-Starlight-r2.jpg', 'dnha5', '2025-06-01'),
(83, 58, 'https://i.postimg.cc/02pQyt2q/tfd-241016015241-388517-SONG-BA-LAI.jpg', 'dnha5', '2025-06-01'),
(84, 59, 'https://i.postimg.cc/02pQyt2q/tfd-241016015241-388517-SONG-BA-LAI.jpg', 'dnha5', '2025-06-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `bookingID` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `dateIssued` date DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `bookingID`, `amount`, `dateIssued`, `details`) VALUES
(100, 120, 3900000, '2026-04-14', 'Đặt tour #120'),
(101, 121, 6800000, '2026-04-14', 'Đặt tour #121'),
(102, 122, 11200000, '2026-04-14', 'Đặt tour #122');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `itinerary`
--

CREATE TABLE `itinerary` (
  `itineraryID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `itineraryImageURL` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `itinerary`
--

INSERT INTO `itinerary` (`itineraryID`, `tourID`, `day`, `title`, `itineraryImageURL`, `description`, `information`) VALUES
(113, 1, '1', 'Đón khách - Khám phá Nam Đảo Côn Sơn', NULL, 'Xe và HDV đón quý khách tại bến cảng hoặc sân bay Côn Đảo, đưa đoàn về trung tâm thị trấn nhận phòng và nghỉ ngơi. Buổi chiều, đoàn bắt đầu hành trình khám phá Nam Đảo với các địa danh nổi tiếng như Chùa Núi Một (Vân Sơn Tự) ngắm toàn cảnh thị trấn, Miếu Bà Phi Yến linh thiêng. Cuối ngày, quý khách tự do đắm mình trong làn nước trong xanh của Bãi Nhát và ngắm hoàng hôn lãng mạn buông xuống trên Đỉnh Tình Yêu.', 'Chuẩn bị trang phục lịch sự khi viếng chùa, miếu'),
(114, 1, '2', 'Di tích lịch sử - Viếng nghĩa trang Hàng Dương', 'https://images.unsplash.com/photo-1509030450996-dd1a26dda07a?w=500', 'Buổi sáng, đoàn tham quan hệ thống di tích lịch sử Côn Đảo bao gồm: Dinh chúa Đảo, Trại Phú Hải, Chuồng cọp kiểu Pháp, Chuồng cọp kiểu Mỹ và Khu biệt lập Chuồng Bò. Lắng nghe những câu chuyện lịch sử bi tráng và sự kiên cường của các chiến sĩ cách mạng. Buổi tối, đoàn chuẩn bị đồ lễ viếng nghĩa trang Hàng Dương, dâng hương tại đài tưởng niệm và đặc biệt là viếng mộ nữ anh hùng lực lượng vũ trang nhân dân Võ Thị Sáu.', 'Đi lại nhẹ nhàng, trang phục kín đáo tuyệt đối'),
(115, 1, '3', 'Chợ Côn Đảo - Mua sắm đặc sản - Tiễn khách', NULL, 'Sau bữa sáng tại khách sạn, quý khách tự do tản bộ khám phá cuộc sống đời thường của người dân xứ đảo. Tham quan và mua sắm tại chợ Côn Đảo với vô vàn đặc sản địa phương như mứt hạt bàng bùi béo, các loại hải sản khô và đồ lưu niệm. Trưa, đoàn làm thủ tục trả phòng, xe đưa đoàn ra sân bay/bến cảng làm thủ tục trở về, kết thúc chuyến hành trình đầy cảm xúc và ý nghĩa.', 'Kiểm tra kỹ hành lý và giấy tờ tùy thân'),
(116, 4, '1', 'Chào Hà Nội - Dạo bước 36 Phố Phường', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'HDV đón quý khách tại sân bay Nội Bài, di chuyển về trung tâm Thủ đô nhận phòng khách sạn. Chiều, đoàn tham gia walking tour dạo quanh khu vực Hồ Hoàn Kiếm, thắp hương tại Đền Ngọc Sơn, chiêm ngưỡng Cầu Thê Húc đỏ chót và Tháp Rùa cổ kính. Tiếp tục ngồi xích lô dạo quanh 36 phố phường, cảm nhận nhịp sống hối hả nhưng vẫn vương nét cổ kính của người Tràng An. Tối tự do thưởng thức bún chả hoặc phở bò gia truyền.', 'Nên mang giày thể thao để đi bộ phố cổ'),
(117, 4, '2', 'Viếng Lăng Bác - Khám phá trầm tích ngàn năm', 'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?w=500', 'Buổi sáng, đoàn dâng hoa viếng Lăng Chủ Tịch Hồ Chí Minh, tham quan Phủ Chủ Tịch, Nhà sàn, Ao cá Bác Hồ và Chùa Một Cột với kiến trúc độc đáo hình đài sen. Chiều, đoàn di chuyển tới Văn Miếu Quốc Tử Giám - trường đại học đầu tiên của Việt Nam, chạm tay vào bia tiến sĩ để cầu may mắn trên con đường học vấn. Sau đó tham quan Hoàng Thành Thăng Long, di sản văn hóa thế giới với những câu chuyện triều đại xưa.', 'Trang phục trang nghiêm, không mặc quần ngắn'),
(118, 4, '3', 'Hồ Tây lộng gió - Tinh hoa gốm Bát Tràng', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Đoàn khởi hành đi dọc đường thanh niên thơ mộng giữa Hồ Tây và Hồ Trúc Bạch, viếng Chùa Trấn Quốc - ngôi chùa cổ nhất Hà Nội. Chiều, xe đưa đoàn qua cầu Chương Dương tới làng gốm cổ Bát Tràng. Quý khách được tìm hiểu quy trình vuốt, nặn, nung gốm truyền thống và tự tay làm một sản phẩm gốm mang về làm kỷ niệm. Buổi tối thưởng thức kem Tràng Tiền dạo phố đi bộ.', 'Tự do trải nghiệm làm gốm có tính phí nguyên liệu'),
(119, 4, '4', 'Chợ Đồng Xuân - Tạm biệt Thủ đô', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=500', 'Sáng ngày cuối cùng, đoàn tự do đi dạo, mua sắm các thức quà đặc sản Hà Nội tại Chợ Đồng Xuân như ô mai Hàng Đường, bánh cốm Hàng Than, trà sen Hồ Tây. Thưởng thức ly cà phê trứng trứ danh trong không gian hoài cổ. Đến giờ hẹn, xe đưa đoàn ra sân bay Nội Bài, làm thủ tục bay và chia tay đoàn.', 'Đóng gói cẩn thận các đặc sản dễ vỡ'),
(120, 8, '1', 'Đón khách - Check-in Quảng Trường Lâm Viên', 'https://images.unsplash.com/photo-1528127269322-539801943592?w=500', 'Chào mừng quý khách đến với Thành phố ngàn hoa. Sau khi hạ cánh tại sân bay Liên Khương, xe và HDV đưa đoàn về trung tâm thành phố. Điểm đến đầu tiên là Quảng trường Lâm Viên bên bờ Hồ Xuân Hương tĩnh lặng. Quý khách tha hồ check-in với hai biểu tượng nụ hoa Atiso và bông Dã Quỳ khổng lồ. Tối tự do dạo chợ đêm Âm Phủ, thưởng thức bánh tráng nướng và sữa đậu nành nóng hổi trong tiết trời se lạnh.', 'Nhiệt độ buổi tối khá lạnh, mang theo áo khoác'),
(121, 8, '2', 'Chinh phục Langbiang huyền thoại', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Bắt đầu ngày mới bằng chuyến tham quan Ga cổ Đà Lạt - nơi lưu giữ đầu máy hơi nước hiếm hoi. Tiếp tục đến Chùa Linh Phước (Chùa Ve Chai) với kiến trúc khảm sành sứ độc đáo bậc nhất. Chiều, đoàn lên xe Jeep chinh phục đỉnh núi Langbiang cao hơn 2000m, ngắm toàn cảnh suối Vàng suối Bạc mờ sương. Tối tham gia giao lưu văn hóa Cồng chiêng Tây Nguyên, uống rượu cần và ăn thịt nướng quanh bếp lửa hồng.', 'Vé xe Jeep lên núi đã bao gồm trong tour'),
(122, 8, '3', 'Thác Datanla - Thiền Viện Trúc Lâm thanh tịnh', 'https://images.unsplash.com/photo-1580977259045-8120371694d4?w=500', 'Sáng tham quan thác Datanla hùng vĩ, quý khách có thể trải nghiệm hệ thống máng trượt xuyên rừng thông cực kỳ thú vị (chi phí tự túc). Trưa, đoàn đến đồi Robin, đi hệ thống cáp treo băng qua rừng thông bạt ngàn để đến với Thiền Viện Trúc Lâm, ngắm nhìn Hồ Tuyền Lâm trong xanh phẳng lặng. Buổi chiều, tự do khám phá các quán cà phê view thung lũng cực chill ven sườn đồi.', 'Không gây ồn ào khi tham quan Thiền Viện'),
(123, 8, '4', 'Đồi chè Cầu Đất - Vườn dâu tây công nghệ cao', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Đoàn thức dậy sớm đón bình minh tuyệt đẹp trên đồi chè Cầu Đất Farm bao la xanh mướt, đắm chìm trong làn sương sớm và ánh nắng ban mai chan hòa. Sau đó, di chuyển đến vườn dâu tây công nghệ cao, tự tay hái và thưởng thức những trái dâu chín mọng ngọt ngào ngay tại vườn. Buổi chiều tham quan Vườn Hoa Thành Phố với hàng trăm loài kỳ hoa dị thảo đua sắc rực rỡ.', 'Trải nghiệm hái dâu trả tiền theo số lượng thực tế'),
(124, 8, '5', 'Mua sắm đặc sản - Chia tay Thành phố sương mù', 'https://images.unsplash.com/photo-1563810141381-807d9f78326e?w=500', 'Sau bữa điểm tâm sáng, đoàn tự do tham quan Chợ Đà Lạt hoặc ghé các cơ sở sản xuất mứt L’angfarm để mua sắm dâu tây sấy, các loại mứt trái cây, trà Atiso, cà phê chồn về làm quà cho gia đình và người thân. Xe tiễn quý khách ra sân bay Liên Khương, HDV hỗ trợ làm thủ tục và chào tạm biệt, hẹn gặp lại quý khách trong những hành trình tiếp theo.', 'Kiểm tra kỹ cân nặng hành lý trước khi ra sân bay'),
(125, 10, '1', 'Dinh Độc Lập - Kiến trúc Pháp giữa lòng Sài Gòn', 'https://images.unsplash.com/photo-1596390305517-501ba760ee0d?w=500', 'Đón khách tại điểm hẹn, bắt đầu hành trình khám phá đô thị sầm uất bậc nhất Nam Bộ. Điểm dừng chân đầu tiên là Dinh Độc Lập - di tích lịch sử vĩ đại đánh dấu ngày thống nhất đất nước. Tiếp tục dạo bộ chiêm ngưỡng Nhà thờ Đức Bà cổ kính, Bưu điện Trung tâm Thành phố với lối kiến trúc Pháp tuyệt mỹ. Chiều tham quan Bảo tàng Chứng tích Chiến tranh. Tối lên du thuyền sông Sài Gòn ăn tối và ngắm cảnh thành phố lung linh.', 'Nắng nóng, nên mang theo nón và kem chống nắng'),
(126, 10, '2', 'Khám phá Địa đạo Củ Chi bí ẩn', 'https://images.unsplash.com/photo-1509030450996-dd1a26dda07a?w=500', 'Đoàn khởi hành đi Củ Chi, vùng đất thép thành đồng. Quý khách sẽ có cơ hội chui xuống lòng đất, khám phá hệ thống địa đạo chằng chịt dài hàng trăm kilomet được đào hoàn toàn bằng sức người. Tự tay thử sức bắn súng đạn thật tại trường bắn thể thao (chi phí tự túc) và thưởng thức khoai mì luộc chấm muối mè - món ăn thời chiến. Buổi chiều về lại Sài Gòn nghỉ ngơi.', 'Mặc quần áo gọn gàng để dễ chui hầm địa đạo'),
(127, 10, '3', 'Chợ Bến Thành - Ngắm thành phố từ Landmark 81', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Sáng ngày cuối, đoàn tự do tản bộ mua sắm tại Chợ Bến Thành, tìm kiếm các món đồ thủ công mỹ nghệ, lụa tà áo dài hoặc nếm thử các món chè Nam Bộ. Điểm nhấn cuối cùng là đài quan sát trên tòa nhà Landmark 81 - biểu tượng đỉnh cao mới của thành phố, thu trọn vẹn sự phát triển thịnh vượng của Sài Gòn vào tầm mắt. Tiễn khách kết thúc chuyến đi.', 'Cẩn thận tư trang khi tham gia mua sắm ở nơi đông người'),
(128, 14, '1', 'Chào Sapa - Bản Cát Cát thơ mộng', 'https://images.unsplash.com/photo-1509030450996-dd1a26dda07a?w=500', 'Xe giường nằm cao cấp đưa đoàn vượt những cung đường ngoằn ngoèo lên thị trấn sương mù Sapa. Sau khi nhận phòng, đoàn đi bộ tham quan Bản Cát Cát của người H\'Mông. Quý khách có cơ hội tìm hiểu nghề dệt nhuộm chàm truyền thống, chiêm ngưỡng guồng nước khổng lồ và thác Thủy Điện cổ do người Pháp xây dựng. Chiều tối dạo quanh Hồ Sapa, thưởng thức đồ nướng và tắm lá thuốc của người Dao Đỏ để xua tan mệt mỏi.', 'Thuê trang phục dân tộc chụp ảnh rất đẹp'),
(129, 14, '2', 'Chinh phục nóc nhà Đông Dương Fansipan', 'https://images.unsplash.com/photo-1549488344-1f9b8d2bd1f3?w=500', 'Sau bữa sáng, xe đưa quý khách tới ga cáp treo Fansipan. Bắt đầu hành trình trên tuyến cáp treo 3 dây dài nhất thế giới, băng qua thung lũng Mường Hoa tuyệt đẹp. Lên tới đỉnh ở độ cao 3.143m, quý khách sẽ choáng ngợp trước biển mây bồng bềnh và khung cảnh đồi núi hùng vĩ. Chiều di chuyển thăm quan đèo Ô Quy Hồ - một trong tứ đại đỉnh đèo của Tây Bắc, ngắm hoàng hôn rực rỡ.', 'Mang theo áo khoác ấm vì trên đỉnh núi rất lạnh'),
(130, 14, '3', 'Núi Hàm Rồng - Chia tay Sapa', 'https://images.unsplash.com/photo-1528127269322-539801943592?w=500', 'Buổi sáng tự do leo núi Hàm Rồng, chiêm ngưỡng Vườn Lan khoe sắc, Vườn Đào, vượt qua Cổng Trời 1, Cổng Trời 2 để tới Sân Mây - nơi có thể ngắm toàn cảnh thị trấn Sapa chìm trong sương mờ từ trên cao. Sau đó, đoàn ghé chợ Sapa mua sắm các loại thảo dược, nấm hương rừng và thịt trâu gác bếp. Đầu giờ chiều, đoàn lên xe khởi hành về lại điểm đón ban đầu, kết thúc chuyến đi Tây Bắc.', 'Chú ý đi giày chống trơn trượt khi leo núi Hàm Rồng'),
(131, 17, '1', 'Đèo Thung Khe - Rừng thông bản Áng', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Đoàn khởi hành đi Mộc Châu, dọc đường dừng chân tại Đèo Thung Khe (Đèo Đá Trắng) bồng bềnh sương trắng như tuyết để chụp ảnh và thưởng thức bắp luộc, cơm lam. Chiều tới Mộc Châu, nhận phòng và tham quan Rừng thông bản Áng. Quý khách có thể đạp xe quanh hồ nước tĩnh lặng, hòa mình vào không gian được ví như Đà Lạt thu nhỏ của vùng Tây Bắc.', 'Đường đèo uốn lượn, ai say xe nên uống thuốc trước'),
(132, 17, '2', 'Đồi chè trái tim - Thác Dải Yếm', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Ngày thứ 2 đưa quý khách đến với Đồi chè trái tim Mộc Châu bạt ngàn xanh mướt, nơi cho ra đời những bức ảnh \"sống ảo\" đẹp tựa phim trường. Sau đó tham quan Thác Dải Yếm, chiêm ngưỡng thảm nước trắng xóa đổ từ trên cao xuống như dải lụa mềm mại của người thiếu nữ. Tối thưởng thức đặc sản Bê chao và lẩu cá hồi Mộc Châu trứ danh.', 'Thuê trang phục dân tộc Mông dạo đồi chè'),
(133, 17, '3', 'Thung lũng mận Nà Ka - Về Hà Nội', 'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?w=500', 'Sáng tham quan thung lũng mận Nà Ka - tùy theo mùa mà nơi đây khoác lên mình màu trắng tinh khôi của hoa mận hoặc màu đỏ au của những trái mận trĩu cành, quý khách được tự tay hái mận và ăn tại vườn. Sau bữa trưa, đoàn ghé các nông trường mua sữa bò tươi, bánh sữa, chè xanh về làm quà trước khi lên xe quay trở lại Hà Nội, kết thúc chuyến du xuân.', 'Nếu đi mùa hoa cải, cảnh quan sẽ còn rực rỡ hơn'),
(134, 18, '1', 'Danh thắng Ngũ Hành Sơn - Phố cổ Hội An', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'Đón khách tại sân bay Đà Nẵng, xe khởi hành đi viếng thăm danh thắng Ngũ Hành Sơn với các hang động huyền bí và làng đá mỹ nghệ Non Nước. Chiều muộn di chuyển về Phố cổ Hội An - di sản văn hóa thế giới. Quý khách bách bộ ngoạn cảnh Chùa Cầu Nhật Bản, Hội quán Phước Kiến, những ngôi nhà cổ nhuốm màu rêu phong. Tối ngắm đèn lồng lung linh và thả hoa đăng trên sông Hoài.', 'Nên thử cao lầu, mì Quảng, và nước mót tại Hội An'),
(135, 18, '2', 'Tiên cảnh Bà Nà Hills - Cầu Vàng', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Đoàn di chuyển tới khu du lịch Bà Nà Hills, ngồi tuyến cáp treo đạt nhiều kỷ lục thế giới bồng bềnh giữa biển mây. Quý khách dạo bước trên chiếc Cầu Vàng độc đáo được nâng đỡ bởi đôi bàn tay khổng lồ, tham quan Làng Pháp cổ kính, hầm rượu Debay và vui chơi thỏa thích tại Fantasy Park - khu vui chơi giải trí trong nhà lớn nhất Việt Nam. Trưa ăn buffet ẩm thực quốc tế trên đỉnh núi.', 'Nhiệt độ Bà Nà buổi trưa mát mẻ, chiều có thể lạnh'),
(136, 18, '3', 'Bán đảo Sơn Trà - Chợ Hàn - Tiễn khách', 'https://images.unsplash.com/photo-1580977259045-8120371694d4?w=500', 'Sáng xe đưa đoàn vòng quanh Bán đảo Sơn Trà (khỉ ngoạn Sơn Trà), viếng Chùa Linh Ứng nơi có tượng Phật Bà Quan Âm cao 67m hướng ra biển lớn cầu bình an. Thưởng ngoạn toàn cảnh bãi biển Mỹ Khê từ trên cao. Trưa ghé Chợ Hàn mua sắm đặc sản miền Trung như chả bò, mực rim me, bánh khô mè. Xe đưa đoàn ra sân bay Đà Nẵng, chia tay mảnh đất miền Trung đầy nắng gió.', 'Mua hải sản đóng thùng xốp cẩn thận để ký gửi'),
(137, 19, '1', 'Đại Nội Huế - Chùa Thiên Mụ', 'https://images.unsplash.com/photo-1580977259045-8120371694d4?w=500', 'Đến Huế, xe đưa đoàn về khách sạn cất hành lý. Bắt đầu tham quan Đại Nội Huế - Hoàng Cung của 13 vị vua triều Nguyễn với Ngọ Môn, Điện Thái Hòa, Tử Cấm Thành, Thế Miếu, Cửu Đỉnh. Quý khách sẽ đắm chìm trong không gian vàng son một thuở. Tiếp tục viếng thăm Chùa Thiên Mụ cổ kính bên bờ sông Hương lộng gió. Tối tự do dạo phố, ngắm cầu Trường Tiền đổi màu.', 'Nên mang áo dài để chụp ảnh tại Đại Nội'),
(138, 19, '2', 'Lăng Khải Định - Lăng Tự Đức - Ca Huế sông Hương', 'https://images.unsplash.com/photo-1528127269322-539801943592?w=500', 'Sáng tham quan Lăng Tự Đức, một bức tranh phong thủy hữu tình, mang đậm nét thơ mộng của vị vua thi sĩ. Kế tiếp là Lăng Khải Định với kiến trúc giao thoa Đông Tây tuyệt đẹp và những bức bích họa khảm sành sứ tinh xảo. Tối đến, quý khách lên thuyền rồng trôi lững lờ trên sông Hương, nghe nhã nhạc cung đình Huế, thả hoa đăng cầu may mắn, một trải nghiệm cực kỳ lắng đọng.', 'Vé nghe ca Huế trên sông đã bao gồm trong tour'),
(139, 19, '3', 'Chợ Đông Ba - Mua mè xửng - Tạm biệt cố đô', 'https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?w=500', 'Sáng ngày cuối, đoàn trải nghiệm nhịp sống của người dân xứ Huế tại Chợ Đông Ba nức tiếng. Tự do nếm thử các loại bánh Huế (bánh bèo, nậm, lọc), bún bò Huế gốc và mua sắm các đặc sản như mè xửng, mắm tôm chua, nón lá bài thơ, trà cung đình. Sau bữa trưa, đoàn di chuyển ra sân bay Phú Bài hoặc ga tàu để trở về, kết thúc chuyến đi mang đậm dấu ấn lịch sử văn hóa.', 'Trả giá hợp lý khi mua sắm tại chợ'),
(140, 20, '1', 'Động Phong Nha - Chinh phục đệ nhất kỳ quan', 'https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?w=500', 'Đón quý khách tại Đồng Hới, khởi hành đi Vườn Quốc gia Phong Nha - Kẻ Bàng. Đoàn lên thuyền ngược dòng sông Son thơ mộng rẽ nước vào Động Phong Nha. Chiêm ngưỡng hệ thống thạch nhũ tráng lệ, sông ngầm dài nhất và bãi cát trong hang tuyệt đẹp. Tiếp tục bách bộ khám phá Động Tiên Sơn lấp lánh như cung điện nguy nga. Tối nghỉ ngơi tại trung tâm Đồng Hới, dạo biển Nhật Lệ.', 'Chuẩn bị đồ nhẹ nhàng, áo phao sẽ được cấp khi đi thuyền'),
(141, 20, '2', 'Động Thiên Đường - Vui chơi Suối Nước Moọc', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Hành trình tiếp tục đi sâu vào vùng lõi di sản để khám phá Động Thiên Đường - hang động khô dài nhất Châu Á với cấu trúc thạch nhũ kỳ vĩ ngoài sức tưởng tượng. Buổi chiều, đoàn đến với Khu du lịch sinh thái Suối Nước Moọc, hòa mình vào dòng suối màu xanh ngọc bích mát lạnh, tham gia các hoạt động chèo thuyền kayak, nhảy cầu treo và thưởng thức mẹt gà nướng đặc sắc.', 'Bắt buộc mang theo đồ bơi và khăn tắm'),
(142, 20, '3', 'Đồi cát Quang Phú - Tiễn đoàn', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Đón bình minh tại cồn cát Quang Phú, trải nghiệm trượt cát thú vị trên những triền cát trắng mịn trải dài ngút ngàn. Xe đưa quý khách đi mua sắm đặc sản Quảng Bình như khoai gieo, mực khô, hải sản tươi. Đoàn thưởng thức bữa trưa chia tay, sau đó di chuyển ra ga tàu hoặc sân bay Đồng Hới, HDV vẫy tay chào tạm biệt và hẹn gặp lại quý khách.', 'Trượt cát nên đi vào sáng sớm để tránh cát nóng'),
(143, 58, '1', 'Động Phong Nha - Chinh phục đệ nhất kỳ quan', 'https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?w=500', 'Đón quý khách tại Đồng Hới, khởi hành đi Vườn Quốc gia Phong Nha - Kẻ Bàng. Đoàn lên thuyền ngược dòng sông Son thơ mộng rẽ nước vào Động Phong Nha. Chiêm ngưỡng hệ thống thạch nhũ tráng lệ, sông ngầm dài nhất và bãi cát trong hang tuyệt đẹp. Tiếp tục bách bộ khám phá Động Tiên Sơn lấp lánh như cung điện nguy nga. Tối nghỉ ngơi tại trung tâm Đồng Hới, dạo biển Nhật Lệ.', 'Chuẩn bị đồ nhẹ nhàng, áo phao sẽ được cấp khi đi thuyền'),
(144, 58, '2', 'Động Thiên Đường - Vui chơi Suối Nước Moọc', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Hành trình tiếp tục đi sâu vào vùng lõi di sản để khám phá Động Thiên Đường - hang động khô dài nhất Châu Á với cấu trúc thạch nhũ kỳ vĩ ngoài sức tưởng tượng. Buổi chiều, đoàn đến với Khu du lịch sinh thái Suối Nước Moọc, hòa mình vào dòng suối màu xanh ngọc bích mát lạnh, tham gia các hoạt động chèo thuyền kayak, nhảy cầu treo và thưởng thức mẹt gà nướng đặc sắc.', 'Bắt buộc mang theo đồ bơi và khăn tắm'),
(145, 58, '3', 'Đồi cát Quang Phú - Tiễn đoàn', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Đón bình minh tại cồn cát Quang Phú, trải nghiệm trượt cát thú vị trên những triền cát trắng mịn trải dài ngút ngàn. Xe đưa quý khách đi mua sắm đặc sản Quảng Bình như khoai gieo, mực khô, hải sản tươi. Đoàn thưởng thức bữa trưa chia tay, sau đó di chuyển ra ga tàu hoặc sân bay Đồng Hới, HDV vẫy tay chào tạm biệt và hẹn gặp lại quý khách.', 'Trượt cát nên đi vào sáng sớm để tránh cát nóng'),
(146, 23, '1', 'Đón khách - Đêm Tây Đô Bến Ninh Kiều', 'https://images.unsplash.com/photo-1596401057633-531035736d4b?w=500', 'Đón quý khách tại sân bay Cần Thơ, di chuyển về nhận phòng khách sạn tại trung tâm xứ Tây Đô. Chiều tham quan Nhà cổ Bình Thủy, ngôi nhà hơn 100 năm tuổi với kiến trúc giao thoa Việt - Pháp độc đáo, từng là bối cảnh của nhiều bộ phim nổi tiếng. Tối dạo bước tại Bến Ninh Kiều lộng gió, lên du thuyền nghe đờn ca tài tử râm ran và thưởng thức các món ngon đậm chất miền Tây sầm uất.', 'Trải nghiệm du thuyền ăn tối trên sông Hậu'),
(147, 23, '2', 'Chợ nổi Cái Răng - Khám phá miệt vườn', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', '5h00 sáng, đoàn ra bến thuyền khởi hành tham quan Chợ nổi Cái Răng, một trong những chợ trên sông lớn nhất Đồng Bằng Sông Cửu Long. Tận mắt chứng kiến cảnh buôn bán tấp nập trên ghe thuyền đỏ rực trái cây, ăn sáng hủ tiếu ngay trên ghe. Trưa ghé lò sản xuất hủ tiếu truyền thống, dạo quanh vườn trái cây miệt vườn trĩu quả, tự tay hái và nếm thử sầu riêng, chôm chôm, nhãn lồng.', 'Dậy sớm là yếu tố bắt buộc để thấy chợ nổi nhộn nhịp nhất'),
(148, 23, '3', 'Thiền Viện Trúc Lâm Phương Nam - Chia tay Cần Thơ', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500', 'Buổi sáng yên bình, đoàn viếng thăm Thiền Viện Trúc Lâm Phương Nam - ngôi chùa mang đậm kiến trúc thời Lý Trần lớn nhất miền Tây Nam Bộ. Không gian tĩnh lặng giúp quý khách tìm lại sự an nhiên trong tâm hồn. Xe đưa đoàn dạo một vòng mua sắm các loại trái cây đặc sản, khô cá lóc, nem nướng cái Răng. Sau đó tiễn đoàn ra sân bay trở về nhà, kết thúc hành trình khám phá miệt vườn sông nước.', 'Cần ăn mặc lịch sự khi viếng Thiền Viện'),
(149, 59, '1', 'Đón khách - Đêm Tây Đô Bến Ninh Kiều', 'https://images.unsplash.com/photo-1596401057633-531035736d4b?w=500', 'Đón quý khách tại sân bay Cần Thơ, di chuyển về nhận phòng khách sạn tại trung tâm xứ Tây Đô. Chiều tham quan Nhà cổ Bình Thủy, ngôi nhà hơn 100 năm tuổi với kiến trúc giao thoa Việt - Pháp độc đáo, từng là bối cảnh của nhiều bộ phim nổi tiếng. Tối dạo bước tại Bến Ninh Kiều lộng gió, lên du thuyền nghe đờn ca tài tử râm ran và thưởng thức các món ngon đậm chất miền Tây sầm uất.', 'Trải nghiệm du thuyền ăn tối trên sông Hậu'),
(150, 59, '2', 'Chợ nổi Cái Răng - Khám phá miệt vườn', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', '5h00 sáng, đoàn ra bến thuyền khởi hành tham quan Chợ nổi Cái Răng, một trong những chợ trên sông lớn nhất Đồng Bằng Sông Cửu Long. Tận mắt chứng kiến cảnh buôn bán tấp nập trên ghe thuyền đỏ rực trái cây, ăn sáng hủ tiếu ngay trên ghe. Trưa ghé lò sản xuất hủ tiếu truyền thống, dạo quanh vườn trái cây miệt vườn trĩu quả, tự tay hái và nếm thử sầu riêng, chôm chôm, nhãn lồng.', 'Dậy sớm là yếu tố bắt buộc để thấy chợ nổi nhộn nhịp nhất'),
(151, 59, '3', 'Thiền Viện Trúc Lâm Phương Nam - Chia tay Cần Thơ', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500', 'Buổi sáng yên bình, đoàn viếng thăm Thiền Viện Trúc Lâm Phương Nam - ngôi chùa mang đậm kiến trúc thời Lý Trần lớn nhất miền Tây Nam Bộ. Không gian tĩnh lặng giúp quý khách tìm lại sự an nhiên trong tâm hồn. Xe đưa đoàn dạo một vòng mua sắm các loại trái cây đặc sản, khô cá lóc, nem nướng cái Răng. Sau đó tiễn đoàn ra sân bay trở về nhà, kết thúc hành trình khám phá miệt vườn sông nước.', 'Cần ăn mặc lịch sự khi viếng Thiền Viện'),
(152, 24, '1', 'Khám phá Đông Đảo - Làng chài Hàm Ninh', 'https://images.unsplash.com/photo-1589394815804-964ed9be2eb3?w=500', 'Máy bay hạ cánh xuống Đảo Ngọc Phú Quốc, xe đưa đoàn về trung tâm Dương Đông. Chiều bắt đầu hành trình khám phá phía Đông đảo: Tham quan Vườn tiêu suối đá với những nọc tiêu thẳng tắp xanh mượt; Cơ sở ủ rượu sim rừng nguyên chất và Nhà thùng sản xuất nước mắm cá cơm truyền thống. Tối ghé thăm Làng chài cổ Hàm Ninh, thưởng thức món ghẹ luộc tươi rói ngọt lịm. Tự do dạo Chợ đêm Phú Quốc.', 'Hải sản ở Hàm Ninh tươi ngon và giá cả rất hợp lý'),
(153, 24, '2', 'Cáp treo Hòn Thơm - Bãi Sao vẫy gọi', 'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?w=500', 'Xe xuôi về phía Nam Đảo, đoàn trải nghiệm tuyến cáp treo vượt biển dài nhất thế giới ngắm toàn cảnh quần đảo An Thới. Đến Hòn Thơm, quý khách tự do vui chơi tại Công viên nước Aquatopia với vô vàn trò chơi cảm giác mạnh. Chiều quay về tắm biển Bãi Sao - bãi biển cát trắng mịn như kem và nước trong vắt bậc nhất Việt Nam. Ngả lưng trên võng đu đưa dưới rặng dừa xanh rờn.', 'Chuẩn bị kem chống nắng và nhiều bộ đồ bơi'),
(154, 24, '3', 'Dinh Cậu - Chia tay Đảo Ngọc', 'https://images.unsplash.com/photo-1563810141381-807d9f78326e?w=500', 'Sáng tham quan Dinh Cậu, Dinh Bà, biểu tượng tín ngưỡng của người dân biển đảo, nơi cầu mong mưa thuận gió hòa. Đoàn ghé cơ sở nuôi cấy ngọc trai cao cấp tìm hiểu quy trình bóc tách ngọc từ trai biển và tự do mua sắm trang sức tuyệt đẹp. Sau đó xe đưa quý khách ra sân bay Phú Quốc, mang theo những kỷ niệm rực rỡ nắng vàng và biển xanh của hòn đảo thiên đường về đất liền.', 'Cẩn thận hàng giả khi mua ngọc trai ngoài chợ'),
(155, 25, '1', 'Rạch Giá - Viếng Đền Nguyễn Trung Trực', 'https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?w=500', 'Đến Rạch Giá, quý khách nhận phòng và đi dạo quanh thành phố biển. Viếng thăm đền thờ anh hùng dân tộc Nguyễn Trung Trực, người đã đốt cháy tàu Hy Vọng của Pháp, dâng hương tưởng niệm và nghe kể về khí tiết của ông. Chiều dạo quanh khu lấn biển Rạch Giá, ngắm hoàng hôn lộng gió cực kỳ lãng mạn và thưởng thức các món ăn đường phố đậm chất miền Tây Nam Bộ.', 'Buổi tối Rạch Giá rất nhộn nhịp tại khu lấn biển'),
(156, 25, '2', 'Hà Tiên thập cảnh - Hòn Phụ Tử', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=500', 'Đoàn di chuyển về Hà Tiên ngoạn cảnh ngoạn mục. Dừng chân tại khu du lịch Hòn Phụ Tử - biểu tượng của vẻ đẹp Kiên Giang, tham quan Chùa Hang nằm sâu trong vách núi đá vôi sát mép biển kỳ bí. Chiều viếng Lăng Mạc Cửu, người có công khai trấn đất Hà Tiên xưa, ngắm nhìn bãi biển Mũi Nai yên bình. Tối tự do khám phá chợ đêm Hà Tiên, thưởng thức bún kèn, bún nhâm lạ miệng.', 'Mang giày đế thấp do phải leo bộ vào hang động'),
(157, 25, '3', 'Khám phá Quần đảo Hải Tặc', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Đoàn lên tàu cao tốc khởi hành ra Quần đảo Hải Tặc hoang sơ. Quý khách tự do ngâm mình dưới làn nước biển trong vắt, lặn ngắm san hô hoặc theo chân ngư dân trải nghiệm bắt nhum, câu cá, lặn bắt ốc cờ. Buổi trưa thưởng thức hải sản tươi sống dã ngoại bên bờ biển rợp bóng cây. Chiều tàu đưa đoàn về lại đất liền, lên xe khởi hành về điểm xuất phát ban đầu.', 'Đảo còn hoang sơ nên chưa có nhiều dịch vụ cao cấp'),
(158, 50, '1', 'Chào Đảo Ngọc - Hoàng hôn Dinh Cậu', 'https://images.unsplash.com/photo-1589394815804-964ed9be2eb3?w=500', 'Ngày đầu tiên hạ cánh tại Phú Quốc, xe đưa quý khách về resort cất hành lý. Buổi chiều, HDV địa phương dẫn quý khách đi bộ dọc theo bãi biển thơ mộng hướng về Dinh Cậu. Tại đây, cả đoàn sẽ cùng nhau chiêm ngưỡng khung cảnh hoàng hôn rực đỏ buông xuống mặt biển bao la, một trong những khoảnh khắc đẹp nhất đảo ngọc. Tối tản bộ vào Chợ Đêm nếm thử hải sản nướng mỡ hành.', 'Tour chú trọng trải nghiệm tự do và tản bộ thư giãn'),
(159, 50, '2', 'Khám phá Grand World - Thành phố không ngủ', 'https://images.unsplash.com/photo-1579601614769-653139366606?w=500', 'Đoàn di chuyển lên phía Bắc Đảo, bước vào tổ hợp Grand World lộng lẫy kiến trúc châu Âu. Quý khách dạo bộ dọc dòng kênh Venice thơ mộng, xem biểu diễn xiếc đường phố và chụp hàng trăm bức hình sống ảo tuyệt đẹp. Buổi tối, mãn nhãn với show diễn thực cảnh Tinh Hoa Việt Nam hoành tráng và show nhạc nước rực rỡ Sắc màu Venice ngay tại hồ trung tâm.', 'Có rất nhiều góc chụp ảnh đẹp, hãy sạc đầy pin máy ảnh'),
(160, 50, '3', 'Lên tàu vượt sóng - Khám phá 4 đảo', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Một ngày trọn vẹn lênh đênh trên biển Nam Đảo. Cano siêu tốc đưa đoàn lướt sóng qua các hòn đảo hoang sơ tuyệt mỹ: Hòn Mây Rút Trong, Hòn Móng Tay, Hòn Gầm Ghì. Quý khách được trang bị áo phao, kính lặn để lặn ngắm những rạn san hô tự nhiên đa sắc màu và từng đàn cá bơi lội tung tăng. Thưởng thức bữa trưa với món cá nướng trui và canh chua hải sản ngay trên đảo nhỏ.', 'Cano chạy tốc độ cao, mặc áo phao đầy đủ khi di chuyển'),
(161, 50, '4', 'Bãi Sao cát trắng - Di tích nhà tù Phú Quốc', 'https://images.unsplash.com/photo-1540333032550-11232857ca15?w=500', 'Buổi sáng yên bình tắm biển Bãi Sao, hòa mình vào làn nước xanh ngọc và chụp ảnh cùng những chiếc xích đu trên cây dừa. Buổi chiều trầm lắng hơn khi đoàn đến tham quan Nhà tù Phú Quốc (Nhà lao cây dừa), chứng kiến các mô hình phục dựng lại cảnh giam giữ khốc liệt thời chiến. Tiếp đó, đoàn viếng Thiền viện Trúc Lâm Hộ Quốc với thế tựa lưng vào núi, hướng mặt ra biển khơi.', 'Tại khu di tích cần giữ trật tự và trang nghiêm'),
(162, 50, '5', 'Dạo chợ Dương Đông - Mua sắm đặc sản', 'https://images.unsplash.com/photo-1563810141381-807d9f78326e?w=500', 'Ngày cuối cùng dành cho việc thong thả tản bộ quanh thị trấn Dương Đông, khám phá khu chợ hải sản lớn nhất đảo. Quý khách tự do chọn mua tôm khô, mực một nắng, nước mắm cá cơm 40 độ đạm, hồ tiêu hạt và ngọc trai thiên nhiên. Sau bữa trưa nhẹ nhàng, xe đưa đoàn ra sân bay Phú Quốc, vẫy tay chào tạm biệt hòn đảo ngọc quyến rũ phía Nam Tổ Quốc.', 'Đóng thùng hải sản xốp kín nilon theo quy định hàng không'),
(163, 51, '1', 'Đón khách Đà Nẵng - Rực rỡ đêm Hội An', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'Xe đón đoàn tại Đà Nẵng, vòng qua Bán đảo Sơn Trà viếng Chùa Linh Ứng. Chiều di chuyển về Hội An ngoạn cảnh phố cổ với Chùa Cầu, nhà cổ Tân Ký. Tối đến, Hội An khoác lên mình tấm áo rực rỡ của hàng ngàn chiếc đèn lồng. Quý khách thả hoa đăng trên sông Hoài và ăn cao lầu ngon trứ danh.', 'Mang giày bệt để thoải mái đi bộ quanh phố cổ'),
(164, 51, '2', 'Bà Nà Hills - Cầu Vàng - Di chuyển đi Huế', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Lên cáp treo khám phá chốn bồng lai tiên cảnh Bà Nà Hills, dạo bước trên Cầu Vàng nổi tiếng toàn cầu. Vui chơi thả ga tại Fantasy Park và chụp hình tại Làng Pháp. Buổi chiều, xe đưa đoàn rời Đà Nẵng, xuyên qua hầm đường bộ Đèo Hải Vân hùng vĩ để đến với xứ Huế mộng mơ, nhận phòng nghỉ ngơi và ăn tối với các loại bánh bèo, nậm, lọc.', 'Bà Nà khá rộng, đi theo đoàn để tránh lạc nhau'),
(165, 51, '3', 'Thánh địa La Vang - Động Thiên Đường tuyệt mỹ', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Đoàn khởi hành đi Quảng Bình, dọc đường dừng chân viếng Thánh địa La Vang (Quảng Trị) linh thiêng. Đến Phong Nha, đoàn đi xe điện xuyên rừng tràm để khám phá Động Thiên Đường. Quý khách choáng ngợp trước những nhũ đá hoàng tráng, lấp lánh như kim cương trong hang động khô dài nhất Châu Á. Chiều tối quay trở lại Huế nghỉ ngơi.', 'Quãng đường di chuyển đi Quảng Bình khá dài'),
(166, 51, '4', 'Đại Nội Huế - Mua sắm đặc sản - Tiễn khách', 'https://images.unsplash.com/photo-1580977259045-8120371694d4?w=500', 'Sáng tham quan Hoàng cung triều Nguyễn với Ngọ Môn, Điện Thái Hòa, Tử Cấm Thành uy nghi trầm mặc. Xe đưa đoàn dạo quanh chợ Đông Ba mua sắm nón lá, áo dài lụa và mè xửng. Thưởng thức bữa trưa nhẹ nhàng, sau đó xe tiễn khách ra sân bay Phú Bài hoặc quay lại Đà Nẵng. Kết thúc hành trình dọc dải đất miền Trung.', 'Trả giá khi mua sắm đặc sản ở chợ Đông Ba'),
(167, 52, '1', 'Đón khách Phú Yên - Tháp Nghinh Phong', 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=500', 'Đón quý khách tại sân bay Tuy Hòa, di chuyển dọc cung đường biển tuyệt đẹp ngắm toàn cảnh Vũng Rô. Check-in tại Tháp Nghinh Phong - công trình biểu tượng độc đáo lấy cảm hứng từ truyền thuyết Lạc Long Quân - Âu Cơ với những khối đá lục giác xếp chồng ấn tượng. Tối tự do ăn hải sản nướng, mắt cá ngừ đại dương và dạo quanh quảng trường 1 tháng 4 lộng gió.', 'Thưởng thức món mắt cá ngừ đại dương trứ danh Tuy Hòa'),
(168, 52, '2', 'Gành Đá Đĩa - Chào Quy Nhơn sầm uất', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Buổi sáng tham quan kiệt tác thiên nhiên Gành Đá Đĩa với hàng vạn cột đá tổ ong xếp lớp ngay sát mép sóng. Rời Phú Yên, đoàn di chuyển về thành phố Quy Nhơn (Bình Định). Chiều tham quan Tháp Đôi - công trình kiến trúc Chăm Pa cổ đại nằm ngay trong lòng thành phố. Nhận phòng và dạo biển đêm Quy Nhơn tĩnh lặng.', 'Đường xuống Gành Đá Đĩa cẩn thận trơn trượt do sóng đánh'),
(169, 52, '3', 'Kỳ Co trong vắt - Eo Gió lộng gió - Di chuyển Hội An', 'https://images.unsplash.com/photo-1540333032550-11232857ca15?w=500', 'Lên cano siêu tốc ra đảo Kỳ Co - Maldives phiên bản Việt với màu nước xanh ngọc bích tuyệt đẹp, lặn ngắm san hô bãi Dứa. Tiếp tục tham quan Eo Gió - con đường bám theo sườn núi đá vươn ra biển tuyệt đẹp. Sau bữa trưa hải sản, đoàn lên xe bắt đầu chặng đường di chuyển ra Phố cổ Hội An, nhận phòng và nghỉ ngơi sau hành trình dài.', 'Bôi kem chống nắng và chuẩn bị nón rộng vành khi ra đảo'),
(170, 52, '4', 'Làng rau Trà Quế - Khám phá Đà Nẵng', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'Sáng trải nghiệm làm nông dân tại làng rau Trà Quế yên bình ở Hội An. Chiều xe đưa đoàn ra Đà Nẵng, viếng chùa Linh Ứng Bán đảo Sơn Trà và dạo quanh Tượng cá chép hóa rồng, Cầu Tình Yêu bên bờ sông Hàn. Tối tự do chiêm ngưỡng Cầu Rồng phun lửa, phun nước vô cùng rực rỡ và nhộn nhịp.', 'Cầu rồng thường phun lửa vào tối thứ 7 và chủ nhật'),
(171, 52, '5', 'Bà Nà Hills - Cầu Vàng - Tiễn sân bay', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Hành trình cuối cùng chinh phục đỉnh Núi Chúa - Bà Nà Hills. Quý khách dạo bước trên Cầu Vàng, chiêm ngưỡng Làng Pháp thu nhỏ mờ ảo trong sương. Vui chơi giải trí trước khi đi cáp treo xuống núi. Xe đưa quý khách ra sân bay Đà Nẵng, kết thúc chuyến phiêu lưu dọc bờ biển Nam Trung Bộ tuyệt đẹp.', 'Lịch trình di chuyển nhiều, phù hợp khách có sức khỏe tốt'),
(172, 53, '1', 'Chào Huế mộng mơ - Nghe ca trù sông Hương', 'https://images.unsplash.com/photo-1580977259045-8120371694d4?w=500', 'HDV đón khách tại Huế, nhận phòng khách sạn 4 sao đẳng cấp. Đoàn tham quan Đại Nội Huế, thả bộ qua lầu Ngũ Phụng, cửa Ngọ Môn tráng lệ. Chiều viếng chùa Thiên Mụ linh thiêng soi bóng xuống dòng sông Hương phẳng lặng. Buổi tối, quý khách lên thuyền rồng truyền thống, nhâm nhi tách trà và lắng nghe những làn điệu ca Huế dặt dìu, mang đậm âm hưởng cung đình xưa.', 'Tận hưởng trọn vẹn sự tĩnh lặng, sâu lắng của cố đô Huế'),
(173, 53, '2', 'Hành hương La Vang - Cung điện Động Thiên Đường', 'https://images.unsplash.com/photo-1589139263155-70984954499d?w=500', 'Sáng sớm, đoàn khởi hành đi Quảng Bình. Dừng chân tại Quảng Trị dâng hương Thánh Địa La Vang - Trung tâm hành hương Công giáo lớn nhất Việt Nam. Sau đó tiến sâu vào Vườn Quốc gia Phong Nha - Kẻ Bàng, chinh phục hơn 500 bậc thang để chiêm ngưỡng vẻ đẹp lộng lẫy, tráng lệ của Động Thiên Đường với những khối thạch nhũ muôn hình vạn trạng. Chiều muộn về lại Huế nghỉ ngơi.', 'Mặc trang phục lịch sự khi viếng Thánh địa La Vang'),
(174, 53, '3', 'Vượt đèo Hải Vân - Phố cổ Hội An', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'Tạm biệt xứ Huế, xe đưa đoàn men theo cung đường đèo Hải Vân đệ nhất hùng quan, ngắm cảnh vịnh Lăng Cô xanh biếc từ trên cao để tiến vào Đà Nẵng. Buổi chiều, tiếp tục hành trình đến phố cổ Hội An. Quý khách bách bộ ngoạn cảnh những ngôi nhà cổ sơn vàng, hội quán Phước Kiến rực rỡ và lãng mạn ngắm đèn lồng giăng kín phố bên dòng sông Hoài êm đềm.', 'Chụp ảnh tuyệt đẹp tại khúc cua Hải Vân Quan'),
(175, 53, '4', 'Bà Nà Hills - Trải nghiệm cáp treo kỷ lục', 'https://images.unsplash.com/photo-1533083508493-270559648937?w=500', 'Từ Hội An quay lại Đà Nẵng, đoàn khởi hành lên chốn bồng lai tiên cảnh Bà Nà Hills. Trải nghiệm tuyến cáp treo ấn tượng, check-in ngay trên chiếc Cầu Vàng trứ danh được nâng đỡ bởi bàn tay khổng lồ phủ rêu phong. Tự do vui chơi các trò chơi cảm giác mạnh tại khu Fantasy Park, dạo bước qua các tòa lâu đài phong cách Châu Âu cổ kính tại Làng Pháp. Ăn trưa buffet phong phú trên đỉnh núi.', 'Trẻ em đi cùng người lớn khi tham gia các trò chơi cảm giác mạnh'),
(176, 53, '5', 'Bán đảo Sơn Trà - Chợ Hàn - Tạm biệt Đà Nẵng', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Sáng ngày cuối, đoàn dạo quanh cung đường biển Mỹ Khê tuyệt đẹp vòng lên Bán đảo Sơn Trà, viếng chùa Linh Ứng và ngắm nhìn bức tượng Phật Bà Quan Âm cao sừng sững bảo hộ cho ngư dân miền biển. Sau đó ghé Chợ Hàn thỏa sức mua sắm các đặc sản như chả bò, mực rim me, bánh nậm làm quà. Xe đưa đoàn ra sân bay quốc tế Đà Nẵng kết thúc tour.', 'Đóng gói chả bò hút chân không kỹ càng nếu có bay xa'),
(177, 54, '1', 'Hà Nội - Làng Gốm Bát Tràng - Chùa Đồng Yên Tử', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Từ Hà Nội, đoàn di chuyển ra ngoại thành ghé thăm làng gốm cổ Bát Tràng. Quý khách tìm hiểu quy trình làm gốm thủ công tài hoa của nghệ nhân. Sau đó khởi hành đi Quảng Ninh, đến trung tâm Phật giáo thiền phái Trúc Lâm - núi Yên Tử. Đoàn đi cáp treo xuyên mây mù lên đỉnh núi thiêng, viếng Chùa Đồng linh thiêng đúc hoàn toàn bằng đồng nguyên khối nằm chót vót trên đỉnh núi. Tối nhận phòng tại Hạ Long.', 'Đường lên Yên Tử khá dốc, mặc đồ co giãn thoải mái'),
(178, 54, '2', 'Kỳ quan Vịnh Hạ Long - Làng Ngọc Trai Tùng Sâu', 'https://images.unsplash.com/photo-1579601614769-653139366606?w=500', 'Buổi sáng, quý khách lên du thuyền bắt đầu hành trình ngoạn cảnh Vịnh Hạ Long - di sản thiên nhiên thế giới. Tàu lướt qua hàng ngàn đảo đá vôi kỳ vĩ: Hòn Trống Mái, Đỉnh Hương. Đoàn ghé thăm hang Sửng Sốt với vô vàn nhũ đá lung linh. Đặc biệt ghé Làng Ngọc Trai Tùng Sâu, tìm hiểu quy trình nuôi cấy ngọc trai tinh xảo và trải nghiệm chèo thuyền Kayak len lỏi qua các vòm hang. Tối thưởng thức lẩu hải sản 9 tầng siêu khủng.', 'Mang theo kính râm và áo khoác mỏng khi đi tàu biển'),
(179, 54, '3', 'Tràng An non nước hữu tình - Tạm biệt', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Đoàn di chuyển về cố đô Ninh Bình. Quý khách lên thuyền nan trôi dọc dòng sông sào khê trong vắt, len lỏi qua các hang động xuyên thủy tại Khu du lịch sinh thái Tràng An hùng vĩ, nơi được mệnh danh là \"Vịnh Hạ Long trên cạn\". Chiêm ngưỡng đền Trần, đền Trình linh thiêng ẩn mình giữa mây núi. Buổi chiều xe đưa đoàn về lại điểm hẹn tại Hà Nội, khép lại hành trình tam giác vàng du lịch miền Bắc.', 'Đi thuyền gỗ nhỏ, tuyệt đối tuân thủ hướng dẫn mặc áo phao'),
(180, 55, '1', 'City Tour Hà Nội nghìn năm văn hiến', 'https://images.unsplash.com/photo-1555921015-5532091f6026?w=500', 'Đón quý khách tại sân bay Nội Bài đưa về nhận phòng khách sạn tại trung tâm phố cổ. Khởi hành tham quan Văn Miếu Quốc Tử Giám, Hoàng Thành Thăng Long và dạo bước quanh Hồ Gươm xanh biếc. Quý khách tự do ngắm nhìn phố phường hối hả từ góc ban công quán cà phê trứng truyền thống. Buổi tối thưởng thức các món ăn nức tiếng như phở cuốn Ngũ Xã, bún chả Hàng Mành.', 'Tự do dạo phố đi bộ Hàng Ngang, Hàng Đào vào dịp cuối tuần'),
(181, 55, '2', 'Lên du thuyền 5 sao Starlight Cruise Hạ Long', 'https://images.unsplash.com/photo-1579601614769-653139366606?w=500', 'Xe Limousine cao cấp đón đoàn di chuyển theo cao tốc mới đến bến cảng Tuần Châu. Quý khách làm thủ tục lên siêu du thuyền Starlight Cruise đẳng cấp 5 sao. Vừa thưởng thức bữa trưa hải sản hảo hạng, vừa ngắm nhìn hàng ngàn đảo đá vôi lướt qua cửa sổ. Chiều tham gia chèo thuyền Kayak hoặc đi đò nan thăm hang Luồn. Buổi tối trên boong tàu tham gia tiệc Sunset Party, câu mực đêm lãng mạn giữa vịnh khơi.', 'Dresscode tùy chọn, nên mang váy maxi chụp ảnh trên boong tàu'),
(182, 55, '3', 'Đón bình minh trên biển - Về lại Hà Nội', 'https://images.unsplash.com/photo-1509030450996-dd1a26dda07a?w=500', 'Bắt đầu ngày mới bằng bài tập Thái Cực Quyền (Tai Chi) trên sundeck khi sương sớm còn giăng mờ trên mặt vịnh. Đoàn di chuyển khám phá Hang Sửng Sốt - hang động lớn và đẹp bậc nhất Vịnh Hạ Long. Trở lại du thuyền thưởng thức bữa trưa nhẹ trong khi tàu nhổ neo từ từ quay về bến. Đầu giờ chiều cập cảng, xe đón quý khách đưa thẳng ra sân bay Nội Bài để bay về, khép lại chuyến nghỉ dưỡng sang trọng.', 'Mang theo giày thể thao nhẹ nhàng để leo bậc thang hang Sửng Sốt'),
(183, 56, '1', 'Hà Nội - Đất tổ thiền phái Yên Tử - Hạ Long', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Khởi hành từ sáng sớm, đoàn đi thẳng đến Quảng Ninh, ghé danh thắng Yên Tử. Bằng hệ thống cáp treo, quý khách băng qua ngàn vạn cây tùng cổ thụ để lên đến đỉnh núi viếng Chùa Đồng, ngắm nhìn biển mây bồng bềnh dưới chân và cầu mong sự bình an. Chiều di chuyển về Hạ Long, ăn tối với hải sản tươi ngon, dạo chơi chợ đêm Bãi Cháy hoặc ngắm Cầu Bãi Cháy lung linh ánh đèn.', 'Không bẻ cành, hái lộc tại khu di tích rừng quốc gia Yên Tử'),
(184, 56, '2', 'Vịnh Hạ Long - Bái Đính Ninh Bình', 'https://images.unsplash.com/photo-1579601614769-653139366606?w=500', 'Sáng xuống thuyền rẽ sóng ngoạn cảnh Vịnh Hạ Long, băng qua hòn Gà Chọi, hòn Đỉnh Hương tráng lệ. Khám phá vẻ đẹp huyền bí của Động Thiên Cung nguy nga. Rời Hạ Long, xe đưa đoàn di chuyển về cố đô Ninh Bình. Buổi chiều viếng thăm quần thể Chùa Bái Đính - ngôi chùa giữ nhiều kỷ lục nhất Việt Nam với hành lang La Hán dài miên man và tượng Phật bằng đồng dát vàng khổng lồ.', 'Đi bộ khá nhiều ở khu Bái Đính, có thể thuê xe điện (tự túc)'),
(185, 56, '3', 'Tràng An non nước - Tạm biệt miền Bắc', 'https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=500', 'Đoàn bến thuyền Tràng An, những chiếc thuyền nan nhỏ nhẹ nhàng rẽ nước đưa quý khách luồn lách qua hệ thống hang động kỳ bí đan xen giữa những dãy núi đá vôi trập trùng, tham quan phim trường King Kong cũ. Khung cảnh nên thơ trữ tình khiến lòng người say đắm. Thưởng thức đặc sản thịt dê cơm cháy Ninh Bình. Chiều xe đưa đoàn quay về sân bay Nội Bài, tạm biệt.', 'Chụp ảnh tuyệt đẹp tại các thủy đình giữa mặt hồ Tràng An'),
(186, 57, '1', 'Hạ Long vẫy gọi - Thăm hang Luồn', 'https://images.unsplash.com/photo-1579601614769-653139366606?w=500', 'Đoàn di chuyển từ điểm đón đến Vịnh Hạ Long tuyệt mỹ. Đầu giờ chiều, quý khách lên thuyền gỗ truyền thống bắt đầu hành trình du ngoạn trên mặt vịnh yên ả. Điểm nhấn là trải nghiệm chèo kayak tự do hoặc ngồi thuyền thúng do người dân địa phương chèo đưa qua hang Luồn, một vòm hang đá tự nhiên thông ra một hồ nước khép kín êm đềm, nơi cư ngụ của những chú khỉ vàng tinh nghịch. Tối tự do khám phá phố biển.', 'Nên mặc áo phao an toàn khi trải nghiệm chèo thuyền'),
(187, 57, '2', 'Chùa Ba Vàng đồ sộ - Thiêng liêng Yên Tử', 'https://images.unsplash.com/photo-1547900501-14051059f81f?w=500', 'Buổi sáng đoàn khởi hành đi Uông Bí viếng Chùa Ba Vàng, ngôi chùa có tòa chính điện trên núi lớn nhất Đông Dương với kiến trúc lộng lẫy uy nghiêm giữa đại ngàn. Buổi chiều tiếp tục hành hương về miền đất Phật Yên Tử. Quý khách đi cáp treo lên tháp Tổ, chùa Hoa Yên, sau đó thử thách bản thân leo những bậc đá gập ghềnh để chạm tay tới Chùa Đồng linh thiêng trên đỉnh non cao.', 'Mặc áo ấm mỏng vì trên núi cao không khí khá lạnh và nhiều mây'),
(188, 57, '3', 'Bảo tàng Quảng Ninh - Mua sắm chả mực', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500', 'Sáng tham quan cụm Bảo tàng - Thư viện Quảng Ninh, công trình kiến trúc độc đáo bọc kính đen tuyền như một viên than khổng lồ phản chiếu bầu trời Hạ Long. Bên trong là hệ thống trưng bày cực kỳ hoành tráng về văn hóa, thiên nhiên và ngành công nghiệp khai thác mỏ. Sau đó xe đưa đoàn qua Chợ Hạ Long I để mua sắm món đặc sản trứ danh là chả mực giã tay. Đầu giờ chiều xe đưa khách trở về điểm đón ban đầu.', 'Kiến trúc bảo tàng là một điểm check-in cực chất không thể bỏ qua');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `tourID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`reviewID`, `tourID`, `userID`, `rating`, `comment`, `timestamp`) VALUES
(8, 1, 62, 5, 'ok', '2026-04-14 07:03:52'),
(9, 1, 62, 5, '.', '2026-04-14 07:11:05'),
(10, 1, 62, 3, 'hi', '2026-04-14 07:11:13'),
(11, 1, 62, 5, 'lo', '2026-04-14 07:14:44'),
(12, 1, 62, 1, 'br', '2026-04-14 07:15:09'),
(13, 1, 62, 2, 'l', '2026-04-14 07:15:16'),
(14, 1, 63, 4, '1', '2026-04-14 07:24:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
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
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('v03moWpXceidxB9s88lNIociG5abiTkgtmcsL2de', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVlZpT3Zzem1YU1F2cXFGOXRiT3pvUlVVTVhVODB4TnF4UW5nTU1qViI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748871768);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `tourID` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `quantityleft` int(11) NOT NULL,
  `priceAdult` double DEFAULT NULL,
  `priceChild` double DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `domain` enum('b','t','n') DEFAULT NULL COMMENT '''b'' Miền bắc\r\n''n'' Miền Nam\r\n''t'' Miền trung',
  `availability` tinyint(1) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`tourID`, `title`, `tag`, `description`, `quantity`, `quantityleft`, `priceAdult`, `priceChild`, `destination`, `domain`, `availability`, `time`, `startDate`, `endDate`) VALUES
(1, 'Tour Côn Đảo', 'Nhóm 4 giảm  3 triệu', 'Chào mừng quý khách đến với hành trình tâm linh và nghỉ dưỡng trọn vẹn tại Côn Đảo - viên ngọc xanh giữa ngàn khơi. Chuyến đi sẽ đưa quý khách quay ngược thời gian, chạm vào những trang sử hào hùng của dân tộc khi tham quan hệ thống di tích nhà tù Côn Đảo, chuồng cọp, và đặc biệt là dâng hương tại nghĩa trang Hàng Dương, viếng mộ nữ anh hùng Võ Thị Sáu linh thiêng. Không chỉ có lịch sử, Côn Đảo còn làm say đắm lòng người bởi vẻ đẹp thiên nhiên hoang sơ, nguyên bản. Quý khách sẽ được đắm mình trong làn nước xanh ngắt của Bãi Nhát, ngắm hoàng hôn rực rỡ buông xuống Đỉnh Tình Yêu và thưởng thức hải sản tươi rói. Ưu đãi cực sốc: Nhóm 4 khách đăng ký cùng lúc sẽ được giảm ngay 3 triệu đồng!', 100, 98, 3900000, 1450000, 'Côn đảo', 'n', 1, '3 ngày 2 đêm', '2025-06-04', '2026-06-10'),
(4, 'Tour Hà Nội', 'Nhóm 4 giảm  3 triệu', 'Khám phá vẻ đẹp cổ kính và nhịp sống hào hoa của thủ đô Hà Nội ngàn năm văn hiến. Hành trình đưa quý khách dạo bước qua 36 phố phường rêu phong, nơi lưu giữ những giá trị văn hóa truyền thống và ẩm thực đường phố nức tiếng. Quý khách sẽ được lắng đọng cảm xúc khi dâng hoa viếng Lăng Bác, tham quan Phủ Chủ Tịch. Chuyến đi còn bao gồm trải nghiệm dạo quanh Hồ Gươm xanh biếc, chiêm ngưỡng Tháp Rùa và viếng thăm Văn Miếu Quốc Tử Giám. Đặc biệt, đoàn sẽ ghé làng gốm cổ Bát Tràng, nơi quý khách có thể tự tay vuốt nặn những tác phẩm gốm sứ độc đáo mang về làm kỷ niệm. Đăng ký ngay hôm nay với ưu đãi lớn: Nhóm 4 khách giảm ngay 3 triệu đồng!', 50, 50, 5000000, 1450000, 'Hà Nội', 'b', 0, '4 ngày 3 đêm', '2025-05-12', '2025-05-16'),
(8, 'Tour Đà Lạt 5N', 'Khám phá đà lạt', 'Chuyến đi 5 ngày 4 đêm trọn vẹn đưa quý khách khám phá mọi ngóc ngách của thành phố ngàn hoa Đà Lạt mộng mơ. Bỏ lại sau lưng những ồn ào phố thị, quý khách sẽ được hít thở bầu không khí se lạnh đặc trưng, dạo bước bên Hồ Xuân Hương tĩnh lặng và check-in tại Quảng trường Lâm Viên hoành tráng. Hành trình sẽ đưa đoàn lên những chuyến xe Jeep chinh phục đỉnh núi Langbiang huyền thoại, ngắm nhìn toàn cảnh thung lũng sương mù. Quý khách còn được hòa mình vào không gian xanh mướt của đồi chè Cầu Đất Farm lúc bình minh, tự tay thu hoạch dâu tây chín mọng ngay tại vườn. Đêm xuống, hãy sưởi ấm cơ thể bằng ly sữa đậu nành nóng hổi tại chợ đêm.', 20, 20, 1900000, 1800000, 'Đà Lạt', 'b', 1, '5 ngày 4 đêm', '2025-05-26', '2026-06-07'),
(10, 'Tour Sài Gòn 3N', 'Khám phá nam bơ', 'Trải nghiệm nhịp sống sôi động, phồn hoa bậc nhất nước tại trung tâm kinh tế Sài Gòn. Chuyến đi mang đến cái nhìn đa chiều về một thành phố giao thoa giữa quá khứ và hiện đại. Quý khách sẽ được chiêm ngưỡng kiến trúc Pháp cổ kính tuyệt mỹ tại Nhà thờ Đức Bà, Bưu điện Trung tâm và tìm hiểu di tích lịch sử vĩ đại Dinh Độc Lập. Hành trình tiếp tục đưa đoàn ra ngoại ô, chui sâu xuống lòng đất để khám phá hệ thống Địa đạo Củ Chi chằng chịt đầy bí ẩn của vùng đất thép thành đồng. Trở lại trung tâm, quý khách sẽ choáng ngợp trước sự phát triển vượt bậc khi ngắm nhìn toàn cảnh thành phố rực sáng ánh đèn từ đài quan sát của tòa nhà Landmark 81 cao nhất Việt Nam.', 20, 19, 1900000, 1800000, 'Sài gòn', 'n', 1, '3 ngày 2 đêm', '2025-05-26', '2026-06-05'),
(14, 'Tour Sapa 3N2Đ', 'Trải nghiệm văn hóa dân tộc vùng cao.', 'Bắt đầu hành trình chinh phục nóc nhà Đông Dương - đỉnh Fansipan huyền thoại hùng vĩ và đắm chìm trong vẻ đẹp thơ mộng của thị trấn sương mù Sapa. Quý khách sẽ được trải nghiệm tuyến cáp treo vượt thung lũng Mường Hoa tuyệt đẹp, ngắm nhìn biển mây bồng bềnh và những thửa ruộng bậc thang chín vàng uốn lượn quanh sườn đồi. Tour còn đưa bạn đi bộ sâu vào bản Cát Cát của người H\'Mông, chiêm ngưỡng guồng nước khổng lồ, thác Thủy Điện cổ và tìm hiểu nghề dệt nhuộm chàm truyền thống. Buổi tối tại Sapa là khoảng thời gian tuyệt vời để dạo quanh hồ nước tĩnh lặng, thưởng thức các món nướng đặc sản vùng cao như lợn cắp nách, thắng cố và trải nghiệm tắm lá thuốc của người Dao Đỏ.', 112, 112, 1800000, 900000, 'Sapa', 'b', 0, '3 ngày 2 đêm', '2025-07-05', '2025-07-08'),
(17, 'Tour Mộc Châu', 'Đồi chè xanh mướt và hoa cải trắng.', 'Rời xa khói bụi thành phố để tận hưởng trọn vẹn không khí trong lành, mát mẻ của cao nguyên Mộc Châu xinh đẹp. Hành trình đưa du khách đi qua những cung đường đèo uốn lượn, thả hồn vào những đồi chè trái tim bạt ngàn xanh mướt trải dài tít tắp đến tận chân trời. Quý khách sẽ được dạo quanh rừng thông bản Áng thơ mộng, nơi được ví như một Đà Lạt thu nhỏ giữa lòng Tây Bắc, và check-in tại thác Dải Yếm tung bọt trắng xóa hùng vĩ. Tùy theo mùa, Mộc Châu sẽ thiết đãi bạn bằng những thung lũng hoa cải trắng muốt, hoa dã quỳ rực rỡ hay vườn mận chín mọng. Đừng quên nếm thử ly sữa bò tươi nguyên chất và đặc sản bê chao trứ danh.', 30, 30, 1600000, 800000, 'Mộc Châu', 'b', 0, '3 ngày 2 đêm', '2025-07-15', '2025-07-17'),
(18, 'Tour Đà Nẵng - Hội An', 'Biển Mỹ Khê và phố cổ Hội An.', 'Hành trình di sản đầy màu sắc kết nối những điểm đến lộng lẫy nhất miền Trung. Quý khách sẽ được hòa mình vào làn nước trong xanh của bãi biển Mỹ Khê - một trong những bãi biển quyến rũ nhất hành tinh. Chinh phục chốn bồng lai tiên cảnh Bà Nà Hills bằng tuyến cáp treo kỷ lục, dạo bước trên chiếc Cầu Vàng nổi tiếng toàn cầu và chiêm ngưỡng kiến trúc Châu Âu lãng mạn tại Làng Pháp. Chiều buông, đoàn di chuyển về Phố cổ Hội An - di sản văn hóa thế giới. Trong không gian hoài cổ với những nếp nhà ngói rêu phong, quý khách sẽ bách bộ ngoạn cảnh Chùa Cầu, thưởng thức món cao lầu đậm vị và thả hoa đăng lấp lánh trên dòng sông Hoài êm đềm.', 45, 45, 2000000, 1000000, 'Đà Nẵng', 't', 0, '3 ngày 2 đêm', '2025-07-18', '2025-07-21'),
(19, 'Tour Huế mộng mơ', 'Khám phá cố đô và lăng tẩm.', 'Tìm về cội nguồn lịch sử và văn hóa dân tộc tại vùng đất cố đô Huế mộng mơ, tĩnh lặng. Quý khách sẽ bước qua cánh cổng Ngọ Môn tráng lệ để tiến vào Đại Nội uy nghi - nơi lưu giữ vàng son một thuở của 13 vị vua triều Nguyễn. Chuyến đi đưa bạn tham quan các khu lăng tẩm có kiến trúc phong thủy độc đáo bậc nhất như Lăng Tự Đức thơ mộng và Lăng Khải Định tinh xảo. Điểm nhấn lãng mạn của hành trình là trải nghiệm ngồi thuyền rồng trôi lững lờ trên dòng sông Hương trong bóng hoàng hôn, lắng nghe những làn điệu nhã nhạc cung đình sâu lắng và nếm thử phong vị ẩm thực tinh tế của người Huế với các loại bánh bèo, nậm, lọc.', 40, 40, 1900000, 950000, 'Huế', 't', 1, '3 ngày 2 đêm', '2025-07-23', '2025-07-25'),
(20, 'Tour Quảng Bình', 'Phong Nha - Kẻ Bàng tuyệt đẹp.', 'Khám phá vương quốc hang động kỳ vĩ ẩn mình trong vùng lõi Vườn Quốc gia Phong Nha - Kẻ Bàng, di sản thiên nhiên thế giới tại Quảng Bình. Quý khách sẽ được chiêm ngưỡng vẻ đẹp lộng lẫy, tráng lệ ngoài sức tưởng tượng của Động Thiên Đường - hang động khô dài nhất Châu Á với hệ thống thạch nhũ muôn hình vạn trạng lấp lánh như kim cương. Hành trình tiếp tục đưa đoàn xuôi thuyền theo dòng sông Son thơ mộng để tiến sâu vào Động Phong Nha với dòng sông ngầm kỳ bí. Sau những giờ phút thám hiểm, quý khách sẽ được giải nhiệt, vui chơi thỏa thích và chèo thuyền kayak tại dòng suối Nước Moọc mát lạnh, xanh ngọc bích nằm lọt thỏm giữa rừng nguyên sinh.', 38, 38, 1700000, 850000, 'Quảng Bình', 't', 1, '3 ngày 1 đêm', '2025-07-26', '2025-07-28'),
(23, 'Tour Cần Thơ', 'Chợ nổi và miệt vườn Tây Đô.', 'Trải nghiệm chân thực và sống động nhất về đời sống văn hóa rực rỡ của người dân miền Tây Nam Bộ tại xứ Tây Đô Cần Thơ. Quý khách phải thức dậy từ rất sớm để kịp đón bình minh nhộn nhịp trên chợ nổi Cái Răng, tận mắt nhìn cảnh hàng trăm ghe thuyền giao thương tấp nập và thưởng thức bát hủ tiếu nóng hổi ngay trên sông nước. Hành trình tiếp tục len lỏi qua các con rạch nhỏ để vào thăm những khu vườn trái cây miệt vườn trĩu quả, tự tay hái sầu riêng, chôm chôm tươi rói. Buổi tối, đoàn sẽ dạo bước tại Bến Ninh Kiều lộng gió, lên du thuyền ngoạn cảnh sông Hậu, ăn tối và nghe đờn ca tài tử dặt dìu đậm chất miền quê.', 40, 40, 1500000, 750000, 'Cần Thơ', 'n', 0, '3 ngày 2 đêm', '2025-08-08', '2025-08-10'),
(24, 'Tour Phú Quốc', 'Thiên đường biển đảo.', 'Kỳ nghỉ dưỡng tuyệt vời tại thiên đường biển đảo Phú Quốc, nơi giao hòa giữa biển xanh biếc, bãi cát trắng mịn và ánh nắng vàng rực rỡ. Hành trình đưa quý khách khám phá vẻ đẹp hoang sơ của Bãi Sao - một trong những bãi tắm đẹp nhất Việt Nam, nơi bạn có thể ngả lưng trên võng dưới rặng dừa xanh mát. Trải nghiệm tuyến cáp treo Hòn Thơm vượt biển dài nhất thế giới, ngắm toàn cảnh quần đảo An Thới từ trên cao. Không chỉ có biển, quý khách còn được tìm hiểu nhịp sống người dân địa phương khi ghé thăm Làng chài Hàm Ninh cổ kính, nếm thử hải sản tươi sống giá rẻ, tham quan các cơ sở nuôi cấy ngọc trai cao cấp và nhà thùng nước mắm truyền thống.', 35, 35, 2500000, 1250000, 'Phú Quốc', 'n', 0, '3 ngày 2 đêm', '2025-05-31', '2025-06-14'),
(25, 'Tour Kiên Giang', 'Sông Nước mênh mông', 'Hành trình đặc sắc khám phá vùng đất cực Tây Nam của Tổ quốc với những cảnh quan thiên nhiên hoang sơ, hữu tình đầy mê hoặc. Quý khách sẽ viếng thăm đền thờ anh hùng Nguyễn Trung Trực tại thành phố biển Rạch Giá, lắng nghe những giai thoại lịch sử hào hùng. Di chuyển về Hà Tiên ngoạn cảnh, ngắm nhìn Hòn Phụ Tử linh thiêng sừng sững giữa biển khơi và khám phá Chùa Hang kỳ bí. Điểm nhấn của tour là chuyến tàu cao tốc rẽ sóng ra Quần đảo Hải Tặc vắng bóng người, nơi quý khách được tự do hòa mình vào làn nước trong vắt, lặn ngắm rạn san hô tự nhiên tuyệt đẹp và thưởng thức tiệc hải sản nướng dã ngoại ngay trên bãi biển thanh bình.', 50, 50, 1200000, 600000, 'Kiên Giang', 'n', 1, '3 ngày 2 đêm', '2025-08-15', '2025-08-15'),
(50, 'Free Walking Tour Phú Quốc - Ngắm Hoàng Hôn Đảo Ngọc', 'Nhóm 4 giảm 1 triệu', 'Tour đi bộ tự do (Free Walking) là lựa chọn hoàn hảo cho những ai muốn khám phá đảo ngọc Phú Quốc một cách chậm rãi, thư thái và trọn vẹn nhất. Không chạy đua với thời gian, quý khách sẽ có những buổi chiều tản bộ trên bãi cát mịn ngắm hoàng hôn đỏ rực buông xuống Dinh Cậu tuyệt mỹ. Lịch trình bao gồm cả việc dạo bước khám phá siêu quần thể Grand World lộng lẫy kiến trúc Venice, xem các show diễn nghệ thuật đỉnh cao và hành trình cano vi vu 4 đảo hoang sơ phía Nam để lặn ngắm san hô. Mọi thứ đều được thiết kế để mang lại sự tĩnh tại và niềm vui. Ưu đãi vô cùng hấp dẫn: Nhóm 4 khách đăng ký sẽ được giảm ngay 1 triệu đồng!', 100, 86, 9900000, 7450000, 'Phú Quốc', 'n', 1, '5 ngày 4 đêm', '2025-05-12', '2025-05-17'),
(51, 'Đà Nẵng - Bà Nà - Cầu Vàng - Sơn Trà - Hội An - La Vang - Động Thiên Đường & Phong Nha - Huế', 'Đà Nẵng ', 'Tour liên tuyến Miền Trung quy mô lớn, quy tụ đầy đủ những điểm đến sáng giá và mang tính biểu tượng nhất của dải đất duyên hải. Khởi hành từ thành phố đáng sống Đà Nẵng, quý khách sẽ lần lượt chiêm ngưỡng sự hoài niệm của Phố cổ Hội An rực rỡ đèn lồng, chinh phục độ cao trên Cầu Vàng Bà Nà vươn mình giữa mây trời, và cảm nhận nét tĩnh lặng, trầm mặc của cố đô Huế với các lăng tẩm hoàng cung. Hành trình tiếp tục đưa đoàn vươn ra Quảng Bình, viếng thăm Thánh địa La Vang linh thiêng trước khi thám hiểm hệ thống hang động tráng lệ bậc nhất tại Động Thiên Đường. Một chuyến đi trọn vẹn cảm xúc qua các vùng miền di sản.', 50, 49, 5000000, 1450000, 'Đà Nẵng - Bà Nà - Cầu Vàng - Sơn Trà - Hội An - La Vang', 't', 1, '4 ngày 3 đêm', '2025-05-12', '2025-05-16'),
(52, 'Phú Yên - Quy Nhơn - Hội An - Đà Nẵng - Động Thiên Đường', 'Nhóm 4 giảm 1 triệu', 'Hành trình tuyệt đỉnh khám phá trọn vẹn dải đất duyên hải Nam Trung Bộ quyến rũ. Bắt đầu từ Phú Yên với kiệt tác thiên nhiên Gành Đá Đĩa gồm hàng vạn cột đá tổ ong khổng lồ vươn sát mép sóng và tháp Nghinh Phong hiện đại. Di chuyển về Quy Nhơn, quý khách sẽ ngồi cano rẽ sóng ra đảo Kỳ Co - nơi được ví như Maldives của Việt Nam với làn nước xanh ngọc bích, check-in tại Eo Gió lộng gió hoang sơ. Những ngày cuối, đoàn sẽ xuôi về Quảng Nam dạo quanh phố Hội nên thơ và kết thúc tại thành phố Đà Nẵng sầm uất. Một bức tranh biển đảo tuyệt đẹp đang chờ đón. Ưu đãi khủng cho gia đình: Nhóm 4 khách giảm ngay 1 triệu đồng!', 20, 19, 3900000, 1800000, 'Phú Yên - Quy Nhơn - Hội An - Đà Nẵng', 't', 1, '5 ngày 4 đêm', '2025-05-26', '2025-06-01'),
(53, 'Huế - La Vang - Động Thiên Đường - KDL Bà Nà - Cầu Vàng - Hội An - Đà Nẵng ', 'Khách sạn 4 sao trọn tour', 'Trải nghiệm du lịch cao cấp 5 ngày 4 đêm khám phá cung đường miền Trung di sản, với tiêu chuẩn lưu trú tại hệ thống khách sạn 4 sao đẳng cấp quốc tế xuyên suốt hành trình. Quý khách sẽ có những phút giây thư giãn tuyệt đối sau khi dạo bước chiêm ngưỡng Đại Nội Huế vàng son oanh liệt. Hành trình tâm linh đưa đoàn hành hương về Thánh Địa La Vang linh thiêng, trước khi choáng ngợp trước vẻ đẹp kỳ vĩ muôn hình vạn trạng của Động Thiên Đường tại Quảng Bình. Đặc biệt, tour bao trọn gói dịch vụ giải trí đỉnh cao tại khu du lịch Bà Nà Hills, dạo bước Cầu Vàng và ngắm cảnh Đà Nẵng lung linh về đêm bên dòng sông Hàn thơ mộng.', 20, 20, 8390000, 7800000, 'Huế - La Vang - Động Thiên Đường - KDL Bà Nà - Cầu Vàng - Đà Nẵng ', 't', 1, '5 ngày 4 đêm', '2025-05-31', '2025-06-05'),
(54, 'Hà Nội – Làng Gốm Cổ Bát Tràng – Ninh Bình – Hạ Long – Làng Ngọc Trai Tùng Sâu - Yên Tử', 'Thưởng thức lẩu hải sản 9 tầng', 'Hành trình kết nối tam giác vàng du lịch nổi tiếng bậc nhất miền Bắc, mang đến cho quý khách sự giao thoa hoàn hảo giữa văn hóa, tâm linh và thiên nhiên kỳ vĩ. Bắt đầu bằng việc tự tay nhào nặn đất sét tại làng gốm Bát Tràng truyền thống ngàn năm tuổi. Tiếp nối là chuyến cáp treo xuyên mây lên đỉnh non thiêng Yên Tử, viếng Chùa Đồng linh thiêng chót vót. Quý khách sẽ được lên du thuyền gỗ ngoạn cảnh Vịnh Hạ Long tráng lệ với hàng ngàn đảo đá vôi, và ngày cuối hòa mình vào không gian non nước hữu tình, len lỏi qua các hang động bằng thuyền nan tại Tràng An, Ninh Bình. Đặc biệt tri ân khách hàng: Tặng ngay bữa tối thưởng thức lẩu hải sản 9 tầng siêu khủng!', 112, 112, 9090000, 9000000, 'Hà Nội ', 'b', 1, '3 ngày 2 đêm', '2025-07-05', '2025-07-08'),
(55, 'Combo Khách Sạn Hà Nội Và Tham Quan Ngủ Du Thuyền Hạ Long Starlight Cruise', 'Nhóm 4 giảm 200k ', 'Gói combo du lịch cao cấp được thiết kế riêng biệt, kết hợp hoàn hảo giữa không gian nghỉ dưỡng tĩnh lặng tại trung tâm phố cổ Hà Nội và trải nghiệm xa hoa 2 ngày 1 đêm trên siêu du thuyền Starlight Cruise 5 sao tại Vịnh Hạ Long. Tại thủ đô, quý khách tự do len lỏi qua 36 phố phường, nhâm nhi ly cà phê trứng hoài niệm. Khi lên du thuyền, bạn sẽ được phục vụ ẩm thực hải sản thượng hạng, thư giãn trong phòng nghỉ view biển toàn cảnh, ngắm cảnh hoàng hôn rực rỡ trên boong tàu, tham gia tiệc Sunset Party sôi động và chèo kayak lãng mạn giữa lòng di sản thiên nhiên thế giới. Khuyến mãi cực hot dịp này: Nhóm 4 khách đăng ký giảm ngay 200k!', 30, 30, 1600000, 800000, 'Quảng Ninh', 'b', 1, '3 ngày 2 đêm', '2025-07-15', '2025-07-18'),
(56, 'Hà Nội - Yên Tử - Vịnh Hạ Long - Ninh Bình - Chùa Bái Đính - KDL Tràng An', 'Nhóm 4 giảm 1 triueej', 'Khám phá trọn vẹn vẻ đẹp ngoạn mục và những điểm đến nổi tiếng nhất của miền Bắc trong một chuyến đi vẹn toàn cảm xúc. Hành trình tâm linh đưa quý khách hành hương về cõi Phật Yên Tử linh thiêng giữa sương mây, và viếng quần thể chùa Bái Đính đồ sộ giữ nhiều kỷ lục Đông Nam Á. Xen kẽ là những giờ phút đắm chìm trước sự kỳ vĩ của thiên nhiên khi ngồi du thuyền rẽ sóng ngoạn cảnh Vịnh Hạ Long, băng qua hòn Gà Chọi, Đỉnh Hương. Cảm xúc sẽ khép lại một cách nhẹ nhàng, êm ái khi quý khách xuôi dòng sông sào khê trong vắt, ngắm nhìn non nước hữu tình tại khu du lịch sinh thái Tràng An. Khuyến mãi tri ân: Nhóm 4 khách giảm ngay 1 triệu đồng!', 45, 45, 7790000, 7000000, 'Hà Nội - Yên Tử - Vịnh Hạ Long - Ninh Bình - Chùa Bái Đính - KDL Tràng An', 'b', 1, '3 ngày 2 đêm', '2025-07-18', '2025-07-21'),
(57, 'Hạ Long - Chùa Ba Vàng - Yên Tử', 'Nhóm 4 giảm 200k', 'Chuyến đi được thiết kế để kết hợp hài hòa giữa việc ngoạn cảnh thiên nhiên tuyệt mỹ tại Vịnh Hạ Long và hành trình tìm về cõi tâm linh thanh tịnh tại vùng đất thiêng Quảng Ninh. Quý khách sẽ có cơ hội viếng thăm Chùa Ba Vàng bề thế, ngôi chùa có chính điện lớn nhất trên núi tại Đông Dương, và thử thách lòng thành kính khi chinh phục đỉnh thiêng Yên Tử bằng hệ thống cáp treo băng qua rừng tùng cổ thụ. Những ngày còn lại, đoàn sẽ lênh đênh trên mặt vịnh xanh biếc, luồn lách qua hang Luồn bằng thuyền thúng và chiêm ngưỡng kiến trúc độc đáo của bảo tàng Quảng Ninh. Đăng ký theo nhóm để nhận ưu đãi siêu tiết kiệm: Nhóm 4 khách giảm ngay 200k!', 40, 40, 1900000, 950000, 'Hạ Long', 'b', 1, '3 ngày 2 đêm', '2025-07-23', '2025-07-26'),
(58, 'Tour Quảng Bình2', 'Phong Nha - Kẻ Bàng tuyệt đẹp.', 'Chuyến thám hiểm chuyên sâu vào vương quốc hang động kỳ vĩ ẩn mình trong vùng lõi Vườn Quốc gia Phong Nha - Kẻ Bàng. Quý khách sẽ được chiêm ngưỡng vẻ đẹp lộng lẫy, tráng lệ ngoài sức tưởng tượng của Động Thiên Đường - hang động khô dài nhất Châu Á với hệ thống thạch nhũ muôn hình vạn trạng lấp lánh như kim cương trong ánh đèn nghệ thuật. Hành trình tiếp tục đưa đoàn xuôi thuyền theo dòng sông Son thơ mộng để tiến sâu vào Động Phong Nha với dòng sông ngầm kỳ bí và bãi cát ngầm tuyệt đẹp. Cuối ngày, quý khách sẽ được giải nhiệt, vui chơi thỏa thích với các trò chơi zipline, chèo kayak tại dòng suối Nước Moọc mát lạnh, xanh ngọc bích nằm lọt thỏm giữa rừng nguyên sinh.', 38, 38, 1700000, 850000, 'Quảng Bình', 't', 1, '3 ngày 1 đêm', '2025-07-26', '2025-07-28'),
(59, 'Tour Cần Thơ2', 'Chợ nổi và miệt vườn Tây Đô.', 'Trải nghiệm chân thực và sống động nhất về đời sống văn hóa rực rỡ của người dân miền Tây Nam Bộ tại vùng đất Tây Đô Cần Thơ gạo trắng nước trong. Quý khách phải thức dậy từ rất sớm để kịp đón bình minh nhộn nhịp trên chợ nổi Cái Răng, tận mắt nhìn cảnh hàng trăm ghe thuyền giao thương tấp nập những sản vật địa phương và thưởng thức bát hủ tiếu nóng hổi ngay trên sông nước. Hành trình tiếp tục len lỏi qua các con rạch nhỏ để vào thăm những khu vườn trái cây miệt vườn trĩu quả, tự tay hái và thưởng thức sầu riêng, chôm chôm tươi rói. Buổi tối, đoàn sẽ dạo bước tại Bến Ninh Kiều, lên du thuyền ngoạn cảnh sông Hậu, ăn tối và nghe đờn ca tài tử dặt dìu.', 40, 40, 1500000, 750000, 'Cần Thơ', 'n', 1, '3 ngày 2 đêm', '2025-07-30', '2025-08-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `isActive` enum('y','n') NOT NULL DEFAULT 'n',
  `status` enum('d','b') DEFAULT NULL COMMENT '''d'' deleted\r\n''b'' baned',
  `createDate` timestamp NULL DEFAULT NULL,
  `updateDate` timestamp NULL DEFAULT NULL,
  `activation_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `google_id`, `facebook_id`, `fullName`, `username`, `password`, `avatar`, `email`, `phoneNumber`, `address`, `ipAddress`, `isActive`, `status`, `createDate`, `updateDate`, `activation_token`) VALUES
(62, NULL, NULL, 'Trung Phạm Quang', 'qtrunghd', 'e10adc3949ba59abbe56e057f20f883e', '1776150129.jpg', 'makelele24122004@gmail.com', '0368616209', 'HD', NULL, 'n', NULL, NULL, NULL, 'iiyPcXWMPhj3vEGHHsXlDXB5YPld1iU3x29kW6caEfDMSmQyQgaKFrt5iBvP'),
(63, NULL, NULL, NULL, 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'user@gmail.com', NULL, NULL, NULL, 'n', NULL, NULL, NULL, 'GsNSq7Kyj6GEPjyxK1FvQcIfFtzlruDzIZFXcC3RQXW0L27aLOMAGHAZZdXJ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `tourID` (`tourID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `adminID` (`adminID`);

--
-- Chỉ mục cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkoutID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `tourID` (`tourID`),
  ADD KEY `history_ibfk_3` (`bookingID`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `tourID` (`tourID`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Chỉ mục cho bảng `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`itineraryID`),
  ADD KEY `fk_itinerary_tour` (`tourID`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `tourID` (`tourID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `itineraryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);

--
-- Các ràng buộc cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Các ràng buộc cho bảng `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `fk_itinerary_tour` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
