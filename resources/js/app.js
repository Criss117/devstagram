import Dropzone from "dropzone"

Dropzone.autoDiscover = false

const imagenInput = document.querySelector('[name="imagen"]')
const alerta = document.querySelector('.alerta')

document.addEventListener('DOMContentLoaded',()=>{
    if(alerta){
        setTimeout(()=>{
            alerta.remove()
        }, 2000)
    }
})

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aquí tu imagén',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
    
    init: function() {
        if(imagenInput.value.trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 1234
            imagenPublicada.name = imagenInput.value
            
            this.options.addedfile.call(this, imagenPublicada)
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`)

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete')
        }
    } 
})

dropzone.on('success',function(file, response){
    imagenInput.value = response.imagen
})

dropzone.on('removedfile',function(){
    imagenInput.value = ''
})



