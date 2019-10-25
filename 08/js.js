function ShowVars() {
    var selectedVal = document.getElementById('DDChoices').value;
//      console.log(selectedVal);
    if (selectedVal == "1") {
//          console.log(selectedVal);
        $("#Values").hide();
    } else if (selectedVal == "2") {
//        console.log(selectedVal);
        $("#Values").show();
        $("#Name").show();
        $("#Hamming").hide();
        $("#Anagram").hide();
        $("#Hypotenuse").hide();
    } else if (selectedVal == "3") {
//        console.log(selectedVal);
        $("#Values").show();
        $("#Name").hide();
        $("#Hamming").show();
        $("#Anagram").hide();
        $("#Hypotenuse").hide();
    } else if (selectedVal == "4") {
//        console.log(selectedVal);
        $("#Values").show();
        $("#Name").hide();
        $("#Hamming").hide();
        $("#Anagram").show();
        $("#Hypotenuse").hide();
    } else if (selectedVal == "5") {
//        console.log(selectedVal);
        $("#Values").show();
        $("#Name").hide();
        $("#Hamming").hide();
        $("#Anagram").hide();
        $("#Hypotenuse").show();
    }
}

function ResetResult(a, b){
//    console.log("Result Reset");
//    console.log(a + " // " + b);
    document.getElementsByName(a).value = "";
    document.getElementsByName(b).value = "";
}