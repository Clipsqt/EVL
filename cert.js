$(document).ready(function () {
    $(".certificate").click(function (e) {
        e.preventDefault();

        const referencecode = $(this).data('referencecode');

        $.ajax({
            url: 'get_series_counter.php',
            method: 'GET',
            success: function (response) {
                const seriesCounter = parseInt(response);

                const seriesnumber = generateSeriesNumber(seriesCounter);

                $.ajax({
                    url: 'increment_series_counter.php',
                    method: 'POST',
                    data: {
                        seriesCounter: seriesCounter
                    },
                    success: function (updatedCounter) {
                        $.ajax({
                            url: 'insert_into_database.php',
                            method: 'POST',
                            data: {
                                referencecode: referencecode,
                                seriesnumber: seriesnumber
                            },
                            success: function (response) {
                                console.log(response);
                                window.location.href = 'certificate_of_appearance.php?reference_no=' + referencecode;
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("button#backButton").click(function () {
        goToLogsHistory();
      });
    
      // Handle browser back button
      window.onpopstate = function (event) {
        if (event.state && event.state.page) {
          if (event.state.page === 'certificate') {
            goToLogsHistory();
          }
          // Add more conditions for other pages if needed
        }
      };
    
   
      function goToLogsHistory() {
        const referencecode = getParameterByName('reference_no');
        $.ajax({
            url: 'delete_from_database.php',
            method: 'POST',
            data: { referencecode: referencecode },
            success: function (response) {
                console.log(response);
                if (response === 'Record deleted successfully') {
                    // Redirect to the e_logsHistory.php page
                    window.location.href = 'e_logsHistory.php';
                } else {
                    // Show an error message
                    alert('Error deleting data: ' + response);
                    // Optionally, handle the error or perform other actions
                }
            },
            error: function (error) {
                console.error(error);
                // Show an error message
                alert('Error deleting data. Please try again.');
                // Optionally, handle the error or perform other actions
            }
        });
    }
      function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
    function generateSeriesNumber(counter) {
        const currentYear = new Date().getFullYear();
        const formattedCounter = ('00000' + counter).slice(-6);
        return 'CA-' + currentYear + '-' + formattedCounter;
    }
});


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

