import express from "express";
import eventoController from "../controllers/evento.controller.js" //.. significa sair da pasta onde está

const router = express.Router();

//CRUD EVENTO
router.get("/", eventoController.getAllEventos) 
router.get("/:idevento", eventoController.getEvento)
router.post("/", eventoController.createEvento)
router.delete("/:idevento", eventoController.deleteEvento)
router.put("/:idevento", eventoController.updateEvento)


export default router 