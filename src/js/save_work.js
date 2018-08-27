// save btn visibility needs to toggle w submit btn
//save btn only grabs the html data from server does not put it anywhere

var saveBtn = document.getElementById('save-btn');


function getSvgData () {
//in use svg
var svgEl = document.getElementById('active-svg');
var svgData = $(svgEl).html();
var submitBtn = document.getElementById('save-work');
submitBtn.value = svgData;
console.log(submitBtn.value);


};

saveBtn.addEventListener('click', getSvgData);

