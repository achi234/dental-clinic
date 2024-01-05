USE MASTER
GO
IF DB_ID('QLPHONGKHAMNHAKHOA') IS NOT NULL
	DROP DATABASE QLPHONGKHAMNHAKHOA --Delete
GO
CREATE DATABASE QLPHONGKHAMNHAKHOA 
GO 
USE QLPHONGKHAMNHAKHOA 
GO

CREATE TABLE TAIKHOAN (
	SDT CHAR(10) NOT NULL,
	MatKhau VARCHAR(50) NOT NULL,
	VaiTro  NVARCHAR(20) NOT NULL,
	isActive VARCHAR(3) NOT NULL,

	PRIMARY KEY (SDT)
);

CREATE TABLE KHACHHANG(
	SDT_KH CHAR(10) NOT NULL,
	HoTen_KH  NVARCHAR(50) NOT NULL,
	NgaySinh  DATE,
	DiaChi NVARCHAR(100),

	PRIMARY KEY (SDT_KH)
);

CREATE TABLE NHASI(
	SDT_NS  CHAR(10) NOT NULL,
	HoTen_NS  NVARCHAR(50) NOT NULL,

	PRIMARY KEY (SDT_NS)
)

CREATE TABLE NHANVIEN(
	SDT_NV  CHAR(10) NOT NULL,
	HoTen_NV  NVARCHAR(50) NOT NULL,

	PRIMARY KEY (SDT_NV)
)

CREATE TABLE ADMINISTRATOR(
	SDT_Admin  CHAR(10) NOT NULL,
	HoTen_Admin  NVARCHAR(50) NOT NULL,

	PRIMARY KEY (SDT_Admin)
)

CREATE TABLE HOSOKHACHHANG(
	ID_HoSo  integer identity(1,1) not null,
	SDT_KH  CHAR(10)  NOT NULL,
	SDT_NS   CHAR(10)  NOT NULL,
	NgayTaoHoSo DATE DEFAULT GETDATE() NOT NULL,
	PhiKham INT DEFAULT 0,
	ID_DichVu int,
	TongTienThuoc INT,
	TongTien INT

	PRIMARY KEY (ID_HoSo)
)

CREATE TABLE CUOCHEN(
	ID_CuocHen integer identity(1,1) not null,
	SDT_KH  CHAR(10) NOT NULL,
	SDT_NS  CHAR(10) NOT NULL,
	Ngay DATE NOT NULL,
	Gio TIME NOT NULL,

	PRIMARY KEY (ID_CuocHen)
)


CREATE TABLE DICHVU(
	ID_DichVu integer identity(1,1) not null,
	TenDV  NVARCHAR(50) NOT NULL,
	PhiDV  INT NOT NULL DEFAULT 0,

	PRIMARY KEY (ID_DichVu)
)


CREATE TABLE KEDON(
	ID_HOSO  integer NOT NULL,
	ID_THUOC  integer NOT NULL,
	SOLUONG  INT DEFAULT 0,
	DONGIA INT DEFAULT 0,
	THANHTIEN INT DEFAULT 0,

	PRIMARY KEY(ID_HOSO,ID_THUOC)
)
CREATE TABLE THUOC(
    ID_THUOC integer identity(1,1) not null,
	TenThuoc VARCHAR(80) NOT NULL,
	DONVITINH NVARCHAR(255) NOT NULL,
	CHIDINH NVARCHAR(50),
	SOLUONGTON INT,
	NGAYHETHAN DATE,
	GIATHUOC INT,

	PRIMARY KEY(ID_THUOC)
)

GO
-- ADD CONSTRAINT--


-- TAIKHOALTER TABLE TAIKHOANAN--
ALTER TABLE TAIKHOAN 
ADD CONSTRAINT CHECK_ISACTIVE_TAIKHOAN
CHECK (ISACTIVE = 'YES' OR ISACTIVE = 'NO')

ALTER TABLE TAIKHOAN 
ADD CONSTRAINT DF_ISACTIVE_TAIKHOAN
DEFAULT 'YES' FOR ISACTIVE

ALTER TABLE TAIKHOAN
ADD CONSTRAINT CHECK_VAITRO_TAIKHOAN
CHECK (VAITRO = N'CUSTOMER' OR VAITRO = N'DENTIST' OR VAITRO = N'STAFF' OR VAITRO = 'ADMINISTRATOR')


--KHACHHANG--
ALTER TABLE KHACHHANG
ADD CONSTRAINT FK_KHACHHANG_TAIKHOAN
FOREIGN KEY (SDT_KH) REFERENCES TAIKHOAN(SDT);

--NHASI--

ALTER TABLE NHASI
ADD CONSTRAINT FK_NHASI_TAIKHOAN
FOREIGN KEY (SDT_NS) REFERENCES TAIKHOAN(SDT);

--NHANVIEN--
ALTER TABLE NHANVIEN
ADD CONSTRAINT FK_NHANVIEN_TAIKHOAN
FOREIGN KEY (SDT_NV) REFERENCES TAIKHOAN(SDT);

--ADMINISTRATOR--
ALTER TABLE ADMINISTRATOR
ADD CONSTRAINT FK_ADMINISTRATOR_TAIKHOAN
FOREIGN KEY (SDT_ADMIN) REFERENCES TAIKHOAN(SDT);

--HOSOKHACHHANG--

ALTER TABLE HOSOKHACHHANG
ADD CONSTRAINT FK_HOSOKHACHHANG_KHACHHANG
FOREIGN KEY (SDT_KH) REFERENCES KHACHHANG(SDT_KH);

ALTER TABLE HOSOKHACHHANG
ADD CONSTRAINT FK_HOSOKHACHHANG_NHASI
FOREIGN KEY (SDT_NS) REFERENCES NHASI(SDT_NS);

ALTER TABLE HOSOKHACHHANG
ADD CONSTRAINT FK_HOSOKHACHHANG_DICHVU
FOREIGN KEY (ID_DICHVU) REFERENCES DICHVU(ID_DichVu)

ALTER TABLE HOSOKHACHHANG 
ADD CONSTRAINT DF_TONGTIENTHUOC_TAIKHOAN
DEFAULT 0 FOR TONGTIENTHUOC

ALTER TABLE HOSOKHACHHANG 
ADD CONSTRAINT DF_TONGTIEN_HOSOKHACHHANG
DEFAULT 0 FOR TONGTIEN


--CUOCHEN--
ALTER TABLE CUOCHEN
ADD CONSTRAINT FK_CUOCHEN_KHACHHANG
FOREIGN KEY (SDT_KH) REFERENCES KHACHHANG(SDT_KH)

ALTER TABLE CUOCHEN
ADD CONSTRAINT FK_CUOCHEN_NHASI
FOREIGN KEY (SDT_NS) REFERENCES NHASI(SDT_NS)

--KEDON--
ALTER TABLE KEDON
ADD CONSTRAINT FK_KEDON_HOSOKHACHANG
FOREIGN KEY (ID_HoSo) REFERENCES HOSOKHACHHANG(ID_HoSo)

ALTER TABLE KEDON
ADD CONSTRAINT FK_KEDON_THUOC
FOREIGN KEY (ID_Thuoc) REFERENCES THUOC(ID_Thuoc)

--THUOC--
ALTER TABLE THUOC 
ADD CONSTRAINT DF_SOLUONGTON_THUOC
DEFAULT 0 FOR SOLUONGTON

ALTER TABLE THUOC 
ADD CONSTRAINT DF_GIATHUOC_THUOC
DEFAULT 0 FOR GIATHUOC
