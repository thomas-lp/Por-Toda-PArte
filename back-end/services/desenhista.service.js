//camada de serviço - regras de negócio

//funções que são iniciadas ao chamar determinada rota - endpoints (funcionalidades/serviços oferecidos)
//para cada endpoint temos 2 pacotes: req(requisition) e res(response)

import desenhistaPersistence from "../Persistence/desenhista.persistence.js";
async function getAllDesenhistas(){
    return await desenhistaPersistence.getAllDesenhistas()
    //função precisa ser chamada com await, pois é async, é necessário esperar a resposta dela para seguir
}

async function getDesenhista(assinatura){
    return await desenhistaPersistence.getDesenhista(assinatura)
}

async function createDesenhista(assinatura, nome, redesocial, senha){
    const desenhista = await getDesenhista(assinatura) //confere se já existe aquele assinatura na bd

    if(desenhista.length == 0){ //desenhista não existe, posso criar 
        return await desenhistaPersistence.createDesenhista(assinatura, nome, redesocial, senha)
    }
    else{
        return "Assinatura já cadastrada."
    }
}

async function deleteDesenhista(assinatura){

    const desenhista = await getDesenhista(assinatura)

    if(desenhista.length > 0){ //desenhista existe
        return await desenhistaPersistence.deleteDesenhista(assinatura)
    }
    else{
        return "Desenhista não cadastrado."
    }
}

async function updateDesenhista(nome, redesocial, assinatura){

    const desenhista = await getDesenhista(assinatura)

    if(desenhista.length > 0){ 
        return await desenhistaPersistence.updateDesenhista(nome, redesocial, assinatura)
    }
    else{
        return "Desenhista não cadastrado."
    }
}

async function loginDesenhista(assinatura, senha){

    const desenhista = await getDesenhista(assinatura)

    if(desenhista.length > 0){ 
        return await desenhistaPersistence.loginDesenhista(assinatura, senha)
    }
    else{
        return "Desenhista não cadastrado."
    }
}
export default{getAllDesenhistas, getDesenhista, deleteDesenhista, createDesenhista, updateDesenhista, loginDesenhista} 
//nesse caso tem-se que especificar quais serviços serão exportados