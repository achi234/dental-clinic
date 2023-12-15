const sql = require('mssql/msnodesqlv8')

//các ttin kết nối dbs
var config = {
    user: "sa",
    password: "menu123",
    server: "localhost", 
    database: "QLPHONGKHAMNHAKHOA",
    driver: "msnodesqlv8",
    options: {
        trustedConnection: true,
    }
}

const conn = new sql.ConnectionPool(config).connect().then(pool => {
    return pool;
})

module.exports = {
    conn : conn, 
    sql : sql
}