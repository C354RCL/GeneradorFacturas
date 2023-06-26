const btnPdf = document.querySelector('#pdf');
const btnXml = document.querySelector('#xml');
const folio = document.querySelector('#folio').textContent;
const allPdf = document.querySelectorAll('#pdf');
const allXml = document.querySelectorAll('#xml');

allPdf.forEach((e, i) =>{
    e.addEventListener('click', function(){
        // Ruta del archivo relativa a la carpeta actual
        const rutaArchivo = `../Files/${folio}.pdf`;
        
        // Abre el archivo en una nueva pestaña del navegador
        window.open(rutaArchivo);
    })
});

allXml.forEach((e, i) => {
    // Ruta del archivo relativa a la carpeta actual
    const rutaArchivo = `../Files/${folio}.xml`;
    
    // Abre el archivo en una nueva pestaña del navegador
    window.open(rutaArchivo);
});

// btnPdf.addEventListener('click', function(){
// });

// btnXml.addEventListener('click', function(){
// });