import pg from "pg"

//conexão com o banco de dados
function conectar(){
    // se não entrar nesse if, significa que não existe uma conexão com banco de dados
    if(global.connection){ //variavel global connection
        return global.connection.connect(); //realiza a conexão já instanciada - conexão vazia que possa ser utilizada
    }

    //Pool: classe que se conecta ao banco de dados e conforme vão chegando requisições para acessar o banco de dados, 
    //se criam novas conexões - maior agilidade nas requisições (o número de conexões depende da configuração do Pool - não acessável)
    const pool = new pg.Pool({
        connectionString:"postgres://postgres:170603@localhost:5432/teste"
    })

    global.connection = pool; //guarda a conexão nessa global.connection, por ser global, pode ser acessada de qualquer lugar do código (retornada)
    return pool.connect(); //retorna uma conexão vazia qualquer
}

export default {conectar}