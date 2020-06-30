-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 01:03 PM
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
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `SoDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayDat` datetime NOT NULL,
  `NoiGiao` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` int(5) NOT NULL,
  `TinhTrang` enum('Mới đặt','Đã thanh toán','Đã giao hàng','Hủy đơn hàng') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'admin', 'admin', 'Quản trị Hệ thống', '280 An Dương Vương, P4, Q5', 989366990, 'admin@hoadep.com'),
(2, 'hienlth', 'hienlth', 'Lương Trần Hy Hiến', '396 Dương Bá Trạc, Q8', 989366990, 'hienlth@hcmup.edu.vn'),
(3, 'cuong', 'cuong', 'Chung Quốc Cường', '1bis Nguyễn Văn Trỗi Q.1', 912345678, 'cqcuong@hcmuns.edu.vn'),
(4, 'tung', 'tung', 'Lưu Hải Tùng', '1 Mạc Đỉnh Chi Q.1', 989766569, 'lhtung@yahoo.com'),
(5, 'dlthien', 'dlthien', 'Đỗ Lâm Thiên', '357 Lê Hồng Phong Q.10 ', 903123456, 'dlthien@hcmuns.edu.vn'),
(6, 'thanh', 'thanh', 'Nguyễn Ngọc Thanh', '357 Lê Hồng Phong Q.10', 903456789, 'lthanh@hcmuns.edu.vn'),
(7, 'hoadalat', '123456', 'Hoa Đà Lạt', '123 Hai Bà Trưng', 902314340, 'hoadalat@gmail.com'),
(8, 'hoainfo', '123123', 'Shop Hoa', '123 Đà Nẵng', 123213213, 'hoa@hoa.com'),
(9, '12310', '12310', 'LocTran', '783 CMT8', 382944169, 'LocTran12310@gmail.com');

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
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLoai`, `TenSanPham`, `GiaBan`, `MauSac`, `VatLieu`, `MoTa`, `Hinh`) VALUES
(1, 1, 'Sofa 1', 70000, 'Xanh', NULL, 'Sofa 1', '5-sofa-1587982024.jpg'),
(2, 2, 'Chair 1', 150000, 'Xanh', NULL, 'Chair 1 - Sản phẩm là mọi thứ có thể chào bán trên thị trường để chú ý, mua, sử dụng hay tiêu dùng, có thể thỏa mãn được một mong muốn hay nhu cầu.', '2-ghe-1587981944.jpg'),
(3, 2, 'Chair 2', 250000, NULL, 'Go', 'Chair 2 - Sản phẩm là mọi thứ có thể chào bán trên thị trường để chú ý, mua, sử dụng hay tiêu dùng, có thể thỏa mãn được một mong muốn hay nhu cầu.', 'a.jpg'),
(4, 4, 'Table 1', 250000, NULL, 'Go', 'Table - San pham duy nhat', '1-ban-1587981900.jpg'),
(5, 3, 'Lamp 1', 400000, 'Den', NULL, 'Den - Den so mot', '8-den-1587982122.jpg'),
(6, 4, 'Table 2', 500000, 'Den', 'Nhua', 'Ban Nhua 4 chan mau Den', 'c12.jpg'),
(7, 2, 'Chair 3', 200000, NULL, 'Go', 'Ghe go don gian', 'c11.jpg'),
(8, 2, 'Chair 4', 230000, NULL, 'Go', 'Ghe go co dem ngoi', 'g.jpg'),
(9, 2, 'Chair 5', 400000, 'Xam', NULL, 'Ghe dem', 'c.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `fk_chitiethd_hoadon` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiethd_masp` FOREIGN KEY (`MaSP`) REFERENCES `hoadon` (`MaHD`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
