import BD from "./BD.js"

async function getAllAdms(req, res){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        const consulta = await conn.query('SELECT * FROM adm') //consulta ao banco de dados no codigo
        console.log("getAllAdms !!!  /n" + consulta.rows)
        return consulta.rows //retorna para a camada controller
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function getAdm(assinatura){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        //$1 significa a posicao no vetor que segue o query para que se saiba qual valor pegar
        const consulta = await conn.query("SELECT * FROM adm WHERE assinatura = $1", [assinatura]) //consulta ao banco de dados no codigo
        console.log("getAdm !!!  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function createAdm(assinatura, nome, redesocial, senha, casa, funcao, dataingresso){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("INSERT INTO adm (assinatura, nome, redesocial, senha, casa, funcao, dataingresso) VALUES ($1, $2, $3, $4, $5, $6, $7) returning *", 
        [assinatura, nome, redesocial, senha, casa, funcao, dataingresso]) 
        console.log("Inserindo...  /n" + consulta.rows)
        return consulta.rows
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); 
    }
}

async function deleteAdm(assinatura){
    const conn = await BD.conectar(); 

    try{
        const consulta = await conn.query("DELETE FROM adm WHERE assinatura = $1 returning *", [assinatura]) 
        console.log("Deletando...  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); 
    }
}

async function updateAdm(nome, redesocial, assinatura, funcao){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("UPDATE adm SET nome = $1, redesocial = $2, funcao = $3 WHERE assinatura = $4 returning *", [nome, redesocial, funcao, assinatura]) 
        console.log("Alterando...  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); 
    }
}

async function loginAdm(assinatura, senha){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("SELECT * FROM adm WHERE assinatura = $1 AND senha = $2", [assinatura, senha]) 
        console.log("Carregando...  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); 
    }
}

export default{getAllAdms, getAdm, deleteAdm, createAdm, updateAdm, loginAdm} 