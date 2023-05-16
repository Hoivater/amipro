var address = "http://amistudiopro/core/script/expressshema";

$(document).on("click", "#schet", function(event){
  var countPrev = $("input#countPrev").val(); 
  var number = $("input#number").val(); 
  var sbn_text = $("input#sbn_l").val();
  var countPrUb = $("input#countPrUb").val();
  
        $.ajax({
            url: address + '/core/main.php',
            method: 'POST',
            data: {"number" : number, "sbn_text" : sbn_text, "countPrev" : countPrev, "countPrUb": countPrUb,"schet" : "schet"},
            }).done(function(data){
                  var text = $(".comline").html();
                  var newtext = "<p style = 'color:#11FF00'><span class= 'fa fa-calculator'></span> "+ data +"</p>" + text;
                  $(".comline").html(newtext);
            });
});
$(document).on("click", ".copytext", function(event){
    event.preventDefault();
    var idElement = event.target.id;
    var newIdElement = '#texts'+idElement;
    copytext(newIdElement);
    var text = $(".comline").html();
    var newtext = "<p style = 'color:#11FF00'><span class= 'fa fa-copy'></span> строка скопирована</p>" + text;
    $(".comline").html(newtext);
});