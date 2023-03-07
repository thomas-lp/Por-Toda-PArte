import express from "express"
import desenhistaRouter from "./routes/desenhista.routes.js"
import desenhoRouter from "./routes/desenho.routes.js"
import eventoRouter from "./routes/evento.routes.js"
import casaRouter from "./routes/casaArtistica.routes.js"
import admRouter from "./routes/adm.routes.js"

const servidor = express() 

servidor.use(express.json())
servidor.use(express.urlencoded({extended: true}))
servidor.use("/desenhista", desenhistaRouter) 
servidor.use("/desenho", desenhoRouter)
servidor.use("/evento", eventoRouter)
servidor.use("/casa", casaRouter)
servidor.use("/adm", admRouter)

servidor.listen(3001, servico) 

function servico(){
    console.log("Servidor rodando...") //mensagem quando chega na porta 
}

