-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 05:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `HoTenAdmin` varchar(50) NOT NULL,
  `TaiKhoan` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `DiaChi` varchar(20) NOT NULL,
  `DienThoai` int(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `HoTenAdmin`, `TaiKhoan`, `MatKhau`, `DiaChi`, `DienThoai`, `Email`, `Level`, `Status`) VALUES
(1, 'Trần Trung Hiếu', 'hieupro123', 'hieupro123', 'TPHCM', 352460179, 'trantrunghieu777888555@gmail.com', 'Admin_1', 'Active'),
(9, 'admin2', 'admin2', ' 123456', 'odaucungduoc', 957303812, 'admin2@gmail.com', 'Admin_2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `SoDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`SoDH`, `MaSP`, `MaHD`, `SoLuong`) VALUES
(53, 28, 28, 1),
(54, 34, 28, 1),
(55, 37, 28, 1),
(56, 39, 28, 1),
(63, 31, 32, 1),
(64, 36, 32, 1),
(65, 36, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayDat` datetime NOT NULL,
  `NoiGiao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` int(11) NOT NULL,
  `TinhTrang` enum('Mới đặt','Đã thanh toán','Đã giao hàng','Hủy đơn hàng') COLLATE utf8_unicode_ci NOT NULL,
  `HoTenhd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Emailhd` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoaihd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayDat`, `NoiGiao`, `MaKH`, `TinhTrang`, `HoTenhd`, `Emailhd`, `DienThoaihd`) VALUES
(28, '2020-07-28 19:13:48', '783 ADV, P2, Q5, TP HCM', 12, 'Mới đặt', 'Loc Tran', NULL, 382944169),
(32, '2020-07-28 21:18:14', '783 CMT8, 54, 2323, 144', 12, 'Mới đặt', 'Loc Tran', NULL, 382944169),
(33, '2020-07-28 21:28:47', '783 CMT8, 6, 5, 2', 12, 'Mới đặt', 'Loc Tran', NULL, 382944169);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenDN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` int(11) DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenDN`, `MatKhau`, `HoTen`, `DiaChi`, `DienThoai`, `Email`) VALUES
(2, 'hienlth', 'hienlth', 'Lương Trần Hy Hiến', '396 Dương Bá Trạc, Q8', 989366990, 'hienlth@hcmup.edu.vn'),
(3, 'cuong', 'cuong', 'Chung Quốc Cường', '1bis Nguyễn Văn Trỗi Q.1', 912345678, 'cqcuong@hcmuns.edu.vn'),
(4, 'tung', 'tung', 'Lưu Hải Tùng', '1 Mạc Đỉnh Chi Q.1', 989766569, 'lhtung@yahoo.com'),
(5, 'dlthien', 'dlthien', 'Đỗ Lâm Thiên', '357 Lê Hồng Phong Q.10 ', 903123456, 'dlthien@hcmuns.edu.vn'),
(6, 'thanh', 'thanh', 'Nguyễn Ngọc Thanh', '357 Lê Hồng Phong Q.10', 903456789, 'lthanh@hcmuns.edu.vn'),
(7, 'hoadalat', '123456', 'Hoa Đà Lạt', '123 Hai Bà Trưng', 902314340, 'hoadalat@gmail.com'),
(12, 'l12310', '123456', 'Loc Tran', '783 CMT8', 382944169, '123@gmail.com'),
(14, 'll12310', '123456', ' loc', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MaLoai`, `TenLoai`) VALUES
(1, 'SOFA'),
(2, 'CHAIR'),
(3, 'LAMP'),
(4, 'TABLE');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSanPham` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `MauSac` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VatLieu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTa` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLoai`, `TenSanPham`, `GiaBan`, `MauSac`, `VatLieu`, `MoTa`, `Hinh`, `Status`) VALUES
(3, 2, 'Ghế số 2', 500000, 'Nâu', 'Gỗ', 'Có chiếc ghế be bé -Ở dưới gốc cây me -Này cái cậu cutee -Hãy mua tôi về nhé.', 'c9.jpg', 1),
(5, 3, 'Lamp 1', 400000, 'Đen', 'Nhựa', 'Gần mực thì đen\r\nGần đèn thì mua', '8-den-1587982122.jpg', 2),
(6, 4, 'Table 2', 500000, 'Den', 'Nhua', 'Có vài đốm lửa nhỏ\r\nBỗng bùng cháy thật to\r\nVẫn hỏi nhỏ câu này\r\nMua bàn đi bạn nhé!', 'c12.jpg', 1),
(7, 2, 'Chair 3', 200000, NULL, 'Go', 'Ghe go don gian', 'c11.jpg', 2),
(8, 2, 'Chair 4', 230000, NULL, 'Go', 'Ghe go co dem ngoi', 'g.jpg', 1),
(9, 2, 'Chair 5', 400000, 'Xam', NULL, 'Ghe dem', 'c.jpg', 2),
(15, 1, 'Sofa ý', 60000000, ' Đen', 'Da', 'Trứng rán cần mỡ, bắp cần bơ\r\nIu hong cần cớ, cần Sofa cơ!', 'Sofa01.JPG', 1),
(16, 1, 'Sofa ba chỗ 01', 4500000, ' Xanh', 'Vải', ' Màu sắc trang nhã hài hòa', 'Sofa3cho.jpg', 2),
(17, 1, 'Sofa Giường ', 10000000, ' Nâu', 'Da', ' Sofa cũng là 1 chiếc giường lý tưởng', 'sofagiuong.jpg', 1),
(18, 1, 'Sofa Bộ Hoàn Mỹ', 60000000, ' Nâu', 'Da', ' Chất hơn cả nước cất', 'sofabohoanmy.jpg', 1),
(19, 2, 'Ghế ăn', 1000000, ' Nâu', 'Da', ' ', 'ghean.jpg', 2),
(20, 2, 'Ghế ăn 2', 1200000, ' Nâu', 'Da', ' Rất ok', 'ghean02.jpg', 2),
(21, 3, 'Đèn trang trí ', 500000, ' Trắng', 'Sứ ', ' sáng láng', 'den.jpg', 2),
(22, 3, 'Đèn ngủ 01', 1000000, ' Đen', 'Sứ', ' Sang chảnh', 'denngu.jpg', 2),
(23, 3, 'Đèn chùm trang trí', 15000000, ' Nâu', 'Sứ', ' Bắt mắt', 'dentum.jpg', 2),
(24, 3, 'Đèn ngủ 02', 9000000, ' đen', 'Sứ', ' Đẹp', 'dengnut.jpg', 1),
(25, 2, 'Ghế ăn 03', 1200000, ' Xám', 'Vải', ' êm :))', 'ghr.jpg', 2),
(26, 4, 'Bàn Ceramic', 15000000, ' Đen ', 'Kính', ' Sang trọng, phù hợp cho việc tiếp khách', 'ceramic.jpg', 1),
(27, 4, 'Bàn ăn Ceramic', 10000000, ' Đen ', 'Gỗ', ' ', 'cera.jpg', 1),
(28, 4, 'Bàn trà 01', 22999000, ' Nâu', 'Gỗ ', ' Tận hưởng một tách  trà nóng ngon hơn', 'bantra.jpg', 2),
(29, 4, 'Bàn trà 02', 25999999, ' Trắng', 'Đá', ' Đá hoa cương sang trọng tiêp đãi những vị khách quý', 'banda.jpg', 1),
(30, 3, 'Đèn spilit', 3999999, ' Trắng', 'Sứ', ' Phù hợp với sự lãng mạn, trẻ trung, yêu đời', 'spilit.jpg', 0),
(31, 3, 'Đèn Jaws black', 2999999, ' Đen', 'Sứ', ' Một chiếc đèn không thể thiếu trong phòng ngủ của bạn', 'jawsblack.jpg', 1),
(32, 3, 'Đèn cohen', 1999999, ' Trắng', 'Sứ', ' ', 'cohen.jpg', 0),
(33, 3, 'Đèn shower mega', 4299000, ' Trắng', 'Sứ', ' Kiểu dáng không đụng hàng', 'shower.jpg', 0),
(34, 4, 'Bàn trang điểm 01', 12999000, ' Trắng', 'Gỗ', ' Sản phẩm không thể thiếu dành cho các chị em phái đẹp', 'btd.jpg', 2),
(35, 4, 'Bàn trang điểm 02', 15999000, ' Nâu', 'Gỗ', ' ', 'btdd.jpg', 0),
(36, 1, 'Sofa Giường 02', 30999000, ' Xanh', 'Vải ', ' Sofa cũng là 1 chiếc giường lý tưởng', 'Sofa3cho.jpg', 1),
(37, 1, 'Sofa góc', 59699000, ' Xám', 'Vải ', ' Chất liệu vải nhung mềm mại êm ái, băng ghế rộng đủ chỗ cho cả nhóm', 'sfg.jpg', 2),
(38, 2, 'Armchair', 6999000, ' Xám', 'Vải', ' Anh ơi anh chọn ghế nào? - Tiện cho em hỏi đường vào tim anh <3', 'airmche.jpg', 1),
(39, 2, 'Armchair 02', 4599000, ' Xám', 'Vải ', ' Trứng rán cần mỡ, bắp cần bơ, yêu không cần cớ, cần ghế cơ :))', 'fs22-1.3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `xemganday`
--

CREATE TABLE `xemganday` (
  `Id` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`SoDH`),
  ADD KEY `fk_chitiethd_hoadon` (`MaHD`),
  ADD KEY `fk_chitiethd_masp` (`MaSP`) USING BTREE;

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `fk_hoadon_makh` (`MaKH`) USING BTREE;

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`) USING BTREE,
  ADD KEY `fk_sp_loaisp` (`MaLoai`) USING BTREE;

--
-- Indexes for table `xemganday`
--
ALTER TABLE `xemganday`
  ADD KEY `fk_xgd_masp` (`MaSP`) USING BTREE,
  ADD KEY `fk_xgd_makh` (`MaKH`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chitiethd`
--
ALTER TABLE `chitiethd`
  MODIFY `SoDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `fk_chitiethd_hoadon` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiethd_masp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_makh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_loaisp` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `xemganday`
--
ALTER TABLE `xemganday`
  ADD CONSTRAINT `fk_xgd_makh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_xgd_masp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
