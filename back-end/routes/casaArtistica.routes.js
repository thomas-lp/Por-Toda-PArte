import express from "express";
import multer from "multer"
import { storage } from "../middlewares/uploadimages.js"
import casaController from "../controllers/casaArtistica.controller.js" 

const router = express.Router();
const upload = multer({storage: storage})

//CRUD CASA ARTISTICA - rotas presentes no sistema 
router.get("/", casaController.getAllCasas) 
router.get("/:nome", casaController.getCasa)
router.post("/", upload.single("brasao"), casaController.createCasa)
router.delete("/:nome", casaController.deleteCasa)
router.put("/:nome", casaController.updateCasa)

export default router 