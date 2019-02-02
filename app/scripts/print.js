function imprimir() {
    window.print();
}


function printDesign() {
    var imgDesign = document.getElementById("imgDesign");
    var ventanaImpresion = window.open(' ', 'popUp');
    ventanaImpresion.document.write(imgDesign.innerHTML);
    ventanaImpresion.document.close();
    ventanaImpresion.print();
    ventanaImpresion.close();
}