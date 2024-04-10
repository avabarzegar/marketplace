
// sidebar dropdown 
const select = document.querySelector("aside .select");
const options_list = document.querySelector(".options-list");
const options = document.querySelectorAll(".option");

//show & hide options list
if(select){
select.addEventListener("click", () => {
  options_list.classList.toggle("active");
  select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
});
}

//select option
options.forEach((option) => {
  option.addEventListener("click", () => {
    options.forEach((option) => { option.classList.remove('selected') });
    select.querySelector("span").innerHTML = option.innerHTML;
    option.classList.add("selected");
    options_list.classList.toggle("active");
    select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
  });
});

function searchFilter() {

    var cat = '';
    if ($('#categoryOptions:checked').val()) {
        cat = '&category=' + $('#categoryOptions:checked').val();
    }
    var idata = 'keywords=' + $('#search').val() + '&filter=' + $('#filterSelect').val() + cat;


    $.ajax({
        type: 'POST',
        url: 'filter.php',
        data: idata,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('.loading-overlay').hide();
            $('#products').html(html);
        }
    });
}

function resetFilter(){
    
}