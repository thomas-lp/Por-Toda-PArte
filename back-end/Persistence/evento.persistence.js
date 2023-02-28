//camada de persistencia - acesso ao banco de dados
import BD from "./BD.js"

//async deve ser colocado sempre que for necessário utilizar o await dentro da função
async function getAllEventos(req, res){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        const consulta = await conn.query('SELECT * FROM evento') //consulta ao banco de dados no codigo
        console.log("getAllEventos !!!  /n" + consulta.rows)
        return consulta.rows //retorna para a camada controller
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function getEvento(idevento){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        //$1 significa a posicao no vetor que segue o query para que se saiba qual valor pegar
        const consulta = await conn.query("SELECT * FROM evento WHERE idevento = $1", [idevento]) //consulta ao banco de dados no codigo
        console.log("getEvento !!!  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function createEvento(idevento, categoria, ano, nome, data, descricao){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("INSERT INTO evento (idevento, categoria, ano, nome, data, descricao) VALUES ($1, $2, $3, $4, $5, $6) returning *", 
        [idevento, categoria, ano, nome, data, descricao]) 
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

async function deleteEvento(idevento){
    const conn = await BD.conectar(); 

    try{
        const consulta = await conn.query("DELETE FROM evento WHERE idevento = $1 returning *", [idevento]) 
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

async function updateEvento(categoria, ano, nome, data, descricao, idevento){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("UPDATE evento SET categoria = $1, ano = $2, nome = $3, data = $4, descricao = $5 WHERE idevento = $6 returning *", [categoria, ano, nome, data, descricao, idevento]) 
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

export default{getAllEventos, getEvento, deleteEvento, createEvento, updateEvento} 