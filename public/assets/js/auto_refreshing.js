function auto_refreshing(){

    var nextDate = new Date();

    if (nextDate.getMinutes() === 0) {
        callEveryHour()
    } else {
        nextDate.setHours(nextDate.getHours() + 1);
        nextDate.setMinutes(0);
        nextDate.setSeconds(0);// I wouldn't do milliseconds too ;)

        var difference = nextDate - new Date();
        setTimeout(callEveryHour, difference);
    }

    function callEveryHour() {
        setInterval(getResults, 1000 * 60 * 60);  // 1 hour in msec
    }

    function getResults() {
        // Creating the XMLHttpRequest object
        var request = new XMLHttpRequest();

        // Instantiating the request object
        request.open("POST", "/myTask/get_new_tasks");

        // Defining event listener for readystatechange event
        request.onreadystatechange = function() {
            // Check if the request is compete and was successful
            if(this.readyState === 4 && this.status === 200) {

                //empty old data from tbody tag
                const old_tbody = document.getElementById("tableBody");
                const new_tbody = document.createElement('tbody');
                old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
                new_tbody.setAttribute("id", "tableBody");

                var json_response=JSON.parse(this.responseText);

                var row = [];
                for (var i=0;i<json_response.data.length;i++){
                    row[i] = new_tbody.insertRow(i);
                    row[i].innerHTML = " <td>"+(i+1)+"</td>" +
                        "<td>"+json_response.data[i].task+"</td>" +
                        "<td>"+json_response.data[i].title+"</td>" +
                        "<td>"+json_response.data[i].description+"</td>" +
                        "<td style=background-color:"+json_response.data[i].colorCode+"></td>";
                }
                buildPage(1);
                buildPagination(1,5);
                search();
                alert('refreshed');
            }
        };

        // Sending the request to the server
        request.send();
    }


}