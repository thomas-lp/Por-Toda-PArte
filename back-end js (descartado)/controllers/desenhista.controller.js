import desenhistaService from "../services/desenhista.service.js";
async function getAllDesenhistas(req, res){
    res.send(await desenhistaService.getAllDesenhistas())
}

async function getDesenhista(req, res){
    const assinatura = req.params.assinatura; 

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.getDesenhista(assinatura))
    }
}

async function createDesenhista(req, res){
    //campos requeridos para o cadastro do desenhista
    const assinatura = req.body.assinatura
    const nome = req.body.nome
    const redesocial = req.body.redesocial
    const senha = parseInt(req.body.senha)
    const casa = req.body.casa

    if(!assinatura || !senha || !casa){ 
        res.send("Assinatura, senha ou casa artística inválida!!!") 
    }
    else{
        res.send(await desenhistaService.createDesenhista(assinatura, nome, redesocial, senha, casa))
    }
}

async function deleteDesenhista(req, res){

    const assinatura = req.params.assinatura; 

    if(!assinatura){ 
        res.send("Assinatura inválida!!!") 
    }
    else{
        res.send(await desenhistaService.deleteDesenhista(assinatura))
    }
}

async function updateDesenhista(req, res){

    const assinatura = String(req.params.assinatura);
    const nome = req.body.nome;
    const redesocial = req.body.redesocial;

    if(!assinatura){ 
        res.send("Assinatura inválida!!!") 
    }
    else{
        res.send(await desenhistaService.updateDesenhista(nome, redesocial, assinatura))
    }
}

async function loginDesenhista(req, res){

    const assinatura = req.body.assinatura;
    const senha = req.body.senha;

    if(!assinatura || !senha){ 
        res.send("Assinatura ou senha inválida!!!") 
    }
    else{
        res.send(await desenhistaService.loginDesenhista(assinatura, senha))
    }
}


export default{getAllDesenhistas, getDesenhista, deleteDesenhista, createDesenhista, updateDesenhista, loginDesenhista} 