-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2020 lúc 07:02 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_btl_cnw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `ID` int(11) NOT NULL,
  `TIEUDE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `HINHANH` text COLLATE utf8_unicode_ci NOT NULL,
  `TACGIA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIANTAO` datetime NOT NULL,
  `THOIGIANDANG` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGIANGVIEN` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MAGIANGVIEN`, `TEN`, `DIACHI`, `SDT`) VALUES
(1, 'tunglam8', '2017_2018', 392756280),
(3, 'NGUYEN TUAN ANH', 'HA NOI', 2147483647),
(5, 'NGUYEN QUY TUNG LAM', 'THAI NGUYEN', 2147483647),
(7, 'LE QUANG HUY', 'HAI DUONG', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachgiangday`
--

CREATE TABLE `kehoachgiangday` (
  `MAKHGD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MALOPHOCPHAN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAY` date NOT NULL,
  `THU` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachgiangday`
--

INSERT INTO `kehoachgiangday` (`MAKHGD`, `MAGIANGVIEN`, `MALOPHOCPHAN`, `NGAY`, `THU`, `DIADIEM`, `THOIGIAN`, `NOIDUNG`) VALUES
('MGD01', 3, 'TLSE', '2020-01-19', 'Thứ 5', '425-A4', 'Từ tiết 4 - tiết 6 (Sáng)', 'Học bình thường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtrinhthucte`
--

CREATE TABLE `lichtrinhthucte` (
  `MALTTT` int(11) NOT NULL,
  `MAKHGD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MALOPHOCPHAN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAY` date NOT NULL,
  `THU` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DIADIEM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichtrinhthucte`
--

INSERT INTO `lichtrinhthucte` (`MALTTT`, `MAKHGD`, `MAGIANGVIEN`, `MALOPHOCPHAN`, `NGAY`, `THU`, `DIADIEM`, `THOIGIAN`, `NOIDUNG`) VALUES
(0, 'MGD01', 3, 'TLSE', '2020-01-19', 'Thứ 5', '425-A4', 'Từ tiết 4 - tiết 6 (Sáng)', 'Học bình thường nhé');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `MALOPHOCPHAN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOPHOCPHAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MAMONHOC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MAGIANGVIEN` int(11) NOT NULL,
  `MATHOIGIAN` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`MALOPHOCPHAN`, `TENLOPHOCPHAN`, `MAMONHOC`, `MAGIANGVIEN`, `MATHOIGIAN`) VALUES
('TLSE', 'Công nghệ Web-1-19', 'CNW', 3, 'TG1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MANGANHHOC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MAMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SOTIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MANGANHHOC`, `MAMONHOC`, `TENMONHOC`, `SOTIN`) VALUES
('TLA', 'CNW', 'Công nghệ Web', 4),
('KT', 'KT1', 'Kinh Tế', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `MANGANHHOC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENNGANHHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhhoc`
--

INSERT INTO `nganhhoc` (`MANGANHHOC`, `TENNGANHHOC`) VALUES
('KT', 'Kinh tế '),
('TLA', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `MAQUANLY` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`MAQUANLY`, `TEN`, `DIACHI`, `SDT`) VALUES
(1, 'NGUYEN VIET HUNG', 'Hà Đông', 2147483647),
(2, 'Lam', '2018_2019', 392756280),
(6, 'BUI NGOC KHANH', 'YEN BAI', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

CREATE TABLE `quantrivien` (
  `MAQUANTRIVIEN` int(11) NOT NULL,
  `TEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `TENTAIKHOAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MAKICHHOAT` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `QUYEN` int(11) NOT NULL,
  `TRANGTHAI` enum('CHUAXACMINH','DAXACMINH') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `TENTAIKHOAN`, `MATKHAU`, `EMAIL`, `MAKICHHOAT`, `QUYEN`, `TRANGTHAI`) VALUES
(0, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 'DAXACMINH'),
(1, 'TungLam', 'ed88754d2704f12521658e251e711148', 'ahnhani86@gmail.com', '581c5ad96e3bfcb824acc9c12beb087a', 3, 'DAXACMINH'),
(2, 'lamlam', '046cce040144cf6d39422389804ca421', 'lamnqt72@wru.vn', 'af66568c1f83a6586aa58ea40c524594', 2, 'CHUAXACMINH'),
(3, 'tk3', 'e10adc3949ba59abbe56e057f20f883e', '', '', 3, 'DAXACMINH'),
(5, 'tk5', 'e10adc3949ba59abbe56e057f20f883e', '', '', 3, 'DAXACMINH'),
(6, 'tk6', 'e10adc3949ba59abbe56e057f20f883e', '', '', 2, 'DAXACMINH'),
(7, 'tk7', 'e10adc3949ba59abbe56e057f20f883e', '', '', 3, 'DAXACMINH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigianhoc`
--

CREATE TABLE `thoigianhoc` (
  `MATHOIGIAN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NAMHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HOCKI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GDBATDAU` date NOT NULL,
  `GDKETTHUC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigianhoc`
--

INSERT INTO `thoigianhoc` (`MATHOIGIAN`, `NAMHOC`, `HOCKI`, `GDBATDAU`, `GDKETTHUC`) VALUES
('TG1', '2019 - 2020', 'Kì 2', '2019-12-12', '2020-01-04'),
('TG2', '2019 - 2020', 'Kì 2', '2020-01-08', '2020-02-02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MAGIANGVIEN`);

--
-- Chỉ mục cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD PRIMARY KEY (`MAKHGD`),
  ADD KEY `MAGIANGVIEN` (`MAGIANGVIEN`),
  ADD KEY `MALOPHOCPHAN` (`MALOPHOCPHAN`);

--
-- Chỉ mục cho bảng `lichtrinhthucte`
--
ALTER TABLE `lichtrinhthucte`
  ADD PRIMARY KEY (`MALTTT`),
  ADD KEY `MALOPHOCPHAN` (`MALOPHOCPHAN`),
  ADD KEY `MAKHGD` (`MAKHGD`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`MALOPHOCPHAN`),
  ADD KEY `MATHOIGIAN` (`MATHOIGIAN`),
  ADD KEY `MAGIANGVIEN` (`MAGIANGVIEN`),
  ADD KEY `MAMONHOC` (`MAMONHOC`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MAMONHOC`),
  ADD KEY `monhoc_ibfk_1` (`MANGANHHOC`);

--
-- Chỉ mục cho bảng `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`MANGANHHOC`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`MAQUANLY`);

--
-- Chỉ mục cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`MAQUANTRIVIEN`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `thoigianhoc`
--
ALTER TABLE `thoigianhoc`
  ADD PRIMARY KEY (`MATHOIGIAN`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `taikhoan` (`ID`);

--
-- Các ràng buộc cho bảng `kehoachgiangday`
--
ALTER TABLE `kehoachgiangday`
  ADD CONSTRAINT `kehoachgiangday_ibfk_1` FOREIGN KEY (`MALOPHOCPHAN`) REFERENCES `lophocphan` (`MALOPHOCPHAN`),
  ADD CONSTRAINT `kehoachgiangday_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `giangvien` (`MAGIANGVIEN`);

--
-- Các ràng buộc cho bảng `lichtrinhthucte`
--
ALTER TABLE `lichtrinhthucte`
  ADD CONSTRAINT `lichtrinhthucte_ibfk_1` FOREIGN KEY (`MALOPHOCPHAN`) REFERENCES `lophocphan` (`MALOPHOCPHAN`),
  ADD CONSTRAINT `lichtrinhthucte_ibfk_2` FOREIGN KEY (`MAKHGD`) REFERENCES `kehoachgiangday` (`MAKHGD`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`MATHOIGIAN`) REFERENCES `thoigianhoc` (`MATHOIGIAN`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`MAGIANGVIEN`) REFERENCES `giangvien` (`MAGIANGVIEN`),
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MANGANHHOC`) REFERENCES `nganhhoc` (`MANGANHHOC`);

--
-- Các ràng buộc cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD CONSTRAINT `quanly_ibfk_2` FOREIGN KEY (`MAQUANLY`) REFERENCES `taikhoan` (`ID`);

--
-- Các ràng buộc cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD CONSTRAINT `quantrivien_ibfk_1` FOREIGN KEY (`MAQUANTRIVIEN`) REFERENCES `taikhoan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
