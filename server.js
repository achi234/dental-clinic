const sql = require('mssql/msnodesqlv8')

//các ttin kết nối dbs
var config = {
    user: "sa",
    password: "menu123",
    server: "LAPTOP-DUIAC375\\SQLEXPRESS", 
    database: "QLPHONGKHAMNHAKHOA",
    driver: "msnodesqlv8",
    connectionString: 'Driver=SQL Server Native Client 11.0;Server=Server_name;Database=DBname;Trusted_Connection=yes;'
}

const conn = new sql.ConnectionPool(config).connect().then(pool => {
    return pool;
})

module.exports = {
    conn : conn, 
    sql : sql
}