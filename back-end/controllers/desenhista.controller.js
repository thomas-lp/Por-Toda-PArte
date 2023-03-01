import desenhistaService from "../services/desenhista.service.js";
async function getAllDesenhistas(req, res){
    res.send(await desenhistaService.getAllDesenhistas())
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getDesenhista(req, res){
    const assinatura = req.params.assinatura; //retorna o parâmetro que foi pedido - captura dos dados

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

    if(!assinatura || !senha || !casa){ //assinatura vazio
        res.send("Assinatura, senha ou casa artística inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.createDesenhista(assinatura, nome, redesocial, senha, casa))
    }
}

async function deleteDesenhista(req, res){

    const assinatura = req.params.assinatura; //retorna o parâmetro que foi pedido - captura dos dados

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.deleteDesenhista(assinatura))
    }
}

async function updateDesenhista(req, res){

    const assinatura = String(req.params.assinatura);
    const nome = req.body.nome;
    const redesocial = req.body.redesocial;

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.updateDesenhista(nome, redesocial, assinatura))
    }
}

async function loginDesenhista(req, res){

    const assinatura = req.body.assinatura;
    const senha = req.body.senha;

    if(!assinatura || !senha){ //assinatura vazio
        res.send("Assinatura ou senha inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.loginDesenhista(assinatura, senha))
    }
}


export default{getAllDesenhistas, getDesenhista, deleteDesenhista, createDesenhista, updateDesenhista, loginDesenhista} 
//nesse caso tem-se que especificar quais serviços serão exportados