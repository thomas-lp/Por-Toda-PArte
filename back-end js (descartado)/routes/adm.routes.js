import express from "express";
import admController from "../controllers/adm.controller.js" //.. significa sair da pasta onde está

const router = express.Router();

//CRUD ADM - rotas presentes no sistema 
router.get("/", admController.getAllAdms) 
router.get("/:assinatura", admController.getAdm)
router.post("/", admController.createAdm)
router.delete("/:assinatura", admController.deleteAdm)
router.put("/:assinatura", admController.updateAdm)
router.post("/login/", admController.loginAdm)


export default router //exporta as rotas para que outros arquivos possam utilizá-las