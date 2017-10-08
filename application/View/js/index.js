

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

// function insertTaskToDB(val){
//   const category_id = val.target.parentElement.id;
//   const sub_category_id = val.target.id;
//   let array = {};
//   array['category_id']= category_id;
//   array['sub_category_id'] = sub_category_id;
//   let text = JSON.stringify({one:"f", two:"fd", three:"fd"});
//  var xhttpreq = new XMLHttpRequest();
//            xhttpreq.open("POST", "http://../Model/insert_my_task.php", true);
//           xhttpreq.setRequestHeader("X-Requested-With", "application/json");
//            xhttpreq.send(text);
// }

function add(val) {
    $("#index-task").append(createLI(val));
}


$("#add-button").on("click", () => {
    add();
});

$("#sentaku-list .list-group-item,#soji-list .list-group-item,#buy-list .list-group-item,#other-list .list-group-item")
    .on("click",  e => {
        const category_id = e.target.parentElement.id;
        const sub_category_id = e.target.id;

        form = new FormData();
        form.append('category_id',category_id);
        form.append('sub_category_id',sub_category_id);
        const result = fetch("../Model/insert_my_task.php",{
            "method": "POST",
            body:form
          });

        // insertTaskToDB(e);

        add(e.target.textContent);
        $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
    });
