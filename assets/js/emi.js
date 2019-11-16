$(document).ready(function() {
    $(".emi").blur(function(){
       p=parseInt($("#loanAmount").val());
       r=parseInt($("#interestRate").val());
       n=parseInt($("#loanTenure").val());  
       r=(r/12)/100;
       n*=12;
       e=Math.round(p*r*(Math.pow((1+r),n))/(Math.pow((1+r),n)-1));
       $("#loanAmountR").val(p);
       $("#emi").val(e);
       tot=e*n;
       $("#totamo").val(tot);
       $("#interest").val(tot-p);       
    });
});