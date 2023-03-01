import casaPersistence from "../Persistence/casaArtistica.persistence.js";
async function getAllCasas(){
    return await casaPersistence.getAllCasas()
}

async function getCasa(nome){
    return await casaPersistence.getCasa(nome)
}

async function createCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes){
    const Casa = await getCasa(nome) 

    if(Casa.length == 0){  
        return await casaPersistence.createCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes)
    }
    else{
        return "Nome de Casa Artística já cadastrado."
    }
}

async function deleteCasa(nome){

    const Casa = await getCasa(nome)

    if(Casa.length > 0){ 
        return await casaPersistence.deleteCasa(nome)
    }
    else{
        return "Casa não cadastrada."
    }
}

async function updateCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes){

    const Casa = await getCasa(nome)

    if(Casa.length > 0){ 
        return await casaPersistence.updateCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes)
    }
    else{
        return "Casa não cadastrada."
    }
}

export default{getAllCasas, getCasa, deleteCasa, createCasa, updateCasa} 