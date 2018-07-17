
function convertCurrency(){
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    var xmlhttp= new XMLHttpRequest();
    //var url="http://data.fixer.io/api/symbols?access_key=e38841c7d6b806e875ec67bab98d60d2";

    var url = "http://data.fixer.io/api/2015-04-10?access_key=e38841c7d6b806e875ec67bab98d60d2&base=EUR"+"&symbols="+to+","+from;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var result = xmlhttp.responseText;
                var quantity = document.getElementById("fromAmount").value;

                var jsResult = JSON.parse(result);
                var toAmmt = jsResult.rates[to]*quantity/jsResult.rates[from];
                document.getElementById("toAmount").value = toAmmt;
            }
        }
    }




//document.getElementById("to").onchange=convertCurrency();
//document.getElementById("from").onchange=convertCurrency();