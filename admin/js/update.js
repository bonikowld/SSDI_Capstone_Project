// data-toggle='modal' data-target='#myModal'
    $('.row-data').click(function(){
    $('#updateModal .serialnumber').text( $('.serialnumber', this).text() );
    $('#updateModal .donor').text( $('.donor', this).text() );
    $('#updateModal .bloodtype').text( $('.bloodtype', this).text() );
    $('#updateModal .component').text( $('.component', this).text() );
    $('#updateModal .quantity').text( $('.quantity', this).text() );
    $('#updateModal .city').text( $('.city', this).text() );
    $('#updateModal .extractiondate').text( $('.extractiondate', this).text() );
    $('#updateModal .expirationdate').text( $('.expirationdate', this).text() );
    $('#updateModal .remarks').text( $('.remarks', this).text() );
   
    
    document.getElementById("serialnumber").value = $('.serialnumber', this).text();
    document.getElementById("donor").value = $('.donor', this).text();
    document.getElementById("bloodtype").value = $('.bloodtype', this).text();
    document.getElementById("component").value = $('.component', this).text();
    document.getElementById("quantity").value = $('.quantity', this).text();
    document.getElementById("city").value = $('.city', this).text();
    document.getElementById("extractiondate").value = $('.extractiondate', this).text();
    document.getElementById("expirationdate").value = $('.expirationdate', this).text();
    document.getElementById("remarks").value = $('.remarks', this).text();


    $('#updateModal').modal();
  });


  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

document.body.style.zoom="85%";



