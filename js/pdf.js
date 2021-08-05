const button = document.querySelector('.download-pdf')

window.html2canvas = html2canvas;
window.jsPDF = window.jspdf.jsPDF;

button.addEventListener('click', makePDF)


function makePDF() {
  // var scaleBy = 1;
  // var w = 1000;
  // var h = 1000;
  // var div = document.querySelector('#screen');
  // var canvas = document.createElement('canvas');
  // canvas.width = w * scaleBy;
  // canvas.height = h * scaleBy;
  // canvas.style.width = w + 'px';
  // canvas.style.height = h + 'px';
  // var context = canvas.getContext('2d');
  // context.scale(scaleBy, scaleBy);
  html2canvas(document.querySelector("#capture"), {
    allowTaint: true,
    useCORS: true,
    scale: 2,
    scrollY: -window.scrollY
  }).then(canvas => {
    var img = canvas.toDataURL('image/png')
    var doc = new jsPDF()
    doc.addImage(img, 'PNG', 45, 13, 120, 165)
    doc.save('Voucher')
    doc.output('dataurlnewwindow');
  });
}
