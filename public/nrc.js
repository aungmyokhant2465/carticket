var state_name= $("#state_name");
var yangon= $("#yangon");
var pago= $("#pago");
var mon= $("#mon");
yangon.on("click",function () {
    $(".yan").css("display","block");
    $(".pa").css("display","none");
    $(".mo").css("display","none");
    state_name.html("Yangon");
});
pago.on("click",function () {
    $(".yan").css("display","none");
    $(".pa").css("display","block");
    $(".mo").css("display","none");
    state_name.html("Pago")
});
mon.on("click",function () {
    $(".yan").css("display","none");
    $(".pa").css("display","none");
    $(".mo").css("display","block");
    state_name.html("Mon")
});
//
var nrcInput = $("#nrc_no");
var full = $("#full");
var vl;
var v;
var fullNrc;
$(".nrcPrefix").change(function () {
    vl = $(".nrcPrefix").children(":selected").val();
});
nrcInput.keyup(function () {
    v = nrcInput.val();
    fullNrc = vl + v;
    full.val(fullNrc);
});