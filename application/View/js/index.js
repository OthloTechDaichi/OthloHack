

function createLI(val)
{
    const input = $("<input>").attr("type","checkbox").addClass("form-check-input").on("change", e => {
        if(e.target.checked)
        {
            const t = $(e.target);
            const form = new FormData();
            form.append("id",t.attr("data-id"));
            t.parent().parent().remove();
            fetch("done", {
                method:"POST",
                body:form
            })
        }
    });
    const label = $("<label>").addClass("form-check-label").append(input).append(val);
    const li = $("<li>").addClass("task-item").append(label).attr("data-id",0);
    return li;
}

function insertTaskToDB(val){
  const category_id = val.target.parentElement.id;
  console.log(val.target.id)
}

function add(val) {
    $("#index-task").append(createLI(val));
}


$("#add-button").on("click", () => {
    add();
});

$("#sentaku-list .list-group-item,#soji-list .list-group-item,#buy-list .list-group-item,#other-list .list-group-item")
    .on("click", async e => {
        const form = new FormData();
        form.append("id",  0  );
        const result = await fetch("add",{
            "method": "POST",
            body:form
        });
        insertTaskToDB(e);
        add(e.target.textContent);

        $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
    });
