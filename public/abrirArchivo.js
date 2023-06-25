const btnPdf = document.querySelector('#pdf');
const btnXml = document.querySelector('#xml');
const folio = document.querySelector('#folio').textContent;
console.log(folio);
btnPdf.addEventListener('click', function(){
    // Ruta del archivo relativa a la carpeta actual
    const rutaArchivo = `../Files/${folio}.pdf`;

    // Abre el archivo en una nueva pestaña del navegador
    window.open(rutaArchivo);

});