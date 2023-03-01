import admService from "../services/adm.service.js";
async function getAllAdms(req, res){
    res.send(await admService.getAllAdms())
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getAdm(req, res){
    const assinatura = req.params.assinatura; //retorna o parâmetro que foi pedido - captura dos dados

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await admService.getAdm(assinatura))
    }
}

async function createAdm(req, res){
    //campos requeridos para o cadastro do Adm
    const assinatura = req.body.assinatura
    const nome = req.body.nome
    const redesocial = req.body.redesocial
    const senha = parseInt(req.body.senha)
    const casa = req.body.casa
    const funcao = req.body.funcao
    const dataingresso = req.body.dataingresso

    if(!assinatura || !senha || !casa || !funcao || !dataingresso){ //assinatura vazio
        res.send("Informações inválidas foram inseridas!!!") //validação de dados
    }
    else{
        res.send(await admService.createAdm(assinatura, nome, redesocial, senha, casa, funcao, dataingresso))
    }
}

async function deleteAdm(req, res){

    const assinatura = req.params.assinatura; //retorna o parâmetro que foi pedido - captura dos dados

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await admService.deleteAdm(assinatura))
    }
}

async function updateAdm(req, res){

    const assinatura = String(req.params.assinatura);
    const nome = req.body.nome;
    const redesocial = req.body.redesocial;
    const funcao = req.body.funcao;

    if(!assinatura || !funcao){ //assinatura vazio
        res.send("Assinatura ou função inválida!!!") //validação de dados
    }
    else{
        res.send(await admService.updateAdm(nome, redesocial, assinatura, funcao))
    }
}

async function loginAdm(req, res){

    const assinatura = req.body.assinatura;
    const senha = req.body.senha;

    if(!assinatura || !senha){ //assinatura vazio
        res.send("Assinatura ou senha inválida!!!") //validação de dados
    }
    else{
        res.send(await admService.loginAdm(assinatura, senha))
    }
}


export default{getAllAdms, getAdm, deleteAdm, createAdm, updateAdm, loginAdm} 
//nesse caso tem-se que especificar quais serviços serão exportados