
var model = new Customer()
var Customer = require('../models/customer.model')

exports.getList = async function(req, res){
    model.getAll(function(err, data) {
        res.send({result : data, error: err})
    })
}

exports.getBySdt = function(req, res){
    model.getOne(req.params.sdtkh, function(err, data) {
        res.send({result : data, error: err})
    })
}

exports.addNew = function(req, res){
    model.create(req.body, function(err, data){
        res.send({result : data, error: err})
    })
}

exports.update = function(req, res){
    model.update(function(err, data) {
        res.send({result : data, error: err})
    })
}

exports.delete = async function(req, res){
    model.delete(req.params.sdtkh, function(err, data) {
        res.send({result : data, error: err})
    })
}