

function createLI(val)
{
    const input = $("<input>").attr("type","checkbox").addClass("form-check-input");
    const label = $("<label>").addClass("form-check-label").append(input).append(val);
    const li = $("<li>").addClass("task-item").append(label);
    return li;
}

function add(val) {
    $("#index-task").append(createLI(val));
}

const other = {

}

$("#add-button").on("click", () => {
    add();
})

$("#cat-body>div").on("click",e => {
    console.log(e.target.id.substr(4));
})


$("#cat-body>div").on("click",e => {
    console.log(e.target.id.substr(4));
})

$("#sentaku-list .list-group-item,#soji-list .list-group-item,#buy-list .list-group-item,#other-list .list-group-item")
    .on("click",e => {
        add(e.target.textContent);
        $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
    });
