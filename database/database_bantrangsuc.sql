CREATE DATABASE web_trangsuc;
USE web_trangsuc;

-- Bảng người dùng
CREATE TABLE nguoidung(
IDUser INT AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(50),
Password VARCHAR(100),
PhanQuyen INT
);

INSERT INTO nguoidung VALUES
(1,'admin','123456',1);

-- Bảng loại sản phẩm
CREATE TABLE loaisanpham(
MaLoai INT AUTO_INCREMENT PRIMARY KEY,
TenLoai VARCHAR(100)
);

INSERT INTO loaisanpham VALUES
(1,'Nhẫn'),
(2,'Dây chuyền'),
(3,'Bông tai'),
(4,'Vòng tay');

-- Bảng thương hiệu
CREATE TABLE thuonghieu(
MaTH INT AUTO_INCREMENT PRIMARY KEY,
TenTH VARCHAR(100),
DiaChi VARCHAR(200),
DienThoai VARCHAR(20)
);

INSERT INTO thuonghieu VALUES
(1,'PNJ','TP.HCM','0900000001'),
(2,'DOJI','Hà Nội','0900000002'),
(3,'SJC','TP.HCM','0900000003');

-- Bảng sản phẩm
CREATE TABLE sanpham(
MaSP INT AUTO_INCREMENT PRIMARY KEY,
TenSP VARCHAR(200),
Gia DOUBLE,
HinhAnh VARCHAR(100),
MoTa TEXT,
MaLoai INT,
MaTH INT,
FOREIGN KEY (MaLoai) REFERENCES loaisanpham(MaLoai),
FOREIGN KEY (MaTH) REFERENCES thuonghieu(MaTH)
);

INSERT INTO sanpham VALUES
(1,'Nhẫn kim cương PNJ',5000000,'nhan1.jpg','Nhẫn kim cương cao cấp',1,1),
(2,'Dây chuyền vàng PNJ',3500000,'daychuyen1.jpg','Dây chuyền vàng 18k',2,1),
(3,'Bông tai bạc SJC',1200000,'bongtai1.jpg','Bông tai bạc sang trọng',3,3),
(4,'Vòng tay vàng DOJI',2500000,'vongtay1.jpg','Vòng tay vàng đẹp',4,2);

-- Bảng đơn hàng
CREATE TABLE donhang(
MaDH INT AUTO_INCREMENT PRIMARY KEY,
TenKhach VARCHAR(200),
DienThoai VARCHAR(20),
DiaChi VARCHAR(200),
NgayDat DATE,
TongTien DOUBLE
);

-- Bảng chi tiết đơn hàng
CREATE TABLE chitietdonhang(
MaCT INT AUTO_INCREMENT PRIMARY KEY,
MaDH INT,
MaSP INT,
SoLuong INT,
Gia DOUBLE,
FOREIGN KEY (MaDH) REFERENCES donhang(MaDH),
FOREIGN KEY (MaSP) REFERENCES sanpham(MaSP)
);

-- Bảng bài viết
CREATE TABLE baiviet(
MaBV INT AUTO_INCREMENT PRIMARY KEY,
TieuDe VARCHAR(200),
NoiDung TEXT,
HinhAnh VARCHAR(100),
NgayDang DATE
);

INSERT INTO baiviet VALUES
(1,'Cách chọn nhẫn cưới','Hướng dẫn chọn nhẫn cưới phù hợp','nhancuoi.jpg','2024-01-01'),
(2,'Xu hướng trang sức 2024','Các mẫu trang sức hot năm 2024','trend.jpg','2024-01-02');