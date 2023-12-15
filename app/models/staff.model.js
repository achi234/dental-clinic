var {conn, sql} = require('../../connect')

module.exports = function(){
    this.getAll = async function(result){
        var pool = await conn;
        var sqlString = "SELECT * FROM NHANVIEN"
    
        return await pool.request().query(sqlString, function(err, data) {
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.getOne = async function(sdtnv, result){
        var pool = await conn
        var sqlString = "SELECT * FROM NHANVIEN WHERE SDT_NV = @sdtnv"
        return await pool.request()
        .input('sdtnv', sql.Char, sdtnv)
        .query(sqlString, function(err, data){
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.create = async function(newData, result){
        var pool = await conn
        var sqlString = "INSERT INTO NHANVIEN (SDT_NV, HoTen_NV) VALUES (@sdtnv, @hoten)"
        return await pool.request()
        .input('sdtnv', sql.Char, newData.SDT_NV)
        .input('hoten', sql.NVarChar, newData.HoTen_NS)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }

    this.update = async function(newData, result){
        var pool = await conn
        var sqlString = "UPDATE NHANVIEN SET HoTen_NV = @hoten VALUES WHERE SDT_NV = @sdtnv"
        return await pool.request()
        .input('sdtnv', sql.Char, newData.SDT_NV)
        .input('hoten', sql.NVarChar, newData.HoTen_NS)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }

    this.delete = async function(sdtns, result){
        var pool = await conn
        var sqlString = "DELETE * FROM NHANVIEN WHERE SDT_NV = @sdtnv"
        return await pool.request()
        .input('sdtnv', sql.Char, sdtns)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }
}