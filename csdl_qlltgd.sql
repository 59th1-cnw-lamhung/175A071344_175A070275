-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 05:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyltgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
--
CREATE TABLE `baiviet` (
  `ID` int(11) NOT NULL,
  `TIEUDE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(50000) COLLATE utf8_unicode_ci NOT NULL,
  `HINHANH` text NOT NULL,
  `TACGIA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIANTAO` datetime NOT NULL,
  `THOIGIANDANG` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `lophocphan` (
  `MALOPHOCPHAN` varchar(10) NOT NULL,
  `TENLOPHOCPHAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MALOPMONHOC` varchar(10) NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MATHOIGIAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGIANGVIEN` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------------------------------------------


--
-- Table structure for table `lopmonhoc`
--

CREATE TABLE `lopmonhoc` (
  `MALOPMONHOC` varchar(10) NOT NULL,
  `MAMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SOTINCHI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `MANGANHHOC` varchar(10) NOT NULL,
  `TENNGANHHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE `quanly` (
  `MAQUANLY` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantrivien`
--

CREATE TABLE `quantrivien` (
  `MAQUANTRIVIEN` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `TENTAIKHOAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `MAKICHHOAT` varchar(250) NOT NULL,
  `QUYEN` int(11) NOT NULL,
  `TRANGTHAI` enum('CHUAXACMINH','DAXACMINH') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thoigianhoc`
--

CREATE TABLE `thoigianhoc` (
  `MATHOIGIAN` varchar(10) NOT NULL,
  `NAMHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HOCKI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GIAIDOAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kehoachgiangday`
--

CREATE TABLE `kehoachgiangday` (
  `MAKHGD` varchar(50) NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MALOPHOCPHAN` varchar(10) NOT NULL,
  `NGAY` date NOT NULL,
  `THU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `monhoc` (
  `MANGANHHOC` varchar(10) NOT NULL,
  `MAMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `lichtrinhthucte` (
  `MALTTT` int NOT NULL,
  `MAKHGD` varchar(50) NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MALOPHOCPHAN` varchar(10) NOT NULL,
  `NGAY` date NOT NULL,
  `THU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MAGIANGVIEN`);
  

--
-- Indexes for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`MALOPHOCPHAN`),
  ADD KEY `MATHOIGIAN` (`MATHOIGIAN`),
  ADD KEY `MAGIANGVIEN` (`MAGIANGVIEN`),
  ADD KEY `MALOPMONHOC` (`MALOPMONHOC`);

--
-- Indexes for table `lopmonhoc`
--
ALTER TABLE `lopmonhoc`
  ADD PRIMARY KEY (`MALOPMONHOC`);
  

--
-- Indexes for table `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`MANGANHHOC`);
  

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`MAQUANLY`);
  

--
-- Indexes for table `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`MAQUANTRIVIEN`);
  

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thoigianhoc`
--
ALTER TABLE `thoigianhoc`
  ADD PRIMARY KEY (`MATHOIGIAN`);

--
-- Indexes for table `thongtinchitiet`
--
ALTER TABLE `kehoachgiangday`
  ADD PRIMARY KEY (`MAKHGD`),
  ADD KEY `MAGIANGVIEN` (`MAGIANGVIEN`),
  ADD KEY `MALOPHOCPHAN` (`MALOPHOCPHAN`);


ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MAMONHOC`);


ALTER TABLE `lichtrinhthucte`
  ADD PRIMARY KEY (`MALTTT`),
  ADD KEY `MAKHGD` (`MAKHGD`);
--
-- AUTO_INCREMENT for dumped tables
--

--


--
-- AUTO_INCREMENT for table `giangvien`
--
/*ALTER TABLE `giangvien`
  MODIFY `MAGIANGVIEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `MALOPHOCPHAN` varchar(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lopmonhoc`
--
ALTER TABLE `lopmonhoc`
  MODIFY `MaLopMonHoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nganhhoc`
--
ALTER TABLE `nganhhoc`
  MODIFY `MaNganhHoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quanly`
--
ALTER TABLE `quanly`
  MODIFY `MaQuanLy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `MaQuanTriVien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thoigianhoc`
--
ALTER TABLE `thoigianhoc`
  MODIFY `MATHOIGIAN` varchar(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thongtinchitiet`
--
ALTER TABLE `thongtinchitiet`
  MODIFY `MaThongTin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--*/
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `taikhoan` (`ID`);

--
-- Constraints for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`MATHOIGIAN`) REFERENCES `thoigianhoc` (`MATHOIGIAN`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `giangvien` (`MAGIANGVIEN`),
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`MALOPMONHOC`) REFERENCES `lopmonhoc` (`MALOPMONHOC`);

--
-- Constraints for table `lopmonhoc`
--
ALTER TABLE `lopmonhoc`
  ADD CONSTRAINT `lopmonhoc_ibfk_1` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`);

--

ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MANGANHHOC`) REFERENCES `nganhhoc` (`MANGANHHOC`);

--
-- Constraints for table `quanly`
--
ALTER TABLE `quanly`

  ADD CONSTRAINT `quanly_ibfk_2` FOREIGN KEY (`MAQUANLY`) REFERENCES `taikhoan` (`ID`);

--
-- Constraints for table `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD CONSTRAINT `quantrivien_ibfk_1` FOREIGN KEY (`MAQUANTRIVIEN`) REFERENCES `taikhoan` (`ID`);

--
-- Constraints for table `thongtinchitiet`
--
ALTER TABLE `kehoachgiangday`
  ADD CONSTRAINT `kehoachgiangday_ibfk_1` FOREIGN KEY (`MALOPHOCPHAN`) REFERENCES `lophocphan` (`MALOPHOCPHAN`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `giangvien` (`MAGIANGVIEN`);

ALTER TABLE `lichtrinhthucte`
  ADD CONSTRAINT `lichtrinhthucte_ibfk_1` FOREIGN KEY (`MAKHGD`) REFERENCES `kehoachgiangday` (`MAKHGD`);



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
