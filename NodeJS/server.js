//import thu vien
let express = require('express');
const mysql = require('mysql');
let cors = require('cors');
// new express app
let app = express();

//su dung middleware
app.use(cors()); // open cors


app.listen(3001); // khoi dong

//ket noi mysql

const con = mysql.createConnection({
    host: "localhost",
    database : 'long6',
    user: "root",
    password: ""
});
  


app.get("/",(req ,res)=>{
    console.log("aaaaa")
    res.send("hello word!")
})
app.get("/user",(req ,res)=>{
    var user1={firtname: "long", lastname: "thien"}
    var user2={firtname: "anh", lastname: "quynh"}
    var user3={firtname: "tuan", lastname: "tran"}
    var user4={firtname: "nhan", lastname: "my"}

    res.json([user1,user2,user3,user4])
})

app.get("/products",async(req ,res)=>{
    //lay du lieu tu mysql
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        con.query("select * from products", function (err, result) {
            if (err) throw err;
            console.log("Result: " + result);
            res.json(result);
        });
    });
   
})

app.get("/user2",function(req ,res){

});
