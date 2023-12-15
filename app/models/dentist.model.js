var {conn, sql} = require('../../connect')

module.exports = function(){
    this.getAll = async function(result){
        var pool = await conn;
        var sqlString = "SELECT * FROM NHASI"
    
        return await pool.request().query(sqlString, function(err, data) {
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.getOne = async function(sdtns, result){
        var pool = await conn
        var sqlString = "SELECT * FROM NHASI WHERE SDT_NS = @sdtns"
        return await pool.request()
        .input('sdtns', sql.Char, sdtns)
        .query(sqlString, function(err, data){
            if (data.recordset.length > 0)
                result (null, data.recordset)
            else 
                result (true, null)
        })
    }

    this.create = async function(newData, result){
        var pool = await conn
        var sqlString = "INSERT INTO NHASI (SDT_NS, HoTen_NS) VALUES (@sdtns, @hoten)"
        return await pool.request()
        .input('sdtns', sql.Char, newData.SDT_NS)
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
        var sqlString = "UPDATE NHASI SET HoTen_NS = @hoten VALUES WHERE SDT_NS = @sdtns"
        return await pool.request()
        .input('sdtns', sql.Char, newData.SDT_NS)
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
        var sqlString = "DELETE * FROM NHASI WHERE SDT_NS = @sdtns"
        return await pool.request()
        .input('sdtns', sql.Char, sdtns)
        .query(sqlString, function(err, data){
            if (!err)
                result (null, newData)
            else 
                result (true, null)
        })
    }
}