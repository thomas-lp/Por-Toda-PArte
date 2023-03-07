import eventoPersistence from "../Persistence/Evento.persistence.js";
async function getAllEventos(){
    return await eventoPersistence.getAllEventos()
}

async function getEvento(idevento){
    return await eventoPersistence.getEvento(idevento)
}

async function createEvento(idevento, categoria, ano, nome, data, descricao){
    const Evento = await getEvento(idevento) 

    if(Evento.length == 0){ 
        return await eventoPersistence.createEvento(idevento, categoria, ano, nome, data, descricao)
    }
    else{
        return "Id de evento já cadastrado."
    }
}

async function deleteEvento(idevento){

    const Evento = await getEvento(idevento)

    if(Evento.length > 0){ //Evento existe
        return await eventoPersistence.deleteEvento(idevento)
    }
    else{
        return "Evento não cadastrado."
    }
}

async function updateEvento(categoria, ano, nome, data, descricao, idevento){

    const Evento = await getEvento(idevento)

    if(Evento.length > 0){ 
        return await eventoPersistence.updateEvento(categoria, ano, nome, data, descricao, idevento)
    }
    else{
        return "Evento não cadastrado."
    }
}

export default{getAllEventos, getEvento, deleteEvento, createEvento, updateEvento} 
