//camada das rotas
import express from "express";
import desenhistaController from "../controllers/desenhista.controller.js" //.. significa sair da pasta onde está

const router = express.Router();

//CRUD DESENHISTA - rotas presentes no sistema 
router.get("/", desenhistaController.getAllDesenhistas) 
router.get("/:assinatura", desenhistaController.getDesenhista)
router.post("/", desenhistaController.createDesenhista)
router.delete("/:assinatura", desenhistaController.deleteDesenhista)
router.put("/:assinatura", desenhistaController.updateDesenhista)
router.post("/login/", desenhistaController.loginDesenhista)


export default router //exporta as rotas para que outros arquivos possam utilizá-las