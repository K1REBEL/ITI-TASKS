const express = require("express");
const fs = require("fs");
const bodyParser = require("body-parser");
const { log } = require("console");

const app = express();
const port = 7777;
app.set("view-engine","ejs");
// app.use(bodyParser.urlencoded());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.json())

app.get("/", function(req, res){
   res.render('index.ejs')
})

// Part 1

var users = [{name: "Kareem", email: "k@g.com", pass:123}]

app.get("/reg", function(req, res){
   msg = "Welcome"
   res.render('reg.ejs', {users, msg})
})

app.post("/register", function(req, res){
   // console.log(req.body.pass.length)
   
   if(req.body.pass.length < 8){
      msg = "Error, password is less than 8 characters."
      res.render('reg.ejs', {users, msg})
   }else{
      newUser = req.body
      users.push(newUser)
      msg = "Added Successfully!"
      res.render('reg.ejs', {users, msg})
   }
})

// Part 2

let cars = [{id:"1", make:"Opel", model:"Vectra", license:4116},{id:"2", make:"BMW", model:"e39", license:1111}]
let lastIndex = cars.length

app.get("/cars", function(req, res){
   res.sendFile(__dirname+"\\crud.html")
})

app.get("/cars/readone", function(req, res){
   const cid = req.query.id
   const car = cars.find(car => car.id==cid)
   const body ={ data:car }

   if(car) body.msg = "Success"
   else body.msg = "Failed"
   res.send(body)
})

app.get("/cars/readall", function(req, res){
   res.send({data:cars, msg:"Success"})
})

app.post("/cars/add", function(req, res){
   const car = req.body
   // console.log(req.body)
   car.id=String(++lastIndex)
   cars.push(car)

   const body = { msg:"Success" }
   res.send(body)
})

app.get("/cars/delete/:id", function(req, res){
   const cid = req.params.id
   const carIndex = cars.findIndex(car => car.id==cid)
   const body = {}

   if(carIndex >= 0){
      cars.splice(carIndex, 1)
      body.msg="Success"
   }else body.msg="Not Found"
   res.send(body)
})

app.post("/cars/edit/:id", function(req, res){
   const cid = req.params.id
   const car = cars.find(car => car.id==cid)
   const body = {}

   if(car){
      car.make = req.body.name
      car.model = req.body.name
      car.license = req.body.name
      body.msg="Success"
   }else body.msg="Not Found"
   res.send(body)
})

app.listen(port, console.log("Server Started, Listening on port: " + port))