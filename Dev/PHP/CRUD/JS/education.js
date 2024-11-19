
function addEducation(){
    var container = document.getElementById("educationDetails");
    var row = document.createElement("div");
    row.className = "education-row";
    row.innerHTML = `
        <input type="text" name="education[]" placeholder="Education" required>
        <input type="text" name="yearOfCompletion[]" placeholder="Year Of Completion" required>
        <button type="button" onclick="removeEducation(this)">Remove</button>
    `;
    container.appendChild(row);
}

function removeEducation(button){
    var row = button.parentElement;
    row.parentElement.removeChild(row);
}
