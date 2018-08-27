// save btn visibility needs to toggle w submit btn
//save btn only grabs the html data from server does not put it anywhere

var saveBtn = document.getElementById('save-btn');


function getSvgData () {
//in use svg

var svgEl = $('.activeModal .svg-data');
var svgData = svgEl.html();
var submitBtn = document.getElementById('save-work');
submitBtn.value = svgData;
console.log(submitBtn.value);
    submitBtn.addEventListener('click', function (event) {
        event.preventDefault()
    });


submitForm();

};

function submitForm () {

    var submitBtn = document.getElementById('save-work');

    if(submitBtn.value.length != 0) {

    var form = document.getElementById('save-work-form');
    form.submit();
    }
};




saveBtn.addEventListener('click', getSvgData);

