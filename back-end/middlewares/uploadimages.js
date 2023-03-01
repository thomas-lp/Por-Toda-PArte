import multer from 'multer'

export const storage = multer.diskStorage({
    destination: (req, file, callback) => {
        const path = "./public/images"
        callback(null, path)
    },

    filename: (req, file, callback) => {
        const time = new Date().getTime()

        callback(null, time + "_"+ file.originalname)
    }
})