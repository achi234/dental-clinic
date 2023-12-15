
module.exports = function(app){
    var dentistController = require('../controllers/dentist.controller')

    //GET: lấy dữ liệu
    app.get('/dentist', dentistController.getList)
    app.get('/dentist/:sdt', dentistController.getBySdt)


    //POST: nhận dữ liệu từ client gửi lên thông qua phương thức POST
    //Thêm dữ liệu vào bảng
    app.post('/dentist', dentistController.addNew)

    //PUT: nhận dữ liệu từ client gửi lên thông qua phương thức PUT
    //Chỉnh sửa
    app.put('/dentist', dentistController.update)

    //DELETE: nhận dữ liệu từ client gửi lên thông qua phương thức DELETE
    app.delete('/dentist/:sdt', dentistController.delete)

}