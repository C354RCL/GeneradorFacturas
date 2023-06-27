const btnsPdf = document.querySelectorAll('#pdf');
const btnsXml = document.querySelectorAll('#xml');
const folios = document.querySelectorAll('#folio');

btnsPdf.forEach((e, i) => {
    let folio = folios[i].textContent;
    e.addEventListener('click', function(){
        // Ruta del archivo PDF relativa a la carpeta actual
        const rutaArchivo = `../Files/${folio}.pdf`;

        // Abre el archivo en una nueva pestaña del navegador
        window.open(rutaArchivo);
    });
});

btnsXml.forEach((e, i) => {
    let folio = folios[i].textContent;
    e.addEventListener('click', function(){
        // Ruta del archivo PDF relativa a la carpeta actual
        const rutaArchivo = `../Files/${folio}.xml`;

        // Abre el archivo en una nueva pestaña del navegador
        window.open(rutaArchivo);
    });
});