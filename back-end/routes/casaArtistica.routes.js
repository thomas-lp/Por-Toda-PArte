import express from "express";
import casaController from "../controllers/casaArtistica.controller.js" 

const router = express.Router();

//CRUD CASA ARTISTICA - rotas presentes no sistema 
router.get("/", casaController.getAllCasas) 
router.get("/:nome", casaController.getCasa)
router.post("/", casaController.createCasa)
router.delete("/:nome", casaController.deleteCasa)
router.put("/:nome", casaController.updateCasa)

export default router 