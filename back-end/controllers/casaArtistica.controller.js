import casaService from "../services/casaArtistica.service.js";
async function getAllCasas(req, res){
    res.send(await casaService.getAllCasas())
}

async function getCasa(req, res){
    const nome = req.params.nome; 

    if(!nome){ 
        res.send("Nome inválido!!!") 
    }
    else{
        res.send(await casaService.getCasa(nome))
    }
}

async function createCasa(req, res){
    //campos requeridos para o cadastro do Casa
    const nome = req.body.nome
    const animal = req.body.animal
    const pedra = req.body.pedra
    const cor = req.body.cor
    const flor = req.body.flor
    const ouros = parseInt(req.body.ouros)
    const pratas = parseInt(req.body.pratas)
    const bronzes = parseInt(req.body.bronzes)

    if(!nome || !animal || !pedra || !cor || !flor || !ouros || !pratas || !bronzes){ 
        res.send("Informação inválida foi inserida!!!") 
    }
    else{
        res.send(await casaService.createCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes))
    }
}

async function deleteCasa(req, res){

    const nome = req.params.nome; 

    if(!nome){ 
        res.send("Nome inválido!!!") 
    }
    else{
        res.send(await casaService.deleteCasa(nome))
    }
}

async function updateCasa(req, res){

    const nome = req.params.nome
    const animal = req.body.animal
    const pedra = req.body.pedra
    const cor = req.body.cor
    const flor = req.body.flor
    const ouros = parseInt(req.body.ouros)
    const pratas = parseInt(req.body.pratas)
    const bronzes = parseInt(req.body.bronzes)

    if(!nome){ 
        res.send("Nome inválido!!!") //validação de dados
    }
    else{
        res.send(await casaService.updateCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes))
    }
}

export default{getAllCasas, getCasa, deleteCasa, createCasa, updateCasa} 
//nesse caso tem-se que especificar quais serviços serão exportados