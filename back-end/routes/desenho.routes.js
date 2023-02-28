//camada das rotas
import express from "express";
import desenhoController from "../controllers/desenho.controller.js" //.. significa sair da pasta onde está

const router = express.Router();

//CRUD DESENHO - rotas presentes no sistema 
router.get("/:desenhistaresp", desenhoController.getAllDesenhos) 
router.get("/:desenhistaresp/:iddesenho", desenhoController.getDesenho)
router.post("/", desenhoController.createDesenho)
router.delete("/:desenhistaresp/:iddesenho", desenhoController.deleteDesenho)
router.put("/:desenhistaresp/:iddesenho", desenhoController.updateDesenho)


export default router //exporta as rotas para que outros arquivos possam utilizá-las