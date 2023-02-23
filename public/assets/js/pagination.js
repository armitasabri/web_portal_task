

const my_body = document.getElementById("tableBody");
const all_rows=my_body.rows;
const numberOfItems = my_body.rows.length-1
const numberPerPage = 5
const currentPage = 1
const numberOfPages = Math.ceil(numberOfItems/numberPerPage)


function buildPage(currPage) {

    const trimStart = (currPage-1)*numberPerPage
    var trimEnd = trimStart + numberPerPage
    if(currPage==numberOfPages){
        trimEnd =my_body.rows.length
    }
    const old_tbody = document.getElementById("tableBody");
    const new_tbody = document.createElement('tbody');
    old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
    new_tbody.setAttribute("id", "tableBody");
    var roww = [];

    for(var k=trimStart;k<trimEnd;k++){

        roww[k] = all_rows[k]

    }
    var array=[];

    for(var z=0;z<numberPerPage ;z++){
        array[z] = new_tbody.insertRow(z);
        array[z].innerHTML =roww[z+trimStart].innerHTML;
    }

}

function buildPagination(currPageNum, numberOfPages){
    var list=[];
    for (let i=0; i<numberOfPages; i++) {
        list +="<li class='page-item'>"+
            "<button class='page-link' >"+(currPageNum + i)+"</button></li>";
    }
    document.getElementById('pagination').innerHTML=list;
}


function pagination() {
    buildPage(1)
    buildPagination(1,5);
}