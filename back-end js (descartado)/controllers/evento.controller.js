import eventoService from "../services/evento.service.js";
async function getAllEventos(req, res){
    res.send(await eventoService.getAllEventos())
}

async function getEvento(req, res){
    const idevento = req.params.idevento; 

    if(!idevento){ //idevento vazio
        res.send("Id do evento inválido!!!") //validação de dados
    }
    else{
        res.send(await eventoService.getEvento(idevento))
    }
}

async function createEvento(req, res){
    //campos requeridos para o cadastro do Evento
    const idevento = req.body.idevento
    const categoria = req.body.categoria
    const ano = req.body.ano
    const nome = req.body.nome
    const data = req.body.data
    const descricao = req.body.descricao

    if(!idevento){ 
        res.send("Id do evento inválido!!!") 
    }
    else{
        res.send(await eventoService.createEvento(idevento, categoria, ano, nome, data, descricao))
    }
}

async function deleteEvento(req, res){

    const idevento = req.params.idevento; 

    if(!idevento){ 
        res.send("Id do evento inválido!!!")
    }
    else{
        res.send(await eventoService.deleteEvento(idevento))
    }
}

async function updateEvento(req, res){

    const idevento = req.params.idevento;
    const categoria = req.body.categoria
    const ano = req.body.ano
    const nome = req.body.nome
    const data = req.body.data
    const descricao = req.body.descricao

    if(!idevento){ 
        res.send("Id do evento inválido!!!") 
    }
    else{
        res.send(await eventoService.updateEvento(categoria, ano, nome, data, descricao, idevento))
    }
}

export default{getAllEventos, getEvento, deleteEvento, createEvento, updateEvento} 