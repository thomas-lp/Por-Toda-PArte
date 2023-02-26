/*camada de controle - recebe dados, faz validação, chama serviços e retorna resposta
  sendo assim, aqui ficam somente funções que recebem dados e/ou precisam fazer validação de dados inseridos
  as demais são apenas chamadas da camada de serviços e a partir delas são retornadas as resposatas
  
  para cada endpoint temos 2 pacotes: req(requisition) e res(response)
*/
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
    const assinatura = req.body.assinatura;
    const nome = req.body.nome;
    const redesocial = req.body.redesocial;

    if(!assinatura){ //assinatura vazio
        res.send("Assinatura inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhistaService.createDesenhista(assinatura, nome, redesocial))
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

export default{getAllDesenhistas, getDesenhista, deleteDesenhista, createDesenhista, updateDesenhista} 
//nesse caso tem-se que especificar quais serviços serão exportados