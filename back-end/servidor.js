import express from "express"
import desenhistaRouter from "./routes/desenhista.routes.js"
import desenhoRouter from "./routes/desenho.routes.js"
import eventoRouter from "./routes/evento.routes.js"
import casaRouter from "./routes/casaArtistica.routes.js"
import admRouter from "./routes/adm.routes.js"

const servidor = express() //retorna o servidor pronto de express - instancia o pacote importado

servidor.use(express.json())
servidor.use(express.urlencoded({extended: true}))
servidor.use("/desenhista", desenhistaRouter) //toda vez que chamar /desenhista chama o roteador responsável
servidor.use("/desenho", desenhoRouter)
servidor.use("/evento", eventoRouter)
servidor.use("/casa", casaRouter)
servidor.use("/adm", admRouter)

servidor.listen(3001, servico) //servidor ouve de uma certa porta lógica - nunca criar abaixo de 1000 (convenção)
//passa como parametro servico que indica o que acontecerá quando a requisição chegar na porta 3000 (nosso sistema)

function servico(){
    console.log("Servidor rodando...") //mensagem quando chega na porta 
}

