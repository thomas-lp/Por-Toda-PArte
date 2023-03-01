//camada de serviço - regras de negócio

//funções que são iniciadas ao chamar determinada rota - endpoints (funcionalidades/serviços oferecidos)
//para cada endpoint temos 2 pacotes: req(requisition) e res(response)

import desenhoPersistence from "../Persistence/desenho.persistence.js";
import desenhistas from "../Persistence/desenhista.persistence.js"
async function getAllDesenhos(desenhistaresp){
    const Assinatura = await desenhistas.getDesenhista(desenhistaresp)

    if(Assinatura.lenght != 0){
        return await desenhoPersistence.getAllDesenhos(desenhistaresp)
    }
    else{
        return "Desenhista não cadastrado."
    }
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getDesenho(iddesenho, desenhistaresp){
    return await desenhoPersistence.getDesenho(iddesenho, desenhistaresp)
}

async function createDesenho(iddesenho, tipodesenho, estilo, datapostagem, desenhistaresp, eventocad, nomedesenho){
    const Desenho = await getDesenho(iddesenho) //confere se já existe aquele iddesenho na bd
    const Assinatura = await desenhistas.getDesenhista(desenhistaresp)

    if(Desenho.length == 0 && Assinatura.lenght != 0){ //Desenho não existe, posso criar 
        return await desenhoPersistence.createDesenho(iddesenho, tipodesenho, estilo, datapostagem, desenhistaresp, eventocad, nomedesenho)
    }
    else{
        return "Id do desenho já cadastrado ou desenhista não existente."
    }
}

async function deleteDesenho(iddesenho, desenhistaresp){

    const Desenho = await getDesenho(iddesenho, desenhistaresp)

    if(Desenho.length > 0){ //Desenho existe
        return await desenhoPersistence.deleteDesenho(iddesenho, desenhistaresp)
    }
    else{
        return "Desenho não cadastrado."
    }
}

async function updateDesenho(tipodesenho, estilo, iddesenho, desenhistaresp, eventocad){

    const Desenho = await getDesenho(iddesenho, desenhistaresp)

    if(Desenho.length > 0){ 
        return await desenhoPersistence.updateDesenho(tipodesenho, estilo, iddesenho, desenhistaresp, eventocad)
    }
    else{
        return "Desenho não cadastrado."
    }
}

export default{getAllDesenhos, getDesenho, deleteDesenho, createDesenho, updateDesenho} 
//nesse caso tem-se que especificar quais serviços serão exportados