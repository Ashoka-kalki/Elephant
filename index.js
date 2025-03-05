const {client} = require('pg')
constclient=new client({
  host:"localhost",
  user:"postgres",
  port:5432,
  password:"Ashoka123",
  database:"Elephant"
})
client.connect();
client.query('select * from add',(err,res)=>{
  if(!err){
    console.log(res.rows);
  }else{
    console.log(err.message);
  }
  client.end;
  })