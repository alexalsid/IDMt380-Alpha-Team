var xmlhttp = new XMLHttpRequest();
var url = "../src/php/json/user.json";

xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var userData = JSON.parse(this.responseText);
        myFunction(userData);
    }
};

xmlhttp.open("GET", url, true);
xmlhttp.send();


function dataArr(userData) {
    var user = "";
    var i;
    for (i = 0; i < userData.length; i++) {
        user +=  console.log(userData[i].user_id);
    }
    
}




