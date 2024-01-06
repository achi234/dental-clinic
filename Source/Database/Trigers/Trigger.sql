USE QLPHONGKHAMNHAKHOA 
GO

--drop trigger tg_kiemtra_CUOCHEN
--drop trigger tg_add_KeDonThuoc_KEDON
--drop trigger tg_kiemtra_HanSuDung_KEDON
--drop trigger tg_add_ThanhTien_KEDON
--drop trigger tg_add_TongTienThuoc_HOSO
-- Nội dung: Lịch hẹn mà khách hàng đặt không được trùng với lịch hẹn của bác sĩ.
create trigger tg_kiemtra_CUOCHEN
on CUOCHEN
for insert, update
as
begin
	/*if exists (select 1
				from CUOCHEN c
				inner join NHASI n on c.SDT_NS = n.SDT_NS
				where c.ID_CuocHen in (select ID_CuocHen from inserted)
				and not exists (select 1
								from HOSOKHACHHANG h
								where h.SDT_NS = c.SDT_NS
								and h.NgayTaoHoSo = c.Ngay
								and h.ID_HoSo <> (select ID_HoSo from inserted)
								)
				)
	*/
	if exists (select 1
				from CUOCHEN c1, CUOCHEN c2
				where c1.ID_CuocHen != c2.ID_CuocHen
				and c1.Ngay = c2.Ngay
				and c1.Gio = c2.Gio
				and c1.SDT_NS = c2. SDT_NS
				)
	begin
		raiserror('Bac si khong ranh trong thoi gian nay', 16, 1)
		rollback transaction
	end
end
go
-- Nội dung: Số lượng thuốc kê đơn phải nhỏ hơn hoặc bằng số lượng tồn kho. 
create trigger tg_add_KeDonThuoc_KEDON
on KEDON
for insert, update
as
begin
	if exists (select 1
				from KEDON k
				inner join THUOC t on k.ID_Thuoc = t.ID_Thuoc
				where k.ID_HoSo in (select ID_HoSo from inserted)
				and k.SoLuong > t.SoLuongTon
				)
	begin
		raiserror('So luong thuoc ke don vuot qua so luong ton kho', 16, 1)
		rollback transaction
	end
end
go
-- Nội dung: Thuốc kê đơn không được quá hạn sử dụng
create trigger tg_kiemtra_HanSuDung_KEDON
on KEDON
for insert, update
as
begin
	if exists (select 1
				from KEDON k
				inner join THUOC t on k.ID_Thuoc = t.ID_THUOC
				where k.ID_HOSO in (select ID_HOSO from inserted)
				and t.NGAYHETHAN < getdate()
			)
	begin
		raiserror('Thuoc ke don da qua han su dung', 16, 1)
		rollback transaction
	end
end
go
-- Nội dung: Thành tiền của mỗi loại thuốc được kê bằng đơn giá * số lượng
-- ThanhTien(KEDON) = SoLuong * DonGia
create trigger tg_add_ThanhTien_KEDON
on KEDON
after insert, update
as
begin
	declare @id_hoso char(10)
	declare @id_thuoc char(10)
	declare @so_luong int
	declare @don_gia int
	declare @thanh_tien int

	select @id_hoso = ID_HOSO,
			@id_thuoc = ID_THUOC,
			@so_luong = SOLUONG
	from inserted

	-- DonGia(KEDON) = GiaThuoc(THUOC)
	select @don_gia = GIATHUOC
	from THUOC where ID_THUOC = @id_thuoc

	update KEDON
	set DONGIA = @don_gia
	where ID_HOSO = @id_hoso and ID_THUOC = @id_thuoc

	set @thanh_tien = @don_gia*@so_luong

	update KEDON
	set THANHTIEN = @thanh_tien
	where ID_HOSO = @id_hoso and ID_THUOC = @id_thuoc

	declare @tong_tien_thuoc int
	select @tong_tien_thuoc = ISNULL(SUM(ThanhTien), 0)
	from KEDON where ID_HoSo = @id_hoso

	update HOSOKHACHHANG
	set TongTienThuoc = @tong_tien_thuoc
	where ID_HoSo = @id_hoso

end
go
-- Nội dung: Tổng chi phí thanh toán cho 1 hồ sơ bệnh nhân phải bằng 
-- tổng chi phí dịch vụ, phí khám bệnh và thuốc được kê. 
-- TongTien(HSKH) = PhiDV + PhiKham + TongTienThuoc
create trigger tg_add_TongTienThuoc_HOSO
on HOSOKHACHHANG
after insert, update
as
begin
	declare @id_hoso char(10)
	declare @id_dv char(10)
	declare @phi_kham int
	declare @phi_dv int
	declare @tong_tien_thuoc int
	declare @tong_tien int

	select @id_hoso = ID_HoSo,
			@id_dv = ID_DichVu,
			@phi_kham = PhiKham
	from inserted

	-- TongTienThuoc(HSKH) = SUM(ThanhTien(KEDON))
	select @tong_tien_thuoc = ISNULL(SUM(ThanhTien), 0)
	from KEDON where ID_HoSo = @id_hoso

	update HOSOKHACHHANG
	set TongTienThuoc = @tong_tien_thuoc
	where ID_HoSo = @id_hoso

	select @phi_dv = PhiDV
	from DICHVU where ID_DichVu = @id_dv

	set @tong_tien = @phi_kham + @phi_dv + @tong_tien_thuoc

	update HOSOKHACHHANG
	set TongTien = @tong_tien
	where ID_HoSo = @id_hoso
end