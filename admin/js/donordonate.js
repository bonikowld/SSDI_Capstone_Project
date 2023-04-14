$(document).ready(function(){
$("#donorDetails").click(function(){
    $('#donateModal .donor').text( $('.donor', this).text() );
    $('#donateModal .bloodtype').text( $('.bloodtype', this).text() );
    $('#donateModal .component').text( $('.component', this).text() );
    $('#donateModal .quantity').text( $('.quantity', this).text() );  

    document.getElementById("donor").value = $('.donor', this).text();
    document.getElementById("bloodtype").value = $('.bloodtype', this).text();
    document.getElementById("component").value = $('.component', this).text();
    document.getElementById("quantity").value = $('.quantity', this).text();


    $('#donateModal').modal();
  });
});