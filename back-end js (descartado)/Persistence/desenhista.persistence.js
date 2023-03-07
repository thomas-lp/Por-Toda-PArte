//camada de persistencia - acesso ao banco de dados
import BD from "./BD.js"

//async deve ser colocado sempre que for necessário utilizar o await dentro da função
async function getAllDesenhistas(req, res){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        const consulta = await conn.query('SELECT * FROM desenhista') //consulta ao banco de dados no codigo
        console.log("getAllDesenhistas !!!  /n" + consulta.rows)
        return consulta.rows //retorna para a camada controller
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function getDesenhista(assinatura){

    const conn = await BD.conectar(); //executar a função, mas aguardar o retorno dela

    try{
        //$1 significa a posicao no vetor que segue o query para que se saiba qual valor pegar
        const consulta = await conn.query("SELECT * FROM desenhista WHERE assinatura = $1", [assinatura]) //consulta ao banco de dados no codigo
        console.log("getDesenhista !!!  /n" + consulta.rows)
        return consulta.rows 
    }
    catch(err){
        console.log(err);
    }
    finally{
        conn.release(); //libera a conexao que estava sendo utilizada para esse serviço
    }
}

async function createDesenhista(assinatura, nome, redesocial, senha, casa){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("INSERT INTO desenhista (assinatura, nome, redesocial, senha, casa) VALUES ($1, $2, $3, $4, $5) returning *", 
        [assinatura, nome, redesocial, senha, casa]) 
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

async function deleteDesenhista(assinatura){
    const conn = await BD.conectar(); 

    try{
        const consulta = await conn.query("DELETE FROM desenhista WHERE assinatura = $1 returning *", [assinatura]) 
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

async function updateDesenhista(nome, redesocial, assinatura){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("UPDATE desenhista SET nome = $1, redesocial = $2 WHERE assinatura = $3 returning *", [nome,redesocial, assinatura]) 
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

async function loginDesenhista(assinatura, senha){

    const conn = await BD.conectar(); 

    try{
        const consulta = 
        await conn.query("SELECT * FROM desenhista WHERE assinatura = $1 AND senha = $2", [assinatura, senha]) 
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

export default{getAllDesenhistas, getDesenhista, deleteDesenhista, createDesenhista, updateDesenhista, loginDesenhista} 