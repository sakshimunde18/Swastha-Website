
function searchq(){
    var searchTxt = $("input[name='search']").val();
    $.post("index.php", {searchVal: searchTxt},function(output){
        $("#myTable").html(output);
    }
)}