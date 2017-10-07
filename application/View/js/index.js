

function createLI(val,id)
{
    const input = $("<input>").attr("type","checkbox").addClass("form-check-input checkbox");
    const label = $("<label>").addClass("form-check-label").append(input).append($("<span>").append(val).addClass("checkbox-icon"));
    const li = $("<li>").addClass("task-item").append(label).attr("data-id",id);
    return li;
}


$("#index-task").on("change" , e => {
    if(e.target.checked)
    {
        const t = $(e.target);
        const form = new FormData();
        form.append("id",t.parent().parent().attr("data-id"));
        t.parent().parent().remove();
        fetch("../Model/done_my_task.php", {
            method:"POST",
            body:form
        })
    }
});

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

function add(val,id) {
    $("#index-task").append(createLI(val,id));
}


$("#add-button").on("click", () => {
    add();
});

$("#sentaku-list .list-group-item,#soji-list .list-group-item,#buy-list .list-group-item,#other-list .list-group-item")
    .on("click",  async e => {
        const category_id = e.target.parentElement.id;
        const sub_category_id = e.target.id;

        form = new FormData();
        form.append('category_id',category_id);
        form.append('sub_category_id',sub_category_id);
        const result = await fetch("../Model/insert_my_task.php",{
            "method": "POST",
            body:form
          });


        // insertTaskToDB(e);

        add(e.target.textContent,await result.text());
        $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
    });

$("#addSubSouzi").on("click",() =>{
    //const category_id = e.target.parentElement.id;
    const newItem = $("#newSubSouzi").val();

    form = new FormData();
    form.append('category_id',3);
    form.append('newItem',newItem);
    const result = await fetch("../Model/insert_sub_category.php",{
        "method": "POST",
        body:form
    });


    // insertTaskToDB(e);

    add(e.target.textContent,await result.text());
    $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
})

let kusalist = {
    "2017-09-10":5,
    "2017-09-12":1,
    "2017-09-14":2,
    "2017-09-15":3,
    "2017-09-16":4,
    "2017-09-17":5,
    "2017-10-01":5,
    "2017-10-02":1,
    "2017-10-04":2,
    "2017-10-05":3,
    "2017-10-06":4,
    "2017-10-07":5,
};

function makeKusa()
{
    const tomorrow = new Date();

    tomorrow.setDate(tomorrow.getDate() + 1);
    tomorrow.setHours(0);
    tomorrow.setMinutes(0);
    tomorrow.setSeconds(0);
    const t = tomorrow.getTime();

    const d = new Date(2017,8-1,1);
    const end = new Date(2017,12-1,1).getTime();
    const list = [];
    while(d.getTime() < t && d.getTime() < end )
    {
//        list.push($("<div>").addClass("kusa-"+(kusalist[d.toISOString().substring(0,10)]||0)));
        list.push($("<div>").addClass("kusa-"+(Math.floor(Math.random() * 6))));

        d.setDate(d.getDate() + 1);
    }
    $("#kusa").append(list);
}
makeKusa();
