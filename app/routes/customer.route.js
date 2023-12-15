
module.exports = function(app){
    var customerController = require('../controllers/customer.controller')

    //GET: lấy dữ liệu
    app.get('/customer', customerController.getList)
    app.get('/customer/:sdt', customerController.getBySdt)


    //POST: nhận dữ liệu từ client gửi lên thông qua phương thức POST
    //Thêm dữ liệu vào bảng
    app.post('/customer', customerController.addNew)

    //PUT: nhận dữ liệu từ client gửi lên thông qua phương thức PUT
    //Chỉnh sửa
    app.put('/customer', customerController.update)

    //DELETE: nhận dữ liệu từ client gửi lên thông qua phương thức DELETE
    app.delete('/customer/:sdt', customerController.delete)

}