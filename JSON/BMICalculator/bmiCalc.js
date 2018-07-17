var bmi = ""
var message = ""
function calculateBMI() {
    var height = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;

    if (height%1>=0 && weight%1 >=0)
    {
        var xmlhttp = new XMLHttpRequest();
        var url = "calulateBMI.php";
        var jsObject = {ht:height, wt:weight};
        var data = JSON.stringify(jsObject);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("input=" + data);

        //alert (xmlhttp.readyState+":"+xmlhttp.status);
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                var output = xmlhttp.responseText;
                var jsOutput = JSON.parse(output);
                bmi = jsOutput.bmi;
                message=jsOutput.message;
                document.getElementById("result").innerHTML =
                    "Your BMI is " + bmi.toFixed(2) + ". " + message;
            }
        }
    }else
    {
        alert("Enter valid inputs.");
    }
}