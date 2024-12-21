const express = require('express') 
const app = express()
const port = 7000
const cors = require('cors');
const corsOptions = {
    origin: ['http://localhost:5173'],
}

app.set('view engine', 'ejs')
app.use(express.json())
app.use(express.static('frontend'))
app.use(cors(corsOptions))

app.listen(port, async(error)=> {
    if (error) {
        console.log("Something Went Wrong", error)
    } else {
        console.log("Server is listening on port " + port)
        await sequelize.authenticate()
    }
});