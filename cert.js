//BREAKDOWN LINE FOR PURPOSE//
function breakDownWords(text) {
    const words = text.split(' ');
    const maxWordsPerLine = 8;
    let lines = [];
    for (let i = 0; i < words.length; i += maxWordsPerLine) {
        lines.push(words.slice(i, i + maxWordsPerLine).join(' '));
    }
    return lines.join('<br>');
}  var printButtonClicked = false;

function generatePDF() {
    var certificateLink = document.getElementById("certificateLink");
    var formContent = document.getElementById("certificateBody");
    var options = {
        margin: 0,
        filename: 'Certificate of Appearance.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Set the flag to true
    printButtonClicked = true;

    // Disable the link if the Print button is clicked
    if (printButtonClicked) {
        certificateLink.setAttribute("disabled", true);
        // Optionally, you can also change the link text to indicate that it's disabled
        certificateLink.innerText = "Certificate (Disabled)";
    }

    html2pdf(formContent, options);
    setTimeout(function () {
        document.getElementById("btnPrint").click();
    }, 1000);
}

// Add an event listener to the Certificate link
document.addEventListener("DOMContentLoaded", function () {
    var certificateLink = document.getElementById("certificateLink");

    certificateLink.addEventListener("click", function (event) {
        // Prevent the default behavior if the Print button is clicked
        if (printButtonClicked) {
            event.preventDefault();
        }
    });
});
function goToLogsHistory(){
    location.href = "e_logsHistory.php";
}