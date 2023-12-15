const express = require('express')
const bodyParser = require('body-parser')
var {conn, sql} = require('./connect')
const port = 3000

const app = express()
app.use(bodyParser.json())

app.get('/', (req, res) => {
    res.send('Hello Express!')
})

/*app.get('/customer', async function(req, res){
    var pool = await conn;
    var sqlString = "SELECT * FROM KHACHHANG"

    return await pool.request().query(sqlString, function(err, data) {
        console.log(err, data)
    })
    res.send('Customer list')
        
})*/

//routes
require('./app/routes/customer.route')
/*require('./app/routes/dentist.route')*/

app.listen(port, () => {
    console.log(`Example app listening http://localhost:${port}`)
  })