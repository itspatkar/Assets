
var optionSalaried = document.getElementById('salaried');
var salariedDiv = document.getElementById('optSalaried');

var optionSelfemployed = document.getElementById('self-employed');
var selfemployedDiv = document.getElementById('optSelfemployed');

optionSalaried.addEventListener('change', function() {
    if (optionSalaried.checked) {
        selfemployedDiv.style.display = 'none';
        salariedDiv.style.display = 'block';
        document.getElementById('salariedCompany').disabled = false;
        document.getElementById('salariedJobDate').disabled = false;
        document.getElementById('selfemployedBusiness').disabled = true;
        document.getElementById('selfemployedLocation').disabled = true;
    }
});

optionSelfemployed.addEventListener('change', function() {
    if (optionSelfemployed.checked) {
        salariedDiv.style.display = 'none';
        selfemployedDiv.style.display = 'block';
        document.getElementById('selfemployedBusiness').disabled = false;
        document.getElementById('selfemployedLocation').disabled = false;
        document.getElementById('salariedCompany').disabled = true;
        document.getElementById('salariedJobDate').disabled = true;
    }
});
