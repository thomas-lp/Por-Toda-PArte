//camada de serviço - regras de negócio

//funções que são iniciadas ao chamar determinada rota - endpoints (funcionalidades/serviços oferecidos)
//para cada endpoint temos 2 pacotes: req(requisition) e res(response)

import desenhoPersistence from "../Persistence/desenho.persistence.js";
async function getAllDesenhos(){
    return await desenhoPersistence.getAllDesenhos()
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getDesenho(iddesenho){
    return await desenhoPersistence.getDesenho(iddesenho)
}

async function createDesenho(iddesenho, tipodesenho, estilo, datapostagem){
    const Desenho = await getDesenho(iddesenho) //confere se já existe aquele iddesenho na bd

    if(Desenho.length == 0){ //Desenho não existe, posso criar 
        return await desenhoPersistence.createDesenho(iddesenho, tipodesenho, estilo, datapostagem)
    }
    else{
        return "Id do desenho já cadastrado."
    }
}

async function deleteDesenho(iddesenho){

    const Desenho = await getDesenho(iddesenho)

    if(Desenho.length > 0){ //Desenho existe
        return await desenhoPersistence.deleteDesenho(iddesenho)
    }
    else{
        return "Desenho não cadastrado."
    }
}

async function updateDesenho(tipodesenho, estilo, iddesenho){

    const Desenho = await getDesenho(iddesenho)

    if(Desenho.length > 0){ 
        return await desenhoPersistence.updateDesenho(tipodesenho, estilo, iddesenho)
    }
    else{
        return "Desenho não cadastrado."
    }
}

export default{getAllDesenhos, getDesenho, deleteDesenho, createDesenho, updateDesenho} 
//nesse caso tem-se que especificar quais serviços serão exportados