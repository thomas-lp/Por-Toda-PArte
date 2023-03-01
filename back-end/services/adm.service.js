import admPersistence from "../Persistence/adm.persistence.js";
import casas from "../Persistence/casaArtistica.persistence.js";

async function getAllAdms(){
    return await admPersistence.getAllAdms()
}

async function getAdm(assinatura){
    return await admPersistence.getAdm(assinatura)
}

async function createAdm(assinatura, nome, redesocial, senha, casa, funcao, dataingresso){
    const Adm = await getAdm(assinatura) 
    const casasExistentes = await casas.getCasa(casa)

    if(Adm.length == 0 && casasExistentes.length != 0){ 
        return await admPersistence.createAdm(assinatura, nome, redesocial, senha, casa, funcao, dataingresso)
    }
    else{
        return "Assinatura já cadastrada ou Casa Artística não existente."
    }
}

async function deleteAdm(assinatura){

    const Adm = await getAdm(assinatura)

    if(Adm.length > 0){ //Adm existe
        return await admPersistence.deleteAdm(assinatura)
    }
    else{
        return "Adm não cadastrado."
    }
}

async function updateAdm(nome, redesocial, assinatura, funcao){

    const Adm = await getAdm(assinatura)

    if(Adm.length > 0){ 
        return await admPersistence.updateAdm(nome, redesocial, assinatura, funcao)
    }
    else{
        return "Adm não cadastrado."
    }
}

async function loginAdm(assinatura, senha){

    const Adm = await getAdm(assinatura)

    if(Adm.length > 0){ 
        return await admPersistence.loginAdm(assinatura, senha)
    }
    else{
        return "Adm não cadastrado."
    }
}
export default{getAllAdms, getAdm, deleteAdm, createAdm, updateAdm, loginAdm} 
//nesse caso tem-se que especificar quais serviços serão exportados