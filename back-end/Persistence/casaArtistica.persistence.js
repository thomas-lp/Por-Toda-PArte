import BD from "./BD.js"

async function getAllCasas(req, res){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        const consulta = await conn.query('SELECT * FROM casaartistica') //consulta ao banco de dados no codigo
        console.log("getAllCasas !!!  /n" + consulta.rows)
        return consulta.rows //retorna para a camada controller
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function getCasa(nome){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        //$1 significa a posicao no vetor que segue o query para que se saiba qual valor pegar
        const consulta = await conn.query("SELECT * FROM casaartistica WHERE nome = $1", [nome]) //consulta ao banco de dados no codigo
        console.log("getCasa !!!  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function createCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("INSERT INTO casaartistica (nome, animal, pedra, cor, flor, ouros, pratas, bronzes) VALUES ($1, $2, $3, $4, $5, $6, $7, $8) returning *", 
        [nome, animal, pedra, cor, flor, ouros, pratas, bronzes]) 
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

async function deleteCasa(nome){
    const conn = await BD.conectar(); 

    try{
        const consulta = await conn.query("DELETE FROM casaartistica WHERE nome = $1 returning *", [nome]) 
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

async function updateCasa(nome, animal, pedra, cor, flor, ouros, pratas, bronzes){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("UPDATE casaartistica SET animal = $1, pedra = $2, cor = $3, flor = $4, ouros = $5, pratas = $6, bronzes = $7 WHERE nome = $8 returning *", 
        [animal, pedra, cor, flor, ouros, pratas, bronzes, nome]) 
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

export default{getAllCasas, getCasa, deleteCasa, createCasa, updateCasa} 