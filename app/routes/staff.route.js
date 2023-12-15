
module.exports = function(app){
    var staffController = require('../controllers/staff.controller')

    //GET: lấy dữ liệu
    app.get('/staff', staffController.getList)
    app.get('/staff/:sdt', staffController.getBySdt)


    //POST: nhận dữ liệu từ client gửi lên thông qua phương thức POST
    //Thêm dữ liệu vào bảng
    app.post('/staff', staffController.addNew)

    //PUT: nhận dữ liệu từ client gửi lên thông qua phương thức PUT
    //Chỉnh sửa
    app.put('/staff', staffController.update)

    //DELETE: nhận dữ liệu từ client gửi lên thông qua phương thức DELETE
    app.delete('/staff/:sdt', staffController.delete)

}