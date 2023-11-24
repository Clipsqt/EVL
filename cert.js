//BREAKDOWN LINE FOR PURPOSE//
function breakDownWords(text) {
    const words = text.split(' ');
    const maxWordsPerLine = 15;
    let lines = [];
    for (let i = 0; i < words.length; i += maxWordsPerLine) {
        lines.push(words.slice(i, i + maxWordsPerLine).join(' '));
    }
    return lines.join('<br>');
}

function generatePDF() {
    var formContent = document.getElementById("certificateBody");
    var options = {
        margin: 10,
        filename: 'Certificate of Appearance.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    html2pdf(formContent, options);
    setTimeout(function () {
        document.getElementById("btnPrint").click();
    }, 100); 
}

function goToLogsHistory(){
    location.href = "e_logsHistory.php";
}