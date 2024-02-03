const express = require("express");
const fs = require("fs");
const bodyParser = require("body-parser");

const app = express();
const port = 7777;
app.use(bodyParser.urlencoded({ extended: true }));

// Part 1

app.get("/index", function(req, res){
   fs.readFile("html/index.html",function(err,data){
      res.write(data)
      res.end("")
   })
})
app.get("/contact", function(req, res){
   fs.readFile("html/contact.html",function(err,data){
      res.write(data)
      res.end("")
   })
})
app.get("/about", function(req, res){
   fs.readFile("html/about.html",function(err,data){
      res.write(data)
      res.end("")
   })
})

// Part 2

app.get("/register", function(req, res){
   fs.readFile("html/reg.html",function(err,data){
      res.write(data)
      res.end("")
   })
})

app.post("/reg", function(req, res){
   var {name, email, pass} = req.body
   console.log(name, email, pass);

   if(pass.length < 8){
      res.write("Error, Password should be at least 8 characters long. Try Again!")
      res.end("")
   }else if (pass.length >= 8){
      res.write("Registration Successful!")
      res.end("")
   }else{
      res.write("Please try again and provide a password.")
      res.end("")
   }
})

// Part 3

app.get("/", function(req, res){
   fs.readFile("html/home.html",function(err,data){
      res.write(data)
      res.end("")
   })
})

app.listen(port, console.log("Server Started, Listening on port: " + port))