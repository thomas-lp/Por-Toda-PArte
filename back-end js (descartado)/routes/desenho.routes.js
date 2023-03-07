//camada das rotas
import express from "express";
import multer from "multer"
import { storage } from "../middlewares/uploadimages.js"
import desenhoController from "../controllers/desenho.controller.js" //.. significa sair da pasta onde está

const router = express.Router();
const upload = multer({storage: storage})

//CRUD DESENHO - rotas presentes no sistema 
router.get("/:desenhistaresp", desenhoController.getAllDesenhos) 
router.get("/:desenhistaresp/:iddesenho", desenhoController.getDesenho)
router.post("/", upload.single("desenho"), desenhoController.createDesenho)
router.delete("/:desenhistaresp/:iddesenho", desenhoController.deleteDesenho)
router.put("/:desenhistaresp/:iddesenho", desenhoController.updateDesenho)


export default router //exporta as rotas para que outros arquivos possam utilizá-las