var {conn, sql} = require('../../connect')

module.exports = function(){
    this.getAll = async function(result){
        var pool = await conn;
        var sqlString = "SELECT * FROM KHACHHANG"
    
        return await pool.request().query(sqlString, function(err, data) {
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.getOne = async function(sdtkh, result){
        var pool = await conn
        var sqlString = "SELECT * FROM KHACHHANG WHERE SDT_KH = @sdtkh"
        return await pool.request()
        .input('sdtkh', sql.Char, sdtkh)
        .query(sqlString, function(err, data){
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.create = async function(newData, result){
        var pool = await conn
        var sqlString = "INSERT INTO KHACHHANG (SDT_KH, HoTen_KH, NgaySinh, DiaChi) VALUES (@sdtkh, @hoten, @ngaysinh, @diachi)"
        return await pool.request()
        .input('sdtkh', sql.Char, newData.SDT_KH)
        .input('hoten', sql.NVarChar, newData.HoTen_KH)
        .input('ngaysinh', sql.Date, newData.NgaySinh)
        .input('diachi', sql.NVarChar, newData.DiaChi)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }

    this.update = async function(newData, result){
        var pool = await conn
        var sqlString = "UPDATE KHACHHANG SET HoTen_KH = @hoten, NgaySinh = @ngaysinh, DiaChi = @diachi VALUES WHERE SDT_KH = @sdtkh"
        return await pool.request()
        .input('sdtkh', sql.Char, newData.SDT_KH)
        .input('hoten', sql.NVarChar, newData.HoTen_KH)
        .input('ngaysinh', sql.Date, newData.NgaySinh)
        .input('diachi', sql.NVarChar, newData.DiaChi)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }

    this.delete = async function(sdtkh, result){
        var pool = await conn
        var sqlString = "DELETE * FROM KHACHHANG WHERE SDT_KH = @sdtkh"
        return await pool.request()
        .input('sdtkh', sql.Char, sdtkh)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }
}