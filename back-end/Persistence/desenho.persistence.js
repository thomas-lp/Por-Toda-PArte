//camada de persistencia - acesso ao banco de dados
import BD from "./BD.js"

//async deve ser colocado sempre que for necessário utilizar o await dentro da função
async function getAllDesenhos(desenhistaresp){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        const consulta = await conn.query('SELECT * FROM desenho WHERE desenhistaresp = $1', [desenhistaresp]) //consulta ao banco de dados no codigo
        console.log("getAllDesenhos !!!  /n" + consulta.rows)
        return consulta.rows //retorna para a camada controller
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function getDesenho(iddesenho, desenhistaresp){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        //$1 significa a posicao no vetor que segue o query para que se saiba qual valor pegar
        const consulta = await conn.query("SELECT * FROM desenho WHERE iddesenho = $1 AND desenhistaresp = $2", [iddesenho, desenhistaresp]) //consulta ao banco de dados no codigo
        console.log("getDesenho !!!  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function createDesenho(iddesenho, tipodesenho, estilo, datapostagem, desenhistaresp, eventocad, nomedesenho){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("INSERT INTO desenho (iddesenho, tipodesenho, estilo, datapostagem, desenhistaresp, eventocad, nomedesenho) VALUES ($1, $2, $3, $4, $5, $6, $7) returning *", 
        [iddesenho, tipodesenho, estilo, datapostagem, desenhistaresp, eventocad, nomedesenho]) 
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

async function deleteDesenho(iddesenho, desenhistaresp){
    const conn = await BD.conectar(); 

    try{
        const consulta = await conn.query("DELETE FROM desenho WHERE iddesenho = $1 AND desenhistaresp = $2 returning *", [iddesenho, desenhistaresp]) 
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

async function updateDesenho(tipodesenho, estilo, iddesenho, desenhistaresp, eventocad){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("UPDATE desenho SET tipodesenho = $1, estilo = $2, eventocad = $3 WHERE iddesenho = $4 AND desenhistaresp = $5 returning *", [tipodesenho, estilo, eventocad, iddesenho, desenhistaresp]) 
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

export default{getAllDesenhos, getDesenho, deleteDesenho, createDesenho, updateDesenho} 