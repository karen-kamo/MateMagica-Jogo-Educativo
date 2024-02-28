require("dotenv").config();

const db = require("./db");

const port = process.env.PORT;

const express = require("express");

const app = express();

app.get("/", (req, res) => {
    res.json({
        message: "Funcionando!"
    })
})

app.get("/clientes/:id", async (req, res) => {
    const cliente = await db.selectCustomer(req.params.id);
    res.json(cliente);
})

app.get("/clientes", async (req, res) => {
    const clientes = await db.selectCustomer();
    res.json(clientes);
})

app.patch("/clientes/:id", async (req, res) => {
    await db.updateCustomer(req.params.id, req.body);
    res.sendStatus(200);
})
app.listen(port);

console.log("Backend rodando");
