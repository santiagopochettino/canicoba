document.addEventListener('DOMContentLoaded', function(){
    let imagenes5 =[
        {img:'/imagenes/5 mts/mdpgolf3.JPG'},
        {img:'/imagenes/5 mts/P1110182.JPG'}
    ]
    let contador = 0
    const contenedor = document.querySelector('.slideshow')
    const overlay = document.querySelector('.overlay')
    const galeria_imagenes = document.querySelectorAll('.galeria img')
    const img_slideshow = document.querySelector('.slideshow img')

    contenedor.addEventListener('click', function(event){
        let atras = contenedor.querySelector('.atras'),
            adelante = contenedor.querySelector('.adelante'),
            img = contenedor.querySelector('img'),
            tgt = event.target
        if(tgt == atras){
            if (contador > 0){
                img.src = imagenes5[imagenes5.length -1].img
                contador--
            } else{
                img.src = imagenes5[imagenes5.length -1].img
                contador = imagenes5.length -1
            }
        }else if(tgt == adelante){
            if(contador < imagenes5.length -1){
                img.src = imagenes5[contador +1].img
                contador++
            }else{
                img.src = imagenes5[0].img
                contador =0
            }
        }
    })
    Array.from(galeria_imagenes).forEach(img =>{
        img.addEventListener('click', event =>{
            const imagen_seleccionada = +event.target.dataset.imgMostrar
            img_slideshow.src = imagenes5[imagen_seleccionada].img
            contador = imagen_seleccionada
            overlay.style.opacity = 1
            overlay.style.visibility = 'visible'
        })
    })
    document.querySelector('.btn_cerrar').addEventListener('click', ()=>{
        overlay.style.opacity = 0
        overlay.style.visibility = 'hidden'
    })

})