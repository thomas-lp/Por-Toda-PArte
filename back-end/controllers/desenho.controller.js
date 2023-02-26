/*camada de controle - recebe dados, faz validação, chama serviços e retorna resposta
  sendo assim, aqui ficam somente funções que recebem dados e/ou precisam fazer validação de dados inseridos
  as demais são apenas chamadas da camada de serviços e a partir delas são retornadas as resposatas
  
  para cada endpoint temos 2 pacotes: req(requisition) e res(response)
*/
import desenhoService from "../services/desenho.service.js";
async function getAllDesenhos(req, res){
    res.send(await desenhoService.getAllDesenhos())
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getDesenho(req, res){
    const iddesenho = req.params.iddesenho; //retorna o parâmetro que foi pedido - captura dos dados

    if(!iddesenho){ //iddesenho vazio
        res.send("Id do desenho inválido!!!") //validação de dados
    }
    else{
        res.send(await desenhoService.getDesenho(iddesenho))
    }
}

async function createDesenho(req, res){
    //campos requeridos para o cadastro do desenho
    const iddesenho = parseInt(req.body.iddesenho);
    const tipodesenho = req.body.tipodesenho;
    const estilo = req.body.estilo;
    const datapostagem = new Date();

    if(!iddesenho){ //iddesenho vazio
        res.send("Id do desenho inválido!!!") //validação de dados
    }
    else{
        res.send(await desenhoService.createDesenho(iddesenho, tipodesenho, estilo, datapostagem))
    }
}

async function deleteDesenho(req, res){

    const iddesenho = req.params.iddesenho; //retorna o parâmetro que foi pedido - captura dos dados

    if(!iddesenho){ //iddesenho vazio
        res.send("iddesenho inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhoService.deleteDesenho(iddesenho))
    }
}

async function updateDesenho(req, res){

    const iddesenho = req.params.iddesenho;
    const tipodesenho = req.body.tipodesenho;
    const estilo = req.body.estilo;

    if(!iddesenho){ //iddesenho vazio
        res.send("iddesenho inválida!!!") //validação de dados
    }
    else{
        res.send(await desenhoService.updateDesenho(tipodesenho, estilo, iddesenho))
    }
}

export default{getAllDesenhos, getDesenho, deleteDesenho, createDesenho, updateDesenho} 
//nesse caso tem-se que especificar quais serviços serão exportados