async function connect() {
    if (global.connection)
        return global.connection.connect();
 
    const { Pool } = require('pg');
    const pool = new Pool({
        connectionString: process.env.CONNECTION_STRING
    });
 
    //apenas testando a conexão
    const client = await pool.connect();
    console.log("Criou pool de conexões no PostgreSQL!");
 
    const res = await client.query('SELECT NOW()');
    console.log(res.rows[0]);
    client.release();
 
    //guardando para usar sempre o mesmo
    global.connection = pool;
    return pool.connect();
}

connect();

async function selectCustomer(id_usu){
    const client = await connect();
    const res = await client.query("SELECT * FROM usuario WHERE id_usu=$1", [id_usu]);
    return res.rows;
}

//SELECT * FROM usuario - para mostrar todos os usuarios da tabela

async function updateCustomer(id_usu, customer){
    const client = await connect();
    const sql = "UPDATE usuario SET quantmoedas_usu=$1 WHERE id_usu=$2";
    const values = [customer.quantmoedas_usu, id_usu];
    await client.query(sql, values);
}

module.exports = {
    selectCustomer,
    updateCustomer
}